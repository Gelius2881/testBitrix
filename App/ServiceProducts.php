<?php

namespace App;

class ServiceProducts
{

    public function __construct()
    {
    }

    public function productImages($id){
        switch ($id){
            case 1:
                $file = "images/product-1.jpg";
                break;
            case 2:
                $file = "images/product-2.jpg";
                break;
            case 3:
                $file = "images/product-3.jpg";
                break;
            case 4:
                $file = "images/product-4.jpg";
                break;
        }
        return $file;
    }

    public function productAdd( $productName, $text, $price, $discount, $img, $titleTop){

        $productsDbArr = json_decode(ModuleProducts::getInst()->baseСonnection(), true);

        $sum =  count($productsDbArr);

        if($sum >= 12 ){
            return 'Больше 12';
        }

        $productImg = $this->productImages($img);

        $productsDbArr[]= [
                'productName' => $productName,
                'text' => $text,
                'price' => $price,
                'discount' => $discount,
                'img' => $productImg,
                'titleTop'=> $titleTop,

            ];



        $productAdd = json_encode($productsDbArr);

        ModuleProducts::getInst()->baseСonnectionUpdate($productAdd);

    }
    public function productUpdate($id, $productName, $text, $price,$discount, $img, $titleTop){
        $productsDbArr = json_decode(ModuleProducts::getInst()->baseСonnection(), true);


        $productImg = $this->productImages($img);


        $productsDbArr[$id] = [
            'productName' => $productName,
            'text' => $text,
            'price' => $price,
            'discount' => $discount,
            'img' => $productImg,
            'titleTop'=> $titleTop,

        ];

        $productUpdate = json_encode($productsDbArr);

        ModuleProducts::getInst()->baseСonnectionUpdate($productUpdate);

    }
    public function productDel($id){
        $productsDbArr = json_decode(ModuleProducts::getInst()->baseСonnection(), true);

        if(empty($productsDbArr)){
            return  'Массив пустой!';
        }

        if (!array_key_exists($id, $productsDbArr)) {
            return "Токого ключа нет!";
        }

        unset($productsDbArr[$id]);

        $productDel = json_encode($productsDbArr);

        ModuleProducts::getInst()->baseСonnectionUpdate($productDel);


    }
}

