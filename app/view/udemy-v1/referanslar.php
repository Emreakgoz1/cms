<?php require view('static/header') ?>

<section class="jumbotron text-center">
    <div class="container">
        <h1>REFERANSLAR</h1>
        <div class="breadcrumb-custom">
            <a href="<?= site_url() ?>">Anasayfa</a> /
            <a href="<?= site_url('referanslar') ?>" class="active">Referanslar</a>
        </div>
    </div>
</section>

<div class="portfolio">
    <div class="container">

        <div class="row">
            <div class="col-md-12 text-center">
                <nav class="nav nav-pills nav-fill mb-4">
                    <a href="<?= site_url('referanslar') ?>" class="nav-item nav-link<?= !route(1) ? ' active' : null ?>">Tümü</a>
                    <?php foreach ($categories as $category) : ?>
                        <a class="nav-item nav-link<?= route(1) == $category['category_url'] ? ' active' : null ?>" href="<?= site_url('referanslar/' . $category['category_url']) ?>"><?= $category['category_name'] ?></a>
                    <?php endforeach; ?>
                </nav>
                <p>Front-end ile ilgili bütün çalışmalarımı aşağıda listelemiş bulunuyorum. Sizde bana iş yaptırmak
                    isterseniz iletişim bölümünden bana ulaşabilirsiniz. Daha fazla soru için
                    <strong>tayfun@erbilen.net</strong> adresini kullanın.
                </p>
            </div>
        </div>

        <div class="row">
            <?php if ($query) : ?>
                <?php foreach ($query as $row) : ?>
                    <div class="col-md-4">
                        <a href="<?= site_url('referans/' . $row['reference_url']) ?>">
                            <img class="img-rounded" src="<?= site_url('upload/reference/' . $row['reference_url'] . '/' . $row['reference_image']) ?>" alt="">
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col-md-12">
                    <div class="alert alert-warning">
                        Henüz referans eklenmemiş.
                    </div>
                </div>
            <?php endif; ?>

        </div>

    </div>
</div>

<?php require view('static/footer') ?>