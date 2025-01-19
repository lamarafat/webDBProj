<?php
$servername = "localhost";
$username = "root";  
$password = ""; 
$dbname = "marketplace";  

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitProposal'])) {
    $proposalText = $_POST['proposalText'];
    $projectId = $_POST['projectId'];
    $freelancerId = $_POST['freelancerId'];
    if (isset($_FILES['proposalFile']) && $_FILES['proposalFile']['error'] == 0) {
        $fileTmpPath = $_FILES['proposalFile']['tmp_name'];
        $fileName = $_FILES['proposalFile']['name'];
        $fileSize = $_FILES['proposalFile']['size'];
        $fileType = $_FILES['proposalFile']['type'];
        $uploadDir = 'uploads/'; 
        $filePath = $uploadDir . $fileName;
        if (move_uploaded_file($fileTmpPath, $filePath)) {
            $stmt = $conn->prepare("INSERT INTO proposals (project_id, freelancer_id, proposal_text, proposal_file) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiss", $projectId, $freelancerId, $proposalText, $filePath);

            if ($stmt->execute()) {
                echo "Proposal submitted successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "File upload failed!";
        }
    } else {
        echo "No file uploaded or there was an error uploading.";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Playwrite+HU:wght@100..400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./home.css">
    <link rel="stylesheet" href="./base.css">
</head>
<body>
<<<<<<< HEAD

<header>
        <div class="navbar">
            <div class="logo"> <a href="test.php">My Job</a> </div>
            <ul class="links">
                <li><a href="test.php"><b>HOME</b></a></li>
                <li><a href="about.php"><b>ABOUT</b></a></li>
                <li><a href="services.php"><b>SERVICES</b></a></li>
                <li><a href="contact.php"><b>CONTACT</b></a></li>
            </ul>
            <a href="signUp.html" class="action_btn">Get Srarted</a>
            <div class="toggle_btn">
                <i id="bars" class="fa-solid fa-bars"></i>
            </div>
        </div>
        <div class="dropdown_menu ">
            <ul>
                <li><a href="test.php"><b>HOME</b></a></li>
                <li><a href="about.html"><b>ABOUT</b></a></li>
                <li><a href="services.html"><b>SERVICES</b></a></li>
                <li><a href="contact.html"><b>CONTACT</b></a></li>
                <li> <a href="signUp.html" class="action_btn">Get Srarted</a> </li>
            </ul>
        </div>
    </header>


<div class="container">
    <div class="row d-flex justify-content-center align-items-center flex-wrap mt-5">
        <div class="col-md-6 col-xs-12 radius shadow text-center text-white p-5">
=======
<div class="container">
    <div class="row d-flex justify-content-center align-items-center flex-wrap mt-5">
        <div class="col-md-6 col-xs-12 radius shadow text-center p-5">
>>>>>>> d0920f0714346dce224fec72d78c39a6fde8db59
            <h1>Project Details</h1>
            <h2 id="projName"></h2>
            <p id="projDesc"></p>
            <p id="projStatus"></p>
            <p id="projDate"></p>

            <button class="btn btn-dark text-white" onclick="applyNow()">Apply Now</button>
        </div>
    </div>
</div>


<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="exampleModalLabel">Apply for Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="applyForm" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="proposalText" class="col-form-label">Proposal Text:</label>
                        <textarea class="form-control" id="proposalText" required name="proposalText"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="proposalFile" class="col-form-label">Upload CV:</label>
                        <input type="file" class="form-control" id="proposalFile" required name="proposalFile" />
                    </div>
                    <input type="hidden" id="projectId" name="projectId" />
                    <input type="hidden" id="freelancerId" name="freelancerId" value="1" />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark" name="submitProposal">Submit Proposal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
         <script src="./project.js"></script>

</body>
</html>