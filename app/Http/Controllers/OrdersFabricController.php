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
     * Operation postOrdersFabric
     *
     * Сохранить строки заказа по idFabric (запись в корзину заказа)
     *
     * @param int $idFabric (required)
     *
     * @return Http response
     */
    public function postOrdersFabric(Request $request, $idFabric)
    {
        $input = $request->input('idOrdersFabric', $idFabric);

        return response()->json(OrdersFabric::create($input), 201);
    }

    /**
     * Operation deleteOrdersFabric
     *
     * Удалить строки заказа по idFabric (из корзины заказа)
     *
     * @param int $idFabric (required)
     *
     * @return Http response
     */
    public function deleteOrdersFabric($idFabric)
    {
        OrdersFabric::where('idOrdersFabric', $idFabric)->delete();

        return response()->json('', 200);
    }

    /**
     * Operation updateOrdersFabric
     *
     * Обновить строку заказа по idFabric (в корзине заказа).
     *
     * @param int $idFabric (required)
     *
     * @return Http response
     */
    public function updateOrdersFabric(Request $request, $idFabric)
    {
        $input = $request->input();

        return response()->json(OrdersFabric::where('idOrdersFabric', $idFabric)->update($input), 200);
    }
}
