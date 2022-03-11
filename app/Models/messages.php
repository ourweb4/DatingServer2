<?php
/*
* File Name:  messages.php
* Created on 3/3/2022
* (c) 2022 Bill Banks
*/


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class messages extends Model
{

    public function To_User() {
        return $this->hasOne('user_profile','user_id','to_user_id');
    }

    public function From_User() {
        return $this->hasOne('user_profile','user_id','from_user_id');
    }









}
