<?php
session_start();
if (!$_SESSION['email']) {
    header("Location:login.php");
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
    .cl_white {
        color: rgb(255, 255, 255);
    }

    section {
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
            <div class="container">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html">Home</a></li>
                    <a class="btn btn-danger active navbar-btn" href="./logout.php" target="_self"
                        role="button">Logout</a>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Section Goes Here -->
    <section id="home" style="background: url(images/LIB2.jpg); background-size: 100% 100%; " class="cl_white text-center">
        <h1>Student's Area</h1>
        <p> Welcome
            <?php
            if (isset($_SESSION["username"])) {
                echo $_SESSION["username"];
            }
            ?>
        </p>

         <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="page-header">
                        <h4>REQUEST</h4>
                    </div>
                    <form class="col-md-8 col-md-offset-2" action="" method="post">
                       <div class="form-group">
                        Name Of Book: <br>
                            <input class="form-controls" placeholder="Book Title" id="title" name="title" type="text"> 
                       </div>
                       <div class="form-group">
                         Author: <br>
                        <input class="form-controls" placeholder="Author's Name" name="author" id="author" type="text" required>
                        </div>
                        <div class="form-group">
                         <br>
                            <input class="form-controls" placeholder="Date Of Collection" type="date" id="c_date" name="c_date" required>
                        </div>
                        <div class="form-group">
                         Expected Return Date: <br>
                            <input class="form-controls" placeholder="Return Date" type="Date" pattern="YYYY-MM-DD" id="r_date" name="r_date" required>
                        </div>
                        <div class="form-group"><input class="btn btn-success display-block" value="Submit" name="Submit"  type="submit"/></div>
                   </form>
                </div>

                <div class="col-md-6">
                    <div class="page-header">
                        <h4>COMMENTS</h4>
                    </div>
                    <form class="col-md-8 col-md-offset-2">
                       <div class="form-group">
                         Name: <br>
                        <input class="form-controls" placeholder="Your Name" name="username" type="text">
                        </div>
                        <div class="form-group">
                         Email: <br>
                            <input class="form-controls" placeholder="Your email" name="email" type="email">
                        </div>
                        <div class="form-group">
                         Penalties: <br>
                            <textarea class="form-controls" rows="5" cols="20" name="penalties"></textarea>
                        </div>
                        <div class="form-group"><input class="btn btn-success display-block" value="Submit" name="Submit"  type="submit"/></div>
                   </form>
                </div>
                </div>

            </div>
        </div>
    </section>

    <footer class="navbar navbar-default navbar-fixed-button">
        <div class="container">
            <p class="text-center" style="padding: 12px">
                Copyright - Reserved Lhekanlee inc. 2024
            </p>
        </div>
    </footer>
</body>

</html>
<?php
// Create a connection
include("connect-db.php");

if (isset($_POST['Submit'])) {
    $book_title = mysqli_real_escape_string($connection, htmlspecialchars($_POST["title"]));
    $author = mysqli_real_escape_string($connection, htmlspecialchars($_POST["author"]));
    $collection_date = mysqli_real_escape_string($connection, htmlspecialchars($_POST["c_date"]));
    $return_date = mysqli_real_escape_string($connection, htmlspecialchars($_POST["r_date"]));

    if ($book_title == '' || $author == '') {
        $error = "ERROR: please enter a value";
    } 
    else {
        

             $query = "INSERT INTO students (title, author, c_date, r_date) VALUES ('$book_title', '$author', '$collection_date', '$return_date')"; 
            

        if(mysqli_query($connection, $query))
        {
               echo "<script>alert('Request Successfully received')</script>";
        }
    }  
}
?>
