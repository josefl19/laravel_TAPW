<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
    <table class="table table-bordered">
        <tr>
            <th><a href="/home">Home</a></th>
            <th><a href="/services">Services</a></th>
            <th><a href="/products">Products</a></th>
            <th><a href="/faq">FAQ</a></th>
            <th><a href="/contact">Contact Us</a></th>
        </tr>
    </table>
    <div class="container">
        @yield('content') <!-- sobreeescribe solo la seccion, en este caso dependiendo de la ruta del menú. Describe a una parte dinamica de la pagina, los demas son elementos estaticos (no cambian de seccion) -->
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>