<?php

namespace App\Service;

class ProductHandler
{

    /**
     * 计算商品总金额
     * @param array $products
     * @return int|mixed
     */
    public function getTotalPrice(array $products){
        $totalPrice = 0;
        foreach ($products as $product) {
            $price = isset($product['price']) ? $product['price'] : 0;
            $totalPrice += $price;
        }
        return $totalPrice;
    }

    /**
     * 把商品以金额排序（由大至小），并筛选商品种类是 “dessert” 的商品
     * @param array $products
     * @return array
     */
    public function sortFilter(array $products){
        array_multisort($products, array_column($products, 'price'), SORT_DESC);
        return array_map(function($item){
            if ($item['type'] == 'dessert'){
                return $item;
            }
        }, $products);
    }

    /**
     * 把创建日期转换未 unix timestamp
     * @param array $products
     * @return array
     */
    public function transformToUnixTimestamp(array $products){
        if (!empty($products)){
            foreach ($products as $key => $item){
                $products[$key]['create_at'] = strtotime($item['create_at']);
            }
            return $products;
        }else{
            return [];
        }
    }
}
