<?php require admin_view('static/header') ?>

<div class="box-">
    <h1>
        Etiketler
        <a href="<?= admin_url('add-tag') ?>">Yeni Ekle</a>
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Etiket Adı</th>
                <th>Kullanım Sayısı</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $row) : ?>
                <tr>
                    <td>
                        <?= $row['tag_name'] ?>

                    </td>
                    <td>
                        <?= $row['total'] ?>
                    </td>
                    <td>
                        <a href="<?= admin_url('edit-tags?id=' . $row['tag_id']) ?>" class="btn">Düzenle</a>
                        <a onclick="return confirm('Silme işlemine devam ediyorsunuz?')" href="<?= admin_url('delete?table=tags&column=tag_id&id=' . $row['tag_id']) ?>" class="btn">Sil</a>
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