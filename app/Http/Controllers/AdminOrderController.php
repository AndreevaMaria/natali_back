<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

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
        return Order::all();
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
