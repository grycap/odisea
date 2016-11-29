<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Credentials extends Model {

    protected $table = 'credentials';

    protected $primaryKey = 'id';

    protected $fillable = ['imuser','type', 'host', 'username','password', 'enabled', 'ord','proxy',
        'token_type', 'project','public_key','private_key','certificate','tenant'];

    public $timestamps = false;
}
