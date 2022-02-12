<?php
/*
* File Name:  Interests_list.php
* Created on 1/10/2022
* (c) 2022 Bill Banks
*/


namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class interests_list extends Model
{
    public function Interests() {
        return $this->hasOne('Interests','id','Interests_id');
    }
}
