<h1>Notas o Seguimientos</h1>

<form method="POST" action="index.php?controller=note&method=store">
    <textarea name="message" placeholder="Escribe una nota..." required></textarea>
    <br>
    <button type="submit">Guardar Nota</button>
</form>

<hr>

<h2>Listado de notas</h2>

<ul>
    <?php foreach ($notes as $n): ?>
        <li>
            <?= $n['message'] ?>
            <a href="index.php?controller=note&method=delete&id=<?= $n['id'] ?>">Eliminar</a>
        </li>
    <?php endforeach; ?>
</ul>
