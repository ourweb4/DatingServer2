<?php
/*
* File Name: Filter.php
* Created on 2/25/2022
* (c)2022 Bill Banks
*/

namespace App\Ourweb;
use App\Models\user_profile;
use App\Ourweb\Findzips;

class Filter
{

    var $mile = "10";
    var $zipcode = "01520";
    var $gender, $lage,$hage;

    public function __construct($mile, $zipcode, $gender, $lage, $hage)
    {

        $this->mile=$mile;
        $this->zipcode = $zipcode;
        $this->gender=$gender;
        $this->lage= (int) $lage;
        $this->hage= (int) $hage;
    }

    public function run() {

        $master = array();

        $findzip = new  Findzips($this->mile. $this->zipcode);
        $zips = $findzip->Run();

        foreach ($zips as $zip) {
            $recs = user_profile::all()
                ->where('zipcode', '=',$zip)
                ->where('gender_id','=',$this->gender)
                ->get();
            foreach ($recs as $rec) {

                if ($rec->age() > $this->lage && $rec->age() < $this->hage) {
                    $master[]=$rec;
                }
            }
        }

        return $master;
    }
}
