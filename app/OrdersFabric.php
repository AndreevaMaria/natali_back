<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class OrdersFabric extends Model
{
    use Notifiable;

    protected $primaryKey = 'id';
    // protected $table = 'orders';
    protected $fillable = [
        'idOrder',
        'idOrdersFabric',
        'Amount',
        'Notice'
    ];

    public function Order()
    {
        return $this->belongsTo('App\Order', 'idOrder');
    }

    public function FabricList()
    {
        return $this->hasMany('App\Fabric', 'idFabric', 'idOrdersFabric');
    }
}
