<?php

function  _conversionFecha($valor){
    $fecha = explode("-",$valor);
    return $fecha[2].$fecha[1].$fecha[0];
}
