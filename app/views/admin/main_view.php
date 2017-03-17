<div class="admin">
    <a class="btn btn-success" href="/admin/add" role="button">Добавить новость</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Сокращенный текст</th>
            <th>Весь текст</th>
            <th>Дата</th>
            <th>Картинка</th>
            <th>Функции</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($news as $one): ?>
            <tr>
                <td><?= $one['id'] ?></td>
                <td><?= $one['Text'] ?> </td>
                <td><?= $one['more'] ?></td>
                <td><?= $one['Date'] ?></td>
                <td><?= $one['image'] ?></td>
                <td>
                    <a class="btn btn-primary" href="/admin/edit/<?= $one['id'] ?>" role="button">Редактировать</a>
                    <a class="btn btn-primary" href="/admin/commentaries/<?= $one['id'] ?>"
                       role="button">Комментарии</a>
                    <a class="btn btn-danger" href="/admin/delete/<?= $one['id'] ?>" role="button">Удалить</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>