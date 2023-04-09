<?php

$meta = [
    'title' => 'Kayıt Ol'
];

if (post('submit')){

    $username = post('username');
    $email = post('email');
    $password = post('password');
    $password_again = post('password_again');

    if (!$username){
        $error = 'Lütfen kullanıcı adınızı yazın.';
    } elseif (!$email){
        $error = 'Lütfen e-posta adresinizi yazın.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = 'Lütfen geçerli bir e-posta adresi yazın.';
    } elseif (!$password || !$password_again){
        $error = 'Lütfen şifrenizi girin.';
    } elseif ($password != $password_again){
        $error = 'Girdiğiniz şifreler birbiriyle uyuşmuyor.';
    } else {

        // üye var mı kontrol et
        $row = User::userExist($username, $email);

        if ($row){
            $error = 'Bu kullanıcı adı ya da e-posta zaten kullanılıyor. Lütfen başka bir tane deneyin.';
        } else {

            // üyeyi ekle
            $result = User::Register([
                'username' => $username,
                'url' => permalink($username),
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);

            if ($result){
                $success = 'Üyeliğiniz başarıyla oluşturuldu, yönlendiriliyorsunuz.';
                User::Login([
                    'user_id' => $db->lastInsertId(),
                    'user_name' => $username
                ]);
                header('Refresh:2;url=' . site_url());
            } else {
                $error = 'Bir sorun oluştu, lütfen daha sonra tekrar deneyin.';
            }

        }

    }

}

require view('register');