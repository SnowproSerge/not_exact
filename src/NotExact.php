<?php
/**
 * Created by PhpStorm.
 * User: uzhass
 * Date: 21.09.16
 * Time: 12:28
 */

namespace Snowserge\NotExact;


class NotExact
{

    public function approximateValues($val)
    {
        $i_pref=0;
        $razz_n =1;
        $ed = [
            0=>'',
            1=>'',
            2=>'двух ',
            3=>'трёх ',
            4=>'четырёх ',
            5=>'пяти ',
            6=>'шести ',
            7=>'семи ',
            8=>'восьми ',
            9=>'девяти ',
        ];
        $digit = [
            2 => ['десяти','десятков'],
            3 => ['сотни','сотен'],
            4 => ['тысячи','тысяч'],
            5 => ['десяти тысяч','десятков тысяч'],
            6 => ['ста тысяч','сотен тысяч'],
            7 => ['миллиона','миллионов'],
            8 => ['десяти миллионов','десятков миллионов'],
            9 => ['ста миллионов','сотен миллионов'],
            10 => ['миллиарда','миллиардов']
        ];
        $pref = [0=>'Более',1=>'Около'];

        $val= (int)$val;
        $ret='';
        if($val < 101) {
            $ret .= $val;
        }
        else {
            $strVal = ''.$val;
            $first = (int)$strVal[0];
            if($first<2) {
                $razz_n = 0;
            }
            $razz = strlen($strVal);
            if($por = ((int)substr($strVal, 0, 2) > 95)) {
                $i_pref=1;
                $first = 0;
                $razz++;
                $razz_n=0;
            }
            $ret = $pref[$i_pref]. ' ' .$ed[$first].$digit[$razz][$razz_n];
        }
        echo "$val = $ret\n";
        return $ret;
    }
}