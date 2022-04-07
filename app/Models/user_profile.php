<?php
/*
* File Name:  user_profile.php
* Created on 12/31/2021
* (c) 2021 Bill Banks
*/



namespace App\Models;

use App\Models\children;
use App\Models\gender;

use App\Models\photos;
use App\Models\dateabilitydeets;
use App\Models\dateabilitydeets_list;
use App\Models\education;
//use App\Models\gender;
use App\Models\interests;
use App\Models\interests_list;
use App\Models\politics;
use App\Models\pronouns;
use App\Models\Prounouns_list;
use App\Models\religion;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations;

/**
 *
 */
class user_profile extends Model
{

    protected $fillable = ['user_id','active','email'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Gender()
    {
        $rec = gender::find($this->gender_id)->get();
        return $rec->description;
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Education()
    {
        $rec = education::find($this->education_id)->get();
        return $rec->description;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Politics()
    {
        $rec = politics::find($this->politics_id)->get();
        return $rec->description;
    }

    public function Children()
    {
        $rec = children::find($this->children_id)->get();
        return $rec->description;
    }

    public function Religion()
    {
        $rec = religion::find($this->religion_id)->get();
        return $rec->description;
    }

    public function Interests()
    {
        //return $this->hasMany('interests_list','user_id','user_id');
        $ids = interests_list::all()->where('user_id','=',$this->user_id);
        foreach ($ids as $id)
            $recs[] = interests::find($id)->get();
        return $recs;

    }


    public function Pronouns()
    {
        $ids = Prounouns_list::all()->where('user_id','=',$this->user_id);
        foreach ($ids as $id)
            $recs[] = pronouns::find($id)->get();
        return $recs;
    }


    public function Dateabilitydeets()
    {
        $ids = dateabilitydeets_list::all()->where('user_id','=',$this->user_id);
        foreach ($ids as $id)
            $recs[] = dateabilitydeets::find($id)->get();
        return $recs;
    }

    public function Photos()  {
        return photos::all()->where('user_id','=',$this->user_id);

    }

    public function Sent_Messages() {
        return messages::all()->where('from_user_id','=',$this->user_id);
    }

    public function Recv_Messages() {
        return messages::all()->where('to_user_id','=',$this->user_id);
    }

    public function Age() : int {

        $dateOfBirth = $this->dob;
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        return (int) $diff->format('%y');

    }
}
