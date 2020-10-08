<?php

namespace App\Http\Controllers;

use App\Order;
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
     *
     * @return Collection|static[]
     */
    public function getOrderList($idUser)
    {
        return Order::where('idUser', $idUser)->get();
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
    public function deleteOrder($idUser, $idOrder)
    {
        Order::find($idOrder)->delete();

        return response()->json('', 200);
    }

    /**
     * Operation getOrder
     *
     * Получить заказ по idUser.
     *
     * @param int $idUser (required)
     * @param int $idOrder (required)
     *
     * @return Http response
     */
    public function getOrder($idUser, $idOrder)
    {
        $orders = Order::where('idUser', $idUser)->get();
        $order = $orders->find($idOrder);

        return response()->json($order, 200);
    }

    /**
     * Operation updateOrder
     *
     * Обновить заказ.
     *
     * @param int $idUser (required)
     * @param int $idOrder (required)
     *
     * @return Http response
     */
    public function updateOrder(Request $request, $idUser, $idOrder)
    {
        $input = $request->input('idUser', $idUser);

        return response()->json(Order::find($idOrder)->update($input), 200);
    }
}
