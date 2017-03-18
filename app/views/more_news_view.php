<?php foreach ($news as $new): ?>
    <div class="news-item ">
        <a href="/news/index/<?= $new['id'] ?>">
            <img src="/img/<?= $new['image'] ?>">
        </a>
        <div class="news-item-info">
            <input type="hidden" id="news_id" value="<?= $new['id']; ?>">
            <small><?= $new['Date'] ?></small>
            <p><?= $new['Text'] ?></p>
            <a href="/news/index/<?= $new['id'] ?>">Подробнее</a>
        </div>
    </div>
<?php endforeach; ?>
<?php if ($moreNews): ?>
    <button id="button_pagination" type="button" class="btn btn-warning">Больше новостей</button>
<?php endif; ?>