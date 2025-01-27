<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Articles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Custom Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #0d6efd;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .btn-warning:hover {
            background-color: #d39e00;
            border-color: #d39e00;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }
        .btn-info:hover {
            background-color: #117a8b;
            border-color: #0f6674;
        }
        table th, table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h1>Liste des Articles</h1>
    
      <!--<a href="{{ route('admin.article.create') }}" class="btn btn-primary">Créer un Article</a>-->
        
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->researcher->firstName }} {{ $article->researcher->lastName }}</td>
                        <td>
                            <a href="{{ route('admin.article.edit', $article->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('admin.article.destroy', $article->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                            <a href="{{ route('admin.references.index', $article->id) }}" class="btn btn-info btn-sm">Voir Références</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $articles->links() }}
    </div>
</body>
</html>
