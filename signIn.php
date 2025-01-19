<?php
session_start();

$email = $password = "";
$email_err = $password_err = "";
$error_msg = "";

$servername = "localhost";  
$username = "root";        
$password_db = "";         
$dbname = "marketplace";    

$conn = new mysqli($servername, $username, $password_db, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
<<<<<<< HEAD

    if (empty(trim($_POST["email"]))) {
        $email_err = "Email is required.";
    } else {
        $email = trim($_POST["email"]);
    }
    if (empty(trim($_POST["password"]))) {
        $password_err = "Password is required.";
    } else {
        $password = trim($_POST["password"]);
=======
    if (empty($_POST["email"])) {
        $email_err = "Email is required.";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["password"])) {
        $password_err = "Password is required.";
    } else {
        $password = $_POST["password"];
>>>>>>> d0920f0714346dce224fec72d78c39a6fde8db59
    }
    if (empty($email_err) && empty($password_err)) {
        $sql_check_email = "SELECT id, password FROM users WHERE email = ?";
        if ($stmt_check = $conn->prepare($sql_check_email)) {
<<<<<<< HEAD
    
            $stmt_check->bind_param("s", $email);
            $stmt_check->execute(); 
            $stmt_check->store_result(); 
            if ($stmt_check->num_rows > 0) {
                $stmt_check->bind_result($id, $stored_password); 
                $stmt_check->fetch(); 
                if (password_verify($password, $stored_password)) {
                    $_SESSION["logged_in"] = true;
                    $_SESSION["user_id"] = $id;
                    header("location: test.php"); 
=======
            $stmt_check->bind_param("s", $email);
            $stmt_check->execute();
            $stmt_check->store_result();

            if ($stmt_check->num_rows > 0) {
                $stmt_check->bind_result($id, $stored_password);
                $stmt_check->fetch();

                if (password_verify($password, $stored_password)) {
                    $_SESSION["logged_in"] = true;
                    $_SESSION["user_id"] = $id;
                    header("location: index.php"); 
>>>>>>> d0920f0714346dce224fec72d78c39a6fde8db59
                    exit;
                } else {
                    $password_err = "Incorrect password.";
                }
            } else {
                $email_err = "No account found with that email.";
            }

<<<<<<< HEAD
            $stmt_check->close(); 
=======
            $stmt_check->close();
>>>>>>> d0920f0714346dce224fec72d78c39a6fde8db59
        } else {
            $error_msg = "Error: Could not prepare the query.";
        }
    }
}

$conn->close();
?>
<<<<<<< HEAD

=======
>>>>>>> d0920f0714346dce224fec72d78c39a6fde8db59
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+HU:wght@100..400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./base.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <div>
<<<<<<< HEAD
                           <a href="test.php"> <p class="fw-bold text-white fs-1">My Job</p></a>
=======
                            <p class="fw-bold text-white fs-1">NESTLANCE</p>
>>>>>>> d0920f0714346dce224fec72d78c39a6fde8db59
                        </div>
                        <h1 class="card-title text-center text-white">Sign In</h1>
                        <?php
                        if (!empty($success_msg)) {
                            echo "<div class='alert alert-success'>$success_msg</div>";
                        }
                        if (!empty($error_msg)) {
                            echo "<div class='alert alert-danger'>$error_msg</div>";
                        }
                        ?>
<<<<<<< HEAD
                         <div class="row justify-content-center text-center">
                                <div class="col">
                                    <a class="text-decoration-none text-white btn" href="https://www.linkedin.com/uas/login?session_redirect=%2Foauth%2Fv2%2Flogin-success%3Fapp_id%3D5559396%26auth_type%3DAC%26flow%3D%257B%2522scope%2522%253A%2522r_liteprofile%2Br_emailaddress%2522%252C%2522state%2522%253A%2522meGCSbmnVSKVGlKJyIh6hX63gZhC5oGvYLN60Hm3%2522%252C%2522authorizationType%2522%253A%2522OAUTH2_AUTHORIZATION_CODE%2522%252C%2522redirectUri%2522%253A%2522https%253A%252F%252F24slides.com%252Ftemplates%252Fauth%252Fsocial%252Fcallback%2522%252C%2522currentStage%2522%253A%2522LOGIN_SUCCESS%2522%252C%2522currentSubStage%2522%253A0%252C%2522authFlowName%2522%253A%2522generic-permission-list%2522%252C%2522appId%2522%253A5559396%252C%2522creationTime%2522%253A1669627129674%257D&fromSignIn=1&trk=oauth&cancel_redirect=%2Foauth%2Fv2%2Flogin-cancel%3Fapp_id%3D5559396%26auth_type%3DAC%26flow%3D%257B%2522scope%2522%253A%2522r_liteprofile%2Br_emailaddress%2522%252C%2522state%2522%253A%2522meGCSbmnVSKVGlKJyIh6hX63gZhC5oGvYLN60Hm3%2522%252C%2522authorizationType%2522%253A%2522OAUTH2_AUTHORIZATION_CODE%2522%252C%2522redirectUri%2522%253A%2522https%253A%252F%252F24slides.com%252Ftemplates%252Fauth%252Fsocial%252Fcallback%2522%252C%2522currentStage%2522%253A%2522LOGIN_SUCCESS%2522%252C%2522currentSubStage%2522%253A0%252C%2522authFlowName%2522%253A%2522generic-permission-list%2522%252C%2522appId%2522%253A5559396%252C%2522creationTime%2522%253A1669627129674%257D" role="button">
                                        <i class="fa-brands fa-linkedin-in"></i> Sign In via LinkedIn
                                    </a>
                                    <a class="text-decoration-none text-white btn" href="https://accounts.google.com/AccountChooser" role="button">
                                        <i class="fa-brands fa-google "></i>  Sign In via Email
                                    </a>
                                    <p class="text-white text-center mt-3">or</p>
                                </div>
                            </div>
=======
>>>>>>> d0920f0714346dce224fec72d78c39a6fde8db59

                        <form class="form-signin" id="signInForm" method="POST" action="">
                            <div class="form-group mb-3">
                                <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" required>
                                <p id="emailHelp" class="form-text text-white">We'll never share your email with anyone else.</p>
                                <?php
                                if (!empty($email_err)) {
                                    echo "<div class='text-danger'>$email_err</div>";
                                }
                                ?>
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                                <p id="passwordHelp" class="form-text text-white">Must be 8-20 characters long.</p>
                                <?php
                                if (!empty($password_err)) {
                                    echo "<div class='text-danger'>$password_err</div>";
                                }
                                ?>
                            </div>
                            <div class="d-flex justify-content-start mb-4">
                                <a class="text-white" href="./forgot.php">Forgot Password?</a>
                            </div>
                            <div class="container py-2 d-flex flex-column align-items-center">
                                <div class="row justify-content-center">
                                    <button type="submit" class="btn btn-lg btn-block bg-dark text-white shadow mb-3" id="signInButton">
                                        Sign In
                                    </button>
                                    <a class="btn btn-lg btn-block text-white shadow-sm" href="./signUp.php" role="button">Sign Up Now</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="register.js"></script>     

</body>

</html>
