<?php
/*
* File Name: lib.php
* Created on 1/17/2022
* (c)2022 Bill Banks
*/

use Illuminate\Support\Facades\Auth;
use App\Models\User;

if (!function_exists('In_list')) {

    function In_list($list, $item, $listno): bool
    {
        $found = false;
        echo 'inlist ' . $list . '\n';
        foreach ($list as $l) {
            switch ($listno) {
                case  3:
                     if ($l->pronouns_id == $item)
                       return true;
                     break;
                case  2:
                    if ($l->dateabilitydeets_id == $item)
                        return true;
                    break;
                case  1:
                    echo $l->interests_id . "\n";
                    if ($l->interests_id == $item)
                        return true;
                    break;


            }



        }

        return $found;
    }
}


if (!function_exists('Is_Admin')) {

    function Is_Admin(): bool
    {
        $user = Auth::user();
        if (empty($user))
            return false;
        else
            return $user->isadmin;

    }
}


if (!function_exists('Is_Login')) {

    function Is_Login(): bool
    {

        return Auth::check();
    }
}



if (!function_exists('__tr')) {
    /**
     * String translations for gettext
     *
     * @param string $string
     * @param array $replaceValues
     * @return string
     */
    function __tr(string $string, array $replaceValues = []): string
    {
        $originalString = $string;
        $string = e($string);

        // Check if replaceValues exist
        if (!empty($replaceValues) and is_array($replaceValues)) {
            $string = strtr($string, $replaceValues);
        }

        // if numbers found in string change those also.
        $string = preg_replace_callback('!\d+!', function ($matches) {
            if (class_exists('NumberFormatter')) {
                $numberFormatter = new NumberFormatter(
                    config('CURRENT_LOCALE') ? config('CURRENT_LOCALE') : 'en_US',
                    NumberFormatter::IGNORE
                );
                return $numberFormatter->format($matches[0]);
            }
        }, $string);

        unset($matches);
        // check if there is blank string after processed
        // in such case we may need to use original string
        if (!$string) {
            // Check if replaceValues exist
            if (!empty($replaceValues) and is_array($replaceValues)) {
                $originalString = strtr($originalString, $replaceValues);
            }
            return $originalString;
        }
        return $string;
    }
}

if (!function_exists('__trn')) {
    /**
     * Translation for Plurals
     *
     * @param string $string
     * @param string $string2
     * @param integer $int
     * @param array $replaceValues
     * @return string
     */
    function __trn(string $string, string $string2 = '', int $int = 1, array $replaceValues = []): string
    {
        $int = (int)$int;
        $string = e($string);
        // Check if replaceValues exist
        if (!empty($replaceValues) and is_array($replaceValues)) {
            $string = strtr($string, $replaceValues);
        }

        // if numbers found in string change those also.
        $string = preg_replace_callback('!\d+!', function ($matches) {
            if (class_exists('NumberFormatter')) {
                $numberFormatter = new NumberFormatter(
                    config('CURRENT_LOCALE'),
                    NumberFormatter::IGNORE
                );
                return $numberFormatter->format($matches[0]);
            }
        }, $string);

        unset($matches);

        return $string;
    }
}
