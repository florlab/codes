@extends('layout.default')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.js"></script>

<form action="login" method="POST" id="loginForm" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="LOGIN" id="loginBtn"/>
</form>

<script>
    jQuery.validator.addMethod("validate_email",function(value, element) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        return re.test(value);
    });

    $("#loginForm").validate({
        ignore: [],//default ignore [":hidden"] input
        onkeyup: function(element) {
            if(element.name == 'email'){
                return false;
            }else{
                $(element).valid();
            }
        },
        debug : true,//set to false on live
        rules: {
            email: {
                required: true,
                validate_email: true
            },
            password: "required"
        },
        messages: {
            email: {
                required: "We require your email address to proceed",
                validate_email: "Your email address must be in the format of name@domain.com"
            }
        },
        submitHandler: function(form) {
            $(form).ajaxSubmit();
        }
    });
</script>

@stop