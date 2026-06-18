<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registrar Producto</title>

<style>

body{
    font-family:Segoe UI,sans-serif;
    background:#f4f6f9;
    margin:0;
}

.header{
    background:#1e293b;
    color:white;
    padding:20px;
}

.container{
    width:90%;
    max-width:700px;
    margin:40px auto;
}

.card{
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 3px 10px rgba(0,0,0,.1);
}

h2{
    margin-bottom:20px;
}

.form-group{
    margin-bottom:15px;
}

label{
    display:block;
    margin-bottom:5px;
    font-weight:bold;
}

input{
    width:100%;
    padding:10px;
    border:1px solid #ccc;
    border-radius:6px;
}

.btn{
    background:#2563eb;
    color:white;
    border:none;
    padding:12px 20px;
    border-radius:6px;
    cursor:pointer;
}

.btn:hover{
    background:#1d4ed8;
}

</style>
</head>
<body>

<div class="header">
    <h1>UNICOMPUTO</h1>
</div>

<div class="container">

    <div class="card">

        <h2>Registrar Producto</h2>

        <form action="{{ route('productos.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label>Código</label>
                <input type="text" name="codigo" required>
            </div>

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" required>
            </div>

            <div class="form-group">
                <label>Precio</label>
                <input type="number" step="0.01" name="precio" required>
            </div>

            <div class="form-group">
                <label>Cantidad</label>
                <input type="number" name="cantidad" required>
            </div>

            <div class="form-group">
                <label>Categoría</label>
                <input type="text" name="categoria" required>
            </div>

            <button type="submit" class="btn">
                Guardar Producto
            </button>

        </form>

    </div>

</div>

</body>
</html>