<div class="admin">
    <a class="btn btn-success" href="/admin" role="button">Вернутся к новостям</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Дата</th>
            <th>Текст</th>
            <th>Функции</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($commentaries as $comment): ?>
            <tr>
                <td><?= $comment['commentaries_id'] ?></td>
                <td><?= $comment['date'] ?> </td>
                <td><?= $comment['text'] ?></td>
                <td>
                    <a class="btn btn-danger" href="/admin/deletecomment/<?= $comment['id'] ?>"
                       role="button">Удалить</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>