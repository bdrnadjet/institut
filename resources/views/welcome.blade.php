<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>معهد السياحة و الفندقة - Tourism and Hospitality Institute</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;900&family=Poppins:wght@400;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary: #0891B2;
            --secondary: #F59E0B;
            --dark: #0F172A;
            --light: #F8FAFC;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        .arabic-text {
            font-family: 'Tajawal', sans-serif;
        }

        /* Hero Section */
        .hero-section {
            min-height: 100vh;
            background: linear-gradient(135deg, #0891B2 0%, #0E7490 50%, #155E75 100%);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.05" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: cover;
            background-position: bottom;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: white;
            text-align: center;
        }

        .hero-title-ar {
            font-size: 4rem;
            font-weight: 900;
            margin-bottom: 1rem;
            text-shadow: 2px 4px 8px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 1s ease;
        }

        .hero-title-en {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            opacity: 0.95;
            animation: fadeInUp 1.2s ease;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
            animation: fadeInUp 1.4s ease;
        }

        .hero-buttons {
            animation: fadeInUp 1.6s ease;
        }

        .btn-hero {
            padding: 1rem 2.5rem;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            margin: 0.5rem;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-hero-primary {
            background: var(--secondary);
            color: white;
            box-shadow: 0 8px 20px rgba(245, 158, 11, 0.3);
        }

        .btn-hero-primary:hover {
            background: #D97706;
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(245, 158, 11, 0.4);
        }

        .btn-hero-secondary {
            background: white;
            color: var(--primary);
            box-shadow: 0 8px 20px rgba(255, 255, 255, 0.2);
        }

        .btn-hero-secondary:hover {
            background: var(--light);
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(255, 255, 255, 0.3);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* About Section */
        .about-section {
            padding: 6rem 0;
            background: white;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--secondary);
            border-radius: 2px;
        }

        /* Programs Section */
        .programs-section {
            padding: 6rem 0;
            background: linear-gradient(135deg, #F8FAFC 0%, #E2E8F0 100%);
        }

        .program-card {
            background: white;
            border-radius: 16px;
            padding: 2.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
            border: none;
        }

        .program-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .program-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), #0E7490);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            color: white;
            font-size: 2.5rem;
        }

        .program-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        /* Features Section */
        .features-section {
            padding: 6rem 0;
            background: white;
        }

        .feature-item {
            text-align: center;
            padding: 2rem;
        }

        .feature-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, var(--secondary), #D97706);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 3rem;
        }

        /* CTA Section */
        .cta-section {
            padding: 6rem 0;
            background: linear-gradient(135deg, var(--dark) 0%, #1E293B 100%);
            color: white;
            text-align: center;
        }

        /* Footer */
        .footer {
            background: #0F172A;
            color: white;
            padding: 3rem 0 1.5rem;
        }

        .footer a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer a:hover {
            color: white;
        }

        @media (max-width: 768px) {
            .hero-title-ar {
                font-size: 2.5rem;
            }

            .hero-title-en {
                font-size: 1.5rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title-ar arabic-text">معهد السياحة و الفندقة</h1>
                <h2 class="hero-title-en">Tourism and Hospitality Institute</h2>
                <p class="hero-subtitle">Shaping the Future of Tourism & Hospitality Excellence</p>
                <div class="hero-buttons">
                    <a href="{{ route('register') }}" class="btn btn-hero btn-hero-primary">
                        <i class="bi bi-file-earmark-text"></i> Apply Now
                    </a>
                    <a href="{{ route('login') }}" class="btn btn-hero btn-hero-secondary">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="section-title">About Our Institute</h2>
                    <p class="lead mt-4">Welcome to the Tourism and Hospitality Institute, where we cultivate the next
                        generation of industry leaders.</p>
                    <p class="text-muted">Our institute offers world-class education in tourism management, hotel
                        operations, culinary arts, and hospitality services. With state-of-the-art facilities and
                        experienced faculty, we prepare students for successful careers in the dynamic tourism and
                        hospitality sector.</p>
                    <div class="mt-4">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-check-circle-fill text-success fs-4 me-3"></i>
                            <span>Internationally Recognized Programs</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-check-circle-fill text-success fs-4 me-3"></i>
                            <span>Industry-Experienced Faculty</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-check-circle-fill text-success fs-4 me-3"></i>
                            <span>Modern Training Facilities</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-center">
                        <i class="bi bi-building" style="font-size: 15rem; color: var(--primary); opacity: 0.1;"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section class="programs-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Our Programs</h2>
                <p class="lead mt-3">Explore our comprehensive range of programs</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="bi bi-globe"></i>
                        </div>
                        <h3 class="program-title">Tourism Management</h3>
                        <p class="text-muted">Master the art of tourism planning, destination management, and
                            sustainable tourism practices.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <h3 class="program-title">Hotel Management</h3>
                        <p class="text-muted">Learn hotel operations, guest services, and hospitality management from
                            industry experts.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="bi bi-cup-hot"></i>
                        </div>
                        <h3 class="program-title">Culinary Arts</h3>
                        <p class="text-muted">Develop culinary skills and food service management expertise in our
                            modern kitchens.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Why Choose Us</h2>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <h4>Excellence</h4>
                        <p class="text-muted">Top-tier education standards</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h4>Expert Faculty</h4>
                        <p class="text-muted">Industry professionals</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-briefcase"></i>
                        </div>
                        <h4>Career Support</h4>
                        <p class="text-muted">Job placement assistance</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-mortarboard"></i>
                        </div>
                        <h4>Certification</h4>
                        <p class="text-muted">Recognized qualifications</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="display-4 fw-bold mb-4">Ready to Start Your Journey?</h2>
            <p class="lead mb-4">Join معهد السياحة و الفندقة and build your future in tourism and hospitality</p>
            <a href="{{ route('register') }}" class="btn btn-hero btn-hero-primary btn-lg">
                <i class="bi bi-file-earmark-text"></i> Submit Your Application
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="arabic-text">معهد السياحة و الفندقة</h5>
                    <p class="text-muted">Tourism and Hospitality Institute</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h6>Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('register') }}">Apply Now</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h6>Contact</h6>
                    <p class="text-muted">
                        <i class="bi bi-envelope"></i> info@tourism-institute.edu<br>
                        <i class="bi bi-telephone"></i> +123 456 7890
                    </p>
                </div>
            </div>
            <hr class="bg-secondary">
            <div class="text-center text-muted">
                <p>&copy; {{ date('Y') }} Tourism and Hospitality Institute. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>