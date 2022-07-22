<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="Css/General/general.css">
    <link rel="stylesheet" href="<?= base_url('Css/Admin/Login.css') ?>">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid" id="main-container">
        <div class="row" id="navbar" style="background-color:#0A2B4C; padding:1%; position:fixed;">
            <div class="col-sm-12 col-md-2">
                <img src="<?= base_url('Images/General/Logo.png') ?>" width="40%" height="80%" alt="No image" style="border-radius:20%;">
            </div>
            <div class="col-sm-12 col-md-10" style="display:inline;">
                <div class="row" style="padding-left:80%; margin:2%;">
                    <div class="col">
                        <i class="bi bi-house" style="color:white;"></i>
                        <a href="<?= base_url('/') ?>"> Home </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="background-color: #0F559B;">
            <div class="col" id="loginForm">
                <h2 style="padding-bottom:5%; color:white;"> Log In </h2>
                <form action="<?= base_url('adminSignIn/') ?>" method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="Email" id="Label" placeholder="" required>
                        <label for="floatingLabel" style="color:#00638A;"> Email Address </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="Password" id="Label" placeholder="" required>
                        <label for="floatingLabel" style="color:#00638A;"> Password </label>
                    </div>
                    <button type="submit" class="btn btn-success" style="margin:3%; padding:3%;"> Sign In</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $("#main-container").animate({
            opacity: 1
        }, 3000, function() {
            $("#navbar").after('<div class="alert alert-success alert-dismissible fade show" role="alert"style="position: fixed; width:97.5%; text-align:center;"> <strong> WELCOME ! </strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
        });
        $('#submit-button').click(function() {
            $("#navbar").after('<div class="alert alert-success alert-dismissible fade show" role="alert"style="position: fixed; width:97.5%; text-align:center;"> <strong> Feedback Successfully sent ! </strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
        });
    });
</script>

</html>