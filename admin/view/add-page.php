<?php require admin_view('static/header') ?>

<div class="box-">
    <h1>
        Sayfa Ekle
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
                <h1>Sayfa Ayarları</h1>
                <br>
                <ul>
                    <li>
                        <label>Sayfa Başlığı</label>
                        <div class="form-content">
                            <input type="text" name="page_title" value="<?= post('page_title') ?>">
                        </div>
                    </li>
                    <li>
                        <label>Sayfa İçeriği</label>
                        <div class="form-content">
                            <textarea name="page_content" class="editor" cols="30" rows="10"><?= post('page_content') ?></textarea>
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
                            <input type="text" name="page_url" value="<?= post('page_url') ?>">
                            <p>Eğer boş bırakırsanız otomatik olarak kategori adını baz alır.</p>
                        </div>
                    </li>
                    <li>
                        <label>SEO Title</label>
                        <div class="form-content">
                            <input type="text" name="page_seo[title]" value="">
                        </div>
                    </li>
                    <li>
                        <label>SEO Description</label>
                        <div class="form-content">
                            <textarea name="page_seo[description]" cols="30" rows="5"></textarea>
                        </div>
                    </li>

                </ul>
            </div>
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