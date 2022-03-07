<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Survey</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: Raleway, sans-serif;
    }

    body {
        background: linear-gradient(#C7C5F4, #776BCC);
    }

    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    .screen {
        background: linear-gradient(#5D54A4, #7C78B8);
        position: relative;
        /* height: 100%;
 width: 600px; */
        box-shadow: 0px 0px 24px #5C5696;
    }

    .screen__content {
        z-index: 1;
        position: relative;
        height: 100%;
    }

    .screen__background {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 0;
        /* -webkit-clip-path: inset(0 0 0 0);
 clip-path: inset(0 0 0 0); */
    }

    .screen__background__shape {
        transform: rotate(0deg);
        position: absolute;
    }

    .screen__background__shape1 {
        height: 100%;
        width: 100%;
        background: #FFF;
        /* top: -50px; */
        right: 10px;
        border-radius: 0 72px 0 0;
    }

    /*
.screen__background__shape2 {
 height: 220px;
 width: 220px;
 background: #6C63AC;
 top: -172px;
 right: 0;
 border-radius: 32px;
}

.screen__background__shape3 {
 height: 540px;
 width: 190px;
 background: linear-gradient(270deg, #5D54A4, #6A679E);
 top: -24px;
 right: 0;
 border-radius: 32px;
}

.screen__background__shape4 {
 height: 400px;
 width: 200px;
 background: #7E7BB9;
 top: 420px;
 right: 50px;
 border-radius: 60px;
} */
    .drop {
        font-weight: 600;
    }


    .login {
        width: 320px;
        padding: 30px;
        padding-top: 156px;
    }

    .login__field {
        padding: 20px 0px;
        position: relative;
    }

    .login__icon {
        position: absolute;
        top: 30px;
        color: #7875B5;
    }

    .login__input {
        border: none;
        border-bottom: 2px solid #D1D1D4;
        background: none;
        padding: 10px;
        padding-left: 24px;
        font-weight: 700;
        width: 75%;
        transition: .2s;
    }

    .login__input:active,
    .login__input:focus,
    .login__input:hover {
        outline: none;
        border-bottom-color: #6A679E;
    }

    .login__submit {
        background: #fff;
        font-size: 14px;
        margin-top: 30px;
        padding: 16px 20px;
        border-radius: 26px;
        border: 1px solid #D4D3E8;
        text-transform: uppercase;
        font-weight: 700;
        display: flex;
        align-items: center;
        width: 100%;
        color: #4C489D;
        box-shadow: 0px 2px 2px #5C5696;
        cursor: pointer;
        transition: .2s;
    }

    .login__submit:active,
    .login__submit:focus,
    .login__submit:hover {
        border-color: #6A679E;
        outline: none;
    }

    .button__icon {
        font-size: 24px;
        margin-left: auto;
        color: #7875B5;
    }

    .social-login {
        position: absolute;
        height: 140px;
        width: 160px;
        text-align: center;
        bottom: 0px;
        right: 0px;
        color: #fff;
    }

    .social-icons {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .social-login__icon {
        padding: 20px 10px;
        color: #fff;
        text-decoration: none;
        text-shadow: 0px 0px 8px #7875B5;
    }

    .social-login__icon:hover {
        transform: scale(1.5);
    }

</style>

<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">

                <form class="login" method="POST" enctype="multipart/form-data">
                    @csrf


                    @if (session()->get('car') == 'rishabh')
                        <select name="district" id="">
                            <option value="">Select District</option>
                            @foreach (\App\Models\District::all() as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                    @endif
                    @if (session()->get('car') == 'ansu')
                        <p>{{ session()->get('district_name') }}</p>
                        <select name="taluk" id="">
                            <option value="">Select Taluk</option>
                            @foreach ($taluk as $taluks)
                                <option value="{{ $taluks->id }}">{{ $taluks->name }}</option>

                            @endforeach
                        </select>
                    @endif
                    @if (session()->get('car') == 'aradana')

                        <div class="login__field">
                            <input type="text" class="login__input" placeholder="Name" name="name"
                                value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <p style="color:rgb(133, 110, 110)">{{ $errors->first('name') }}</p>

                            @endif
                        </div>
                        <div class="login__field">
                            <input type="number" maxlength="2" class="login__input" placeholder="Age" name="age"
                                value="{{ old('age') }}" required>

                        </div>
                        <div class="login__field">
                            <label for="">Date Of Birth</label>
                            <input type="date" placeholder="Date Of Birth" name="dob">
                        </div>
                        <div class="login__field">
                            <label for="">Aadhar Number/Enrollment id</label>
                            <input type="number" placeholder="Aadhar no./Enrollment id" maxlength="15" size="15" name="aadhar">
                        </div>
                        <div class="login__field">
                            <p>Gender</p>
                            <input type="radio" id="Female" name="gender" value="female">
                            <label for="female">Female</label><br>
                            <input type="radio" id="male" name="gender" value="male">
                            <label for="male">Male</label><br>
                            <input type="radio" id="other" name="gender" value="other">
                            <label for="other">Other</label>
                        </div>

                        <div class="login__field">
                            <p>Blood group</p>

                            <input type="radio" id="" name="blood" value="O+">
                            <label for="female">O+</label><br>
                            <input type="radio" id="" name="blood" value="O-">
                            <label for="male">O-</label><br>
                            <input type="radio" id="" name="blood" value="A+">
                            <label for="male">A+</label><br>
                            <input type="radio" id="" name="blood" value="A-">
                            <label for="male">A-</label><br>
                            <input type="radio" id="" name="blood" value="B+">
                            <label for="male">B+</label><br>
                            <input type="radio" id="" name="blood" value="B-">
                            <label for="male">B-</label><br>
                            <input type="radio" id="" name="blood" value="AB+">
                            <label for="male">AB+</label><br>
                            <input type="radio" id="" name="blood" value="AB-">
                            <label for="male">AB-</label><br>

                        </div>
                        <div class="login__field">
                            <p>Marital Status</p>
                            <input type="radio" id="" name="marital" value="married">
                            <label for="married">Married</label><br>
                            <input type="radio" id="" name="marital" value="un_married">
                            <label for="un_married">Un-married</label><br>
                        </div>
                        <div class="login__field">
                            <input type="text" class="login__input" placeholder="Religion" name="religion">
                        </div>
                        <div class="login__field">
                            <input type="text" class="login__input" placeholder="Caste" name="caste">
                        </div>
                        <div class="login__field">
                            <input type="number" class="login__input" maxlength="10" size="10" placeholder="Mobile" name="mobile"
                                value="{{ old('mobile') }}">
                            @if ($errors->has('mobile'))
                                <p style="color:rgb(133, 110, 110)">{{ $errors->first('mobile') }}</p>
                            @endif
                        </div>

                        <div class="login__field">
                            <input type="text" class="login__input" placeholder="House name" name="hname" required>
                        </div>
                        <div class="login__field">
                            <input type="number" class="login__input" placeholder="House number" name="hnumber"
                                required>
                        </div>

                        <div class="login__field">
                            <input type="text"  class="login__input" placeholder="Place of Birth" name="birth_place">
                        </div>
                        <div class="login__field">
                            <p>Person with Disabilities</p>
                            <input type="radio" id="" name="pwd" value="yes">
                            <label for="pwd">Yes</label><br>
                            <input type="radio" id="" name="pwd" value="no">
                            <label for="pwd">NO</label><br>
                        </div>
                        <div class="login__field">
                            <p>Annual income</p>
                            <input type="radio" id="" name="income" value="20000">
                            <label for="pwd">Below 20000</label><br>
                            <input type="radio" id="" name="income" value="80000">
                            <label for="pwd">20000-80000</label><br>
                            <input type="radio" id="" name="income" value="500000">
                            <label for="pwd">80000-500000</label><br>
                            <input type="radio" id="" name="income" value="50000+">
                            <label for="pwd">500000 & above</label><br>
                        </div>
                        <div class="login__field">
                            <label for="cars">Highest Qualification</label>

                            <select name="education" id="edu">
                                <option name="education" value="elementary">Elementary</option>
                                <option name="education" value="10th">10th</option>
                                <option name="education" value="12th">12th</option>
                                <option name="education" value="diploma">Diploma/ITI</option>
                                <option name="education" value="UG">UG</option>
                                <option name="education" value="PG">PG</option>
                                <option name="education" value="DR">Doctorate</option>
                            </select>
                        </div>

                        <select name="village_id" id="">
                            <option value="">Select Village</option>
                            @foreach ($village as $villages)
                                <option value="{{ $villages->id }}">{{ $villages->name }}</option>
                            @endforeach
                        </select>
                    @endif
                    {{-- <button type="submit">Submit</button> --}}

                    {{-- <div class="login__field">
                        <label for="">Upload file</label>
                        <input type="file" name="file" id="">
                        @if ($errors->has('file'))
                            <p style="color:rgb(133, 110, 110)">{{ $errors->first('file') }}</p>

                        @endif
                    </div> --}}

                    <button type="submit" class="button login__submit">
                        <span class="button__text">Submit</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>

            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
</body>

</html>
