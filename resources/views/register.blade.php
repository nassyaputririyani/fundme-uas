@extends('layouts.main')

@section('content')

    <style>
        .card-register {
            background: #F5F5F5;
            padding: 10px 40px 10px 40px;
            border-radius: 30px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.15);
        }

        .card-register .title {
            font-size: 28px;
            color: #3A3A3C;
            position:  relative;
            text-align: center;
            margin-bottom: 10px;
            margin-top: 20px;
        }

        .card-register .subtitle {
            font-size: 14px;
            color: #8F90A6;
            position: relative;
            margin-bottom: 35px;
            text-align: center;
        }

        .card-register form .userInput {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .card-register form .userInput .inputBox {
            margin-bottom: 25px;
            width: calc(100% /2 - 20px);
        }

        .details {
            margin-bottom: 10px;
            display: block;
            font-size: 16px;
            color: #3A3A3C;
        }

        .card-register .userInput .inputBox input {
            height: 55px;
            width: 100%;
            border-radius: 6px;
            border: 2px solid #DDE5E9;
            padding-left: 30px;
            font-size: 14px;
            color: #3A3A3C;
        }

        .card-register form .genderUser .genderTitle {
            font-size: 16px;
            color: #3A3A3C;
        }

        .category {
            width: 30%;
            display: flex;
            justify-content: space-between;
            margin: 20px 20px 35px 0px;
        }

        .category label{
            display: flex;
            cursor: pointer;
        }

        .rb {
            height: 18px;
            width: 18px;
            background: #F2F2F5;
            border-radius: 50%;
            margin-right: 15px;
            border: 2px solid #C7C9D9;
        }

        #rb1:checked ~ .category label .one,
        #rb2:checked ~ .category label .two {
            border-color: #d9d9d9;
            background: #112D4E;
        }

        form input[type="radio"]{
            display: none;
        }

        form .button {
            height: 50px;
            margin: 0px 30px 50px 0px;
        }

        form .button input {
            height: 100%;
            width: 100%;
            color: #fff;
            background: #112D4E;
            font-size: 16px;
            border-radius: 6px;
            border: none;
        }

        form .button input:hover {
            background: #3F72AF;
        }

        .linkToLogin {
            display: flex;
            justify-content: center;
        }

        .linkToLogin .login {
            margin-left: 5px;
        }
    </style>

    <div class="container card-register my-5">
        <div class="title"><b>Register</b></div>
        <div class="subtitle">Fill the blank input below here to sign up</div>
        <form action="#">
            <!-- Title and Input User --> 
            <div class="userInput">
                <div class="inputBox">
                    <span class="details">First Name</span>
                    <input type="text" placeholder="Enter your first name..." required>
                </div>
                <div class="inputBox">
                    <span class="details">Last Name</span>
                    <input type="text" placeholder="Enter your last name..." required>
                </div>
                <div class="inputBox">
                    <span class="details">Username</span>
                    <input type="text" placeholder="Enter your username..." required>
                </div>
                <div class="inputBox">
                    <span class="details">Email</span>
                    <input type="email" placeholder="Enter your email..." required>
                </div>
                <div class="inputBox">
                    <span class="details">Password</span>
                    <input type="password" placeholder="Enter your password..." required>
                </div>
                <div class="inputBox">
                    <span class="details">Confirm Password</span>
                    <input type="password" placeholder="Confirm your password..." required>
                </div>
            </div>

            <!--User Gender Radiobutton -->
            <div class="genderUser">
                <input type="radio" name="gender" id="rb1">
                <input type="radio" name="gender" id="rb2">
                <span class="genderTitle">Gender</span>
                <div class="category">
                    <label for="rb1">
                        <span class="rb one"></span>
                            <span class="gender">Male</span>
                    </label>
                    <label for="rb2">
                        <span class="rb two"></span>
                            <span class="gender">Female</span>
                    </label>
                </div>
            </div>

            <div class="button">
                <a class="btn btn-lg button-primary w-100 fs-6 mt-3 mb-5" href="/login/index.php">Register</a>
            </div>

            <div class="linkToLogin">
                <span class="text">Already have an account? Please </span>
                <span class="login"> <a style="text-decoration: none;" href="/login/index.php"> Sign In </a> </span>
            </div>
        </div>
        </form>
    </div>
@endsection