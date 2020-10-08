<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class FabricsType extends Model
{
    use Notifiable;

    protected $primaryKey = 'id';
    //protected $table = 'fabrics_types';
    protected $fillable = ['Title'];
    /*
    protected $with = ['FabricsList'];

    public function FabricsList()
    {
        return $this->hasMany('App\Fabric');
    }*/
}
