<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Fabric;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function addPhotos(Request $request)
    {
        $input = $request->input();

        $idFabric = $input['idFabric'];
        $files = $input['imagepath'];

        //$fabric = Fabric::find($idFabric);

        if ($files !== null) {
            foreach($files as $file) {
                $original_name = $idFabric.'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/images', $original_name);
                //Storage::disk('images')->putFileAs($original_name);
                Photo::create ([
                    'idFabric' => $idFabric,
                    'Imagepath' => 'images/'.$original_name
                ]);
            }
        }
        return 'Загрузка прошла успешно!';
    }

    public function deletePhoto(Request $request)
    {
        $input = $request->input();
        $path = $input['imagepath'];

        Storage::disk()->delete($path);
        DB::table('photos')->where('Imagepath', '=', 'images/'.$path)->delete();

        return response()->json('', 200);
    }
}
