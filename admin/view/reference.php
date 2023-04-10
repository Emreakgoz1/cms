<?php require admin_view('static/header') ?>

<div class="box-">
    <h1>
        Referanslar
        <a href="<?= admin_url('add-reference') ?>">Yeni Ekle</a>
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Referans</th>
                <th class="hide">Eklenme Tarihi</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $row) : ?>
                <tr>

                    <td>
                        <?= $row['reference_title'] ?>

                    </td>
                    <td class="hide" title="<?= $row['reference_date'] ?>">
                        <?= timeConvert($row['reference_date']) ?>
                    </td>

                    <td>
                        <a href="<?= site_url('sayfa/' . $row['post_url']) ?>" class="btn" target="_blank">Görüntüle</a>
                        <a href="<?= admin_url('edit-reference?id=' . $row['reference_id']) ?>" class="btn">Düzenle</a>
                        <a onclick="return confirm('Silme işlemine devam ediyorsunuz?')" href="<?= admin_url('delete?table=reference&column=reference_id&id=' . $row['reference_id']) ?>" class="btn">Sil</a>
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