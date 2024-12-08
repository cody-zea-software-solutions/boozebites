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
         alert(data); 
     })
     .catch(error => {
         alert("An error occurred!");
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
    })
    .catch(error => {
        alert("Error: " + error); 
    });
}
