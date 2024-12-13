let prefID = 1;
function setPref(id) {
  prefID = id;
  // document.getElementById("prefRef").innerText = prefID;
  // Remove active class from all boxes
  document.querySelectorAll(".pref").forEach((box) => {
    box.classList.remove("text-white", "bg-color");
  });
  // Add active class to the clicked box
  const prefSelected = document.getElementById("prefSelected" + id).classList;
  prefSelected.add("text-white", "bg-color");
}

let boxID = 1;
function setSize(pid, id) {
  boxID = id;
  // document.getElementById("sizeRef").innerText = boxID;
  // Remove active class from all boxes
  document.querySelectorAll(".box").forEach((box) => {
    box.classList.remove("text-white", "bg-color");
  });
  // Add active class to the clicked box
  const selected = document.getElementById("selected" + id).classList;
  selected.add("text-white", "bg-color");
  setPrice(pid);
}

function setPrice(pid) {
  let f = new FormData();
  f.append("pid", pid);
  f.append("bid", boxID);

  let r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      document.getElementById("priceT").innerText = "$" + r.responseText;
      console.log(r.responseText);
    }
  };

  r.open("POST", "setPriceProcess.php", true);
  r.send(f);
}

function addToCart(pid) {
  let bid = boxID;
  let qty = document.getElementById("qty").value;
  let sid = prefID;

  // document
  //   .getElementById("cartBTN")
  //   .classList.replace("bi-basket", "bi-basket-fill");

  let f = new FormData();
  f.append("pid", pid);
  f.append("bid", bid);
  f.append("sid", sid);
  f.append("qty", qty);

  let r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      if (r.responseText == "success") {
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "Item successfully Added from your cart",
          showConfirmButton: false,
          timer: 1500,
        });
      } else if(r.responseText == "log"){
        Swal.fire({
          position: "top-end",
          icon: "warning",
          title: "Please Login First",
          showConfirmButton: false,
          timer: 1500,
        });
      }
    }
  };

  r.open("POST", "addToCartProcess.php", true);
  r.send(f);
}

function loadCart() {
  let r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      document.getElementById("cartBody").innerHTML = r.responseText;
    }
  };

  r.open("GET", "loadCartProcess.php", true);
  r.send();
}

function removeItem(pid, bid, sid, rid) {
  let f = new FormData();
  f.append("pid", pid);
  f.append("bid", bid);
  f.append("sid", sid);

  let r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      if (r.responseText == "success") {
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "Item successfully removed from your cart",
          showConfirmButton: false,
          timer: 1500,
        });
        loadCart();
      }
    }
  };

  r.open("POST", "removeItemProcess.php", true);
  r.send(f);
}
function setCartQty(pid, bid, sid, qty) {
  let f = new FormData();
  f.append("pid", pid);
  f.append("bid", bid);
  f.append("sid", sid);

  if (qty > 0) {
    f.append("qty", qty);
  } else {
    f.append("qty", 1);
  }

  let r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      if (r.responseText == "success") {
        loadCart();
      }
    }
  };

  r.open("POST", "setCartQtyProcess.php", true);
  r.send(f);
}

function clearCart() {
  let r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      if (r.responseText == "success") {
        // document
        //   .getElementById("cartBTN")
        //   .classList.replace("bi-basket-fill", "bi-basket");
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "Cart Cleared Successfully! 🛒",
          showConfirmButton: false,
          timer: 1500,
        });
        window.location.reload();
      }
    }
  };

  r.open("GET", "clearCartProcess.php", true);
  r.send();
}

// function gotoCheckout() {
//   window.location = "http://localhost/boozebites/checkout.php";
// }
