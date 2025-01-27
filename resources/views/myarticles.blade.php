
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><i class="fas fa-facebook-messenger    "></i> Articles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Mes Articles</h2>

        @if ($articles->isEmpty())
            <p class="text-muted">Vous n'avez pas encore publié d'articles !</p>
        @else
            @foreach($articles as $article)
                <div class="card mb-3">
                    <div class="card-body">
                    <form action="{{ route('home.update', $article->id) }}" method="POST">

                            @csrf
                            @method('PUT')
                           
                            <div class="form-group mb-3">
                                <label for="title-{{ $article->id }}">Titre</label>
                                <input type="text" class="form-control" id="title-{{ $article->id }}" name="title" value="{{ $article->title }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="content-{{ $article->id }}">Contenu</label>
                                <textarea class="form-control" id="content-{{ $article->id }}" name="content" rows="5" required>{{ $article->content }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Mettre à jour l'Article</button>
                        </form>
                    </div>
                </div>
            @endforeach

            <div class="d-flex justify-content-center">
                {{ $articles->links() }}
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>