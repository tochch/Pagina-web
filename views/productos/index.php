<link rel="stylesheet" href="css/styles.css">

<h1>Productos</h1>
<a href="index.php?controller=producto&action=create">Nuevo</a>

<table border="1">
<tr>
<th>Nombre</th>
<th>Precio</th>
<th>Stock</th>
<th>Acciones</th>
</tr>

<?php while($p = $productos->fetch_object()): ?>
<tr>
<td><?= $p->nombre ?></td>
<td><?= $p->precio ?></td>
<td><?= $p->stock ?></td>
<td>
<a href="index.php?controller=producto&action=edit&id=<?= $p->id ?>">Editar</a>
<a href="index.php?controller=producto&action=delete&id=<?= $p->id ?>">Eliminar</a>
</td>
</tr>
<?php endwhile; ?>
</table>
