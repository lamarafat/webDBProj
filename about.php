<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Freelance Marketplace</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #001C79, #021A3E, #2644A9);
            color: #fff;
            overflow-x: hidden;
        }
        header {
            text-align: center;
            padding: 60px 20px;
            background: rgba(0, 0, 0, 0.6);
            border-bottom: 2px solid #fff;
        }
        header h1 {
            font-size: 3.5rem;
            margin: 0;
            animation: fadeIn 1.5s ease-in-out;
            text-shadow: 0 0 10px #afaef4, 0 0 20px rgba(41, 32, 32, 0.872);
        }
        header p {
            font-size: 1.2rem;
            margin-top: 10px;
            animation: fadeIn 2s ease-in-out;
        }
        .btn-custom {
            background: rgb(42, 111, 230);
            color: #dee1e6;
            font-weight: bold;
            border-radius: 12px;
            transition: background 0.3s, transform 0.3s;
        }
        .btn-custom:hover {
            background: #ffffff;
            color: #1e3c72;
            transform: scale(1.1);
        }
        .section-title {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 30px;
            text-shadow: 0 0 10px #fff, 0 0 20px rgb(4, 8, 242);
        }
        .card {
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }
        .card-title {
            font-size: 1.5rem;
            margin-bottom: 15px;
            text-shadow: 0 0 10px #070aa4;
        }
        .end {
            padding: 30px;
            margin: 40px auto;
            text-align: center;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(135, 168, 240, 0.646);
            color: #dee1e6;
        }
        footer {
            text-align: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
        }
        footer p {
            margin: 0;
            font-size: 0.9rem;
        }
        @media (max-width: 768px) {
            header h1 {
                font-size: 2.5rem;
            }
            .section-title {
                font-size: 2rem;
            }
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>About Us</h1>
        <p>Your Gateway to Tech & Programming Excellence</p>
    </header>

    <section class="container py-5">
        <h2 class="section-title">Our Vision</h2>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card p-3">
                    <h3 class="card-title">Empowering Freelancers</h3>
                    <p>We aim to provide an inclusive platform that connects tech-savvy professionals with rewarding opportunities worldwide.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card p-3">
                    <h3 class="card-title">Innovation & Growth</h3>
                    <p>Our mission is to foster creativity and growth by bridging the gap between technology enthusiasts and forward-thinking businesses.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card p-3">
                    <h3 class="card-title">Global Connectivity</h3>
                    <p>Connecting freelancers with opportunities across borders to expand their potential and reach.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="container py-5">
        <h2 class="section-title">Core Values</h2>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card p-3">
                    <h3 class="card-title">Transparency</h3>
                    <p>Building trust through clear communication and honest practices.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card p-3">
                    <h3 class="card-title">Quality</h3>
                    <p>Delivering excellence in every project and interaction.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card p-3">
                    <h3 class="card-title">Community</h3>
                    <p>Creating a supportive network for freelancers and businesses.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card p-3">
                    <h3 class="card-title">Innovation</h3>
                    <p>Encouraging new ideas and approaches to drive success in the freelance industry.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card p-3">
                    <h3 class="card-title">Sustainability</h3>
                    <p>Promoting long-term solutions that benefit both freelancers and businesses alike.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card p-3">
                    <h3 class="card-title">Collaboration</h3>
                    <p>Fostering a culture of teamwork and partnership to achieve shared goals.</p>
                </div>
            </div>
        </div>
    </section>

    <div class="end">
        <p>Our goal is to enable talented people to showcase their skills and achieve their career dreams in a comfortable and safe environment. Here, they can interact with clients, manage their projects, and earn a sustainable income. Whether you are an expert in software development, design, data analysis, or any other technical field, you will find in "My Job" the perfect space to build your future.</p>
    </div>

    <footer>
        <a href="test.php" class="btn btn-custom" aria-label="Go back to the home page">Back to Home</a>
        <p>&copy; 2024 Freelance Marketplace | All Rights Reserved</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
