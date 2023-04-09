<?php require admin_view('static/header') ?>

<div class="box-">
    <h1>
        Sayfalar
        <a href="<?= admin_url('add-page') ?>">Yeni Ekle</a>
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Başlık</th>
                <th class="hide">Yayın Tarihi</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $row) : ?>
                <tr>

                    <td>
                        <?= $row['page_title'] ?>

                    </td>
                    <td class="hide" title="<?= $row['page_date'] ?>">
                        <?= timeConvert($row['page_date']) ?>
                    </td>

                    <td>
                        <a href="<?= site_url('sayfa/' . $row['page_url']) ?>" class="btn" target="_blank">Görüntüle</a>
                        <a href="<?= admin_url('edit-pages?id=' . $row['page_id']) ?>" class="btn">Düzenle</a>
                        <a onclick="return confirm('Silme işlemine devam ediyorsunuz?')" href="<?= admin_url('delete?table=pages&column=page_id&id=' . $row['page_id']) ?>" class="btn">Sil</a>
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