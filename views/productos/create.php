<link rel="stylesheet" href="css/styles.css">
<h2>Crear Producto</h2>

<?php foreach($errors as $e): ?>
<p style="color:red"><?= $e ?></p>
<?php endforeach; ?>

<form method="POST" action="index.php?controller=producto&action=store">
Nombre: <input name="nombre"><br>
Descripción: <textarea name="descripcion"></textarea><br>
Precio: <input type="number" step="0.01" name="precio"><br>
Stock: <input type="number" name="stock"><br>
<button>Guardar</button>
</form>
