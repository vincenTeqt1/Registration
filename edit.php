<?php 
    session_start();

    include("php/config.php");
    if(!isset($_SESSION['valid'])){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<head lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA_Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Edit Profile</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="php/home.php">Logo</a></p>
        </div>

        <div class="right-links">
            <a href="#">Edit Profile</a>
            <a href="php/logout.php">  <button class="btn">Log Out</button></a>

        </div>
    </div>
    <div class="container">
        <div class="box form-box">
          <?php
            if (isset($_POST['submit'])){
              $username = $_POST['username'];
              $email = $_POST['email'];
              $gradesection = $_POST['grade&section'];

              $id = $_SESSION['id'];

              $edit_query = mysqli_query($con,"UPDATE users SET Username='$username', Email='$email',GradeSection='$gradesection' WHERE Id=$id ") or die ("error occured");

              if($edit_query){
                echo "<div class='message'>
                    <p>Profile Updated!</p>
                  </div> <br>";
            echo "<a href='home.php'><button class='btn'>Go Home</button>";
          }
        }else{

          $id = $_SESSION['id'];
          $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id ");

          while($result = mysqli_fetch_assoc($query)){
            $res_Uname = $result['Username'];
            $res_Email = $result['Email'];
            $res_GradeSection = $result['GradeSection'];
          }

          ?>
          <header>Edit Profile</header>
          <form action="" method="post">
            <div class="field input">
              <label for="username">Username</label>
              <input type="text" name="username" id="username" value="<?php echo $res_Uname; ?>" autocomplete="off" required>
            </div>

            <div class="field input">
              <label for="email">Email</label>
              <input type="text" name="email" id="email" value="<?php echo $res_Email; ?>" autocomplete="off" required>
            </div>

            <div class="field input">
              <label for="grade&section">Grade & Section</label>
              <input type="text" name="grade&section" id="grade&section" value="<?php echo $res_GradeSection; ?>" autocomplete="off" required>
            </div>


            <div class="field">
              
              <input type="submit" class="btn" name="submit" value="Update" required>
            </div>
          </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>