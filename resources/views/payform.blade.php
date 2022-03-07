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
    <form method="POST" action="{{ route('initiate') }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputName1" aria-describedby="nameHelp" placeholder="Enter name">
            <small id="nameHelp" class="form-text text-muted"></small>
          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputAddress1">Address</label>
          <input type="text" class="form-control" name="address" id="exampleInputAddress1" placeholder="Address">
        </div>
        <div class="form-group">
            <label for="exampleInputMobile1">Mobile</label>
            <input type="number" class="form-control" name="contactNumber" id="exampleInputMobile1" placeholder="Mobile">
          </div>
          <div class="form-group">
            <label for="exampleInputAmount1">Amount</label>
            <input type="number" class="form-control" name="amount" id="exampleInputAmount1" placeholder="Amount">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</body>
</html>
