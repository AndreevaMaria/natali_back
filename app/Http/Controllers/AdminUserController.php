<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Collection;

use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Operation getUserList
     *
     * Получить список юзеров.
     *
     * @param int $idUser  (required)
     *
     * @return Collection|static[]
     */
    public function getUserList()
    {
        return User::all()->load('OrderList');
    }

    /**
     * Operation getUser
     *
     * Получить юзера по $idUser.
     *
     * @param int $idUser  (required)
     *
     * @return Collection|static[]
     */
    public function getUser($idUser)
    {
        return User::find($idUser)->load('OrderList');
    }

     /**
     * Operation postOrder
     *
     * Сохранить юзера
     *
     * @param int $idUser (required)
     *
     * @return Http response
     */
    public function postUser(Request $request)
    {
        $input = $request->input();

        return response()->json(User::create($input), 201);
    }

    /**
     * Operation deleteUser
     *
     * Удалить юзера.
     *
     * @param int $idUser  (required)
     *
     * @return Http response
     */
    public function deleteUser($idUser)
    {
        User::find($idUser)->delete();

        return response()->json('', 200);

    }
    /**
     * Operation updateUser
     *
     * Обновить данные юзера.
     *
     * @param int $idUser  (required)
     *
     * @return Http response
     */
    public function updateUser(Request $request, $idUser)
    {
        $input = $request->input();

        $user = User::find($idUser)->update($input);

        return response()->json($user, 200);
    }
}
