<?php require admin_view('static/header') ?>

<!--login screen-->
<div class="login-screen">

    <!--login logo-->
    <div class="login-logo">
        <a href="#">
            <img src="<?=admin_public_url('images/logo.png')?>" alt="">
        </a>
    </div>

    <?php if (isset($error)): ?>
        <div class="message error box-">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Kullanıcı Adınız</label>
                <input type="text" name="user_name">
            </li>
            <li>
                <label for="password">Şifreniz</label>
                <input type="password" name="user_password">
            </li>
            <li>
                <button name="submit" value="1" type="submit">Giriş Yap</button>
            </li>
        </ul>
    </form>

</div>

<?php require admin_view('static/footer') ?>