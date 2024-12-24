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

<?php
$servername = "localhost";
$username = "root";  
$password = ""; 
$dbname = "marketplace"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['projectName'])) {
    $projectName = $_POST['projectName'];
    $projectDescription = $_POST['projectDescription'];
    $projectStatus = $_POST['projectStatus'];
    $projectDate = $_POST['projectDate'];
    $stmt = $conn->prepare("INSERT INTO projects (name, description, status, date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $projectName, $projectDescription, $projectStatus, $projectDate);

    if ($stmt->execute()) {
        echo "New project added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
$conn->close();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NESTLANCE</title>
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
    <div class="Testimonial">
        <div class="container ">
            <h2 class="text-white mb-3 text-center">This Is What Our Customers Say</h2>
            <div id="testimonialCarousel" class="carousel slide ">
                <!--data-bs-ride="carousel" if you want it to move automatically add it to the div-->
                <div class="carousel-inner ">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="./person/p0.jpg" class="card-img-top rounded-circle " alt="Image 1" />
                                    <div class="card-body">

                                        <q class="text-muted fs-5 mb-0">I found a skilled developer quickly and the
                                            process was seamless. Highly recommend!</q>
                                        <div class="d-flex  mt-2 mb-2">
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                        </div>
                                        <p class="text-dark fs-3">John D.</p>
                                        <p class="text-muted">HR Manager</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="./person/p1.jpg" class="card-img-top rounded-circle" alt="Image 2" />
                                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                        <q class="text-muted fs-5 mb-0">Great platform to find talented professionals.
                                            My project was completed on time and within budget.</q>
                                        <div class="d-flex  mt-2 mb-2">
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                        </div>
                                        <p class="text-dark fs-3">Sarah P.</p>
                                        <p class="text-muted">Project Manager</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="./person/p2.jpg" class="card-img-top rounded-circle" alt="Image 3" />
                                    <div class="card-body">
                                        <q class="text-muted fs-5 mb-0">The marketplace makes hiring freelancers so
                                            easy. The
                                            quality of work exceeded my expectations.</q>
                                        <div class="d-flex  mt-2 mb-2">
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                        </div>
                                        <p class="text-dark fs-3">Tom R.</p>
                                        <p class="text-muted">CEO</p>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="./person/p3.jpg" class="card-img-top rounded-circle" alt="Image 4" />
                                    <div class="card-body">
                                        <q class="text-muted fs-5 mb-0">Fast, efficient, and professional. The
                                            freelancer I
                                            hired delivered amazing results.</q>
                                        <div class="d-flex  mt-2 mb-2">
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                        </div>

                                        <p class="text-dark fs-3">Emily W</p>
                                        <p class="text-muted">Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="./person/p4.jpg" class="card-img-top rounded-circle" alt="Image 5" />
                                    <div class="card-body">
                                        <q class="text-muted fs-5 mb-0">A fantastic experience! I will definitely be
                                            using this
                                            platform again for future projects.</q>
                                        <div class="d-flex  mt-2 mb-2">
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                        </div>
                                        <p class="text-dark fs-3">Michael J.</p>
                                        <p class="text-muted">Web Developer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="./person/p5.jpg" class="card-img-top rounded-circle" alt="Image 6" />
                                    <div class="card-body">
                                        <q class="text-muted fs-5 mb-0">Professional and reliable freelancers. A
                                            must-have
                                            platform for businesses.</q>
                                        <div class="d-flex mt-2 mb-2">
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                        </div>
                                        <p class="text-dark fs-3">Anna K.</p>
                                        <p class="text-muted">business owner</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="./person/p6.jpg" class="card-img-top rounded-circle" alt="Image 7" />
                                    <div class="card-body">
                                        <q class="text-muted fs-5 mb-0">I’ve worked with several freelancers, and the
                                            quality
                                            here is always top-notch.</q>
                                        <div class="d-flex  mt-2 mb-2">
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                        </div>
                                        <p class="text-dark fs-3">David S.</p>
                                        <p class="text-muted">Stakeholder</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="./person/p7.jpg" class="card-img-top rounded-circle" alt="Image 8" />
                                    <div class="card-body">
                                        <q class="text-muted fs-5 mb-0">Great marketplace to find experts for any
                                            project.
                                            Always impressed with the work!</q>
                                        <div class="d-flex mt-2 mb-2">
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                        </div>
                                        <p class="text-dark fs-3">Jessica T.</p>
                                        <p class="text-muted">HR Manager</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="./person/p8.jpg" class="card-img-top rounded-circle" alt="Image 9" />
                                    <div class="card-body">
                                        <q class="text-muted fs-5 mb-0">This platform made it so easy to connect with
                                            talented
                                            professionals. Highly satisfied.</q>
                                        <div class="d-flex  mt-2 mb-2">
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                        </div>
                                        <p class="text-dark fs-3">Chris H.</p>
                                        <p class="text-muted">Entrepreneur</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="carousel-item ">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="./person/p9.jpg" class="card-img-top rounded-circle" alt="Image 10" />
                                    <div class="card-body">
                                        <q class="text-muted fs-5 mb-0">I found the perfect freelancer for my project!
                                            Great
                                            support and seamless experience.</q>
                                        <div class="d-flex  mt-2 mb-2">
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                        </div>
                                        <p class="text-dark fs-3">Laura B.</p>
                                        <p class="text-muted">Designer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="./person/p10.jpg" class="card-img-top rounded-circle" alt="Image 11" />
                                    <div class="card-body">
                                        <q class="text-muted fs-5 mb-0">I found a skilled developer quickly and the
                                            process was seamless. Highly recommend!</q>
                                        <div class="d-flex mt-2 mb-2">
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                        </div>
                                        <p class="text-dark fs-3">John D.</p>
                                        <p class="text-muted">HR Manager</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="./person/p11.jpg" class="card-img-top rounded-circle" alt="Image 12" />
                                    <div class="card-body">
                                        <q class="text-muted fs-5 mb-0">I found a skilled developer quickly and the
                                            process was seamless. Highly recommend!</q>
                                        <div class="d-flex mt-2 mb-2">
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                            <i class="fa-solid fa-star text-warning"></i>
                                        </div>
                                        <p class="text-dark fs-3">John D.</p>
                                        <p class="text-muted">HR Manager</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </div>


    <div class="slider">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-4 col-xs-12">

                    <p class="int-comp"> <span>Many</span> Intrnational Companies</p>
                    <p class="pal-comp"><span>+15</span> Palestinian Companies</p>
                </div>
                <div class="col-md-8 col-xs-12">
                    <div class="scrolling-images-wrapper">
                        <div class="scrolling-images">
                            <img src="./comp/c0.png" class="rounded" alt="Image 1" />

                            <img src="./comp/c1.png" class="rounded" alt="Image 2" />

                            <img src="./comp/c2.jpg" class="rounded" alt="Image 3" />

                            <img src="./comp/c3.png" class="rounded" alt="Image 4" />

                            <img src="./comp/c4.jpg" class="rounded" alt="Image 5" />

                            <img src="./comp/c5.png" class="rounded" alt="Image 1" />

                            <img src="./comp/c6.png" class="rounded" alt="Image 1" />

                            <img src="./comp/c7.png" class="rounded" alt="Image 1" />

                            <img src="./comp/c8.png" class="rounded" alt="Image 1" />

                            <img src="./comp/c9.png" class="rounded" alt="Image 1" />

                            <img src="./comp/c10.png" class="rounded" alt="Image 1" />

                            <img src="./comp/c11.png" class="rounded" alt="Image 1" />

                            <img src="./comp/c12.jpg" class="rounded" alt="Image 1" />

                            <img src="./comp/c13.jpg" class="rounded" alt="Image 1" />

                            <img src="./comp/c14.png" class="rounded" alt="Image 1" />

                            <img src="./comp/c15.png" class="rounded" alt="Image 1" />

                            <img src="./comp/c16.jpg" class="rounded" alt="Image 1" />

                            <img src="./comp/c17.png" class="rounded" alt="Image 1" />

                            <img src="./comp/c18.png" class="rounded" alt="Image 1" />

                            <img src="./comp/c19.jpg" class="rounded" alt="Image 1" />

                        </div>
                        <div class="scrolling-images">
                            <img src="./palComp/pal0.png" class="rounded" alt="Image 1" />

                            <img src="./palComp/pal1.jpg" class="rounded" alt="Image 1" />

                            <img src="./palComp/pal2.png" class="rounded" alt="Image 1" />

                            <img src="./palComp/pal3.png" class="rounded" alt="Image 1" />

                            <img src="./palComp/pal4.png" class="rounded" alt="Image 1" />

                            <img src="./palComp/pal5.png" class="rounded" alt="Image 1" />

                            <img src="./palComp/pal6.png" class="rounded" alt="Image 1" />

                            <img src="./palComp/pal7.jpg" class="rounded" alt="Image 1" />

                            <img src="./palComp/pal8.png" class="rounded" alt="Image 1" />

                            <img src="./palComp/pal9.png" class="rounded" alt="Image 1" />

                            <img src="./palComp/pal10.jpg" class="rounded" alt="Image 1" />

                            <img src="./palComp/pal11.png" class="rounded" alt="Image 1" />

                            <img src="./palComp/pal12.jpg" class="rounded" alt="Image 1" />

                            <img src="./palComp/pal13.jpg" class="rounded" alt="Image 1" />

                            <img src="./palComp/pal.14.jpg" class="rounded" alt="Image 1" />

                            <img src="./palComp/pal15.png" class="rounded" alt="Image 1" />

                            <img src="./palComp/pal16.jpg" class="rounded" alt="Image 1" />

                            <img src="./palComp/pal17.png" class="rounded" alt="Image 1" />

                            <img src="./palComp/pal18.jpg" class="rounded" alt="Image 1" />

                            <img src="./palComp/pal19.png" class="rounded" alt="Image 1" />

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="projects">
    <div class="container">
<button type="button" class="btn btn-dark text-white" data-bs-toggle="modal" data-bs-target="#addProjectModal">
  Add Project
</button>
        <div class="row proj">
        <div class="col-md-3 col-xs-12">
    <div class="card card-project" data-id="1" data-name="Full Stack Web Project" data-description="Ghadeer Future Accelerator seeking for a full stack developer Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." data-status="completed" data-date="2023-06-01">
        <h2>Full Stack Web Project</h2>
        <p>Ghadeer Future Accelerator seeking for a full stack developer</p>
        <button class="btn btn-dark text-white" onclick="applyNow(1)">Apply Now</button>
        <a href="#" class="text-decoration-none text-white view-details">View Project Details</a>
    </div>
</div>
<div class="col-md-3 col-xs-12">
                <div class="card card-project" data-id="2" data-name="Frontend Web Project" data-description="Ghadeer Future Accelerator seeking for a Frontend Web developer Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." data-status="Open" data-date="2023-06-01">
                    <h2>Frontend Web Project</h2>
                    <p>Ghadeer Future Accelerator seeking for a Frontend Web developer</p>
                    <button class="btn btn-dark text-white" onclick="applyNow(2)">Apply Now</button> 
                    <a href="#" class="text-decoration-none text-white view-details">View Project Details</a>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
            <div class="card card-project" data-id="3" data-name="Backend Web Project" data-description="Ghadeer Future Accelerator seeking for a Backend web developer Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." data-status="Open" data-date="2023-06-01">

                    <h2>Backend Web Project</h2>
                    <p>Ghadeer Future Accelerator seeking for a Backend web developer</p>
                    <button class="btn btn-dark text-white" onclick="applyNow(3)">Apply Now</button> 
                    <a href="#" class="text-decoration-none text-white view-details">View Project Details</a>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
            <div class="card card-project" data-id="4" data-name="Mobile App Project" data-description="Ghadeer Future Accelerator seeking for a Mobile Application developer Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." data-status="Open" data-date="2023-06-01">
                    <h2>Mobile App Project</h2>
                    <p>Ghadeer Future Accelerator seeking for a Mobile Application developer</p>
                    <button class="btn btn-dark text-white" onclick="applyNow(4)">Apply Now</button> 
                    <a href="#" class="text-decoration-none text-white view-details">View Project Details</a>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
            <div class="card card-project" data-id="5" data-name="UI/UX Design Project" data-description="Ghadeer Future Accelerator seeking for a UI/UX Designer Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." data-status="Open" data-date="2023-06-01">
                    <h2>UI/UX Design Project</h2>
                    <p>Ghadeer Future Accelerator seeking for a UI/UX Designer </p>
                    <button class="btn btn-dark text-white" onclick="applyNow(5)">Apply Now</button> 
                    <a href="#" class="text-decoration-none text-white view-details">View Project Details</a>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
            <div class="card card-project" data-id="6" data-name="Data Science Project" data-description="Ghadeer Future Accelerator seeking for a Data Scientist Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." data-status="Open" data-date="2023-06-01">
                    <h2>Data Science Project</h2>
                    <p>Ghadeer Future Accelerator seeking for a Data Scientist </p>
                    <button class="btn btn-dark text-white" onclick="applyNow(6)">Apply Now</button> 
                    <a href="#" class="text-decoration-none text-white view-details">View Project Details</a>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
            <div class="card card-project" data-id="7" data-name="Net Work Project" data-description="Ghadeer Future Accelerator seeking for a net work specialist Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." data-status="Open" data-date="2023-06-01">
                    <h2>Net Work Project</h2>
                    <p>Ghadeer Future Accelerator seeking for a net work specialist</p>
                    <button class="btn btn-dark text-white" onclick="applyNow(7)">Apply Now</button> 
                    <a href="#" class="text-decoration-none text-white view-details">View Project Details</a>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
            <div class="card card-project" data-id="8" data-name="AI Project" data-description="Ghadeer Future Accelerator seeking for an AI specialist Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. " data-status="Open" data-date="2023-06-01">
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