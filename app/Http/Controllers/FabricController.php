<?php

namespace App\Http\Controllers;

use App\FabricsType;
use App\Fabric;
use App\Photo;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class FabricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Operation getFabricsList
     *
     * Список тканей по id категории.
     *
     *
     * @return Collection|static[]
     */
    public function getFabricsList($id)
    {
        $fabrics = Fabric::where('idFabricsType', $id)->get();
        $fabrics_with_photo = [];
        foreach($fabrics as $fabric) {
            $fabric_photo = DB::table('photos')->where('idFabric', $fabric->id)->first();
            $fabric->FabricImage = $fabric_photo->Imagepath;
            array_push($fabrics_with_photo, $fabric);
        }
        return $fabrics_with_photo;
    }

    /**
     * Operation getFabric
     *
     * Открыть ткань по id.
     *
     * @param int $id  (required)
     *
     * @return Collection|static[]
     */
    public function getFabric($id, $idFabric)
    {
        $fabrics = Fabric::where('idFabricsType', $id)->get();
        $fabric = $fabrics->find($idFabric);
        return $fabric->load('PhotoList');
    }

    /**
     * Operation postFabric
     *
     * Создать ткань.
     *
     * @param int $id  (required)
     *
     * @return Http response
     */
    public function postFabric(Request $request, $id)
    {
        $input = $request->input();

        FabricsType::find($id)->update($input);

        return response()->json(Fabric::create($input), 201);
    }
    /**
     * Operation deleteFabric
     *
     * Удалить ткань.
     *
     * @param int $id  (required)
     *
     * @return Http response
     */
    public function deleteFabric($idFabric)
    {
        Fabric::find($idFabric)->delete();
        return response()->json('', 200);
    }
    /**
     * Operation updateFabric
     *
     * Обновить ткань.
     *
     * @param int $id  (required)
     *
     * @return Http response
     */
    public function updateFabric(Request $request, $id, $idFabric)
    {
        $input = $request->input();

        $fabric = Fabric::find($idFabric)->update($input);
        FabricsType::find($id)->update($input);

        return response()->json($fabric, 200);
    }

    public function search(Request $request) {
        $search = $request->input['searchform'];
        $search = '%'.$search.'%';
        $fabrics = Fabric::where('title', 'like', $search)->get();
        return response()->json($fabrics, 200);
    }

    public function getFabricActionList()
    {
        $fabrics = DB::table('fabrics')->where('isAction', true)->get();
        $fabrics_with_photo = [];
        foreach($fabrics as $fabric) {
            $fabric_photo = DB::table('photos')->where('idFabric', $fabric->id)->first();
            $fabric->FabricImage = $fabric_photo->Imagepath;
            array_push($fabrics_with_photo, $fabric);
        }
        return $fabrics_with_photo;
    }

    public function getFabricNewList()
    {
        $fabrics = DB::table('fabrics')->where('isNew', true)->get();
        $fabrics_with_photo = [];
        foreach($fabrics as $fabric) {
            $fabric_photo = DB::table('photos')->where('idFabric', $fabric->id)->first();
            $fabric->FabricImage = $fabric_photo->Imagepath;
            array_push($fabrics_with_photo, $fabric);
        }
        return $fabrics_with_photo;
    }

    public function getFabricTrendList()
    {
        $fabrics = DB::table('fabrics')->where('isTrend', true)->get();
        $fabrics_with_photo = [];
        foreach($fabrics as $fabric) {
            $fabric_photo = DB::table('photos')->where('idFabric', $fabric->id)->first();
            $fabric->FabricImage = $fabric_photo->Imagepath;
            array_push($fabrics_with_photo, $fabric);
        }
        return $fabrics_with_photo;
    }

    public function getFabricAction()
    {
        $fabrics = DB::table('fabrics')->where('isAction', true)->take(3)->get();
        $fabrics_with_photo = [];
        foreach($fabrics as $fabric) {
            $fabric_photo = DB::table('photos')->where('idFabric', $fabric->id)->first();
            $fabric->FabricImage = $fabric_photo->Imagepath;
            array_push($fabrics_with_photo, $fabric);
        }
        return $fabrics_with_photo;
    }

    public function getFabricNew()
    {
        $fabrics = DB::table('fabrics')->where('isNew', true)->take(3)->get();
        $fabrics_with_photo = [];
        foreach($fabrics as $fabric) {
            $fabric_photo = DB::table('photos')->where('idFabric', $fabric->id)->first();
            $fabric->FabricImage = $fabric_photo->Imagepath;
            array_push($fabrics_with_photo, $fabric);
        }
        return $fabrics_with_photo;
    }

    public function getFabricTrend()
    {
        $fabrics = DB::table('fabrics')->where('isTrend', true)->take(3)->get();
        $fabrics_with_photo = [];
        foreach($fabrics as $fabric) {
            $fabric_photo = DB::table('photos')->where('idFabric', $fabric->id)->first();
            $fabric->FabricImage = $fabric_photo->Imagepath;
            array_push($fabrics_with_photo, $fabric);
        }
        return $fabrics_with_photo;
    }
}
