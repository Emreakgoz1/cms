<?php require admin_view('static/header') ?>

<div class="box-">
    <h1>
        <?= $row['reference_title'] ?> - Resimler
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="box-" tab>

    <div class="admin-tab">
        <ul tab-list>
            <li>
                <a href="#">Genel</a>
            </li>
        </ul>
    </div>

    <form action="" method="post" class="form label" enctype="multipart/form-data">
        <div class="tab-container">
            <div tab-content>
                <ul>
                    <li>
                        <label>Resim Yükle</label>
                        <div class="form-content">
                            <input type="file" name="images[]" multiple>
                        </div>
                    </li>
                </ul>
            </div>
            <ul>
                <li class="submit">
                    <input type="hidden" name="submit" value="1">
                    <button type="submit">Yükle</button>
                </li>
            </ul>
        </div>
    </form>
</div>

<div class="box-">
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Resim</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $image) : ?>
                    <tr>
                        <td>
                            <img src="<?= site_url('upload/reference/' . $row['reference_url'] . '/' . $image['image_url']) ?>" alt="" width="100">
                        </td>
                        <td>

                            <a href="<?= admin_url('edit-reference-image?id=' . $image['image_id']) ?>" class="btn">Düzenle</a>


                            <a onclick="return confirm('Silme işlemine devam ediyorsunuz?')" href="<?= admin_url('delete?table=referenece_images&column=image_id&id=' . $image['image_id']) ?>" class="btn">Sil</a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require admin_view('static/footer') ?>