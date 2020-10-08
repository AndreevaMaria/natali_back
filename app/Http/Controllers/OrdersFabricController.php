<?php

namespace App\Http\Controllers;

use App\OrdersFabric;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class OrdersFabricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Operation getOrderList
     *
     * Список строк заказа по idOrder (корзина заказа).
     *
     *
     * @return Collection|static[]
     */
    public function getOrdersFabricList($idOrder)
    {
        return OrdersFabric::where('idOrder', $idOrder)->get();
    }

    /**
     * Operation postOrder
     *
     * Сохранить строки заказа по idFabric (запись в корзину заказа)
     *
     * @param int $idUser (required)
     *
     * @return Http response
     */
    public function postOrdersFabric(Request $request, $idFabric)
    {
        $input = $request->input('idOrdersFabric', $idFabric);

        return response()->json(OrdersFabric::create($input), 201);
    }

    /**
     * Operation deleteOrder
     *
     * Удалить строки заказа по idFabric (из корзины заказа)
     *
     * @param int $idOrder (required)
     * @param int $idUser (required)
     *
     * @return Http response
     */
    public function deleteOrdersFabric($idFabric)
    {
        OrdersFabric::where('idOrdersFabric', $idFabric)->delete();

        return response()->json('', 200);
    }

    /**
     * Operation updateOrder
     *
     * Обновить строку заказа по idFabric (из корзины заказа).
     *
     * @param int $idUser (required)
     * @param int $idOrder (required)
     *
     * @return Http response
     */
    public function updateOrder(Request $request, $idFabric)
    {
        $input = $request->input();

        return response()->json(OrdersFabric::where('idOrdersFabric', $idFabric)->update($input), 200);
    }
}
