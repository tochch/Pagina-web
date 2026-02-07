<link rel="stylesheet" href="css/styles.css">
<h2>¿Eliminar <?= $producto->nombre ?>?</h2>

<a href="index.php?controller=producto&action=destroy&id=<?= $producto->id ?>">
Sí, eliminar
</a>

<a href="index.php?controller=producto&action=index">Cancelar</a>
