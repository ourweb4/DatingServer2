<?php
/*
* File Name:  dateabilitydeets_list.php
* Created on 1/11/2022
* (c) 2022 Bill Banks
*/


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dateabilitydeets_list extends Model
{
    public function dateabilitydeets() {
        return $this->hasOne('dateabilitydeets','id','dateabilitydeets_id');
    }
}
