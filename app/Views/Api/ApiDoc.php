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
        <div class="row" id="navbar" style="background-color:#0A2B4C; padding:1%; position:fixed; z-index:1">
            <div class="col-sm-12 col-md-2">
                <img src="<?= base_url('Images/General/Logo.png') ?>" width="60%" height="80%" alt="No image" style="border-radius:20%;">
            </div>
            <div class="col-sm-12 col-md-10" style="display:inline;">
                <div class="row" style="padding-left:90%; margin:2%;">
                    <div class="col">
                        <i class="bi bi-house" style="color:white;"></i>
                        <a href="<?= base_url('/') ?>"> Home </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="display: flex; flex-wrap: wrap; padding-top:3.5%;">
            <div class="col-md-3" style="padding:5%; background-color: #041323;">
                <div class="container-fluid">
                    <div class="row" style="color:white; text-align:center; padding:15%; margin-top:-2%">
                        <div class="col-md-10">
                            <a href="#getAllBeneficiaries" style="text-decoration:none; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color:white;"> 1. Get All Beneficiaries </a>
                        </div>
                    </div>
                    <div class="row" style="color:white; text-align:center; padding:15%;">
                    <div class="col-md-10">
                            <a href="#getAllContributors" style="text-decoration:none; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color:white;"> 2. Get All Contributors </a>
                        </div>
                    </div>
                    <div class="row" style="color:white; text-align:center; padding:15%;">
                    <div class="col-md-10">
                            <a href="#getAllEvents" style="text-decoration:none; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color:white;"> 3. Get All Events </a>
                        </div>
                    </div>
                    <div class="row" style="color:white; text-align:center; padding:15%;">
                    <div class="col-md-10">
                            <a href="#getAllFinancials" style="text-decoration:none; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color:white;"> 4. Get All Financial Contributions </a>
                        </div>
                    </div>
                    <div class="row" style="color:white; text-align:center; padding:15%;">
                    <div class="col-md-10">
                            <a href="#getAllOpportunities" style="text-decoration:none; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color:white;"> 5. Get All Opportunities </a>
                        </div>
                    </div>
                    <div class="row" style="color:white; text-align:center; padding:15%;">
                    <div class="col-md-10">
                            <a href="#getAllSuggestions" style="text-decoration:none; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color:white;"> 6. Get All Suggestions </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9" style="padding:5%; background-color:#0F559B;">
            <div style="margin:1%; background-color:#0A2B4C;color:white;font-size:2em;z-index:1; text-align:center; position:fixed; width:63%;">  Api Documentation </div>
                <div class="container-fluid" style="padding:10%; height:25em; overflow-y:scroll; margin-top:5%; margin-left:-5%; position:fixed; width:80%;">
                    <div class="row" style="padding:3%; margin:1%;" id="getAllBeneficiaries">
                        <div class="card">
                            <div class="card-header" style="color:red; font-size:1.5em;">
                           1. Get All Beneficiaries
                            </div>
                            <div class="card-body">
                            <p class="card-text"> With this secure link, you can get details related to beneficiaries of this platform. </p>
                            <p> Endpoint : <span style="color:green;"> localhost:8080/api/allBeneficiaries </span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding:3%; margin:1%;" id="getAllContributors">
                        <div class="card">
                            <div class="card-header" style="color:red; font-size:1.5em;">
                               2. Get All Contributors
                            </div>
                            <div class="card-body">
                            <p class="card-text"> With this secure link, you can get details related to contributors of this platform. </p>
                            <p> Endpoint : <span style="color:green;"> localhost:8080/api/allContributors </span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding:3%; margin:1%;" id="getAllEvents">
                        <div class="card">
                            <div class="card-header" style="color:red; font-size:1.5em;">
                               3. Get All Events
                            </div>
                            <div class="card-body">
                            <p class="card-text"> With this secure link, you can get details related to the events organized by contributors of this platform. </p>
                            <p> Endpoint : <span style="color:green;"> localhost:8080/api/allEvents </span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding:3%; margin:1%;" id="getAllFinancials">
                        <div class="card">
                            <div class="card-header" style="color:red; font-size:1.5em;">
                               4. Get All Financial Contributions
                            </div>
                            <div class="card-body">
                            <p class="card-text"> With this secure link, you can get details related to financial contributions from the creation of this platform to date.</p>
                            <p> Endpoint : <span style="color:green;"> localhost:8080/api/allFinancials </span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding:3%; margin:1%;" id="getAllOpportunities">
                        <div class="card">
                            <div class="card-header" style="color:red; font-size:1.5em;">
                               5. Get All Opportunities
                            </div>
                            <div class="card-body">
                            <p class="card-text"> With this secure link, you can get details related to the opportunities offered by contributors of this platform. </p>
                            <p> Endpoint : <span style="color:green;"> localhost:8080/api/allOpportunities </span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding:3%; margin:1%;" id="getAllSuggestions">
                        <div class="card">
                            <div class="card-header" style="color:red; font-size:1.5em;">
                               6. Get All Suggestions
                            </div>
                            <div class="card-body">
                            <p class="card-text"> With this secure link, you can get details related to suggestion submitted by the beneficiaries of this platform. </p>
                            <p> Endpoint : <span style="color:green;"> localhost:8080/api/allSuggestions </span></p>
                            </div>
                        </div>
                    </div>
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