<?php

use App\Models\ContributorModel;
use App\Models\SuggestionModel;
use App\Models\UserModel;

$suggestionModel = new SuggestionModel();
$contributorModel = new ContributorModel();
$userModel = new UserModel();

$contribId = session()->get('contrib')['Id'];
$suggestions = $contributorModel->getContribSuggestions(['ContribId' => $contribId]);

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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
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
                        <a href="<?= base_url('contribLogout/') ?>"> Logout </a>
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
                    <div class="row" style="color:white; text-align:center; padding:15%; background-color:#0F559B; margin-left:-45%; margin-right:-45%;">
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
                    <div class="row" style="color:white; text-align:center; padding:15%;">
                        <div class="col-md-2">
                            <i class="bi bi-person-badge-fill"></i>
                        </div>
                        <div class="col-md-10">
                            <a href="<?= base_url('contribLogout/') ?>" style="text-decoration:none; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color:white;"> Logout </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9" style="padding:5%; background-color:#0F559B;">
                <h3 style="text-align:center; margin:5%; color:white;"> Suggestions </h3>
                <div class="container-fluid" style="padding:3%;">
                    <table class="table table-striped table-dark display wrap" style="width:100%;padding:3%; text-align:center;" id="myTable">
                        <thead style="color:yellow;">
                            <th> Title </th>
                            <th> Type </th>
                            <th> Description </th>
                            <th> Start Time </th>
                            <th> End Time </th>
                            <th> Info </th>
                            <th> Contribute </th>
                        </thead>
                        <tbody style="color:white;">
                            <?php
                            if ($suggestions) {
                                foreach ($suggestions as $suggestion) {
                            ?>
                                    <tr>
                                        <td> <?= $suggestion['Title'] ?> </td>
                                        <td> <?= $suggestion['Type'] ?> </td>
                                        <td> <?= $suggestion['Description'] ?> </td>
                                        <td> <?= $suggestion['StartTime'] ?> </td>
                                        <td> <?= $suggestion['EndTime'] ?> </td>
                                        <td> <a href="<?= base_url('Images/Uploads/' . $suggestion['Info']) ?>" style="color:cyan;"> <i class="bi bi-arrow-90deg-right"></i> </a> </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modelId<?= $suggestion['Id'] ?>">
                                                <i class="bi bi-handbag-fill"></i>
                                            </button>
                                            <div class="modal fade" id="modelId<?= $suggestion['Id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document" style="margin:5% 15% 30% 40%;">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" style="color:#0A2B4C"> Contribute </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST" action="<?= base_url('contribDonate/') ?>" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <input type="text" name="ContribId" value="<?= $contribId ?>" hidden>
                                                                <input type="text" name="BenefId" value="<?= $suggestion['BenefId'] ?>" hidden>
                                                                <div class="form-floating mb-3">
                                                                    <select name="Type" id="Type" style="width:100%; padding:3%;">
                                                                        <option value="Financial"> Financial</option>
                                                                        <option value="Event"> Event </option>
                                                                        <option value="Opportunity">
                                                                            Opportunity
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-floating mb-3" id="Amount">
                                                                    <input type="text" class="form-control" name="Amount" placeholder="">
                                                                    <label for="floatingLabel"> Amount </label>
                                                                </div>
                                                                <div class="form-floating mb-3" id="Currency">
                                                                    <input type="text" class="form-control" name="Currency" placeholder="">
                                                                    <label for="floatingLabel"> Currency </label>
                                                                </div>
                                                                <div class="form-floating mb-3" id="FinancialInfo">
                                                                    <input type="file" class="form-control" name="FinancialInfo" placeholder="">
                                                                    <label for="floatingLabel"> Financial Info </label>
                                                                </div>
                                                                <div class="form-floating mb-3" id="FinancialDescription">
                                                                    <input type="text" class="form-control" name="FinancialDescription" placeholder="">
                                                                    <label for="floatingLabel"> Description </label>
                                                                </div>
                                                                <div class="form-floating mb-3" id="Topic">
                                                                    <input type="text" class="form-control" name="Topic" placeholder="">
                                                                    <label for="floatingLabel"> Topic </label>
                                                                </div>
                                                                <div class="form-floating mb-3" id="EventDescription">
                                                                    <input type="text" class="form-control" name="EventDescription" placeholder="">
                                                                    <label for="floatingLabel"> Event Description </label>
                                                                </div>
                                                                <div class="form-floating mb-3" id="EventInfo">
                                                                    <input type="file" class="form-control" name="EventInfo" placeholder="">
                                                                    <label for="floatingLabel"> Event Info </label>
                                                                </div>
                                                                <div class="form-floating mb-3" id="StartTime">
                                                                    <input type="datetime-local" class="form-control" name="StartTime" placeholder="">
                                                                    <label for="floatingLabel"> Start Time </label>
                                                                </div>
                                                                <div class="form-floating mb-3" id="EndTime">
                                                                    <input type="datetime-local" class="form-control" name="EndTime" placeholder="">
                                                                    <label for="floatingLabel"> End Time </label>
                                                                </div>
                                                                <select name="OpportunityType" id="OpportunityType" style="width:100%; padding:3%;">
                                                                    <option value="Scholarship"> Scholarship </option>
                                                                    <option value="Job"> Job </option>
                                                                    <option value="Other"> Other </option>
                                                                </select>
                                                                <div class="form-floating mb-3" id="OpportunityDescription">
                                                                    <input type="text" class="form-control" name="OpportunityDescription" placeholder="">
                                                                    <label for="floatingLabel"> Description </label>
                                                                </div>
                                                                <div class="form-floating mb-3" id="Requirements">
                                                                    <input type="file" class="form-control" name="Requirements" placeholder="">
                                                                    <label for="floatingLabel"> Requirements </label>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success"> Contribute </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $("#myTable").DataTable();
        $("#main-container").animate({
            opacity: 1
        }, 3000, function() {
            $("#navbar").after('<div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; width:97.5%; text-align:center;"> <strong> WELCOME <?php echo session()->get('contrib')['FirstName'] . ' ' . session()->get('contrib')['LastName']; ?> ! </strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
        });
        $('#submit-button').click(function() {
            $("#navbar").after('<div class="alert alert-success alert-dismissible fade show" role="alert"style="position: fixed; width:97.5%; text-align:center;"> <strong> Feedback Successfully sent ! </strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
        });
        let value = $("#Type").val();
        if (value == 'Financial') {
            var disabledIds = ['Topic', 'EventDescription', 'EventInfo', 'StartTime', 'EndTime', 'OpportunityType', 'OpportunityDescription', 'Requirements'];
            var enabledIds = ['Amount', 'Currency', 'FinancialInfo', 'FinancialDescription'];
            disabledIds.forEach(function(id) {
                $("#" + id).hide();
            });
            enabledIds.forEach(function(id) {
                $("#" + id).show();
            });
        }
        $("#Type").click(function() {
        let value = $("#Type").val();
        if (value == 'Financial') {
            var disabledIds = ['Topic', 'EventDescription', 'EventInfo', 'StartTime', 'EndTime', 'OpportunityType', 'OpportunityDescription', 'Requirements'];
            var enabledIds = ['Amount', 'Currency', 'FinancialInfo', 'FinancialDescription'];
            disabledIds.forEach(function(id) {
                $("#" + id).hide();
            });
            enabledIds.forEach(function(id) {
                $("#" + id).show();
            });
        } else if (value == 'Event') {
            var disabledIds = ['Amount', 'Currency', 'FinancialInfo', 'FinancialDescription', 'OpportunityType', 'OpportunityDescription', 'Requirements'];
            var enabledIds = ['Topic', 'EventDescription', 'EventInfo', 'StartTime', 'EndTime'];
            disabledIds.forEach(function(id) {
                $("#" + id).hide();
            });
            enabledIds.forEach(function(id) {
                $("#" + id).show();
            });
        } else {
            var disabledIds = ['Topic', 'EventDescription', 'EventInfo', 'StartTime', 'EndTime', 'Amount', 'Currency', 'FinancialInfo', 'FinancialDescription'];
            var enabledIds = ['OpportunityType', 'OpportunityDescription', 'Requirements'];
            disabledIds.forEach(function(id) {
                $("#" + id).hide();
            });
            enabledIds.forEach(function(id) {
                $("#" + id).show();
            });
        }
    });
    });
</script>
</html>