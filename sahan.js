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
        .then(response => response.text())
        .then(data => {
            if (data == "User inserted successfully.") {
                alert(data);
                toggleForms();
                document.getElementById("email1").value = email;
                document.getElementById("password1").value = password;
                document.getElementById("password1").focus();
                login();
            } else {
                alert(data);
            }
        })
        .catch(error => {
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
        .then(res => res.text())
        .then(x => {
            alert(x);
            window.location.href = "index.php";
        })
        .catch(error => {
            alert("Error: " + error);
        });
}
function forgot() {
    var myModal = new bootstrap.Modal(document.getElementById('forgotPasswordModal'), {
        keyboard: false
    });
    var email = document.getElementById("email1").value;
    if (email.trim() === "") {
        alert("Please enter your email.");
    } else {
        forgotpro(email);
        alert("Wait...");
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
            alert(response);
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
        alert("Please fill all the fields.");
        return;
    }
    if (newPassword !== confirmPassword) {
        alert("Passwords do not match.");
        return;
    }
    var passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,}$/;
    if (!passwordPattern.test(newPassword)) {
        alert("Password must be at least 4 characters long and contain both letters and numbers.");
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
        .then(res => res.text())
        .then(x => {
            alert(x);
            var myModal = bootstrap.Modal.getInstance(document.getElementById('forgotPasswordModal'));
            myModal.hide();
        })
        .catch(error => {
            alert("Error: " + error);
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
        addressLine2: addressLine2
    };

    fetch("updateprofilepro.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(formData)
    })
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.text();
        })
        .then(data => {
            alert(data);
        })
        .catch(error => {
            alert("An error occurred: " + error.message);
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
        }
    });
    $("#price").val("$" + $(".price-slider-range").slider("values", 0) + " - $" + $(".price-slider-range").slider("values", 1));
});
function filtersearch() {
    const search = document.querySelector('.default-search-form input').value.trim();
    const meatTypes = Array.from(document.querySelectorAll('input[name="meat_type[]"]:checked')).map(cb => cb.value);
    const cookTypes = Array.from(document.querySelectorAll('input[name="cook_type[]"]:checked')).map(cb => cb.value);
    const minPrice = document.getElementById('minPrice').value;
    const maxPrice = document.getElementById('maxPrice').value;
    const sortOption = document.getElementById('sort').value;
    
    const formData = new FormData();

    formData.append('search', search);
    formData.append('meatTypes', JSON.stringify(meatTypes));
    formData.append('cookTypes', JSON.stringify(cookTypes));
    formData.append('minPrice', minPrice);
    formData.append('maxPrice', maxPrice);
    formData.append('sort', sortOption);

    fetch('filter.php', {
        method: 'POST',
        body: formData,
    })
        .then(response => response.text())
        .then(data => {
            document.getElementById('filtered-results').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
}

function logoutUser() {
    fetch('logout.php', {
        method: 'POST'
    })
    .then(response => {
        if (response.ok) {
            window.location.href = 'index.php';
        } else {
            alert('Logout failed. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error during logout:', error);
        alert('An error occurred. Please try again.');
    });
}
