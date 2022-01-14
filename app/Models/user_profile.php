<?php
/*
* File Name:  user_profile.php
* Created on 12/31/2021
* (c) 2021 Bill Banks
*/



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations;

/**
 *
 */
class user_profile extends Model
{


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Gender()
    {
        return $this->hasOne('gender','id','gender_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Education()
    {
        return $this->hasOne('education','id','education_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Politics()
    {
         return $this->hasOne('politics','id','politic_id');
    }

    public function Children()
    {
        return $this->hasOne('children','id','children_id');
    }

    public function Religion()
    {
        return $this->hasOne('religion','id','religion_id');
    }

    public function Interests()
    {
        return $this->hasMany('interests_list','user_id','user_id');
    }


    public function Pronouns()
    {
        return $this->hasMany('pronouns_list','user_id','user_id');
    }


    public function Dateabilitydeets()
    {
        return $this->hasMany('dateabilitydeets_list','user_id','user_id');
    }
}
