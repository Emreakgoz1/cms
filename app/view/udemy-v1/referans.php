<?php require view('static/header') ?>
<section class="jumbotron text-center">
    <div class="container">
        <h1><?= $row['reference_title'] ?></h1>
        <div class="breadcrumb-custom">
            <a href="<?= site_url() ?>">Anasayfa</a> /
            <a href="<?= site_url('referanslar') ?>">Referanslar</a> /
            <a href="<?= site_url('referans/' . $row['reference_url']) ?>" class="active"><?= $row['reference_title'] ?></a>
        </div>
    </div>
</section>

<div class="portfolio">
    <div class="container">

        <div class="row">

            <div class="col-md-8">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <?php foreach ($images as $key => $image) : ?>
                            <?php
                            $imgContent = json_decode(($image['image_content'] ? $image['image_content'] : '{}'), true);
                            ?>
                            <div class="carousel-item<?= $key == 0 ? ' active' : null ?>">
                                <img class="d-block w-100" src="<?= site_url('upload/reference/' . $row['reference_url'] . '/' . $image['image_url']) ?>" alt="<?= isset($imgContent['title']) ? $imgContent['title'] : null ?>" title="<?= isset($imgContent['title']) ? $imgContent['title'] : null ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="col-md-4">

                <div class="card mb-3">
                    <div class="card-header">
                        Proje Hakkında
                    </div>
                    <div class="card-body">
                        <?= htmlspecialchars_decode($row['reference_content']) ?>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        Kullanılan Teknolojiler
                    </div>
                    <div class="card-body">
                        <?php foreach (explode(',', $row['reference_tags']) as $tag) : ?>
                            <span class="badge badge-pill badge-secondary"><?= $tag ?></span>
                        <?php endforeach; ?>

                    </div>
                </div>
                <?php if ($row['reference_demo']) : ?>
                    <div class="card">
                        <div class="card-header">
                            Proje Linki
                        </div>
                        <div class="card-body">
                            <a href="<?= $row['reference_demo'] ?>" target="_blank" class="btn btn-primary">
                                Demoya gözatın
                            </a>
                        </div>
                    </div>
                <?php endif; ?>

            </div>

        </div>

    </div>
</div>
<?php require view('static/footer') ?>