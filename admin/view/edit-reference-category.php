<?php require admin_view('static/header') ?>

<div class="box-">
    <h1>
        Referans Kategorisi Düzenle
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
            <li>
                <a href="#">SEO</a>
            </li>
        </ul>
    </div>
    <form action="" method="post" class="form label">
        <div class="tab-container">
            <div tab-content>
                <h1>Kategori Ayarları</h1>
                <br>
                <ul>
                    <li>
                        <label>Kategori Adı</label>
                        <div class="form-content">
                            <input type="text" name="category_name" value="<?= post('category_name') ? post('category_name') : $row['category_name'] ?>">
                        </div>
                    </li>
                </ul>
            </div>
            <div tab-content>
                <h1>SEO Ayarları</h1>
                <br>
                <ul>
                    <li>
                        <label>SEO Url</label>
                        <div class="form-content">
                            <input type="text" name="category_url" value="<?= post('category_url')  ? post('category_url') : $row['category_url'] ?>">
                            <p>Eğer boş bırakırsanız otomatik olarak kategori adını baz alır.</p>
                        </div>
                    </li>
                    <li>
                        <label>SEO Title</label>
                        <div class="form-content">
                            <input type="text" name="category_seo[title]" value="<?= $category_seo['title'] ?>">
                        </div>
                    </li>
                    <li>
                        <label>SEO Description</label>
                        <div class="form-content">
                            <textarea name="category_seo[description]" id="" cols="30" rows="5"><?= $category_seo['description'] ?></textarea>
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