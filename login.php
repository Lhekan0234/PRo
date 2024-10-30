<?php
session_start(); // Start session here
?>
<?php
include("connection.php");
if (isset($_POST['login'])) {
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $check_user = "SELECT * FROM users WHERE user_email='$user_email' AND user_password='$user_password'";
    $run = mysqli_query($dbcon, $check_user);

    if (mysqli_num_rows($run) > 0) {
        $_SESSION['email'] = $user_email;

        // Set the username value
        $user_data = mysqli_fetch_assoc($run);
        $_SESSION['username'] = $user_data['user_name'];

        echo "<script>window.open('student_section.php', '_self')</script>";
        exit; // Add this line to stop executing further code
    } else {
        echo "<script>alert('Kindly Check Your Login Credentials')</script>";
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>SIWES Software</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>
</head>
<style>
    input{
        color: rgb(0, 0, 0);
    }
    .cl_white{
        color: rgb(255, 255, 255);
    }
    section{
        width: 100vw;
        height: 100vh;
        padding: 50px;
    }
</style>
<!-- Body STARTS from here -->

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><img src="images/LASU.png" width="50%"></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.html">Home</a></li>
                <li><a href="register.php">Register</a></li>
                <li class="active"><a href="login.php">Login</a></li>
                <li><a href="student_section.php">Student's Section</a></li>
            </ul>
        </div>
    </nav>
    <!-- Section Goes Here -->
    <section id="home" style="background: url(images/LIB2.jpg); background-size: 100% 100%; " class="cl_white text-center">
       <div class="container">
           <div class="row">
               <div class="col-md-3">
                   
               </div>
               <div class="col-md-6">
                <div class="page-header"><h3>Login</h3></div>
                    <form class="col-md-8 col-md-offset-2" role="form" method="post" action="login.php" >
                        <div class="form-group">
                       <div class="form-group">
                        Email: <br>
                            <input class="form-controls" placeholder="Email address" type="email" name="email"> 
                       </div>
                       <div class="form-group">
                        Password: <br>
                            <input class="form-controls" placeholder="Input Your Password" type="password" name ="password">
                        </div>
                       <input class="btn btn-success display-block" name="login" value="login" type="submit" />
                   </form>
               </div>
               <div class="col-md-3">
                   
               </div>
           </div>
       </div>
    </section>
    <footer class="navbar navbar-default navbar-fixed-button">
        <div class="container">
            <p class="text-center" style="padding: 12px;">Copyright - Reserved Lhekanlee inc. 2024</p>
        </div>
    </footer> 
</body>

</html>



