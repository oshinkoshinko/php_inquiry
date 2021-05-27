<?php

class Product{

//アクセス修飾子 private(外からアクセスできない), protected(自分・継承先のみ), public

//変数
private $product = [];

//関数
//function __construct()で関数の初期化
function __construct($product)
{
    $this->product = $product; //$thisはこのクラス
}

public function getProduct(){
    echo $this->product;
}

public function addProduct($item){
    $this->product .= $item;
}

public static function getStaticProduct($str){
    echo $str;
}

}

$instance = new Product('テスト');

var_dump($instance);

$instance->getProduct();
echo '<br>';

$instance->addProduct('追加分');
echo '<br>';

$instance->getProduct();
echo '<br>';

//静的(static) クラス名::関数名
Product::getStaticProduct('静的');
echo '</br>';

