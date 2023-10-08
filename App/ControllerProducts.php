<?php

namespace App;



class ControllerProducts
{
    public function getProductAdd( $productName, $text, $price,$discount, $img, $titleTop = 'карточка товара'){

        $add = new ServiceProducts();

        return $add->productAdd( $productName, $text, $price,$discount, $img, $titleTop = 'карточка товара');
    }
    public function getProductUpdate($id, $productName, $text, $price,$discount, $img, $titleTop = 'карточка товара'){

        $update = new ServiceProducts();

        $update ->productUpdate($id, $productName, $text, $price,$discount, $img, $titleTop);
    }
    public function getProductDel($id){

        $del = new ServiceProducts();

        $del -> productDel($id);
    }

    public function ControllerIndexStart($type){

        if( $_SERVER["REQUEST_METHOD"] == 'GET'){
            $index =  new ViewIndex();
            $index->index();
        } else {
            $titleTop =  $_POST['title_top'];
            $productName =  $_POST['product_name'];
            $text =  $_POST['text'];
            $price =  $_POST['price'];
            $discount = $_POST['discount'];
            $img =  $_POST['images'];
            $id =  $_POST['id'];



            switch ($_POST['key_mod']){
                case 'add':
                    $this->getProductAdd( $productName, $text, $price,$discount, $img, $titleTop);
                    break;
                case 'update':
                    $this->getProductUpdate($id,$productName, $text, $price,$discount, $img, $titleTop);
                    break;
                case 'del':
                    $this->getProductDel($id);
                    break;

            }
        }

    }
}

