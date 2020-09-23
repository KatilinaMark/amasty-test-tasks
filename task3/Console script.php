<?php
    function sort_arr($array){
        for($i = 0; $i < count($array) - 1; $i++){
            for($j = $i; $j < count($array) - 1; $j++){
                if($array[$j] > $array[$j + 1]){
                    $tmp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $tmp;
                }
            }
        }

        return $array;
    }    

    $arr = explode(" " , $argv[1]);

    $new_arr = [];

    foreach($arr as $element){
       if(preg_match('/^(0|-??[1-9][0-9]*)$/', $element)){
            if(!in_array($element, $new_arr)){
                $new_arr[] = $element;
            }            
       }
    }

    print_r(sort_arr($new_arr));
?>