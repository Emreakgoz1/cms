<?php require admin_view('static/header') ?>

<div class="box-">
    <h1>
        <?= $row['reference_title'] ?>
        Resim Düzenle #<?= $row['image_id'] ?>
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
                <h1>Kategori Ayarları</h1>
                <br>
                <ul>
                    <li>
                        <label>Resim Başlığı</label>
                        <div class="form-content">
                            <input type="text" name="image_content[title]" value="<?= isset($content['title']) ? $content['title'] : null ?>">
                        </div>
                    </li>
                    <li>
                        <label>Resim Açıklaması</label>
                        <div class="form-content">
                            <textarea name="image_content[description]" cols="30" rows="10"><?= isset($content['description']) ? $content['description'] : null ?></textarea>
                        </div>
                    </li>
                    <li>
                        <label>Resmi Değiştir</label>
                        <div class="form-content">
                            <input type="file" name="image">
                            <div style="padding-top: 10px">
                                <img src="<?= site_url('upload/reference/' . $row['reference_url'] . '/' . $row['image_url']) ?>" alt="" width="400">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <ul>
                <li class="submit">
                    <input type="hidden" name="submit" value="1">
                    <button type="submit">Güncelle</button>
                </li>
            </ul>
        </div>

    </form>
</div>

<?php require admin_view('static/footer') ?>