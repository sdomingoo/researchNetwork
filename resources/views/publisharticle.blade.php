<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier un Article</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Publier un nouvel Article</h2>

        <form method="POST" action="{{ route('home.store') }}">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Contenu</label>
                <textarea name="content" id="content" rows="5" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="reference" class="form-label">Référence</label>
                <textarea name="reference" id="reference" class="form-control" placeholder="Ajouter une référence"></textarea>
            </div>

            <!-- Hidden input for the logged-in researcher's ID -->
            <input type="hidden" name="researcher_id" value="{{ session('researcherId') }}">

            <button type="submit" class="btn btn-success">Publier Article</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
