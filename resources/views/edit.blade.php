
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Article</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Modifier l'Article</h1>

        <form action="{{ route('admin.article.update', $article->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}" required>
            </div>

            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea class="form-control" id="content" name="content" rows="5" required>{{ $article->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="researcher_id">Chercheur</label>
                <select class="form-control" id="researcher_id" name="researcher_id" required>
                    @foreach ($researchers as $researcher)
                        <option value="{{ $researcher->id }}" {{ $researcher->id == $article->researcher_id ? 'selected' : '' }}> {{ $researcher->firstName }} {{ $researcher->lastName }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success mt-3">Mettre à Jour l'Article</button>
        </form>
    </div>
</body>
</html>