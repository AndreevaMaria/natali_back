<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use Notifiable;

    protected $primaryKey = 'id';
   // protected $table = 'orders';
    protected $fillable = [
        'idUser',
        'OrderNum',
        'OrderDate',
        'idFabric',
        'Amount',
        'FinalDate',
        'OrderStatus'
    ];
    /*
    protected $with = ['FabricsList'];

    public function User() {
        return $this->belongsTo('App\User', 'idUser');
    }
    public function FabricsList() {
        return $this->hasMany('App\Fabric', 'idFabric');
    }*/
}
