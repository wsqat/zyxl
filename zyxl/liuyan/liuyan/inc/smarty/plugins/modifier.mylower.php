<?php
function smarty_modifier_mylower($string)
{
    return strtoupper(substr($string,0,1)).strtolower(substr($string,1,strlen($string)-1));
}

?>