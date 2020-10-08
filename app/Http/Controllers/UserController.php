<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Collection;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Operation getUser
     *
     * Получить юзера (войти в аккаунт).
     *
     * @param int $idUser  (required)
     *
     * @return Collection|static[]
     */
    public function getUser($idUser)
    {
        return User::find($idUser)->get();
    }
    /**

    /**
     * Operation deleteUser
     *
     * Удалить юзера (в аккаунте).
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
     * Обновить данные юзера (аккаунт).
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
