<?php

namespace App;


class ViewErrorNoFile
{

    public function __construct($file)
    {
        echo 'Что-то пошло не так! с ' . $file;
        return 1;
    }
}