<?php

use App\Models\MessageModel;
use App\Models\UserModel;

$messageModel = new MessageModel();
$userModel = new UserModel();

$messageBenefId = session()->get('messageBenefId');
$adminId = session()->get('admin')['Id'];
$messages = $messageModel->getMessagesWhere(['ReceiverId' => $adminId, 'SenderId' => $messageBenefId], ['SenderId' => $adminId, 'ReceiverId' => $messageBenefId]);
$beneficiaries = $userModel->getUserWhere(['Type' => 'Beneficiary']);

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
                    <div class="row" style="color:white; text-align:center; padding:15%;">
                        <div class="col-md-2">
                            <i class="bi bi-list-task"></i>
                        </div>
                        <div class="col-md-10">
                            <a href="<?= base_url('adminShowPage/ViewDonations') ?>" style="text-decoration:none; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color:white;"> View Donations </a>
                        </div>
                    </div>
                    <div class="row" style="color:white; text-align:center; padding:15%; background-color:#0F559B; margin-left:-45%; margin-right:-45%;">
                        <div class="col-md-2">
                            <i class="bi bi-chat-dots"></i>
                        </div>
                        <div class="col-md-10">
                            <span type="button" class="btn" data-bs-toggle="modal" data-bs-target="#sendId" style="color:white;">
                                Chat With Beneficiary
                            </span>
                            <div class="modal fade" id="sendId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="color:#0A2B4C;"> Send Message </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="<?= base_url('adminBenefSendMessage/') ?>" method="POST">
                                            <div class="modal-body">
                                                <input type="text" name="MessageBenefId" value="<?= $messageBenefId ?>" hidden>
                                                <textarea name="Message" id="" cols="47" rows="3">
                                                </textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary"> Send </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="color:white; text-align:center; padding:15%;">
                        <div class="col-md-2">
                            <i class="bi bi-chat-dots-fill"></i>
                        </div>
                        <div class="col-md-10">
                            <a href="<?= base_url('adminShowPage/CheckVisitorsMessages') ?>" style="text-decoration:none; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color:white;">Send Check Visitors' Messages </a>
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
                <button type="button" class="btn btn-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#receiverId" style="margin-left:55%; margin-top:1%; padding:1%; position:fixed; ">
                    Choose receiver
                </button>
                <div class="modal fade" id="receiverId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="margin: 10% 10% 0% 70%;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="color:#0A2B4C;"> Choose receiver </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url('adminChangeMessageBenefId/') ?>" method="POST">
                                <div class="modal-body">
                                    <select name="MessageBenefId" id="selector" class="form-control" style="width:100%;">
                                        <?php
                                        if ($beneficiaries) {
                                            foreach ($beneficiaries as $beneficiary) {
                                        ?>
                                                <option value="<?= $beneficiary['Id'] ?>"> <?= $beneficiary['FirstName'] . ' ' . $beneficiary['LastName'] ?> </option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary"> Choose </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div style="margin:1%; background-color:#0A2B4C;color:white;font-size:2em;z-index:1; text-align:center; position:fixed; width:50%;"> Chat With Beneficiary </div>
                <div class="container-fluid" style="overflow-y: scroll;height:25em;margin-top:5em;">
                    <?php
                    if ($messages) {
                        foreach ($messages as $message) {
                    ?>
                            <div class="row" style="padding:3%; margin:1%; <?php echo $message['SenderId']==session()->get('admin')['Id']?'margin-left:50%;':'margin-left:0%;' ?> width:45%;">
                                <div class="card">
                                    <div class="card-header">
                                        <span style="color:#0F559B"> From : </span> <span style="color:black;"> <?= $message['Sender']; ?> </span> <span style="color:#0F559B"> To : </span> <span style="color:black;"> <?= $message['Receiver']; ?> </span> 
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text"> <span style="color:#0F559B"> Message : </span> <span style="color:black;"> <?= $message['Message']; ?> </span> 
                                    </div>
                                    <div class="card-header">
                                        <span style="color:#0F559B"> Sent at : </span> <span style="color:black;"> <?= $message['Time']; ?> </span> 
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
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