<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Références pour l'Article</title>
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
        h4 {
            text-align: center;
            color: #0d6efd;
            font-weight: bold;
            margin-bottom: 30px;
        }
        label {
            font-weight: bold;
            color: #555;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .alert {
            border-radius: 5px;
            font-weight: bold;
        }
        .btn-close {
            padding: 0.3rem;
        }
        .d-grid .btn {
            padding: 10px 20px;
        }
        table th, table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h4>Références pour l'Article "{{ $article->title }}"</h4>

        <a href="{{ route('admin.reference.create', $article->id) }}" class="btn btn-primary">Ajouter une Référence</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($references as $reference)
                    <tr>
                        <td>{{ $reference->description }}</td>
                        <td>
                            <a href="{{ route('admin.reference.edit', $reference->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('admin.reference.destroy', $reference->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $references->links() }}
    </div>
</body>
</html>
