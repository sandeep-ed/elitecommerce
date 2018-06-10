@include('includes/header_account')
<!-- Put extra Css here -->

<body>

<!-- Loader -->
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>

<!-- Begin page -->
<div class="accountbg"></div>
<div class="wrapper-page">

    <div class="card">
        <div class="card-body">

            <h3 class="text-center m-0">
                <a href="{{ URL:: to('index') }}" class="logo logo-admin"><img src="assets/images/logo_dark.png" height="30" alt="logo"></a>
            </h3>

            <div class="p-3">
               <!-- <h4 class="text-muted font-18 m-b-5 text-center">Welcome Back !</h4>
                <p class="text-muted text-center">Sign in to continue to Fonik.</p>-->

                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                    <div class="form-group">
                        <label for="username">Username</label>
                         <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>

                    <div class="form-group">
                        <label for="userpassword">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>

                    <div class="form-group row m-t-20">
                        <div class="col-sm-6">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline">Remember me</label>
                            </div>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                    <!--<div class="form-group m-t-10 mb-0 row">
                        <div class="col-12 m-t-20">
                            <a href="{{ URL:: to('pages-recoverpw') }}" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                        </div>
                    </div>-->
                </form>
            </div>

        </div>
    </div>

    <div class="m-t-40 text-center">
        <!--<p>Don't have an account ? <a href="{{ URL:: to('pages-register') }}" class="font-500 font-14 text-primary font-secondary"> Signup Now </a> </p>-->
        <p>© 2018 EDM </p>
    </div>

</div>

@include('includes/footer_account')
<!-- Put Extra Js here -->
