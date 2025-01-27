<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Liste des utilisateurs</title>
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
        table {
            border-collapse: separate;
            border-spacing: 0 10px;
        }
        th {
            background-color: #0d6efd;
            color: #fff;
            font-weight: bold;
            text-align: center;
        }
        td {
            text-align: center;
        }
        .btn {
            border-radius: 5px;
            padding: 5px 10px;
        }
        .btn-success {
            background-color: #198754;
            border-color: #198754;
        }
        .btn-success:hover {
            background-color: #146c43;
            border-color: #0f5132;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #b02a37;
            border-color: #7c2128;
        }
        .input-group select {
            border-radius: 5px 0 0 5px;
        }
        .input-group button {
            border-radius: 0 5px 5px 0;
        }
        .pagination {
            justify-content: center;
        }
    </style>
</head>
<body>
<div class="container my-5">
    <h2>Liste des utilisateurs de la base de données </h2>

    <div class="d-flex justify-content-end mb-3">
        <a class="btn btn-primary" href="/researcher/create" role="button">Signup</a>
    </div>

    <form method="GET" action="{{ route('researcher.search') }}" class="mb-4">
        @csrf
        <div class="input-group">
            <!-- Dropdown to select a field -->
            <select name="field_id" class="form-select">
                <option selected>Sélectionnez une filiere</option>
                @foreach($fields as $field)
                    <option value="{{ $field->id }}">{{ $field->fieldName }}</option>
                @endforeach
            </select>
            <!-- Button to trigger search -->
            <button class="btn btn-success" type="submit" name="submit">Rechercher</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Filiere</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listOfResearchers as $researcher)
            <tr>
                <td>{{ $researcher->id }}</td>
                <td>{{ $researcher->firstName }}</td>
                <td>{{ $researcher->lastName }}</td>
                <td>{{ $researcher->email }}</td>
                <td>{{ $researcher->field->fieldName }}</td>
                <td>
                    <a class="btn btn-success btn-sm" href="{{ route('researcher.show', $researcher->id) }}">Modifier</a>
                    <form action="{{ route('researcher.destroy', $researcher->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $listOfResearchers->links() }}
    </div>
</div>
</body>
</html>
