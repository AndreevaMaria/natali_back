<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Fabric extends Model {
    use Notifiable;

    protected $primaryKey = 'id';
   // protected $table = 'fabrics';
    protected $fillable = [
        'idFabricsType',
        'Title',
        'Articul',
        'Price',
        'PriceNew',
        'Decsription',
        'FabricComposition',
        'FabricWidth',
        'FabricDensity',
        'isOneton',
        'isNew',
        'isAction',
        'isTrend'
    ];

   // protected $with = ['PhotoList'];

    public function FabricsType() {
        return $this->belongsTo('App\FabricsType', 'idFabricsType');
    }

    public function PhotoList() {
        return $this->hasMany('App\Photo', 'idFabric', 'id');
    }
}
