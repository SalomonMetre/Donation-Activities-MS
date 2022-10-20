<?php

use App\Models\EventModel;
use App\Models\FinancialModel;
use App\Models\OpportunityModel;

$financialModel = new FinancialModel();
$eventModel = new EventModel();
$opportunityModel = new OpportunityModel();

$admin = session()->get('admin');
$adminId = $admin['Id'];

$financialDonations = $financialModel->getAllFinancials();
$events = $eventModel->getAllEvents();
$opportunities = $opportunityModel->getAllOpportunities();


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
</head>

<body>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <div class="container-fluid" id="main-container">
        <div class="row" id="navbar" style="background-color:#0A2B4C; padding:1%; position:fixed; z-index:1">
            <div class="col-sm-12 col-md-2">
                <img src="<?= base_url('Images/General/Logo.png') ?>" width="60%" height="80%" alt="No image" style="border-radius:20%;">
            </div>
            <div class="col-sm-12 col-md-10" style="display:inline;">
                <div class="row" style="padding-left:60%; margin:2%;">
                    <div class="col">
                        <i class="bi bi-house" style="color:white;"></i>
                        <a href="<?= base_url('adminShowPage/Home') ?>"> Home </a>
                    </div>
                    <div class="col">
                        <i class="bi bi-box-arrow-right" style="color:white;"></i>
                        <a href="<?= base_url('adminLogout/') ?>"> Logout </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="display: flex; flex-wrap: wrap; padding-top:3.5%;">
            <div class="col-md-3" style="padding:5%; background-color: #041323;">
                <div class="container-fluid">
                    <div class="row" style="color:white; text-align:center; padding:15%; margin-top:-2%">
                        <div class="col-md-2">
                            <i class="bi bi-person-badge-fill"></i>
                        </div>
                        <div class="col-md-10">
                            <a href="<?= base_url('adminShowPage/Home') ?>" style="text-decoration:none; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color:white;"> Profile </a>
                        </div>
                    </div>
                    <div class="row" style="color:white; text-align:center; padding:15%;">
                        <div class="col-md-2">
                            <i class="bi bi-wallet2"></i>
                        </div>
                        <div class="col-md-10">
                            <a href="<?= base_url('adminShowPage/ViewContributors') ?>" style="text-decoration:none; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color:white;"> View Contributors </a>
                        </div>
                    </div>
                    <div class="row" style="color:white; text-align:center; padding:15%;">
                        <div class="col-md-2">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div class="col-md-10">
                            <a href="<?= base_url('adminShowPage/ViewBeneficiaries') ?>" style="text-decoration:none; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color:white;"> View Beneficiaries </a>
                        </div>
                    </div>
                    <div class="row" style="color:white; text-align:center; padding:15%; background-color:#0F559B;margin-left:-45%; margin-right:-45%;">
                        <div class="col-md-2">
                            <i class="bi bi-list-task"></i>
                        </div>
                        <div class="col-md-10">
                            <a href="<?= base_url('adminShowPage/ViewDonations') ?>" style="text-decoration:none; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color:white;"> View Donations </a>
                        </div>
                    </div>
                    <div class="row" style="color:white; text-align:center; padding:15%;">
                        <div class="col-md-2">
                            <i class="bi bi-chat-dots"></i>
                        </div>
                        <div class="col-md-10">
                            <a href="<?= base_url('adminShowPage/ChatWithBeneficiary') ?>" style="text-decoration:none; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color:white;"> Chat With Beneficiary </a>
                        </div>
                    </div>
                    <div class="row" style="color:white; text-align:center; padding:15%;">
                        <div class="col-md-2">
                            <i class="bi bi-chat-dots-fill"></i>
                        </div>
                        <div class="col-md-10">
                            <a href="<?= base_url('adminShowPage/CheckVisitorsMessages') ?>" style="text-decoration:none; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color:white;"> Check Visitors' Messages </a>
                        </div>
                    </div>
                    <div class="row" style="color:white; text-align:center; padding:15%;">
                        <div class="col-md-2">
                            <i class="bi bi-box-arrow-right" style="color:white;"></i>
                        </div>
                        <div class="col-md-10">
                            <a href="<?= base_url('adminLogout/') ?>" style="text-decoration:none; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color:white;"> Logout </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9" style="padding:5%; background-color:#0F559B;">
                <select name="" id="selector" class="form-control" style="margin-left:90%; margin-right:-50%; width:20%;">
                    <option value="Financials"> Financials </option>
                    <option value="Events"> Events </option>
                    <option value="Opportunities"> Opportunities </option>
                </select>
                <div id="Financials">
                    <h3 style="text-align:center; margin:5%; color:white;"> Financial Donations </h3>
                    <div class="container-fluid" style="padding:3%;">
                        <table class="table table-striped table-dark display wrap" style="width:100%;padding:3%; text-align:center;" id="myTable1">
                            <thead style="color:yellow;">
                                <th> Amount </th>
                                <th> Currency </th>
                                <th> Info </th>
                                <th> BenefId </th>
                                <th> Financial Description </th>
                                <td> Status </td>
                                <th> Time </th>
                            </thead>
                            <tbody style="color:white;">
                                <?php
                                if ($financialDonations) {
                                    foreach ($financialDonations as $financialDonation) {
                                ?>
                                        <tr>
                                            <td> <?= $financialDonation['Amount'] ?> </td>
                                            <td> <?= $financialDonation['Currency'] ?> </td>
                                            <td> <a href="<?= base_url('Images/Uploads/' . $financialDonation['FinancialInfo']) ?>" style="color:cyan;"> <i class="bi bi-arrow-90deg-right"></i> </a> </td>
                                            <td> <?= $financialDonation['BenefId'] ?> </td>
                                            <td> <?= $financialDonation['FinancialDescription'] ?> </td>
                                            <td> <?= $financialDonation['Status'] ?></td>
                                            <td> <?= $financialDonation['Time'] ?></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="Events">
                    <h3 style="text-align:center; margin:5%; color:white;"> Events </h3>
                    <div class="container-fluid" style="padding:3%;">
                        <table class="table table-striped table-dark display wrap" style="width:100%;padding:3%; text-align:center;" id="myTable2">
                            <thead style="color:yellow;">
                                <th> Id </th>
                                <th> Description </th>
                                <th> Info </th>
                                <th> Start Time</th>
                                <th> End Time </th>
                                <th> Status </th>
                                <th> Time </th>
                                <th> Edit </th>
                            </thead>
                            <tbody style="color:white;">
                                <?php
                                if ($events) {
                                    foreach ($events as $event) {
                                ?>
                                        <tr>
                                            <td> <?= $event['Id'] ?></td>
                                            <td><?= $event['EventDescription'] ?></td>
                                            <td> <a href="<?= base_url('Images/Uploads/' . $event['EventInfo']) ?>" style="color:cyan;"> <i class="bi bi-arrow-90deg-right"></i> </a> </td>
                                            <td><?= $event['StartTime'] ?></td>
                                            <td><?= $event['EndTime'] ?></td>
                                            <td><?= $event['Status'] ?></td>
                                            <td><?= $event['Time'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modelId<?= $event['Id'] ?>">
                                                    <i class="bi bi-gear-fill"></i>
                                                </button>
                                                <div class="modal fade" id="modelId<?= $event['Id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog" role="document" style="margin:15% 10% 0% 40%;">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" style="color:#0A2B4C;"> Edit Event Status </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="POST" action="<?= base_url('adminEditEventStatus') ?>">
                                                                <div class="modal-body">
                                                                    <input type="text" name="EventId" value="<?= $event['Id'] ?>" hidden>
                                                                    <select name="NewStatus" id="" style="padding:3%; width:100%;">
                                                                        <option value="OK"> OK </option>
                                                                        <option value="Pending">
                                                                            Pending
                                                                        </option>
                                                                        <option value="Invalid"> Invalid </option>
                                                                    </select>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary"> Edit </button>
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
                <div id="Opportunities">
                    <h3 style="text-align:center; margin:5%; color:white;"> Opportunities </h3>
                    <div class="container-fluid" style="padding:3%;">
                        <table class="table table-striped table-dark display wrap" style="width:100%;padding:3%; text-align:center;" id="myTable3">
                            <thead style="color:yellow;">
                                <th> Type </th>
                                <th> Description </th>
                                <th> Requirements </th>
                                <th> Time </th>
                            </thead>
                            <tbody style="color:white;">
                                <?php
                                if ($opportunities) {
                                    foreach ($opportunities as $opportunity) {
                                ?>
                                        <tr>
                                            <td> <?= $opportunity['Type'] ?></td>
                                            <td><?= $opportunity['Description'] ?></td>
                                            <td> <a href="<?= base_url('Images/Uploads/' . $opportunity['Requirements']) ?>" style="color:cyan;"> <i class="bi bi-arrow-90deg-right"></i> </a> </td>
                                            <td><?= $opportunity['Time'] ?></td>
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
    </div>
</body>
<script>
    $(document).ready(function() {
        $("#myTable1").DataTable();
        $("#myTable2").DataTable();
        $("#myTable3").DataTable();

        $("#Financials").show();
        $("#Events").hide();
        $("#Opportunities").hide();

        $("#main-container").animate({
            opacity: 1
        }, 3000, function() {
            $("#navbar").after('<div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; width:97.5%; text-align:center;"> <strong> WELCOME <?php echo session()->get('admin')['FirstName'] . ' ' . session()->get('admin')['LastName']; ?> ! </strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
        });
        $('#submit-button').click(function() {
            $("#navbar").after('<div class="alert alert-success alert-dismissible fade show" role="alert"style="position: fixed; width:97.5%; text-align:center;"> <strong> Feedback Successfully sent ! </strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
        });
    });
    $("#selector").click(function() {
        if ($("#selector").val() == 'Financials') {
            $("#Financials").show();
            $("#Events").hide();
            $("#Opportunities").hide();
        } else if ($("#selector").val() == 'Events') {
            $("#Events").show();
            $("#Financials").hide();
            $("#Opportunities").hide();
        } else {
            $("#Opportunities").show();
            $("#Financials").hide();
            $("#Events").hide();
        }
    });
</script>
</html>