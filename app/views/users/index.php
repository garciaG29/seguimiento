<h1>Gestión de Usuarios</h1>

<form method="POST" action="index.php?controller=user&method=store">
    <input type="text" name="name" placeholder="Nombre" required>
    <input type="email" name="email" placeholder="Correo" required>
    <button type="submit">Agregar Usuario</button>
</form>

<hr>

<h2>Listado de Usuarios</h2>

<ul>
    <?php foreach ($users as $u): ?>
        <li>
            <?= $u['name'] ?> (<?= $u['email'] ?>)
            <a href="index.php?controller=user&method=delete&id=<?= $u['id'] ?>">Eliminar</a>
        </li>
    <?php endforeach; ?>
</ul>
