<?php

namespace App\Http\Controllers;

use App\FabricsType;
use App\Fabric;
use App\Photo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class FabricsTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Operation getFabricsTypeList
     *
     * Список категорий тканей.
     *
     *
     * @return Collection|static[]
     */
    public function getFabricsTypeList()
    {
        $fabricstypes = FabricsType::all();
        foreach($fabricstypes as $fabricstype) {
            if($fabricstype->has('FabricsList') && $fabricstype->FabricsTypeImage === '') {
                $fabric = Fabric::where('idFabricsType', $fabricstype->id)->first();
                $fabric_photo = Fabric::find($fabric->id)->PhotoList()->get()[0]->Imagepath;
                if($fabric_photo) {
                    $fabricstype->FabricsTypeImage = $fabric_photo;
                }
            }
        }
        return $fabricstypes;
    }

    /**
     * Operation postFabricsType
     *
     * Создать категорию тканей.
     *
     *
     * @return Http response
     */
    public function postFabricsType(Request $request)
    {
        $input = $request->input();

        return response()->json(FabricsType::create($input), 201);
    }

    /**
     * Operation deleteFabricsType
     *
     * Удалить категорию тканей.
     *
     * @param int $id (required)
     *
     * @return Http response
     */
    public function deleteFabricsType(Request $request, $id)
    {
        return response()->json(FabricsType::find($id)->delete(), 200);
    }

    /**
     * Operation getFabricsType
     *
     * Получить категорию тканей.
     *
     * @param int $id (required)
     *
     * @return Http response
     */
    public function getFabricsType(Request $request, $id)
    {
        return response()->json(FabricsType::find($id), 200);
    }

    /**
     * Operation updateFabricsType
     *
     * Обновить фабрику.
     *
     * @param int $id (required)
     *
     * @return Http response
     */
    public function updateFabricsType(Request $request, $id)
    {
        return response()->json(FabricsType::find($id)->update($request->input()), 200);
    }

    public function addFabricsTypeImage(Request $request)
    {
        $idFabricsType = $request->idFabricsType;
        $fabricstype = FabricsType::find($idFabricsType);
        $file = $request->Imagepath;

        if ($file !== null) {
            $original_name = 'category'.$idFabricsType . '.' . $file->getClientOriginalExtension();
            $file->move(public_path().'/images/category/', $original_name);
            $fabricstype->FabricsTypeImage = 'images/category/' . $original_name;
        }
        $fabricstype->save();
        return $fabricstype;
    }
}
