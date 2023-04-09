<?php

$meta = [
    'title' => 'Giriş Yap'
];

if (post('submit')) {

    $username = post('username');
    $password = post('password');
    if (!$username) {
        $error = 'Lütfen kullanıcı adınızı yazın.';
    } elseif (!$password) {
        $error = 'Lütfen şifrenizi girin.';
    } else {

        // üye var mı kontrol et
        $row = User::userExist($username);

        if ($row) {

            // parola kontrolü yap
            $password_verify = password_verify($password, $row['user_password']);

            if ($password_verify) {

                $success = 'Başarıyla giriş yaptınız, yönlendiriliyorsunuz.';
                User::Login($row);

                header('Refresh:2;url=' . site_url());
            } else {
                $error = 'Şifreniz hatalı, lütfen kontrol edin!';
            }
        } else {
            $error = 'Böyle bir kullanıcı sistemde kayıtlı gözükmüyor!';
        }
    }
}

require view('login');
