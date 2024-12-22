<?php
$fname = $lname = $email = $phone = $password = $verify_password = "";
$fname_err = $lname_err = $email_err = $phone_err = $password_err = $verify_password_err = "";
$success_msg = $error_msg = "";

$servername = "localhost";  
$username = "root";        
$password_db = "";         
$dbname = "marketplace";    

$conn = new mysqli($servername, $username, $password_db, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["fname"])) {
        $fname_err = "First name is required.";
    } else {
        $fname = $_POST["fname"];
    }

    if (empty($_POST["lname"])) {
        $lname_err = "Last name is required.";
    } else {
        $lname = $_POST["lname"];
    }

    if (empty($_POST["email"])) {
        $email_err = "Email is required.";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["phone"])) {
        $phone_err = "Phone number is required.";
    } else {
        $phone = $_POST["phone"];
    }

    if (empty($_POST["password"])) {
        $password_err = "Password is required.";
    } else {
        $password = $_POST["password"];
    }

    if (empty($_POST["verify_password"])) {
        $verify_password_err = "Password verification is required.";
    } else {
        $verify_password = $_POST["verify_password"];
    }
    if ($password !== $verify_password) {
        $verify_password_err = "Passwords do not match.";
    }
    if (empty($fname_err) && empty($lname_err) && empty($email_err) && empty($phone_err) && empty($password_err) && empty($verify_password_err)) {
        $sql_check_email = "SELECT id FROM users WHERE email = ?";
        if ($stmt_check = $conn->prepare($sql_check_email)) {
            $stmt_check->bind_param("s", $email);
            $stmt_check->execute();
            $stmt_check->store_result();

            if ($stmt_check->num_rows > 0) {
                $email_err = "Email already exists.";
            } else {
                $password_hashed = password_hash($password, PASSWORD_DEFAULT);

                $sql_insert = "INSERT INTO users (fname, lname, email, phone, password, created, updated) 
                               VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
                if ($stmt_insert = $conn->prepare($sql_insert)) {
                    $stmt_insert->bind_param("sssss", $fname, $lname, $email, $phone, $password_hashed);
                    if ($stmt_insert->execute()) {
                        $success_msg = "Registration successful. You can now log in.";
                        header("location: signin.php");
                        exit;
                    } else {
                        $error_msg = "Error: " . $stmt_insert->error;
                    }
                    $stmt_insert->close();
                }
            }
            $stmt_check->close();
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
    <title>Sign Up Page</title>
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
                            <p class="fw-bold text-white fs-1">NESTLANCE</p>
                        </div>
                        <h1 class="card-title text-center text-white">Sign Up</h1>
                        <?php
                        if (!empty($success_msg)) {
                            echo "<div class='alert alert-success'>$success_msg</div>";
                        }
                        if (!empty($error_msg)) {
                            echo "<div class='alert alert-danger'>$error_msg</div>";
                        }
                        ?>

                        <form class="form mt-4" id="signUpForm" method="POST" action="">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" id="firstName" class="form-control" placeholder="First Name" name="fname" value="<?php echo $fname; ?>" required>
                                    <?php if (!empty($fname_err)) { echo "<div class='text-danger'>$fname_err</div>"; } ?>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" id="lastName" class="form-control" placeholder="Last Name" name="lname" value="<?php echo $lname; ?>" required>
                                    <?php if (!empty($lname_err)) { echo "<div class='text-danger'>$lname_err</div>"; } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="email" id="inputEmail" class="form-control" placeholder="Email Address" name="email" value="<?php echo $email; ?>" required>
                                    <?php if (!empty($email_err)) { echo "<div class='text-danger'>$email_err</div>"; } ?>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="tel" id="phoneNumber" class="form-control" placeholder="Phone Number" name="phone" value="<?php echo $phone; ?>" required pattern="[0-9]{10}">
                                    <?php if (!empty($phone_err)) { echo "<div class='text-danger'>$phone_err</div>"; } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
                                    <?php if (!empty($password_err)) { echo "<div class='text-danger'>$password_err</div>"; } ?>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="password" id="verifyPassword" class="form-control" placeholder="Verify Password" name="verify_password" required>
                                    <?php if (!empty($verify_password_err)) { echo "<div class='text-danger'>$verify_password_err</div>"; } ?>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-lg bg-dark text-white m-3" id="createAccountButton">Create Account</button>
                            </div>
                        </form>

                        <div class="d-flex justify-content-center mb-4">
                            <p class="text-white">Already have an account? <a class="text-white" href="./signIn.php">Sign In</a></p>
                        </div>
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
