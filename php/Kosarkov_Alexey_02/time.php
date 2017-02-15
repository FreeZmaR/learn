<?php 

function time_hours($hour)
{
    if($hour==1 || $hour==21){
        return $hour." час ";
    }else if(($hour>=2 && $hour<=4) || ( ($hour>=22 && $hour<=23) ) ){
        return $hour." часа ";
    }else{
        return $hour." часов ";
    }
}

function time_minuts($minut)
{
    
    if( ($minut>=5 && $minut<=20) || ($minut>=25 && $minut<=30) || ($minut>=35 && $minut<=40) || ($minut>=45 && $minut<=50) || ($minut>=55 && $minut<=59) )
    {
        return $minut." минут ";
    }else if($minut==1 || $minut==21 || $minut==31 || $minut==41 || $minut==51)
    {
        return $minut." минута ";
    }else{
        return $minut." минуты ";
    }
}
?>