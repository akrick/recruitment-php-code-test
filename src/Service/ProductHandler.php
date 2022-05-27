<?php

namespace App\Service;

class ProductHandler
{
    private $products = array();

    /**
     * 计算商品总金额
     * @return int|mixed
     */
    public function getTotalPrice(){
        $totalPrice = 0;
        foreach ($this->products as $product) {
            $price = $product['price'] ?: 0;
            $totalPrice += $price;
        }
        return $totalPrice;
    }

    /**
     * 把商品以金额排序（由大至小），并筛选商品种类是 “dessert” 的商品
     * @return array
     */
    public function sortFilter(){
        array_multisort($this->products, array_column($this->products, 'price'), SORT_DESC);
        return array_map(function($item){
            if ($item['type'] == 'dessert'){
                return $item;
            }
        }, $this->products);
    }

    /**
     * 把创建日期转换未 unix timestamp
     */
    public function transformToUnixTimestamp(){
        if (!empty($this->products)){
            foreach ($this->products as &$item){
                $item['create_at'] = strtotime($item['create_at']);
            }
        }
    }
}
