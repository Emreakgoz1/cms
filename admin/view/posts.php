<?php require admin_view('static/header') ?>

<div class="box-">
    <h1>
        Konular
        <a href="<?= admin_url('add-post') ?>">Yeni Ekle</a>
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Konu Başlığı</th>
                <th class="hide">Yazım Tarihi</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $row) : ?>
                <tr>

                    <td>
                        <?= $row['post_title'] ?>

                    </td>
                    <td class="hide" title="<?= $row['post_date'] ?>">
                        <?= timeConvert($row['post_date']) ?>
                    </td>

                    <td>
                        <a href="<?= site_url('sayfa/' . $row['post_url']) ?>" class="btn" target="_blank">Görüntüle</a>
                        <a href="<?= admin_url('edit-post?id=' . $row['post_id']) ?>" class="btn">Düzenle</a>
                        <a onclick="return confirm('Silme işlemine devam ediyorsunuz?')" href="<?= admin_url('delete?table=posts&column=post_id&id=' . $row['post_id']) ?>" class="btn">Sil</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php if ($totalRecord > $pageLimit) : ?>
    <div class="pagination">
        <ul>
            <?= $db->showPagination(admin_url(route(1) . '?' . $pageParam . '=[page]')) ?>
        </ul>
    </div>
<?php endif; ?>

<?php require admin_view('static/footer') ?>