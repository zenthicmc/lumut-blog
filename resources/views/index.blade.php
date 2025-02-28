<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog - Home</title>
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
            border-bottom: 1px solid #ddd;
        }
        .navbar-brand {
            font-weight: bold;
            color: #007bff;
        }
        /* Hero Section */
        .hero {
            background: #007bff;
            color: white;
            text-align: center;
            padding: 50px 20px;
        }
        /* Blog Posts */
        .post-container {
            max-width: 1200px;
            margin: auto;
            padding: 40px 20px;
        }
        .post-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
        .post-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 10px;
        }
        .post-meta {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
        .post-content {
            line-height: 1.6;
            font-size: 1rem;
        }
        .btn-custom {
            background: #007bff;
            color: white;
            padding: 8px 16px;
            border-radius: 25px;
            text-decoration: none;
        }
        .btn-custom:hover {
            background: #0056b3;
        }
        /* Pagination */
        .pagination {
            justify-content: center;
        }
        /* Footer */
        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: auto;
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
        <h1>Welcome to My Blog</h1>
        <p>Stay Updated with the Latest Articles</p>
    </div>

    <!-- Blog Posts Section -->
    <div class="content mt-5">
        <div class="post-container">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-4 mb-4">
                        <div class="post-card">
                            <h2 class="post-title">{{ $post->title }}</h2>
                            <p class="post-meta">Published on {{ \Carbon\Carbon::parse($post->date)->locale('id')->isoFormat('D MMMM Y HH:mm') }}</p>
                            <p class="post-content">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                            <a href="{{ route('home.show', $post->idpost) }}" class="btn-custom">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Bootstrap Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {!! $posts->links('pagination::bootstrap-4') !!}
            </div>
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
