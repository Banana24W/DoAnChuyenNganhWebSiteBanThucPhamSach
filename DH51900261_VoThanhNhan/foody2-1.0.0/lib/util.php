<?php
function rand_index($arr = array())
{
    return rand (0, count($arr)-1);
}

function get_color($price)
{
    if($price>500000)
    {
        return "red";
    }elseif($price>200000)
    {
        return "yellow";
    }else
    {
        return "green";
    }
}

function format_price($price)
{
    return number_format($price,0,",",".");
}
?>