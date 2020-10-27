<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrdersFabric;
use App\Fabric;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Operation getOrderList
     *
     * Список заказов.
     *
     *
     * @return Collection|static[]
     */
    public function getOrderList()
    {
        $orders = Order::all();
        foreach($orders as $order) {
            $item_sum = 0;
            $item_discount = 0;
            foreach($order->OrdersFabricList as $item) {
                $discount = 0;
                $new = $item->Fabric->PriceNew;
                $regular = $item->Fabric->Price;
                $price = ($new != 0) ? $new : $regular;
                if ($price == $new) {
                    $discount = $regular - $new;
                } else { $discount = 0; }
                $sum = $price * $item->Amount;
                $sum_discount = $discount * $item->Amount;
                $item_sum = $item_sum + $sum;
                $item_discount = $item_discount + $sum_discount;
            }
            $order->TotalSum = $item_sum;
            $order->TotalDiscount = $item_discount;
            $order->save();
        }
        return $orders->load('OrdersFabricList');
    }

    /**
     * Operation postOrder
     *
     * Сохранить заказ
     *
     * @param int $idUser (required)
     *
     * @return Http response
     */
    public function postOrder(Request $request)
    {
        $input = $request->input();

        return response()->json(Order::create($input), 201);
    }

    /**
     * Operation deleteOrder
     *
     * Удалить заказ.
     *
     * @param int $idOrder (required)
     *
     * @return Http response
     */
    public function deleteOrder($idOrder)
    {
        return response()->json(Order::find($idOrder)->delete(), 200);
    }

    /**
     * Operation getOrder
     *
     * Получить заказ.
     *
     * @param int $idOrder (required)
     *
     * @return Http response
     */
    public function getOrder($idOrder)
    {
        return response()->json( Order::find($idOrder), 200);
    }

    /**
     * Operation updateOrder
     *
     * Обновить заказ.
     *
     * @param int $idOrder (required)
     *
     * @return Http response
     */
    public function updateOrder(Request $request, $idOrder)
    {
        $input = $request->input();

        return response()->json(Order::find($idOrder)->update($input), 200);
    }
}
