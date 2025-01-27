<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ffffff;
            color: #333;
        }
        .navbar {
            background-color: #2C6E4F; /* Vert ResearchGate */
        }
        .navbar a {
            color: #ffffff !important;
        }
        .section-title {
            font-size: 36px;
            color: #2C6E4F;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .section-content {
            background-color: #f9f9f9;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .section-content p {
            font-size: 18px;
            line-height: 1.6;
            color: #555;
        }
        footer {
            background-color: #2C6E4F;
            color: #ffffff;
            padding: 20px;
            text-align: center;
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
                        <a class="nav-link" href="{{ route('home.index') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.myarticles') }}">Mes Articles</a>
                    </li>
                   
                </ul>
                <span class="navbar-text me-3">
                    Welcome, {{ Session::get('researcherName') }}
                </span>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-light">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- About Section -->
    <div class="container my-5">
        <div class="section-content">
            <h2 class="section-title">À propos de notre plateforme</h2>
            <p>
                Bienvenue sur la plateforme "Research Network", un espace innovant où les chercheurs du monde entier peuvent se connecter, partager et collaborer. Notre objectif est de faciliter l'échange de connaissances scientifiques et de soutenir la recherche à travers des outils numériques avancés.
            </p>
            <p>
                Nous permettons à nos utilisateurs de publier des articles, partager des références, et collaborer sur des projets de recherche interdisciplinaire. Notre plateforme est ouverte à tous les chercheurs, quels que soient leur domaine d'étude ou leur niveau d'expérience.
            </p>
        </div>

        <div class="section-content">
            <h2 class="section-title">Notre mission</h2>
            <p>
                Notre mission est de créer un environnement collaboratif pour les chercheurs, où ils peuvent facilement trouver des partenaires de recherche, partager des découvertes et accéder à des ressources scientifiques. Nous croyons fermement que l'innovation naît de la collaboration et du partage des connaissances.
            </p>
        </div>

        <div class="section-content">
            <h2 class="section-title">Notre vision</h2>
            <p>
                Nous envisageons de faire de "Research Network" une référence mondiale pour les chercheurs en matière de collaboration scientifique. Nous voulons offrir une plateforme qui soit un catalyseur pour les découvertes scientifiques majeures, en soutenant des projets de recherche à travers différentes disciplines.
            </p>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 École Marocaine des Sciences des Ingénieurs. Tous droits réservés.</p>
        <p>Développé par l'équipe de recherche de l'EMSI.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
