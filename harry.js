let prefID = 1;
function setPref(id) {
  prefID = id;
  document.getElementById("prefRef").innerText = prefID;
}

let boxID = 1;
function setSize(pid, id) {
  boxID = id;
  document.getElementById("sizeRef").innerText = boxID;
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
      if (r.responseText != "success") {
        alert(r.responseText);
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
        window.location.reload();
      }
    }
  };

  r.open("GET", "clearCartProcess.php", true);
  r.send();
}
function gotoCart() {
  window.location = "http://localhost/boozebites/cart.php";
}
function gotoCheckout() {
  window.location = "http://localhost/boozebites/checkout.php";
}
