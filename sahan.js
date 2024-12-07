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
 