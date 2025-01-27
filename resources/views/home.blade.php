<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ffffff;
            color: #333;
        }
        .navbar {
            background-color: #2C6E4F; 
        }
        .navbar a {
            color: #ffffff !important;
        }
        .btn-primary {
            background-color: #2C6E4F;
        }
        .card-title {
            font-weight: bold;
        }
    </style>
        
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('about') }}">Research Network</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home.index') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.myarticles') }}">Mes Articles</a>
                    </li>
                    <li class="nav-item">
    <a class="nav-link" href="{{ route('home.myreferences') }}">Mes Références</a>
</li>


                    
                </ul>
                <span class="navbar-text me-3">
                    Bienvennue , {{ Session::get('researcherName') }}
                </span>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-light">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Articles Section -->
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Articles récents</h2>
            <a href="{{ route('home.publish') }}" class="btn btn-primary">Publier un Article</a>
        </div>

        @foreach($articles as $article)
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">{{ $article->title }}</h4>
                    <h6 class="card-subtitle mb-2 text-muted">
                        Par {{ $article->researcher->firstName }} {{ $article->researcher->lastName }}
                    </h6>
                    <p class="card-text">{{ substr($article->content, 0, 200) }}...</p>
                    <div class="mt-3">
                        <span class="text-muted">Références : {{ $article->references->count() }}</span>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
