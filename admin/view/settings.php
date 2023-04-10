<?php require admin_view('static/header') ?>

<div class="box-">
    <h1>
        Ayarlar
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
                <a href="#">Bakım Modu</a>
            </li>

            <li>
                <a href="#">Tema</a>
            </li>
            <li>
                <a href="#">Yorum</a>
            </li>
        </ul>
    </div>
    <form action="" method="post" class="form label">
        <div class="tab-container">
            <div tab-content>
                <h1>Site Ayarlari</h1>
                <ul>
                    <li>
                        <label>Site Title</label>
                        <div class="form-content">
                            <input type="text" name="settings[title]" value="<?= setting('title') ?>">
                        </div>
                    </li>
                    <li>
                        <label>Site Description</label>
                        <div class="form-content">
                            <input type="text" name="settings[description]" value="<?= setting('description') ?>">
                        </div>
                    </li>
                    <li>
                        <label>Site Keywords</label>
                        <div class="form-content">
                            <input type="text" name="settings[keywords]" value="<?= setting('keywords') ?>">
                        </div>
                    </li>
                    <li>
                        <label>Site Teması</label>
                        <div class="form-content">
                            <select name="settings[theme]">
                                <option value="">- tema seç -</option>
                                <?php foreach ($themes as $theme) : ?>
                                    <option <?= setting('theme') == $theme ? ' selected ' : null ?> value="<?= $theme ?>"><?= $theme ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>Blog Title</label>
                        <div class="form-content">
                            <input type="text" name="settings[blog_title]" value="<?= setting('blog_title') ?>">
                        </div>
                    </li>
                    <li>
                        <label>Blog Description</label>
                        <div class="form-content">
                            <input type="text" name="settings[blog_description]" value="<?= setting('blog_description') ?>">
                        </div>
                    </li>
                </ul>
            </div>
            <div tab-content>
                <h1>Bakım Modu Ayarları</h1>
                <ul>
                    <li>
                        <label>Bakım Modu Açık mı?</label>
                        <div class="form-content">
                            <select name="settings[maintenance_mode]">
                                <option <?= setting('maintenance_mode') == 1 ? ' selected ' : null ?> value="1">Evet</option>
                                <option <?= setting('maintenance_mode') == 2 ? ' selected ' : null ?> value="2">Hayır</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>Bakım Modu Title</label>
                        <div class="form-content">
                            <input type="text" name="settings[maintenance_mode_title]" value="<?= setting('maintenance_mode_title') ?>">
                        </div>
                    </li>
                    <li>
                        <label>Bakım Modu Açıklama</label>
                        <div class="form-content">
                            <textarea name="settings[maintenance_mode_description]" cols="30" rows="5"><?= setting('maintenance_mode_description') ?></textarea>
                        </div>
                    </li>
                </ul>
            </div>
            <div tab-content>
                <h1>Tema Ayarları</h1>
                <ul>
                    <li>
                        <label>Logo Başlığı</label>
                        <div class="form-content">
                            <input type="text" name="settings[logo]" value="<?= setting('logo') ?>">
                        </div>
                    </li>
                    <li>
                        <label>Arama Input Placeholder</label>
                        <div class="form-content">
                            <input type="text" name="settings[search_placeholder]" value="<?= setting('search_placeholder') ?>">
                        </div>
                    </li>
                    <li>
                        <label>Footer Hakkımda Yazısı</label>
                        <div class="form-content">
                            <textarea name="settings[about]" cols="30" rows="5"><?= setting('about') ?></textarea>
                        </div>
                    </li>
                    <li>
                        <label>Facebook URL</label>
                        <div class="form-content">
                            <input type="text" name="settings[facebook]" value="<?= setting('facebook') ?>">
                        </div>
                    </li>
                    <li>
                        <label>Twitter URL</label>
                        <div class="form-content">
                            <input type="text" name="settings[twitter]" value="<?= setting('twitter') ?>">
                        </div>
                    </li>
                    <li>
                        <label>Instagram URL</label>
                        <div class="form-content">
                            <input type="text" name="settings[instagram]" value="<?= setting('instagram') ?>">
                        </div>
                    </li>
                    <li>
                        <label>Linkedin URL</label>
                        <div class="form-content">
                            <input type="text" name="settings[linkedin]" value="<?= setting('linkedin') ?>">
                        </div>
                    </li>
                    <li>
                        <label>Hoşgeldin Başlığı</label>
                        <div class="form-content">
                            <input type="text" name="settings[welcome_title]" value="<?= setting('welcome_title') ?>">
                        </div>
                    </li>
                    <li>
                        <label>Hoşgeldin İçeriği</label>
                        <div class="form-content">
                            <textarea name="settings[welcome_text]" cols="30" rows="5"><?= setting('welcome_text') ?></textarea>
                        </div>
                    </li>
                </ul>
            </div>
            <div tab-content>
                <h1>Tema Ayarları</h1>
                <ul>
                    <li>
                        <label>Ziyaretçi Yorumu</label>
                        <div class="form-content">
                            <select name="settings[visitor_comment]">
                                <option value="1" <?= setting('visitor_comment') == 1 ? ' selected' : null ?>>Onaylı</option>
                                <option value="2" <?= setting('visitor_comment') == 2 ? ' selected' : null ?>>Onaylı Değil</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>Üye Yorumu</label>
                        <div class="form-content">
                            <select name="settings[user_comment]">
                                <option value="1" <?= setting('user_comment') == 1 ? ' selected' : null ?>>Onaylı</option>
                                <option value="2" <?= setting('user_comment') == 2 ? ' selected' : null ?>>Onaylı Değil</option>
                            </select>
                        </div>
                    </li>

                </ul>
            </div>
            <ul>
                <li class="submit">
                    <input type="hidden" name="submit" value="1">
                    <button type="submit">Ayarları Kaydet</button>
                </li>
            </ul>
        </div>

    </form>
</div>

<?php require admin_view('static/footer') ?>