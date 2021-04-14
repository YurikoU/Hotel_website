<?php

  // If they're NOT logged in, redirect them before they view any of this content  
  session_start();
  if (!isset($_SESSION["user"])) {
    $_SESSION["errors"][] = "Please login to access this content.";
    header("Location: login.php");
    exit();
  }

  // Assign the user (for logged in users)
  $user = $_SESSION["user"];
  include('Head_and_footer/head.php'); 
?>
  <title> MEMBERSITE | The Glory Hotel & Spa </title>
  </head>

  <body class="member_top">
    <div class="container">
      <header class="jumbotron my-5">
        <div class="row">
          <div class="col-8">
            <h1 class="display-4">Welcome <strong><?= "{$user['first_name']} {$user['last_name']}" ?></strong></h1>
          </div>
        </div>
      </header>
      <main>
        <h3>Your Profile</h3>
        <form>
          <div class="row justify-content-center">
            <div class="col-4">
              <div class="form-group">
                <label>Member ID<input type="text" name="member_id" class="form-control" value="<?= "{$user['member_id']}" ?>" readonly></label>
              </div>
              <div class="form-group">
                <label>First Name<input type="text" name="first_name" class="form-control" value="<?= "{$user['first_name']}" ?>" readonly></label>
              </div>
              <div class="form-group">
                <label>Last Name<input type="text" name="last_name" class="form-control" value="<?= "{$user['last_name']}" ?>" readonly></label>
              </div>
              <div class="form-group">
                <label>Phone Number<input type="tel" name="phone" class="form-control"  value="<?= "{$user['phone']}" ?>" readonly></label>
              </div>
              <div class="form-group">
                <label>E-mail Address<input type="email" name="email" class="form-control" value="<?= "{$user['email']}" ?>" readonly></label>
              </div>


              <div class="form-group">
                <label>City<input type="text" name="city" class="form-control" value="<?= "{$user['city']}" ?>" readonly></label>
              </div>
              <div class="form-group">
                <label>SNS (URL)<input type="url" name="sns" class="form-control" value="<?= "{$user['sns']}" ?>" readonly></label>
              </div>
              <div class="form-group">
                <label>Skills<input type="text" name="skills" class="form-control" value="<?= "{$user['skills']}" ?>" readonly></label>
              </div>



              <a class="btn btn-info" href="member_update.php">Update</a>
              <a class="btn btn-outline-info" href="logout.php">Logout</a>
            </div>
            <div class="col-4">
              <p></p>
              <label>Profile Photo</label>
              <img src="image.php" width="300" height="300" alt="profile photo">
            </div>
          </div>
        </form>
        <div class="delete" style="display:flex; justify-content:flex-end;">
          <a class="btn btn-danger btn-sm" href='member_delete_process.php' onclick='return confirmation()'><small>delete account</small></a>
        </div>
      </main>

      <script type="text/javascript">
        function confirmation() { 
          if (confirm("Are you sure you want to delete your account?"))
          {
            location.href = "member_delete_process.php";
            return true;
          } else {
            location.href = "member_top.php";
            return false;
          }
        }
      </script>

      <?PHP include('Head_and_footer/footer.php'); ?>