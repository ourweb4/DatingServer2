<?php
/*
* File Name:  gender.php
* Created on 1/6/2022
* (c) 2022 Bill Banks
*/


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class gender extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
    ];
}
