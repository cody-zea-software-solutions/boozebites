function cartInvoice(
  sid,
  scc,
  umail,
  payid,
  currency,
  total,
  coupen,
  shipping
) {
  var form = new FormData();
  form.append("sid", sid);
  form.append("scc", scc);
  form.append("umail", umail);
  form.append("payid", payid);
  form.append("currency", currency);
  form.append("total", total);
  form.append("dis", coupen);
  form.append("ship", shipping);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      const response = request.responseText;
      alert(response);
      if ((response = 1)) {
        alert("Success");
      }
    }
  };

  request.open("POST", "InvoiceCartprocess.php", true);
  request.send(form);
}
