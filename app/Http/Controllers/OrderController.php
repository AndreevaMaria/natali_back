<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrdersFabric;
use App\Fabric;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Operation getOrderList
     *
     * Список заказов по idUser.
     *
     * @return Collection|static[]
     */
    public function getOrderListByUser($idUser)
    {
        $orders = Order::where('idUser', $idUser)->get();
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
     * Сохранить заказ (подтверждение заказа)
     *
     * @param int $idUser (required)
     *
     * @return Http response
     */
    public function postOrder(Request $request, $idUser)
    {
        $input = $request->input('idUser', $idUser);

        return response()->json(Order::create($input), 201);
    }

    /**
     * Operation deleteOrder
     *
     * Удалить заказ.
     *
     * @param int $idOrder (required)
     * @param int $idUser (required)
     *
     * @return Http response
     */
    public function deleteOrder($idOrder)
    {
        Order::find($idOrder)->delete();

        return response()->json('', 200);
    }

    /**
     * Operation getOrder
     *
     * Получить заказ по idUser (просмотреть список товаров)
     *
     * @param int $idUser (required)
     * @param int $idOrder (required)
     *
     * @return Http response
     */
    public function getOrder($idOrder)
    {
        $order = Order::find($idOrder)->get();

        return response()->json($order->load('OrdersFabricList'), 200);
    }

    /**
     * Operation updateOrder
     *
     * Обновить заказ (добавить данные в заказ до его согласования).
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
