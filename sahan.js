function signup() {
  var fname = document.getElementById("fname").value;
  var lname = document.getElementById("lname").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;

  var formData = new FormData();
  formData.append("fname", fname);
  formData.append("lname", lname);
  formData.append("email", email);
  formData.append("password", password);

  fetch("singuppro.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.text())
    .then((data) => {
      if (data == "User inserted successfully.") {
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: data,
          showConfirmButton: false,
          timer: 1500,
        });
        toggleForms();
        document.getElementById("email1").value = email;
        document.getElementById("password1").value = password;
        document.getElementById("password1").focus();
        login();
      } else {
        Swal.fire({
          position: "top-end",
          icon: "error",
          title: data,
          showConfirmButton: false,
          timer: 1500,
        });
      }
    })
    .catch((error) => {
      alert("Error: " + error);
    });
}
function login() {
  var email = document.getElementById("email1").value;
  var password = document.getElementById("password1").value;
  var form = new FormData();
  form.append("email", email);
  form.append("password", password);

  fetch("loginpro.php", {
    method: "POST",
    body: form,
  })
    .then((res) => res.text())
    .then((x) => {
      Swal.fire({
        position: "top-end",
        icon: "success",
        title: x,
        showConfirmButton: false,
        timer: 1500,
      });
      window.location.href = "index.php";
    })
    .catch((error) => {
      Swal.fire({
        position: "top-end",
        icon: "error",
        title: error,
        showConfirmButton: false,
        timer: 1500,
      });
    });
}
function forgot() {
  var myModal = new bootstrap.Modal(
    document.getElementById("forgotPasswordModal"),
    {
      keyboard: false,
    }
  );
  var email = document.getElementById("email1").value;
  if (email.trim() === "") {
    Swal.fire({
      position: "top-end",
      icon: "error",
      title: "Please Enter Your Email",
      showConfirmButton: false,
      timer: 1500,
    });
  } else {
    forgotpro(email);
    Swal.fire({
      position: "top-end",
      icon: "warning",
      title: "Processing",
      showConfirmButton: false,
      timer: 1500,
    });
    myModal.show();
  }
}

function forgotpro(email) {
  var req = new XMLHttpRequest();
  var form = new FormData();
  form.append("email", email);
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var response = req.responseText;
      Swal.fire({
        position: "top-end",
        icon: "success",
        title: response,
        showConfirmButton: false,
        timer: 1500,
      });
    }
  };
  req.open("POST", "fogotpassmail.php", true);
  req.send(form);
}

function confirmPasswordDetails() {
  var email = document.getElementById("email1").value;
  var verificationCode = document.getElementById("verificationCode").value;
  var newPassword = document.getElementById("newPassword").value;
  var confirmPassword = document.getElementById("confirmPassword").value;

  if (verificationCode === "" || newPassword === "" || confirmPassword === "") {
    Swal.fire({
      position: "top-end",
      icon: "warning",
      title: "Please fill all the fields.",
      showConfirmButton: false,
      timer: 1500,
    });
    return;
  }
  if (newPassword !== confirmPassword) {
    Swal.fire({
      position: "top-end",
      icon: "warning",
      title: "The passwords you entered do not match. Please try again.",
      showConfirmButton: false,
      timer: 1500,
    });
    return;
  }
  var passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,}$/;
  if (!passwordPattern.test(newPassword)) {
    Swal.fire({
      position: "top-end",
      icon: "warning",
      title:
        "The password must be at least 4 characters long and include both letters and numbers.",
      showConfirmButton: false,
      timer: 1500,
    });
    return;
  }
  form = new FormData();
  form.append("email", email);
  form.append("verificationCode", verificationCode);
  form.append("newPassword", newPassword);
  form.append("confirmPassword", confirmPassword);

  fetch("forgotpr.php", {
    method: "POST",
    body: form,
  })
    .then((res) => res.text())
    .then((x) => {
      if (x == 1) {
        var myModal = bootstrap.Modal.getInstance(
          document.getElementById("forgotPasswordModal")
        );
        myModal.hide();
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "The password has been updated successfully.",
          showConfirmButton: false,
          timer: 1500,
        });
      } else {
        Swal.fire({
          position: "top-end",
          icon: "warning",
          title: x,
          showConfirmButton: false,
          timer: 1500,
        });
      }
    })
    .catch((error) => {
      Swal.fire({
        position: "top-end",
        icon: "error",
        title: error,
        showConfirmButton: false,
        timer: 1500,
      });
    });
}
function updateProfile() {
  var fname = document.getElementById("fname").value;
  var lname = document.getElementById("lname").value;
  var email = document.getElementById("email").value;
  var mobile = document.getElementById("mobile").value;
  var city = document.getElementById("city").value;
  var addressLine1 = document.getElementById("a_line_1").value;
  var addressLine2 = document.getElementById("a_line_2").value;

  var formData = {
    fname: fname,
    lname: lname,
    email: email,
    mobile: mobile,
    city: city,
    addressLine1: addressLine1,
    addressLine2: addressLine2,
  };

  fetch("updateprofilepro.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(formData),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.text();
    })
    .then((data) => {
      if (data === "profile updated") {
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: data,
          showConfirmButton: false,
          timer: 1500,
        });
      } else {
        Swal.fire({
          position: "top-end",
          icon: "warning",
          title: data,
          showConfirmButton: false,
          timer: 1500,
        });
      }
    })
    .catch((error) => {
      Swal.fire({
        position: "top-end",
        icon: "error",
        title: error.message,
        showConfirmButton: false,
        timer: 1500,
      });
    });
}
$(function () {
  $(".price-slider-range").slider({
    range: true,
    min: 0,
    max: 1000,
    values: [0, 500],
    slide: function (event, ui) {
      $("#price").val("$" + ui.values[0] + " - $" + ui.values[1]);
      $("#minPrice").val(ui.values[0]);
      $("#maxPrice").val(ui.values[1]);
      filtersearch();
    },
  });
  $("#price").val(
    "$" +
      $(".price-slider-range").slider("values", 0) +
      " - $" +
      $(".price-slider-range").slider("values", 1)
  );
  filtersearch();
});
function filtersearch() {
  const search = document
    .querySelector(".default-search-form input")
    .value.trim();
  const meatTypes = Array.from(
    document.querySelectorAll('input[name="meat_type[]"]:checked')
  ).map((cb) => cb.value);
  const cookTypes = Array.from(
    document.querySelectorAll('input[name="cook_type[]"]:checked')
  ).map((cb) => cb.value);
  const minPrice = document.getElementById("minPrice").value;
  const maxPrice = document.getElementById("maxPrice").value;
  const sortOption = document.getElementById("sort").value;

  const formData = new FormData();

  formData.append("search", search);
  formData.append("meatTypes", JSON.stringify(meatTypes));
  formData.append("cookTypes", JSON.stringify(cookTypes));
  formData.append("minPrice", minPrice);
  formData.append("maxPrice", maxPrice);
  formData.append("sort", sortOption);

  fetch("filter.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.text())
    .then((data) => {
      document.getElementById("filtered-results").innerHTML = data;
    })
    .catch((error) => console.error("Error:", error));
}

function logoutUser() {
  fetch("logout.php", {
    method: "POST",
  })
    .then((response) => {
      if (response.ok) {
        window.location.href = "index.php";
      } else {
        alert("Logout failed. Please try again.");
      }
    })
    .catch((error) => {
      console.error("Error during logout:", error);
      alert("An error occurred. Please try again.");
    });
}
