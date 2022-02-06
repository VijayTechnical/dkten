<?php

namespace App\Classes;

use App\Models\OrderItem;

class GetItems{
    public static function getItems($order_id)
    {
        $items = OrderItem::where('order_id',$order_id)->get();
        return $items;
    }

    public static function getTitle($item_id){
        $item = OrderItem::where('id',$item_id)->first();
        return $item->Product->title;
    }

    public static function getOptions($item_id)
    {
        $item = OrderItem::where('id',$item_id)->first();
        $data = [
            'key' => 'default',
            'value' => 'default'
        ];
        if($item->options)
        {
            foreach (unserialize($item->options) as $key => $value)
            {
                $data = [
                    'key' => $key,
                    'value' => $value
                ];
            }
        }
        return $data;
    }
}