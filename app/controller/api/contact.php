<?php
$json['test'] = 'blabla';
if ($data = form_control('phone')) {
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $json['error'] = 'Lütfen geçerli e-posta adresi girin';
    } else {

        //veri tabanına ekle

        $query = $db->insert('contact')
            ->set([
                'contact_name' => $data['name'],
                'contact_email' => $data['email'],
                'contact_phone' => $data['phone'],
                'contact_subject' => $data['subject'],
                'contact_message' => $data['message']
            ]);
        if ($query) {
            $json['success'] = 'Yavru mesajin ulaştı sana döneriz merak etme...';
        } else {
            $json['error'] = 'Bir sorun oluştu ve mesajiniz gönderilemedi';
        }
    }
} else {
    $json['error'] = 'Lütfen tüm alanları doldurup tekrar deneyin.';
}
