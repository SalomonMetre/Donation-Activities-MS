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
    <div class="row" id="navbar" style="background-color:#0A2B4C; padding:1%; position:fixed;">
      <div class="col-sm-12 col-md-2">
        <img src="<?= base_url('Images/General/Logo.png') ?>" width="40%" height="80%" alt="No image" style="border-radius:20%;">
      </div>
      <div class="col-sm-12 col-md-10" style="display:inline;">
        <div class="row" style="padding-left:60%; margin:2%;">
          <div class="col">
            <i class="bi bi-house" style="color:white;"></i>
            <a href="<?= base_url('/') ?>"> Home </a>
          </div>
          <div class="col">
            <i class="bi bi-box-arrow-in-right" style="color: white;"></i>
            <a href="<?= base_url('generalShowPage/LoginPage') ?>"> Login </a>
          </div>
        </div>
      </div>
    </div>
    <div class="row" style="background-color: #0F559B;">
      <div class="col" id="loginForm" style="margin-top:-5%; margin-left:-3%; margin-right:-3%;">
        <h2 style="padding-bottom:3%; color:white;"> Sign Up </h2>
        <form action="<?= base_url('userSignUp/') ?>" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="FirstName" id="Label" placeholder="" required>
                <label for="floatingLabel"> First Name </label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="LastName" id="Label" placeholder="" required>
                <label for="floatingLabel"> Last Name </label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="Email" id="Label" placeholder="" required>
                <label for="floatingLabel"> Email Address </label>
              </div>
              <select name="Type" id="" style="padding:4.5%; width:100%; border-radius:5%;">
                <option value=""> --- Beneficiary or Contributor? --- </option>
                <option value="Contributor"> Contributor </option>
                <option value="Beneficiary"> Beneficiary </option>
              </select>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="Password" id="Label" placeholder="" required>
                <label for="floatingLabel"> Password </label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="ConfPassword" id="Label" placeholder="" required>
                <label for="floatingLabel"> Confirm Password </label>
              </div>
              <div class="form-floating mb-3">
                <input type="file" class="form-control" name="ProfilePicture" id="Label" placeholder="" required>
                <label for="floatingLabel"> Profile Picture </label>
              </div>
              <div class="form-floating mb-3">
                <input type="file" class="form-control" name="Resume" id="Label" placeholder="" required>
                <label for="floatingLabel"> Resume </label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-3">
                <input type="date" class="form-control" name="BirthDate" id="Label" placeholder="" required>
                <label for="floatingLabel"> Birth Date </label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="PhysicalLocation" id="Label" placeholder="" required>
                <label for="floatingLabel"> Physical Location </label>
              </div>
              <div class="form-floating mb-3">
                <input type="tel" class="form-control" name="PhoneNo" id="Label" placeholder="" required>
                <label for="floatingLabel"> Phone Number </label>
              </div>
              <div class="form-floating mb-3">
                <input type="file" class="form-control" name="FinancialDetails" id="Label" placeholder="" required>
                <label for="floatingLabel"> Financial Details </label>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-success" style="margin:2%; padding:2%;"> Sign Up </button>
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