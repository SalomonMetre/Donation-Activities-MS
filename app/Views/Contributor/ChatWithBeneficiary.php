<?php
$contrib = session()->get('contrib');
?>
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
    <style>
        label {
            color: #0F559B;
        }
    </style>
</head>

<body>
    <div class="container-fluid" id="main-container">
        <div class="row" id="navbar" style="background-color:#0A2B4C; padding:1%; position:fixed; z-index:1;">
            <div class="col-sm-12 col-md-2">
                <img src="<?= base_url('Images/General/Logo.png') ?>" width="60%" height="80%" alt="No image" style="border-radius:20%;">
            </div>
            <div class="col-sm-12 col-md-10" style="display:inline;">
                <div class="row" style="padding-left:60%; margin:2%;">
                    <div class="col">
                        <i class="bi bi-house" style="color:white;"></i>
                        <a href="<?= base_url('contribShowPage/Home') ?>"> Home </a>
                    </div>
                    <div class="col">
                        <i class="bi bi-box-arrow-right" style="color:white;"></i>
                        <a href="<?= base_url('benefLogout/') ?>"> Logout </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="display: flex; flex-wrap: wrap; padding-top:3.5%;">
            <div class="col-md-3" style="padding:5%; background-color: #041323;">
                <div class="container-fluid">
                    <div class="row" style="color:white; text-align:center; padding:15%; margin-top:-2%;">
                        <div class="col-md-2">
                            <i class="bi bi-person-badge-fill"></i>
                        </div>
                        <div class="col-md-10">
                            <a href="<?= base_url('contribShowPage/Home') ?>" style="text-decoration:none; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color:white;"> Profile </a>
                        </div>
                    </div>
                    <div class="row" style="color:white; text-align:center; padding:15%;">
                        <div class="col-md-2">
                            <i class="bi bi-person-badge-fill"></i>
                        </div>
                        <div class="col-md-10">
                            <a href="<?= base_url('contribShowPage/ViewSuggestions') ?>" style="text-decoration:none; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color:white;"> View Suggestions </a>
                        </div>
                    </div>
                    <div class="row" style="color:white; text-align:center; padding:15%;">
                        <div class="col-md-2">
                            <i class="bi bi-person-badge-fill"></i>
                        </div>
                        <div class="col-md-10">
                            <a href="<?= base_url('contribShowPage/ViewDonations') ?>" style="text-decoration:none; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color:white;"> View My Donations </a>
                        </div>
                    </div>
                    <div class="row" style="color:white; text-align:center; padding:15%; background-color:#0F559B; margin-left:-45%; margin-right:-45%;">
                        <div class="col-md-2">
                            <i class="bi bi-person-badge-fill"></i>
                        </div>
                        <div class="col-md-10">
                            <a href="<?= base_url('contribShowPage/ChatWithBeneficiary') ?>" style="text-decoration:none; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color:white;"> Chat With Beneficiary </a>
                        </div>
                    </div>
                    <div class="row" style="color:white; text-align:center; padding:15%;">
                        <div class="col-md-2">
                            <i class="bi bi-person-badge-fill"></i>
                        </div>
                        <div class="col-md-10">
                            <a href="<?= base_url('benefLogout/') ?>" style="text-decoration:none; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color:white;"> Logout </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9" style="padding:5%; background-color:#0F559B;">
                
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $("#main-container").animate({
            opacity: 1
        }, 3000, function() {
            $("#navbar").after('<div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; width:97.5%; text-align:center;"> <strong> WELCOME <?php echo session()->get('contrib')['FirstName'] . ' ' . session()->get('contrib')['LastName']; ?> ! </strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
        });
        $('#submit-button').click(function() {
            $("#navbar").after('<div class="alert alert-success alert-dismissible fade show" role="alert"style="position: fixed; width:97.5%; text-align:center;"> <strong> Feedback Successfully sent ! </strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
        });
    });
</script>

</html>