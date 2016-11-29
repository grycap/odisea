<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Recipes extends Model {

    protected $table = 'recipe';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'description', 'radl', 'language', 'type', 'validate', 'created_at', 'updated_at'];

    public $timestamps = true;

}