<?php
    function sort_arr($array){
        for($i = count($array) - 1; $i >= 1; $i--){
            for($j = 0; $j < $i; $j++){
                if($array[$j] > $array[$j + 1]){
                    $tmp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $tmp;
                }
            }
        }

        return $array;
    }    

    $chars_arr = explode(" " , $argv[1]);

    $num_arr = [];

    foreach($chars_arr as $element){
       if(preg_match('/^(0|-??[1-9][0-9]*)$/', $element)){
            if(!in_array($element, $num_arr)){
                $num_arr[] = $element;
            }            
       }
    }

    print_r(sort_arr($num_arr));
?>