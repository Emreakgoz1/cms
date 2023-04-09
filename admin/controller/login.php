<?php

if (post('submit')){
    if ($data = form_control()){

        $row = $db->from('users')
            ->where('user_url', permalink($data['user_name']))
            ->where('user_rank', 3, '!=')
            ->first();

        if (!$row){
            $error = 'Girdiğiniz bilgiler hatalı, lütfen kontrol edin.';
        } else {

            $password_verify = password_verify($data['user_password'], $row['user_password']);
            if ($password_verify){
                if ($row['user_rank'] == 3){
                    $error = 'Bu bölüme girmek için yetkiniz bulunmuyor!';
                } else {
                    User::Login($row);
                    header('Location:' . admin_url());
                }
            } else {
                $error = 'Girdiğiniz şifre hatalı, lütfen kontrol edin.';
            }

        }

    } else {
        $error = 'Lütfen bilgileriniz girin.';
    }
}

require admin_view('login');