<?php
/*
* File Name: Findzips.php
* Created on 2/23/2022
* (c)2022 Bill Banks
*/

namespace App\Ourweb;

class Findzips
{

    var $mile = "10";
    var $zipcode = "01520";

    public function __construct($mile, $zipcode)
    {
        $this->mile = $mile;
        $this->zipcode = $zipcode;
    }

    public function pullinfo()
    {


        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://redline-redline-zipcode.p.rapidapi.com/rest/multi-radius.json/" . $this->mile . "/mile",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "zip_codes=" . $this->zipcode,
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: redline-redline-zipcode.p.rapidapi.com",
                "x-rapidapi-key: 1848085eabmsh940cc1d068e0c17p16e385jsne98f0750b91d"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error";
        } else {
            return $response;
        }
    }

    public function Run()
    {

        $res = $this->pullinfo();
        if ($res != "cURL Error") {
            $jsom = json_decode($res, true);

            $zips = $jsom['responses'][0]["zip_codes"];
            return $zips;
        }
        return null;

    }

}
