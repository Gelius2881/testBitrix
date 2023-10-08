<?php
namespace App;

class ModuleProducts
{
    public  $file = './file/productdb.json';


    private static $inst = [];

    private function __construct()
    {
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \Exception("Невозможно отсериализовать одиночный объект.");
    }

    public static function getInst()
    {
        $col = static::class;
        if (!isset(self::$inst[$col])) {
            self::$inst[$col] = new static();
        }

        return self::$inst[$col];
    }


    public function baseСonnection(){

        if (file_exists($this->file)){
            return  file_get_contents($this->file);
        }
        else {
            return new ViewErrorNoFile($this->file);
        }

    }

    public function baseСonnectionUpdate($db){
        file_put_contents($this->file, $db);
    }


}