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
    <title>Document</title>
</head>

<body>
    <div class="container-fluid" id="main-container" style="background-color: #0D3B6D;">
        <div class="row" id="navbar" style="background-color:#0A2B4C; padding:1%; position:fixed;">
            <div class="col-sm-12 col-md-2">
                <img src="Images/General/Logo.png" width="40%" height="100%" alt="No image" style="border-radius:20%;">
            </div>
            <div class="col-sm-12 col-md-10" style="display:inline;">
                <div class="row" style="padding-left:20%; margin:2%;">
                    <div class="col">
                        <i class="bi bi-house" style="color:white;"></i>
                        <a href="<?= base_url('/') ?>"> Home </a>
                    </div>
                    <div class="col">
                        <i class="bi bi-info" style="color:white;"></i>
                        <a href="#about-us"> About Us </a>
                    </div>
                    <div class="col">
                        <i class="bi bi-telephone-fill" style="color:white;"></i>
                        <a href="#contact-us"> Contact Us </a>
                    </div>
                    <div class="col">
                        <i class="bi bi-arrows-angle-contract" style="color:white;"></i>
                        <a href="<?= base_url('api/ApiDoc') ?>"> API Documentation </a>
                    </div>
                    <div class="col">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <a href="<?= base_url('generalShowPage/LoginPage') ?>"> Login as Beneficiary or as Contributor </a>
                    </div>
                    <div class="col">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <a href="<?= base_url('adminShowPage/Login') ?>"> Login as Admin </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="home-intro" style="padding:20%; background-image: url('Images/General/HelpTheWorld.jpg');">
            <h2> The World needs you </h2>
            <p> <i> Welcome to our platform where donations go beyond money ! <br> You have got exactly what the world needs ! </i> </p>
        </div>
        <div class="row" id="user-intro" style="text-align:center;">
            <div class="col-md-12 m-3" style="padding:15%; background-image: url('Images/General/Beneficiary.png'); color:#00638A">
                <h2> Are you looking for help? </h2>
                <p> <i> Sign up and discover the different ways of expressing your problems </i> </p>
                <a class="btn btn-primary" href="<?= base_url('generalShowPage/BenefContribSignup') ?>" style="text-decoration: none;"> Sign Up</a>
            </div>
            <div class="col-md-12 m-3" style="padding:15%; background-image: url('Images/General/Contributor.jpeg'); color:white; background-repeat:repeat-x; ">
                <h2> Would you like to contribute ? </h2>
                <p> <i> Sign up and discover the different ways in ways you can contribute to the community</i> </p>
                <a class="btn btn-primary" href="<?= base_url('generalShowPage/BenefContribSignup') ?>" style="text-decoration: none;"> Sign Up</a>
            </div>
        </div>
        <div class="row" id="about-us" style="text-align: center; padding:10%; background-image: url('Images/General/Team.jpg'); z-index:-2;">
            <h2 style="margin-bottom: 5%; color:black;"> About Us </h2>
            <div class="col" style="margin:2%;">
                <div class="">
                    <div class="card-body">
                        <img src="Images/General/SalomonAvatar.png" width="50%" height="50%" alt="" style="border-radius:50%; border: 2em solid white">
                        <h4 class="card-title" style="color:black;"> Programmer </h4>
                    </div>
                    <div class="card-footer" style="color:green;">
                        Salomon Metre
                    </div>
                </div>
            </div>
            <div class="col" style="margin:2%;">
                <div class="">
                    <div class="card-body">
                        <img src="Images/General/Constance.jpg" width="50%" height="50%" alt="" style="border-radius:50%; border: 2em solid white">
                        <h4 class="card-title" style="color:black;"> Graphical Designer </h4>
                    </div>
                    <div class="card-footer" style="color:green;">
                        Constance Kithei
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="contact-us" style="padding:11%; text-align:center; background-image: url('Images/General/ContactUs.jpg'); background-repeat: repeat-x;">
            <h2 style="margin-bottom: 5%; margin-top:-2%;">Contact Us</h2>
            <form id="FeedbackForm" action="<?= base_url('saveFeedbackMessage/') ?>" method="POST">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="Email" id="email" placeholder="" required>
                    <label for="floatingLabel" style="color:#00638A;"> Email Address </label>
                </div>
                <div class="form-floating mb-3">
                    <textarea name="Message" id="message" cols="30" rows="9" style="width:100%; color:#00638A;" placeholder="Message" required></textarea>
                </div>
                <button id="submit-button" type="submit" class="btn btn-success" style="padding:2%;"> Submit </button>
            </form>
        </div>
        <div class="row" id="api-doc">

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