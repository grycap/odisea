<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

//TODO , Tener que meter en carpeta de models

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    /*protected $fillable = [
        'name', 'email', 'password',
    ];*/

    //para conectar con la mysql de la web
    protected $fillable = ['deleted', 'name','dni','surname', 'email', 'password', 'rol','verified','sex','birth_date',
        'direccion','codigo_postal','movil','fijo','whatsapp','video','foto','provincia_id','poblacion_id','pais_id','tipo_canal_id','baneado'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}