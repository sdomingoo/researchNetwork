<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
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
        .btn-outline-primary {
            color: #0d6efd;
            border-color: #0d6efd;
        }
        .btn-outline-primary:hover {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        select {
            border-radius: 5px;
            padding: 0.5rem;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .d-grid .btn {
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2>SIGN UP</h2>
        <form method="post" action="{{ route('researcherCreate.store') }}">
            @csrf
            @method('post')

            <div class="form-group row">
                <label class="col-form-label col-sm-2" for="fname">Prenom :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="fname" name="firstName" placeholder="Enter your first name" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-2" for="lname">Nom :</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="lname" name="lastName" placeholder="Enter your last name" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-2" for="fields">Filière :</label>
                <div class="col-sm-10">
                    <select class="form-control" name="fields" id="fields" required>
                        <option selected>Sélectionner une Filière</option>
                        @foreach($fields as $field)
                            <option value="{{ $field->id }}">{{ $field->fieldName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-2" for="password">Mot de passe:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-sm-2 col-sm-4 d-grid">
                    <button name="submit" type="submit" class="btn btn-primary">Signup</button>
                </div>
                <div class="col-sm-4 d-grid">
                    <a href="/login" class="btn btn-outline-primary">Login</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
