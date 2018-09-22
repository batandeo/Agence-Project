
<link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/bootstrap/css/mystyle.css') }}" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="login-container">
        <div id="output"></div>
        <div class="avatar"></div>
        <div class="form-box">
            <form action="" method="">
                <input name="user" type="text" placeholder="email">
                <input type="password" placeholder="mot de passe">
                <button class="btn btn-info btn-block login" type="submit">Se connecter</button>
            </form>
        </div>
    </div>

</div>

<script src="{{ asset('plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-1.11.1.min.js') }}"></script>
{{--<script src="{{ asset('plugins/mystyle.js') }}"></script>--}}