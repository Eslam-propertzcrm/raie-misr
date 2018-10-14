<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // if you need change table settings
    /*
    at this point you must know that when you calling any function in class post or model ,
    Eloquent by its selfe will use the popular version of the class name during the SQL query 
    ------
    so if you have model called "company" the >>>> company::all();
    so the query will be >>>> select * from companies
    -------
    and if the model called post >>>> post::all();
    the query will be >>>> select * from posts
    ------
    so you can solve that by two ways 
    first >>> by naming the table in popular version 
    the second >>> by add property in the model called >>> $table = 'the name that you want here';
    and you must be with this name as the same >>> $table
    as i did in the next line
    */

    // table name 
    protected $table = 'users';

    // Primary Key
    Public $primaryKey = 'id';

    // Timestamps
    Public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
