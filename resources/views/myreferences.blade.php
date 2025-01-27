<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Références</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Mes Références</h2>

        @if ($articles->isEmpty())
            <p class="text-muted">Vous n'avez pas encore ajouté de références !</p>
        @else
            @foreach($articles as $article)
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>{{ $article->title }}</h5>
                        <small class="text-muted">Par {{ $article->researcher->firstName }} {{ $article->researcher->lastName }}</small>
                    </div>
                    <div class="card-body">
                        @if ($article->references->isEmpty())
                            <p class="text-muted">Aucune référence ajoutée pour cet article.</p>
                        @else
                            @foreach($article->references as $reference)
                                <form action="{{ route('home.updateReference', $reference->id) }}" method="POST" class="mb-3">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group mb-2">
                                        <label for="description-{{ $reference->id }}">Référence</label>
                                        <textarea class="form-control" id="description-{{ $reference->id }}" name="description" rows="3" required>{{ $reference->description }}</textarea>
                                    </div>

                                    <button type="submit" class="btn btn-success">Mettre à jour la Référence</button>
                                </form>
                            @endforeach
                        @endif
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
