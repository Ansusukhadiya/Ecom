<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
</head>
<body>
    {{-- <div>
        <h1>INVOICE</h1>
        <p>abc</p>
        <p>123</p>
        <p>1234</p>
    </div>

    <div>
        <h2>Bill to</h2>
        <p>abc</p>
        <p>123</p>
        <p>1234</p>
    </div> --}}
<table class="table">
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        {{-- <th scope="col">Blood group</th>
        <th scope="col">Matital status</th>
        <th scope="col">Annual income</th> --}}
    </tr>

    <tr>
        {{-- <th scope="row">{{$item->id}}</th> --}}
        <td>{{$name}}</td>
        <td>{{$email}}</td>
        {{-- <td>{{$item->blood}}</td>
        <td>{{$item->marital}}</td>
        <td>{{$item->income}}</td> --}}
    </tr>
    {{-- @endforeach --}}
    {{-- <tr>
        <td>2</td>
        <td>Pedal Arms</td>
        <td>15.00</td>
        <td>30.00</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Pedal Arms</td>
        <td>15.00</td>
        <td>30.00</td>
    </tr> --}}
</table>
</body>
</html>
