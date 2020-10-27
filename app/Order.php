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
        'TotalSum',
        'TotalDiscount',
        'FinalDate',
        'OrderStatus',
        'Note'
    ];

    //protected $with = ['OrdersFabricList'];

    public function User()
    {
        return $this->belongsTo('App\User', 'idUser');
    }

    public function OrdersFabricList()
    {
        return $this->hasMany('App\OrdersFabric', 'idOrder');
    }
}
