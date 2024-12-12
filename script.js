var stripecart;

document.addEventListener("DOMContentLoaded", function () {
  stripecart = Stripe(
    "pk_test_51QRJPfRwa2ApijVLVnDDlnTQo8aYtHLefoS5nPMjyxfc5qxzoVCHEwmXmUtVsxUFQF3EJUR2thUe6vKuQ79kzDDq00qGfaOFVx"
  );
});
function payout(total, user, discount, shipping) {
  var form = new FormData();
  form.append("total", total);
  form.append("umail", user);
  form.append("dis", discount);
  form.append("shiptotal", shipping);

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "cartPaymentProcess.php", true);

  xhr.onload = function () {
    if (xhr.readyState == 4 && xhr.status === 200) {
      try {
        const session = JSON.parse(xhr.responseText);
        stripecart
          .redirectToCheckout({ sessionId: session.id })
          .then((result) => {
            if (result.error) {
              alert(result.error.message);
            }
          });
      } catch (error) {
        alert("An error occurred during payment. Please try again.3 " + error);
      }
    } else {
      alert("An error occurred during payment. Please try again.1");
    }
  };

  xhr.onerror = function () {
    alert("An error occurred during payment. Please try again.2");
  };

  xhr.send(form);
}

function gotoCart() {
  window.location = "cart.php";
}