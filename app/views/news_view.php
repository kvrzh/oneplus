<div class="news-one">
    <div class="container">
        <div class="news-info">
            <img src="/img/<?= $new['image'] ?>">
            <small><?= $new['Date'] ?></small>
            <p><?= nl2br($new['more']) ?></p>
            <a href="/">Вернуться к списку новостей</a>
        </div>
        <div class="commentaries">
            <h2>Коментарии</h2>
            <div class="commentary-group">
                <?php foreach ($commentaries as $commentary): ?>
                <div class="commentary">
                    <span><?= $commentary['text'] ?></span>
                    <small><?= $commentary['date'] ?></small>
                </div>
                <?php endforeach; ?>
            </div>
            <form role="form" method="post" action="" >
                <input id="id" type="hidden" value="<?= $new['id'] ?>">
                <div class="form-group">
                    <label for="commentary">Введите комментарий</label>
                    <textarea class="form-control" id="commentary" placeholder="Введите комментарий"></textarea>
                </div>
                <button id="send" type="submit" class="btn btn-primary">Отправить комментарий</button>
            </form>
        </div>
    </div>
</div>