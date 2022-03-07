<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <form action="" method="POST">
        @csrf
        @if (session()->get('car')=='rishabh')
        <select name="district" id="">
            <option value="">Select District</option>
            @foreach (\App\Models\District::all() as $district)
            <option value="{{ $district->id }}">{{ $district->name }}</option>
            @endforeach
          </select>
        @endif
        @if (session()->get('car')=='ansu')
        <select name="taluk" id="">
            <option value="">Select Taluk</option>
            @foreach ($taluk as $taluks)
            <option value="{{ $taluks->id }}" >{{ $taluks->name }}</option>

            @endforeach
          </select>
        @endif
        @if (session()->get('car')=='aradana')
        <select name="village" id="">
            <option value="">Select Village</option>
            @foreach ($village as $villages)
            <option value="{{ $villages->id }}">{{ $villages->name }}</option>
            @endforeach
          </select>
        @endif
          <button type="submit">Submit</button>

    </form>

</body>

</html>
