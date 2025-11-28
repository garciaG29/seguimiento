<h1>Gestión de Tareas</h1>

<form method="POST" action="index.php?controller=task&method=store">
    <input type="text" name="title" placeholder="Nueva tarea" required>
    <button type="submit">Agregar</button>
</form>

<hr>

<h2>Listado</h2>

<ul>
    <?php foreach ($tasks as $t): ?>
        <li>
            <?= $t['title'] ?>
            <a href="index.php?controller=task&method=delete&id=<?= $t['id'] ?>">Eliminar</a>
        </li>
    <?php endforeach; ?>
</ul>
