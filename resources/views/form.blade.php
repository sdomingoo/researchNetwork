<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Ajouter une filiere</title>
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
        h2 {
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
    </style>
</head>
<body>
<div class="container my-5">
    <h2>Ajouter une Filière </h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Validation Errors -->
    @if($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ $errors->first() }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('field.store') }}">
        @csrf
        <div class="row mb-3">
            <label for="fieldName" class="col-form-label col-sm-2">Filière :</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" id="fieldName" name="fieldName" value="{{ old('fieldName') }}" placeholder="Enter field name">
            </div>
        </div>

        <div class="row mb-3">
            <div class="offset-sm-2 col-sm-4 d-grid">
                <button type="submit" class="btn btn-primary">Ajouter unr Filière</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
