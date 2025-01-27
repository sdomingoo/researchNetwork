<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Mettre à jour </title>
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
        .btn {
            border-radius: 5px;
            padding: 5px 10px;
        }
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .btn-primary:hover {
            background-color: #084298;
            border-color: #06357a;
        }
        .btn-outline-primary {
            border-radius: 5px;
        }
        .alert {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2>Mettre à jour le chercheur</h2>

        <!-- Display Error Message -->
        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        ?>

        <form method="post" action="{{route('researcher.update', $selectedResearcher->id)}}">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-form-label col-sm-2" for="fname">Prenom :</label>
                <div class="col-sm-6">
                    <input value="{{ $selectedResearcher->firstName }}" class="form-control" type="text" id="fname" name="firstName">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label col-sm-2" for="lname">Nom :</label>
                <div class="col-sm-6">
                    <input value="{{ $selectedResearcher->lastName }}" class="form-control" type="text" id="lname" name="lastName">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-form-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-6">
                    <input value="{{ $selectedResearcher->email }}" class="form-control" type="email" id="email" name="email">
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-2 col-sm-3 d-grid">
                    <button name="submit" type="submit" class="btn btn-primary">Mettre à jour </button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="read.php">Annuler</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
