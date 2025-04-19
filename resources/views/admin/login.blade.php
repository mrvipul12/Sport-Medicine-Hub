@if(session('wrong'))
<script>
    alert("{{ session('wrong') }}");
</script>
@endif
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Login Page</title>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/css/fontawsom-all.min.css">
    <link href="/admin/css/font-awesome.css" rel="stylesheet"> 
    <link rel="stylesheet" href="/admin/css/login.css">
</head>
<br><br>
<body>
    <div class="container-fluid">
        <div class="container">
            <div class="col-xl-10 col-lg-11 login-container">
                <div class="row">
                    <div class="col-lg-7 img-box">
                        <img src="admin/images/login-banner.png" alt="">
                    </div>
                    <div class="col-lg-5 no-padding">
                        <div class="login-box">
                            <h5>Welcome Admin!</h5>
                            <form id="lgadmin">
                                @csrf
                                <div class="login-row row no-margin">
                                    <label for=""><i class="fa fa-envelope"></i> Email Address</label>
                                    <input type="text" class="form-control form-control-sm" name="email">
                                    <p id="emailerror" class="text-danger"></p>
                                </div>

                                <div class="login-row row no-margin">
                                    <label for=""><i class="fa fa-key"></i> Password</label>
                                    <input type="password" class="form-control form-control-sm" name="password">
                                    <p id="passworderror" class="text-danger"></p>
                                </div>
                                <p id="loginmsg"></p>
                                <div class="login-row btnroo row no-margin">
                                    <button type="submit" class="btn btn-primary btn-sm" id="loginadmin"> Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#loginadmin").click(function(event) {
        event.preventDefault(); 
        var formData = new FormData($("#lgadmin")[0]);
        $.ajax({
            url:"{{route('adminloginsubmit')}}",
            type:"POST",
            data: formData,
            processData: false, 
            contentType: false,
            success:function(data){
                if(data.success){
                    $("#loginmsg").html(data.msg);
                }
                if(data.error){
                    if(data.error.email){
                        $("#emailerror").html(data.error.email);
                    }
                    if(data.error.password){
                        $("#passworderror").html(data.error.password);
                    }
                }
            }
        })
    });
});
</script>
</body>
</html>