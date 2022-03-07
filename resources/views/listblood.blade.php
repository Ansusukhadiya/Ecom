<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form class="login" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="login__field">
            <p>Gender</p>
            <input type="radio" id="Female" name="gender" value="female">
            <label for="female">Female</label><br>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label><br>
            <input type="radio" id="other" name="gender" value="other">
            <label for="other">Other</label>
        </div>
      <div>
        <select name="blood" id="">
            @foreach ($sort as $sorts)
                <option value="{{ $sorts->blood }}">{{ $sorts->blood }}</option>
            @endforeach

        </select>

    </div>
      <input type="submit" value="Submit">

    </form>
</body>

</html>
