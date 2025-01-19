<?php
session_start();

$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "marketplace";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
    
    function validate($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $confirm_password = validate($_POST['confirm_password']);
    if (empty($email)) {
        echo "Email is required.";
        exit();
    } elseif (empty($password) || empty($confirm_password)) {
        echo "Password and confirm password are required.";
        exit();
    } elseif ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit();
    } elseif (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/\d/", $password)) {
        echo "Password must be at least 8 characters long, contain at least one uppercase letter, and one number.";
        exit();
    } else {
        $sql = "SELECT id, email FROM users WHERE email = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT); 
                $update_sql = "UPDATE users SET password = ? WHERE email = ?";

                if ($update_stmt = $conn->prepare($update_sql)) {
                    $update_stmt->bind_param("ss", $hashed_password, $email);
                    $update_stmt->execute();

                    if ($update_stmt->affected_rows == 1) {
                        echo "Password updated successfully.";
                    } else {
                        echo "Something went wrong. Please try again.";
                    }
                    $update_stmt->close();
                }
            } else {
                echo "No account found with that email address.";
            }

            $stmt->close();
        } else {
            echo "An error occurred. Please try again later.";
        }
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password page</title>
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
                        <a href="test.php"> <p class="fw-bold text-white fs-1"> My Job</p></a>
                        </div>
                        <h1 class="card-title text-center text-white">Sign In</h1>
                      
                            <form class="form-signin" id="forgetForm" method="POST">
                            <div class="form-group mb-3">
                            <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" required>
                            <p id="emailHelp" class="form-text text-white">We'll never share your email with anyone else.</p>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" id="inputpass" class="form-control" placeholder="Password" required>
                                    <p class="form-text text-danger" id="passwordHelp" style="display: none;">Password must be at least 8 characters long and include a number and an uppercase letter.</p>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" id="inputcheckPass" class="form-control" placeholder="Verify Password" required>
                                    <p class="form-text text-danger" id="matchHelp" style="display: none;">Passwords do not match.</p>
                                </div>
                                <div class="container py-2 d-flex flex-column align-items-center">
                                    <div class="row justify-content-center">
                                        <button type="button" class="btn btn-lg btn-block bg-dark text-white shadow mb-3" id="forgetButton">
                                            Send Confirmation Code
                                        </button>
                                    </div>
                                </div>
                            </form>
                              
                    </div>
                </div>
            </div>
        </div>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    
 <script src="register.js"></script> 
</body>
</html>