<?php require admin_view('static/header') ?>

<div class="box-">
    <h1>
        Yorum Düzenle
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>

<!--<div tab>
    <ul tab-list>
        <li> <a href="">1.tab</a> </li>
        <li> <a href="">2.tab</a> </li>
    </ul>
    <div>
        <div class="tab-content">
            1.içerik
        </div>
        <div class="tab-content">
            2.içerik
        </div>
    </div>
</div>
<div tab>
    <ul tab-list>
        <li> <a href="">1.tab</a> </li>
        <li> <a href="">2.tab</a> </li>
    </ul>
    <div>
        <div class="tab-content">
            1.içerik
        </div>
        <div class="tab-content">
            2.içerik
        </div>
    </div>
</div>
-->


<div class="box-">

    <div style="background:rgba(13, 136, 193, 0.07); padding: 15px; border: 1px solid #0D88C1; margin-bottom: 15px; ">
        <a style="color: #0D88C1" href="<?= site_url('blog/' . $row['post_url']) ?>" target="_blank"><strong><?= $row['post_title'] ?></strong></a> için <?= timeConvert($row['comment_date']) ?> <?= $row['user_name'] ? $row['user_name'] : $row['comment_name'] ?> tarafından yazıldı.
    </div>

    <form action="" method="post" class="form label">
        <ul>
            <li>
                <label>Yorum Yazan</label>
                <div class="form-content">
                    <input type="text" name="comment_name" value="<?= post('comment_name') ? post('comment_name') : $row['comment_name'] ?>">
                </div>
            </li>
            <li>
                <label>Yorum E-posta</label>
                <div class="form-content">
                    <input type="text" name="comment_email" value="<?= post('comment_email') ? post('comment_email') : $row['comment_email'] ?>">
                </div>
            </li>
            <li>
                <label>Yorum</label>
                <div class="form-content">
                    <textarea name="comment_content" cols="30" rows="5"><?= post('comment_content') ? post('comment_content') : $row['comment_content'] ?></textarea>
                </div>
            </li>
            <li>
                <label>Yorum E-posta</label>
                <div class="form-content">
                    <select name="comment_status">
                        <option value="1" <?= $row['comment_status'] == 1 ? ' selected' : null ?>>Onaylı </option>
                        <option value="0" <?= $row['comment_status'] == 0 ? ' selected' : null ?>>Onay Bekliyor</option>
                    </select>
                </div>
            </li>

        </ul>
        <ul>
            <li class="submit">
                <input type="hidden" name="submit" value="1">
                <button type="submit">Gönder</button>
            </li>
        </ul>
</div>

</form>
</div>

<?php require admin_view('static/footer') ?>