<?php require view('static/header') ?>


<section class="jumbotron text-center">
    <div class="container">
        <h1><?= $row['post_title'] ?></h1>
        <div class="breadcrumb-custom">
            <a href="<?= site_url() ?>">Anasayfa</a> /
            <a href="<?= site_url('blog') ?>">Blog</a> /
            <?php
            $category_url = explode(',', $row['category_url']);
            foreach (explode(',', $row['category_name']) as $index => $category_name) : ?>
                <a href="<?= site_url('blog/kategori/' . trim($category_url[$index])) ?>"><?= $category_name ?></a> /
            <?php endforeach; ?>
            <a href="<?= site_url('blog/' . $row['post_url']) ?>" class="active"><?= $row['post_title'] ?></a>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card mb-3">
                <div class="card-header">
                    <?= $row['category_name'] ?>
                    <div class="date">
                        <?= timeConvert($row['post_date']) ?>
                    </div>
                </div>
                <div class="card-body">
                    <?= htmlspecialchars_decode($row['post_content']) ?>
                </div>
            </div>

            <div class="card text-center mb-3">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="comments" aria-selected="true">Yorumlar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="share-tab" data-toggle="tab" href="#share" role="tab" aria-controls="share" aria-selected="false">Paylaş</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="comments" role="tabpanel" aria-labelledby="home-tab">

                            <?php if ($comments) : ?>
                                <div id="comments">
                                    <?php foreach ($comments as $comment)  require view('static/comment'); ?>
                                </div>
                            <?php else : ?>

                                <div class="no-comment">
                                    <h5 class="card-title">İlk yorumu siz yazın!</h5>
                                    <p class="card-text">Bu konu için hiç yorum yazılmamış, ilk yorumu siz yazarak destek verin!</p>
                                    <a href="#add-comment" class="btn btn-primary">Yorum Yaz</a>
                                </div>
                                <div class="comments"></div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane fade" id="share" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="share mb-4">
                                <a target="_blank" href="<?= $facebook_url ?>" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook'da Paylaş">
                                    <span class="fab fa-facebook-f">
                                    </span>
                                </a>
                                <a target="_blank" href="<?= $twitter_url ?>" class="twitter" data-toggle="tooltip" data-placement="top" title="Tweet at">
                                    <span class="fab fa-twitter"></span>
                                </a>
                                <a href="#" class="gplus" data-toggle="tooltip" data-placement="top" title="Google+'da Paylaş">
                                    <span class="fab fa-google-plus-g"></span>
                                </a>
                                <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?= site_url('blog/' . $row['post_url']) ?>&title=<?= $row['post_title'] ?>&summary=<?= cut_text($row['post_short_content'], 100) ?>&source=" class="linkedin" data-toggle="tooltip" data-placement="top" title="Linkedin'de Paylaş">
                                    <span class="fab fa-linkedin-in"></span>
                                </a>
                                <a target="_blank" href="https://api.whatsapp.com/send?phone=&text=<?= $row['post_title'] ?> - <?= site_url('blog/' . $row['post_url']) ?>&source=&data=" class="whatsapp" data-toggle="tooltip" data-placement="top" title="Whatsapp'dan Gönder">
                                    <span class="fab fa-whatsapp"></span>
                                </a>
                                <a href="mailto:emreakgoz" class="mail" data-toggle="tooltip" data-placement="top" title="E-posta olarak Gönder">
                                    <span class="fa fa-envelope"></span>
                                </a>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Bağlantı Linki</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" onclick="this.select()" value="<?= site_url('blog/' . $row['post_url']) ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" id="add-comment">
                <div class="card-header">
                    Yorum Yaz
                </div>
                <div class="card-body">
                    <div id="comment-msg" style="display: none"></div>
                    <form onsubmit="return false;" id="comment-form" data-id="<?= $row['post_id'] ?>">
                        <?php if (!session('user_id')) : ?>
                            <div class="form-group">
                                <label for="email">E-posta Adresiniz</label>
                                <input type="email" class="form-control" name="email" id="email">
                                <small id="emailHelp" class="form-text text-muted">E-posta adresiniz yorumlar listelenirken gizli kalacaktır.</small>
                            </div>
                            <div class="form-group">
                                <label for="name">Adınız-soyadınız</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        <?php else : ?>
                            <div class="alert alert-warning">
                                <strong><?= session('user_name') ?></strong> kullanıcı adıyla yorum yapıyorsunuz. [<a href="<?= site_url('cikis') ?>">Çıkış Yap</a>]
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="yorum">Yorumunuz</label>
                            <textarea name="comment" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <button type="submit" onclick="add_comment('#comment-form')" class="btn btn-primary">Gönder</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <?php require view('static/footer') ?>