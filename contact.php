<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Freelance Marketplace</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #001C79, #476eec);
            color: #001342;
            overflow-x: hidden;
        }
        header {
            text-align: center;
            padding: 60px 20px;
            background: rgba(0, 0, 0, 0.8);
            color: #fff;
            border-bottom: 5px solid #ffcc00;
            animation: fadeInDown 1s;
        }
        header h1 {
            font-size: 3.3rem;
            margin: 0;
            text-shadow: 0 0 10px #fff;
        }
        header p {
            font-size: 1.3rem;
            margin-top: 10px;
        }
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .back-home {
            margin-top: 20px;
            display: inline-block;
            padding: 12px 25px;
            border: 1px solid #ffffff;
            background: #090172;
            color: #dee0e8;
            text-decoration: none;
            font-weight: bold;
            border-radius: 12px;
            transition: background 0.3s, transform 0.3s;
        }
        .back-home:hover {
            background: #ffffff;
            color: #001C79;
            border: 1px solid #090363;
            transform: scale(1.1);
        }
        section {
            border: 3px solid #ffcc00;
            padding: 50px 20px;
            max-width: 800px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            animation: fadeInUp 1s;
        }
        .section-title {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 20px;
            color: #001C79;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        input, textarea, button, select {
            font-size: 1rem;
            padding: 12px;
            border: 1px solid #b4b2b2;
            border-radius: 5px;
            transition: border 0.3s;
        }
        input:focus, textarea:focus, select:focus {
            border-color: #001C79;
            outline: none;
        }
        button {
            background: #180165;
            color: #f8f8f8;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
        }
        button:hover {
            background: #001C79;
            color: #ffffff;
            transform: scale(1.05);
        }
        footer {
            text-align: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.8);
            color: #fff;
            position: relative;
            bottom: 0;
            width: 100%;
            border-top: 5px solid #ffcc00;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }
        .portfile-card {
            max-width: 370px;
            width: 100%;
            background: #fff;
            border-radius: 24px;
            border: 3px solid #ffcc00;
            padding: 25px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .portfile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .portfile-card img {
            height: 100px;
            width: 100px;
            border-radius: 50%;
            border: 3px solid #ffcc00;
            margin-bottom: 10px;
            object-fit: cover;
        }
        .text-data {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #333;
        }
        .text-data .name {
            font-size: 22px;
            font-weight: 600;
            color: #001C79;
        }
        .text-data .job {
            font-size: 18px;
            font-weight: 400;
            color: #666;
        }
        .media-buttons {
            display: flex;
            align-items: center;
            margin-top: 15px;
        }
        .link {
            background-color: #4070f4;
            text-decoration: none;
            margin: 0 8px;
            height: 34px;
            width: 34px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 18px;
            transition: background 0.3s, transform 0.3s;
        }
        .link:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <header>
        <h1>Contact Us</h1>
        <p>We'd Love to Hear from You!</p>
    </header>

    <section>
        <h2 class="section-title">Get in Touch</h2>
        <label for="contact-choice">Who do you want to contact?</label>
        <select id="contact-choice" class="form-input">
            <option value="support">Support Team</option>
            <option value="sales">Sales Team</option>
            <option value="comments">General Comments</option>
        </select>

        <form action="#" method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </section>

    <div class="container">
        <div class="portfile-card">
            <img src="img.jpg" alt="Profile">
            <div class="text-data">
                <span class="name">BARAA MOHAMMAD</span>
                <span class="job">DEVELOPER</span>
            </div>
            <div class="media-buttons">
                <a href="#" class="link" style="background: #265bc5;">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="link" style="background: #1da1f2;">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="#" class="link" style="background: #b2427c;">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="link" style="background: #ff0000;">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>

        <div class="portfile-card">
            <img src="img.jpg" alt="Profile">
            <div class="text-data">
                <span class="name">LAMA ALI</span>
                <span class="job">DEVELOPER</span>
            </div>
            <div class="media-buttons">
                <a href="#" class="link" style="background: #265bc5;">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="link" style="background: #1da1f2;">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="#" class="link" style="background: #b2427c;">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="link" style="background: #ff0000;">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>

    <footer>
        <a href="test.php" class="back-home">Back to Home</a>
        <p>&copy; 2024 Freelance Marketplace | All Rights Reserved</p>
    </footer>
</body>
</html>