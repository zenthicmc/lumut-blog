<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - My Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Full Page Layout */
        html, body {
            height: 100%;
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .wrapper {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1;
        }
        /* Navbar */
        .navbar {
            background: #ffffff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-weight: bold;
            color: #007bff;
        }
        /* Hero Section */
        .hero {
            background: linear-gradient(to right, #007bff, #6610f2);
            color: white;
            text-align: center;
            padding: 50px 20px;
        }
        /* Post Section */
        .post-container {
            max-width: 800px;
            margin: auto;
            padding: 40px 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .post-title {
            font-size: 2rem;
            font-weight: bold;
            color: #007bff;
        }
        .post-meta {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 15px;
        }
        .post-content {
            line-height: 1.8;
            font-size: 1.1rem;
        }
        /* Footer */
        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: auto;
        }
        .btn-custom {
            background: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">My Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home.index') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
                <div>
                    <a href="{{ route('auth.login') }}" class="btn btn-outline-primary me-2">Login</a>
                    <a href="{{ route('auth.register') }}" class="btn btn-primary">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <h1>My Blog</h1>
        <p>Stay Updated with the Latest Articles</p>
    </div>

    <!-- Post Detail Section -->
    <div class="content mt-5">
        <div class="post-container">
            <h1 class="post-title">{{ $post->title }}</h1>
            <p class="post-meta">Published on {{ \Carbon\Carbon::parse($post->date)->locale('id')->isoFormat('D MMMM Y HH:mm') }}</p>
            <hr>
            <div class="post-content">
                {!! $post->content !!}
            </div>
            <hr>
            <a href="{{ route('home.index') }}" class="btn btn-custom">← Back to Home</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 My Blog. All Rights Reserved.</p>
    </footer>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
