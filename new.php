<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subhyatara - Explore the World</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; text-align: center; }
        header { display: flex; flex-direction: column; align-items: center; background: #262424; color: white; padding: 20px; font-size: 14px; position: relative; }
        .logo { height: 50px; position: absolute; left: 10px; top: 50%; transform: translateY(-50%); }
        .site-title { font-size: 32px; font-weight: bold; margin-bottom: 15px; }
        .nav-links { display: flex; justify-content: center; gap: 20px; margin-bottom: 15px; flex-wrap: wrap; }
        .nav-links a { color: #EEE5DA; text-decoration: none; font-size: 16px; }
        nav { width: 100%; display: flex; justify-content: flex-end; align-items: center; position: absolute; right: 10px; top: 20px; }
        .nav-right ul { list-style: none; padding: 0; display: flex; gap: 15px; }
        .nav-right ul li { margin: 0; }
        .nav-right ul li a { color: #EEE5DA; text-decoration: none; font-size: 14px; }
        
        .slideshow-container { position: relative; max-width: 100%; height: 60vh; overflow: hidden; }
        .slides { display: none; width: 100%; height: 100%; }
        .slides img, .slides video { width: 100%; height: 100%; object-fit: cover; }
        .active-slide { display: block !important; }
        .prev, .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0);
            color: #EEE5DA;
            padding: 10px;
            cursor: pointer;
            border: none;
            font-size: 20px;
            transition: background 0.3s ease-in-out;
        }
        .prev:hover, .next:hover { background: rgba(0, 0, 0, 0.5); }
        .prev { left: 10px; }
        .next { right: 10px; }
        
        .booking-section { padding: 20px; background: #EEE5DA; }
        .booking-form { display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; }
        .booking-form select, .booking-form input, .booking-form button {
            padding: 10px;
            font-size: 14px;
            border-radius: 5px;
            border: 1px solid #EEE5DA;
        }
        .booking-form button { background: #262424; color: white; border: none; cursor: pointer; }
        .booking-form button:hover { background: #262626; }
        
        footer { background: #262424; color: #EEE5DA; padding: 20px; font-size: 14px; margin-top: 20px; }
        .footer-container { display: flex; justify-content: space-around; flex-wrap: wrap; }
        .footer-section { margin: 10px; text-align: left; }
        .footer-section h3 { margin-bottom: 10px; }
        .footer-section a { display: block; color: #ccc; text-decoration: none; font-size: 14px; margin-bottom: 5px; }
        .footer-section a:hover { color: #EEE5DA; }
        .social-icons { display: flex; gap: 10px; }
        .social-icons img { width: 30px; height: 30px; }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <a href="new.html">
                <img src="assets/noBgColor (3).png" alt="Logo" class="logo">
            </a>
        </div>
        <h1 class="site-title">Subhyatara - Your Travel Companion</h1>
        <div class="nav-links">
            <a href="hotel.php">Hotels</a>
            <a href="flight.php">Flights</a>
            <a href="car_rental.php">Car Rentals</a>
            <a href="cruises.php">Cruises</a>
            <a href="tripplanner.php">Travel Planner</a>
        </div>
        <nav>
            <div class="nav-right">
                <ul>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a href="account.php">Account</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>

    <section class="slideshow-container">
        <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
        <div class="slides">
            <video autoplay muted loop>
                <source src="assets/13162903_3840_2160_30fps.mp4" type="video/mp4">
            </video>
        </div>
        <div class="slides">
            <video autoplay muted loop>
                <source src="assets/5155396-uhd_3840_2160_30fps.mp4" type="video/mp4">
            </video>
        </div>
        <button class="next" onclick="changeSlide(1)">&#10095;</button>
    </section>

    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>Company</h3>
                <a href="about.php">About Us</a>
                <a href="contact.php">Contact</a>
                <a href="careers.php">Careers</a>
            </div>
            <div class="footer-section">
                <h3>Support</h3>
                <a href="faq.php">FAQs</a>
                <a href="help.php">Help Center</a>
                <a href="terms.php">Terms of Service</a>
            </div>
            <div class="footer-section">
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="#"><img src="assets/facebook.png" alt="Facebook"></a>
                    <a href="#"><img src="assets/twitter.png" alt="Twitter"></a>
                    <a href="#"><img src="assets/instagram.png" alt="Instagram"></a>
                </div>
            </div>
        </div>
        <p>&copy; 2025 Subhyatara.com | Your Travel Partner</p>
    </footer>

    <script>
        let slideIndex = 0;
        const slides = document.querySelectorAll(".slides");

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.style.display = i === index ? "block" : "none";
            });
        }

        function changeSlide(n) {
            slideIndex = (slideIndex + n + slides.length) % slides.length;
            showSlide(slideIndex);
        }

        document.addEventListener("DOMContentLoaded", () => {
            if (slides.length > 0) {
                showSlide(slideIndex);
                setInterval(() => changeSlide(1), 3000);
            }
        });
    </script>
</body>
</html>
