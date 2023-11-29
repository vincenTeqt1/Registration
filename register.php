<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA_Compatible" content="IE=edge">
    <meta nmae="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Registration Form</title>
</head>
<body>
        <div class="container">
          <div class="box form-box">

          <?php

          include("php/config.php");
          if(isset($_POST['submit'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $gradesection = $_POST['grade&section'];
            $password = $_POST['password'];

          //verifying the unique email

          $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

          if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                    <p>This email is used, Try another One Please!</p>
                  </div> <br>";
            echo "<a href='Javascript:self.history.back()'><button class='btn'>Go Back</button>";
          }
          else{

            mysqli_query($con,"INSERT INTO users(Username,Email,Grade&Section,Password) VALUES('$username','$email','$gradesection','$password')") or die("Error Occured");

            echo "<div class='message'>
                    <p>Registration successfully!</p>
                  </div> <br>";
            echo "<a href='index.php'><button class='btn'>Login Now</button>";
          }

          }else{


          ?>
            <header>Register</header>
            <form action="" method="post">
              <div class="field input">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" autocomplete="off" required>
              </div>

              <div class="field input">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" autocomplete="off" required>
              </div>

              <div class="field input">
                <label for="grade&section">Grade & Section</label>
                <input type="text" name="grade&section" id="grade&section" autocomplete="off" required>
              </div>

              <div class="field input">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" autocomplete="off" required>
              </div>

              <div class="field input">
                <label for="password">Confirm Password</label>
                <input type="password" name="password" id="password" autocomplete="off" required>
              </div>

              <div class="field">
                
                <input type="submit" class="btn" name="submit" value="Register" required>
              </div>
              <div class="links">
                Already have account? <a href="index.php">Sign In</a>
              </div>
            </form>
          </div>
        </div>
        <?php } ?>
        </div>
</body>
</html>