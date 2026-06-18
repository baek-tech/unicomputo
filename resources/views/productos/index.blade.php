<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Unicomputo - Gestión de Productos</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Segoe UI', sans-serif;
}

body{
    background:#f4f6f9;
}

.header{
    background:#1e293b;
    color:white;
    padding:20px 40px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 2px 10px rgba(0,0,0,.15);
}

.logo{
    font-size:24px;
    font-weight:bold;
}

.subtitulo{
    color:#cbd5e1;
    font-size:14px;
}

.container{
    width:95%;
    max-width:1400px;
    margin:30px auto;
}

.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
    margin-bottom:25px;
}

.card{
    background:white;
    border-radius:12px;
    padding:20px;
    box-shadow:0 3px 10px rgba(0,0,0,.08);
}

.card h3{
    color:#64748b;
    margin-bottom:10px;
    font-size:15px;
}

.card p{
    font-size:28px;
    font-weight:bold;
    color:#1e293b;
}

.panel{
    background:white;
    border-radius:12px;
    box-shadow:0 3px 10px rgba(0,0,0,.08);
    overflow:hidden;
}

.panel-header{
    padding:20px;
    border-bottom:1px solid #e2e8f0;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.btn{
    background:#2563eb;
    color:white;
    text-decoration:none;
    padding:10px 18px;
    border-radius:8px;
    font-weight:600;
}

.btn:hover{
    background:#1d4ed8;
}

table{
    width:100%;
    border-collapse:collapse;
}

thead{
    background:#1e293b;
    color:white;
}

th,td{
    padding:15px;
    text-align:left;
}

tbody tr{
    border-bottom:1px solid #e5e7eb;
}

tbody tr:hover{
    background:#f8fafc;
}

.badge{
    background:#e0f2fe;
    color:#0369a1;
    padding:5px 10px;
    border-radius:20px;
    font-size:13px;
}

.btn-edit{
    background:#f59e0b;
    color:white;
    padding:8px 12px;
    border-radius:6px;
    text-decoration:none;
    margin-right:5px;
}

.btn-delete{
    background:#dc2626;
    color:white;
    padding:8px 12px;
    border:none;
    border-radius:6px;
    cursor:pointer;
}

.empty{
    text-align:center;
    padding:40px;
    color:#64748b;
}

</style>
</head>

<body>

<header class="header">

    <div>
        <div class="logo">UNICOMPUTO</div>
        <div class="subtitulo">
            Sistema de Gestión de Productos
        </div>
    </div>

    <div>
        Administrador
    </div>

</header>

<div class="container">

    <div class="cards">

        <div class="card">
            <h3>Total Productos</h3>
            <p>{{ $productos->count() }}</p>
        </div>

        <div class="card">
            <h3>Categorías Registradas</h3>
            <p>{{ $productos->pluck('categoria')->unique()->count() }}</p>
        </div>

    </div>

    <div class="panel">

        <div class="panel-header">

            <h2>Inventario General</h2>

            <a href="{{ route('productos.create') }}" class="btn">
                + Nuevo Producto
            </a>

        </div>

        <table>

            <thead>
                <tr>
                    <th>Código</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

            @forelse($productos as $producto)

                <tr>

                    <td>{{ $producto->codigo }}</td>

                    <td>{{ $producto->nombre }}</td>

                    <td>
                        ${{ number_format($producto->precio,0,',','.') }}
                    </td>

                    <td>{{ $producto->cantidad }}</td>

                    <td>
                        <span class="badge">
                            {{ $producto->categoria }}
                        </span>
                    </td>

                    <td>

                        <a href="{{ route('productos.edit',$producto->id) }}"
                           class="btn-edit">
                            Editar
                        </a>

                        <form action="{{ route('productos.destroy',$producto->id) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn-delete">
                                Eliminar
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="6" class="empty">
                        No hay productos registrados.
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>