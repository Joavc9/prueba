<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Datos</title>
</head>
<body>
    <div class="container mt-3" style="height: 400px;border:1px solid red;">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Número de contacto</th>
                <th scope="col">Apellido</th>
                <th scope="col">Fecha de creación</th>
            </tr>
        </thead>
            <tbody id="load">
                
            </tbody>
        </table>
    </div>
    <div class="d-flex align-items-end">
        <button class="btn btn-primary mt-1" type="button" onclick="load(this)">Obtener</button>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="view/js/main.js"></script>
</body>
</html>