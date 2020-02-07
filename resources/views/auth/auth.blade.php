@include('layouts/header')

<body class="w3-light-gray">

<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form method="POST" action="{{ route('register') }}">
           @csrf
            <div id="register">
              <register-app></register-app>
            </div>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form method="POST" action="{{ route('login') }}">
           @csrf
            <div id="login">
              <login-app></login-app>
            </div>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay" >
            <div class="overlay-panel overlay-left">
                <h1> ! مرحباً بك</h1>

                <p>للتواصل معنا سجل الدخول باستخدام معلوماتك الشخصية</p>
                <button class="ghost" id="signIn">تسجيل الدخول</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1> مرحباً بك ، صديقي</h1>
                <p> !ادخل معلوماتك الشخصية وابدأ </p>
                <button class="ghost" id="signUp">تسجيل</button>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('js/jQuery.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/register.js') }}"></script>
</body>
</html>
