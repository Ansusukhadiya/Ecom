<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Admin Dashboard</title>
</head>

<body>
    <h1>Admin</h1>

    @foreach (\App\Models\Product::all() as $item)
        <form action="{{ route('buynowinitiate') }}" method="POST">
            @csrf
            <div class="card" style="width: 18rem;">
                <img src="#" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text">{{ $item->price }}</p>
                    <input type="hidden" name="amount" value="{{ $item->price }}">
                    <button type="submit">Buy Now</button>
                    <a href="#" class="btn btn-primary">Add to cart</a>
                </div>
            </div>
        </form>
    @endforeach



</body>

</html>
