<?php

namespace Master;

class Menu
{
    public function topMenu()
    {
        $base = "http://localhost/utsoop/myappupdate/index.php?target=";
        $data = [
            array('text' => 'Home', 'link' => $base . 'home'),
            array('text' => 'Siswa', 'link' => $base . 'siswa'),
            array('text' => 'Guru', 'link' => $base . 'guru'),
            array('text' => 'Mapel', 'link' => $base . 'mapel')
        ];
        return $data;
    }
}