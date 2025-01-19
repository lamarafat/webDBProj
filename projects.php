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
    $proposalText = htmlspecialchars(trim($_POST['proposalText']));
    $projectId = intval($_POST['projectId']);
    $freelancerId = intval($_POST['freelancerId']);

    if (isset($_FILES['proposalFile']) && $_FILES['proposalFile']['error'] == 0) {
        $fileTmpPath = $_FILES['proposalFile']['tmp_name'];
        $fileName = basename($_FILES['proposalFile']['name']);
        $uploadDir = __DIR__ . '/uploads/'; 
        $filePath = $uploadDir . $fileName;
        if (!is_dir($uploadDir)) {
            die("Error: Upload directory does not exist.");
        }
        if (!is_writable($uploadDir)) {
            die("Error: Upload directory is not writable.");
        }
        if (move_uploaded_file($fileTmpPath, $filePath)) {
            $stmt = $conn->prepare("INSERT INTO proposals (project_id, freelancer_id, proposal_text, proposal_file) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiss", $projectId, $freelancerId, $proposalText, $filePath);
    
            if ($stmt->execute()) {
                echo "Proposal submitted successfully!";
            } else {
                error_log("Error: " . $stmt->error);
                echo "Database error: Unable to save proposal.";
            }
        } else {
            echo "Error: File upload failed.";
        }
    } else {
        echo "Error: No file uploaded or there was an upload error.";
    }
    
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['projectName'])) {
    $projectName = htmlspecialchars(trim($_POST['projectName']));
    $projectDescription = htmlspecialchars(trim($_POST['projectDescription']));
    $projectStatus = htmlspecialchars(trim($_POST['projectStatus']));
    $projectDate = htmlspecialchars(trim($_POST['projectDate']));

    if (empty($projectName) || empty($projectDescription) || empty($projectStatus) || empty($projectDate)) {
        die("All fields are required.");
    }
    $stmt = $conn->prepare("INSERT INTO projects (title, description, status, created) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $projectName, $projectDescription, $projectStatus, $projectDate);

    if ($stmt->execute()) {
        echo "New project added successfully!";
    } else {
        error_log("Error: " . $stmt->error);
        echo "An error occurred while adding the project.";
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
        
  

<div class="projects">
    <div class="container">
<button type="button" class="btn btn-dark text-white" data-bs-toggle="modal" data-bs-target="#addProjectModal">
  Add Project
</button>
        <div class="row proj">
        <div class="col-md-3 col-xs-12">
    <div class="card card-project text-white" data-id="1" data-name="Full Stack Web Project" data-description="Ghadeer Future Accelerator seeking for a full stack developer Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." data-status="completed" data-date="2023-06-01">
        <h2>Full Stack Web Project</h2>
        <p>Ghadeer Future Accelerator seeking for a full stack developer</p>
        <button class="btn btn-dark text-white" onclick="applyNow(1)">Apply Now</button>
        <a href="#" class="text-decoration-none text-white view-details">View Project Details</a>
    </div>
</div>


<div class="col-md-3 col-xs-12">
                <div class="card card-project text-white" data-id="2" data-name="Frontend Web Project" data-description="Ghadeer Future Accelerator seeking for a Frontend Web developer Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." data-status="Open" data-date="2023-06-01">
                    <h2>Frontend Web Project</h2>
                    <p>Ghadeer Future Accelerator seeking for a Frontend Web developer</p>
                    <button class="btn btn-dark text-white" onclick="applyNow(2)">Apply Now</button> 
                    <a href="#" class="text-decoration-none text-white view-details">View Project Details</a>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
            <div class="card card-project text-white" data-id="3" data-name="Backend Web Project" data-description="Ghadeer Future Accelerator seeking for a Backend web developer Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." data-status="Open" data-date="2023-06-01">

                    <h2>Backend Web Project</h2>
                    <p>Ghadeer Future Accelerator seeking for a Backend web developer</p>
                    <button class="btn btn-dark text-white" onclick="applyNow(3)">Apply Now</button> 
                    <a href="#" class="text-decoration-none text-white view-details">View Project Details</a>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
            <div class="card card-project text-white" data-id="4" data-name="Mobile App Project" data-description="Ghadeer Future Accelerator seeking for a Mobile Application developer Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." data-status="Open" data-date="2023-06-01">
                    <h2>Mobile App Project</h2>
                    <p>Ghadeer Future Accelerator seeking for a Mobile Application developer</p>
                    <button class="btn btn-dark text-white" onclick="applyNow(4)">Apply Now</button> 
                    <a href="#" class="text-decoration-none text-white view-details">View Project Details</a>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
            <div class="card card-project text-white" data-id="5" data-name="UI/UX Design Project" data-description="Ghadeer Future Accelerator seeking for a UI/UX Designer Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." data-status="Open" data-date="2023-06-01">
                    <h2>UI/UX Project</h2>
                    <p>Ghadeer Future Accelerator seeking for a UI/UX Designer </p>
                    <button class="btn btn-dark text-white" onclick="applyNow(5)">Apply Now</button> 
                    <a href="#" class="text-decoration-none text-white view-details">View Project Details</a>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
            <div class="card card-project text-white" data-id="6" data-name="Data Science Project" data-description="Ghadeer Future Accelerator seeking for a Data Scientist Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." data-status="Open" data-date="2023-06-01">
                    <h2>Data Science Project</h2>
                    <p>Ghadeer Future Accelerator seeking for a Data Scientist </p>
                    <button class="btn btn-dark text-white" onclick="applyNow(6)">Apply Now</button> 
                    <a href="#" class="text-decoration-none text-white view-details">View Project Details</a>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
            <div class="card card-project text-white" data-id="7" data-name="Net Work Project" data-description="Ghadeer Future Accelerator seeking for a net work specialist Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." data-status="Open" data-date="2023-06-01">
                    <h2>Net Work Project</h2>
                    <p>Ghadeer Future Accelerator seeking for a net work specialist</p>
                    <button class="btn btn-dark text-white" onclick="applyNow(7)">Apply Now</button> 
                    <a href="#" class="text-decoration-none text-white view-details">View Project Details</a>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
            <div class="card card-project text-white" data-id="8" data-name="AI Project" data-description="Ghadeer Future Accelerator seeking for an AI specialist Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. " data-status="Open" data-date="2023-06-01">
                    <h2>AI Project</h2>
                    <p>Ghadeer Future Accelerator seeking for an AI specialist </p>
                    <button class="btn btn-dark text-white" onclick="applyNow(8)">Apply Now</button>
                    <a href="#" class="text-decoration-none text-white view-details">View Project Details</a>
                </div>
            </div>
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

<div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProjectModalLabel">Add New Project</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addProjectForm" method="POST">
          <div class="mb-3">
            <label for="projectName" class="col-form-label">Project Name:</label>
            <input type="text" class="form-control" id="projectName" name="projectName" required>
          </div>
          <div class="mb-3">
            <label for="projectDescription" class="col-form-label">Project Description:</label>
            <textarea class="form-control" id="projectDescription" name="projectDescription" required></textarea>
          </div>
          <div class="mb-3">
            <label for="projectStatus" class="col-form-label">Project Status:</label>
            <select class="form-select" id="projectStatus" name="projectStatus">
              <option value="Open">Open</option>
              <option value="Closed">Closed</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="projectDate" class="col-form-label">Start Date:</label>
            <input type="date" class="form-control" id="projectDate" name="projectDate" required>
          </div>
          <button type="submit" class="btn btn-dark">Add Project</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
         <script src="./home.js"></script>

</body>
</html>