<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer Information</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Custom CSS (same as ai.blade.php) -->
    <style>
        :root {
            --sidebar-width: 250px;
        }

        body {
            background-color: #f8f9fa;
            padding-top: 2rem;
            padding-bottom: 2rem;
            display: flex;
            min-height: 100vh;
        }

        /* Fixed Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background-color: #343a40;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            height: 100%;
            padding: 0;
            overflow-y: auto;
            z-index: 1000;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar-brand {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #4b545c;
            margin-bottom: 0;
        }

        .sidebar-brand a {
            text-decoration: none;
            color: inherit;
        }

        .sidebar-brand h4 {
            margin: 0;
            color: white;
            font-weight: 600;
        }

        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-nav li {
            padding: 12px 20px;
            border-bottom: 1px solid #4b545c;
            transition: all 0.2s;
        }

        .sidebar-nav li:hover {
            background-color: #495057;
        }

        .sidebar-nav li a {
            color: #adb5bd;
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: all 0.2s;
        }

        .sidebar-nav li a.active {
            color: white;
            background-color: #495057;
        }

        .sidebar-nav li a i {
            margin-right: 10px;
            font-size: 1.1rem;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            flex: 1;
            padding: 30px;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        /* Developer Profile Styles */
        .developer-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        .developer-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #f0f7ff;
            margin: 0 auto 1.5rem;
            display: block;
        }

        .developer-name {
            font-size: 1.8rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 1rem;
            color: #343a40;
        }

        .developer-title {
            font-size: 1.1rem;
            text-align: center;
            color: #6c757d;
            margin-bottom: 2rem;
        }

        .developer-bio {
            line-height: 1.8;
            color: #495057;
            margin-bottom: 2rem;
        }

        .developer-links {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            margin-top: 2rem;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 1.5rem;
        }

        .social-links a {
            color: #495057;
            font-size: 1.5rem;
            transition: all 0.3s;
        }

        .social-links a:hover {
            color: #0d6efd;
            transform: translateY(-3px);
        }
    </style>
</head>

<body>

    <!-- Sidebar (same as ai.blade.php) -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <h4><a href="/">CancerCare</a></h4>
        </div>
        <ul class="sidebar-nav">
            <li>
                <a href="/">
                    <i class="bi bi-camera"></i> AI Detector
                </a>
            </li>
            <li>
                <a href="/dev" class="active">
                    <i class="bi bi-code-slash"></i> Developer
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <div class="developer-container">
                <!-- Developer Photo -->
                <img src="{{ asset('images/developer.jpg') }}" alt="Developer Photo" class="developer-photo">

                <!-- Developer Name -->
                <h1 class="developer-name">Apriansyah Wibowo</h1>

                <!-- Developer Title -->
                <p class="developer-title">MAPRES UTAMA 1 UNNES | AI and Software Engineer at UEESRG</p>

                <!-- Developer Bio -->
                <div class="developer-bio">
                    <p>Hello! I'm the developer behind this Skin Cancer AI Detector application. With a background in
                        artificial intelligence and healthcare technology, I've created this tool to help people get
                        preliminary assessments of potential skin cancer symptoms.</p>

                    <p>This project combines Convolutional Neural Networks with architecture of Mobile-Net from medical
                        imaging to provide accessible healthcare screening. While not a replacement for professional
                        medical diagnosis, it serves as an early detection tool that can prompt users to seek proper
                        medical attention.</p>
                </div>

                <!-- Developer Links -->
                <div class="developer-links">
                    <p class="text-center mb-0">Connect with me or learn more about my work:</p>

                    <div class="social-links">
                        <a href="https://instagram.com/brianwibowoo" target="_blank"><i class="bi bi-instagram"></i></a>
                        <a href="https://github.com/brianwibowo" target="_blank"><i class="bi bi-github"></i></a>
                        <a href="https://www.linkedin.com/in/apriansyah-wibowo-a59379248/" target="_blank"><i
                                class="bi bi-linkedin"></i></a>
                        <a href="sultanapri86@gmail.com" target="_blank"><i class="bi bi-envelope-fill"></i></a>
                    </div>
                </div>

                <!-- Identity Link -->
                <div class="text-center mt-4">
                    <small class="text-muted">
                        View my complete professional profile at
                        <a href="https://linktr.ee/apriansyah.wibowo" target="_blank">Apriansyah Wibowo</a>
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
