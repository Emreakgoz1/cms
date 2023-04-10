<?php require admin_view('static/header') ?>

<div class="box-">
    <h1>
        Kategoriler
        <a href="<?= admin_url('add-reference-category') ?>">Yeni Ekle</a>
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Kategori Adı</th>
                <th class="hide">Eklenme Tarihi</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody class="table-sortable" data-table="reference_categories" data-where="category_id" data-column="category_order">
            <?php foreach ($query as $row) : ?>
                <tr id="id_<?= $row['category_id'] ?>">
                    <td>
                        <a href=" <?= admin_url('edit-reference_category?id=' . $row['category_id']) ?>" class="title">
                            <?= $row['category_name'] ?>
                        </a>
                    </td>
                    <td class="hide">
                        <?= $row['user_email'] ?>
                    </td>
                    <td class="hide">
                        <?= timeConvert($row['category_date']) ?>
                    </td>
                    <td>
                        <a href="<?= admin_url('edit-reference-category?id=' . $row['category_id']) ?>" class="btn">Düzenle</a>
                        <a onclick="return confirm('Silme işlemine devam ediyorsunuz?')" href="<?= admin_url('delete?table=reference-categories&column=category_id&id=' . $row['category_id']) ?>" class="btn">Sil</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require admin_view('static/footer') ?>