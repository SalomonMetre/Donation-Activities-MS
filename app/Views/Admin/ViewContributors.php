<?php

use App\Models\UserModel;

$userModel = new UserModel();
$contributors = $userModel->getUserWhere(['Type' => 'Contributor']);

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
                    <div class="row" style="color:white; text-align:center; padding:15%; background-color:#0F559B;margin-left:-45%; margin-right:-45%;">
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
                    <div class="row" style="color:white; text-align:center; padding:15%;">
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
            <div class="col-md-9" style="padding:5% 2% 0% 0% ; background-color:#0F559B;">
                <div class="container-fluid" style="padding:5%;">
                    <table class="table table-striped table-dark display wrap" style="width:100%;padding:3%; text-align:center;" id="myTable">
                        <thead style="color:yellow;">
                            <th> First Name </th>
                            <th> Last Name </th>
                            <th> Email </th>
                            <th> Profile Picture </th>
                            <th> Resume </th>
                            <th> Physical Location </th>
                            <th> Financial Details </th>
                            <th> Edit </th>
                        </thead>
                        <tbody style="color:white;">
                            <?php
                            if ($contributors) {
                                foreach ($contributors as $contributor) {
                            ?>
                                    <tr>
                                        <td> <?= $contributor['FirstName'] ?> </td>
                                        <td> <?= $contributor['LastName'] ?> </td>
                                        <td> <?= $contributor['Email'] ?> </td>
                                        <td> <a href="<?= base_url('Images/Uploads/' . $contributor['ProfilePicture']) ?>" style="text-decoration: none; color:cyan;"> <i class="bi bi-person-bounding-box"></i> </a> </td>
                                        <td> <a href="<?= base_url('Images/Uploads/' . $contributor['Resume']) ?>" style="color:cyan;"> <i class="bi bi-person-lines-fill"></i> </a> </td>
                                        <td> <?= $contributor['PhysicalLocation'] ?> </td>
                                        <td> <a href="<?= base_url('Images/Uploads/' . $contributor['FinancialDetails']) ?>" style="color:cyan;"> <i class="bi bi-arrow-90deg-right"></i> </a> </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modelId<?= $contributor['Id'] ?>">
                                                <i class="bi bi-gear-wide-connected"></i>
                                            </button>
                                            <div class="modal fade" id="modelId<?= $contributor['Id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" style="color:#0F559B"> Edit Contributor's Details </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST" action="<?= base_url('adminEditContrib/') ?>">
                                                            <div class="modal-body">
                                                                <input type="text" name="ContribId" value="<?= $contributor['Id'] ?>" hidden>
                                                                <div class="form-floating mb-3">
                                                                    <input type="email" class="form-control" name="Email" id="Label" placeholder="" value="<?= $contributor['Email'] ?>">
                                                                    <label for="floatingLabel"> Email </label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="password" class="form-control" name="Password" id="Label" placeholder="">
                                                                    <label for="floatingLabel"> Password </label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="password" class="form-control" name="ConfPassword" id="Label" placeholder="">
                                                                    <label for="floatingLabel"> Confirm Password </label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control" name="PhoneNo" id="Label" placeholder="" value="<?= $contributor['PhoneNo'] ?>">
                                                                    <label for="floatingLabel"> Phone Number </label>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary"> Update </button>
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
            $("#navbar").after('<div class="alert alert-success alert-dismissible fade show" role="alert"style="position: fixed; width:97.5%; text-align:center;"> <strong> WELCOME ! </strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
        });
        $('#submit-button').click(function() {
            $("#navbar").after('<div class="alert alert-success alert-dismissible fade show" role="alert"style="position: fixed; width:97.5%; text-align:center;"> <strong> Feedback Successfully sent ! </strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
        });
    });
</script>

</html>