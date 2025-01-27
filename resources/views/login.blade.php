<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Login</h2>
                <br>
                @if($errors->any())
                    <div class="alert alert-danger">
                        {{$errors->first()}}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.submit') }}">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-form-label col-sm-2">Email:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="email" name="email" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-sm-2">Mot de passe:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="password" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="offset-sm-2 col-sm-3 d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <div class="col-sm-3 d-grid">
                            <a href="/researcher/create" class="btn btn-outline-primary">Sign Up</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
