<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Référence</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <br>
    <br>
    <div class="container">

        <h4>Ajouter une Référence à l'Article "{{ $article->title }}"</h4>

        <form action="{{ route('admin.reference.store', $article->id) }}" method="POST">
            @csrf
<br>
<br>
<br>
            <div class="form-group">

                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-success mt-3">Ajouter la Référence</button>
        </form>
    </div>
</body>
</html>