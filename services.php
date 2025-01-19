<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Freelance Marketplace</title>
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
            background: rgba(0, 0, 0, 0.7);
            border-bottom: 5px solid #4CAF50;
        }
        header h1 {
            font-size: 3.3rem;
            margin: 0;
            animation: fadeInDown 1.5s ease-in-out;
            text-shadow: 0 0 10px #fff, 0 0 20px #06023d, 0 0 30px #030132;
        }
        header p {
            font-size: 1.3rem;
            margin-top: 10px;
            animation: fadeInDown 2s ease-in-out;
        }
        .back-home {
            margin-top: 20px;
            display: inline-block;
            padding: 12px 24px;
            background: rgb(42, 111, 230);
            color: #dee1e6;
            text-decoration: none;
            font-weight: bold;
            border-radius: 12px;
            transition: background 0.3s, transform 0.3s;
        }
        .back-home:hover {
            background: #ffffff;
            color: #1e3c72;
            transform: scale(1.1);
        }
        section {
            padding: 50px 20px;
            max-width: 1200px;
            margin: 0 auto;
            
        }
        .section-title {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 30px;
            position: relative;
            text-shadow: 0 0 10px #fff, 0 0 20px #4caf50, 0 0 30px #4caf50;
            animation: fadeInUp 1.5s ease-in-out;
        }
        .section-title:after {
            content: "";
            width: 80px;
            height: 4px;
            background: #0d0061;
            display: block;
            margin: 15px auto;
        }
        .content {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
            align-items: stretch;
        }
        .card {
            background: #5b9cdcb9;
            padding: 25px;
            border: 1px solid #038a15;
            border-radius: 15px;
            width: 280px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3), 0 0 15px rgba(255, 255, 255, 0.5);
            transition: transform 0.3s, box-shadow 0.3s;
            animation: fadeInUp 1.5s ease-in-out;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: center;
        }
        .card:hover {
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5), 0 0 30px rgba(207, 248, 220, 0.8);
        }
        .card h3 {
            font-size: 1.7rem;
            margin-bottom: 15px;
            text-shadow: 0 0 10px #fff, 0 0 20px #03a9f4, 0 0 30px #03a9f4;
        }
        .card p {
            font-size: 1.1rem;
            line-height: 1.7;
            margin-bottom: 20px;
        }
        footer {
            text-align: center;
            padding: 25px;
            background: rgba(0, 0, 0, 0.7);
            border-top: 5px solid #4CAF50;
        }
        footer p {
            padding: 10px;
            margin: 0;
            font-size: 0.95rem;
        }
        footer .back-home {
            margin-top: 20px;
            display: inline-block;
            padding: 12px 24px;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 12px;
            transition: background 0.3s, transform 0.3s;
        }
        footer .back-home:hover {
            background: #ffffff;
            color: #1e3c72;
            transform: scale(1.1);
        }
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes fadeInUp {
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
        <h1>Our Services</h1>
        <p>Explore the Wide Range of Services We Offer</p>
    </header>
   
    <section>
        <h2 class="section-title">What We Offer</h2>
        <div class="content">
            <div class="card">
                <h3>Web Development</h3>
                <p>Offering cutting-edge web development services, from static sites to dynamic applications.</p>
            </div>
            <div class="card">
                <h3>Mobile App Development</h3>
                <p>Creating intuitive and user-friendly mobile applications for iOS and Android platforms.</p>
            </div>
            <div class="card">
                <h3>Data Analysis</h3>
                <p>Providing comprehensive data analysis to help businesses make informed decisions.</p>
            </div>
            <div class="card">
                <h3>Cybersecurity</h3>
                <p>Ensuring robust protection against digital threats with our expert cybersecurity solutions.</p>
            </div>
            <div class="card">
                <h3>UI/UX Design</h3>
                <p>Crafting visually appealing and user-friendly interfaces to enhance user experience.</p>
            </div>
            <div class="card">
                <h3>Blockchain Development</h3>
                <p>Building secure and scalable blockchain solutions for various industries.</p>
            </div>
            <div class="card">
                <h3>Cloud Computing</h3>
                <p>Providing scalable cloud solutions to streamline business operations.</p>
            </div>
            <div class="card">
                <h3>Artificial Intelligence</h3>
                <p>Integrating AI-driven solutions to automate and optimize processes.</p>
            </div>
            <div class="card">
                <h3>Technical Support</h3>
                <p>Offering 24/7 technical support to ensure smooth business operations.</p>
            </div>
           
        </div>
    </section>

    <footer>
        <a href="test.php" class="back-home">Back to Home</a>
        <p>&copy; 2024 Freelance Marketplace | All Rights Reserved</p>
    </footer>
</body>
</html>
