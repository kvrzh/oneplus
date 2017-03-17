<div class="edit">
    <a href="/admin">Вернутся</a>
    <h1>Добавить новость</h1>
    <div class="container">
        <?php if($role == 'add'):?>
        <form role="form" method="post" action="/admin/add">
            <div class="form-group">
                <label for="text">Введите короткое описание</label>
                <textarea name="text" class="form-control" id="text" placeholder="Введите короткое описание"></textarea>
            </div>
            <div class="form-group">
                <label for="more">Введите полный текст новости</label>
                <textarea name="more" class="form-control" id="more"
                          placeholder="Введите полный текст"></textarea>
            </div>
            <div class="form-group">
                <label for="date">Дата</label>
                <input name="date" type="date" class="form-control" id="date" placeholder="Пароль">
            </div>
            <div class="form-group">
                <label for="image">Картинка(Введите название картинки, лежат в папке img)</label>
                <input name="image" type="text" class="form-control" id="image" placeholder="Название картинки">
            </div>
            <button type="submit" class="btn btn-success">Создать</button>
        </form>
        <?php else: ?>
            <form role="form" method="post" action="/admin/edit/<?= $news['id']?>">
                <div class="form-group">
                    <label for="text">Введите короткое описание</label>
                    <textarea name="Text" class="form-control" id="text" placeholder="Введите короткое описание"><?= $news['Text'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="more">Введите полный текст новости</label>
                    <textarea name="more" class="form-control" id="more"
                              placeholder="Введите полный текст"><?= $news['more'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="date">Дата</label>
                    <input name="Date" type="date" class="form-control" id="date" value="<?=$news['Date'] ?>">
                </div>
                <div class="form-group">
                    <label for="image">Картинка(Введите название картинки, лежат в папке img)</label>
                    <input name="image" type="text" class="form-control" id="image" value="<?=$news['image'] ?>">
                </div>
                <button type="submit" name="update" class="btn btn-success">Редактировать</button>
            </form>
        <?php endif; ?>
    </div>
</div>