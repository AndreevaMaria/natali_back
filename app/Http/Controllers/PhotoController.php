<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Fabric;
use App\FabricsType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function addPhotos(Request $request)
    {
        //$input = $request->input();

        $idFabric = $request->idFabric;
        $idFabricsType = $request->idFabricsType;
        $files = $request->Image;

        if ($files !== null) {
           // foreach($files as $file) {
                $name = $idFabric ? $idFabric: 'category'.$idFabricsType;
                $original_name = $name.'.'.$files->getClientOriginalExtension();
                $files->move(public_path().'/images', $original_name);
                $imageNotice = ($request->ImageNotice) ? $request->ImageNotice : '';
                Photo::create ([
                    'idFabric' => $idFabric,
                    'idFabricsType' => $idFabricsType,
                    'Imagepath' => 'images/'.$original_name,
                    'ImageNotice' => $imageNotice
                ]);
         //   }
        }
        return 'Загрузка прошла успешно!';
    }


    public function deletePhoto(Request $request, $idPhoto)
    {
        //Storage::disk()->delete($request->Imagepath);

        return response()->json(Photo::find($idPhoto)->delete(), 200);
    }

    /**
     * Operation getPhotoList
     *
     * Получить список фотографий всей категории.
     *
     * @param int $idFabric  (required)
     *
     * @return Collection|static[]
     */
    public function getPhotoList($idFabricsType)
    {
        $photos = Photo::where('idFabricsType', $idFabricsType)->get();

        return $photos;
    }
}
/*
if(!empty($_FILES['file']['name'])) {
    //перебираем все загруженные через форму картинки
    foreach($_FILES['file']['name'] as $k => $v) {
        //проверяем, произошла ли ошибка при загрузке какого-нибудь из множества файлов
        if($_FILES['file']['error'][$k] != 0) {
            echo "<script>alert('Upload file error: $v')</script>";
            continue;
        }
        if(move_uploaded_file($_FILES['file']['tmp_name'][$k], 'images/'.$v)) {
            $ins = 'INSERT INTO images(hotelid, imagepath) VALUES('.$_POST['hotelid'].', "images/'.$v.'")';
            mysqli_query($link, $ins);
        }
    }
}
*/
