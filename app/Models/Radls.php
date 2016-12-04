<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Radls extends Model {

    protected $table = 'radls';

    protected $primaryKey = 'id';

    protected $fillable = ['imuser','id_recipe','name', 'description', 'radl','central', 'student','type','validate','id_deploy','response',
        'msg','count_central','finish','finish_date','count_student','language','msg_error', 'created_at', 'updated_at'];

    public $timestamps = true;

}