<?php
function chois($mode, $first, $second)
{
    switch($mode)
    {
        case 1: return $first + $second;
            break;
        case 2: return $first - $second;
            break;
        case 3: return $first * $second;
            break;
        case 4: return $first / $second;
            break;
        default: return null;
    }
}

function past_num($arr_num)
{
    $ret = "";
    foreach($arr_num as $key => $val)
    {
        $ret.= $val;
    }
    return $ret;
}

function chek_num($first, $second)
{
    if(!is_numeric(past_num($first)) && !is_numeric(pust_num($second))){
        return false;
    }else{return true;}
}
?>