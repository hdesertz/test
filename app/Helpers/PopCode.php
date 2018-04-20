<?php

namespace App\Helpers;

class PopCode {
	static public function gePopCodeMsg($index=0){

        $codeArray = [

        ];

        return isset($codeArray[$index]) ? $codeArray[$index] : '';
    }

}