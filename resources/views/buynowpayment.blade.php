<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>

    <div class="card">
        <div class="card-header">
          Online Payment Portal
        </div>
        <div class="card-body">
          <h5 class="card-title">Pay Now</h5>
          <p class="card-text"></p>
          <button id="rzp-button1" class="btn btn-success" >Click here to PAY</button>
        </div>
      </div>


          <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
          <script>
          var options = {
              "key": "{{ $response['razorpayId'] }}", // Enter the Key ID generated from the Dashboard
              "amount": "{{ $response['amount'] }}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
              "currency": "{{ $response['currency'] }}",
              "name": "{{ $response['name'] }}",
              "description": "{{ $response['description'] }}",
              "image": "https://example.com/your_logo",
              "order_id": "{{ $response['orderId'] }}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
              "handler": function (response){

                  document.getElementById('rzp_paymentId').value=response.razorpay_payment_id;
                  document.getElementById('rzp_orderId').value=response.razorpay_order_id;
                  document.getElementById('rzp_signature').value=response.razorpay_signature;
                  document.getElementById('rzp_buttonsuccess').click();

              },
              
              "prefill": {
                  "name": "{{ $response['name'] }}",
                  "email": "{{ $response['email'] }}",
                  "contact": "{{ $response['contactNumber'] }}"
              },
              "notes": {
                  "address": "{{ $response['address'] }}"
              },
              "theme": {
                  "color": "#FF4500"
              }
          };
          var rzp1 = new Razorpay(options);
          rzp1.on('payment.failed', function (response){
                  alert(response.error.code);
                  alert(response.error.description);
                  alert(response.error.source);
                  alert(response.error.step);
                  alert(response.error.reason);
                  alert(response.error.metadata.order_id);
                  alert(response.error.metadata.payment_id);
          });
          window.onload = function(){
              document.getElementById('rzp-button1').click();
          };
          document.getElementById('rzp-button1').onclick = function(e){
              rzp1.open();
              e.preventDefault();
          }
          </script>

    <form action="{{ route('buynowpaysu') }}" method="POST" hidden>
        @csrf
        <input type="text" id="rzp_paymentId" name="rzp_paymentId">
        <input type="text" id="rzp_orderId" name="rzp_orderId">
        <input type="text" id="rzp_signature" name="rzp_signature">
        <input type="number" name="amount" value="{{ $response['rate'] }}">
        <button type="submit" id="rzp_buttonsuccess">Submit</button>
    </form>

</body>
</html>
