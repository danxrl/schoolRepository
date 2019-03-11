<?php

// Funcion que convierte las cadenas de texto en su equivalente binario
function _to_bin($cadenas) {
  $cadenas = str_split($cadenas, 4);
  $bin = '';
  for ($i=0; $i < count($cadenas); $i++) {
    $bin = $bin . str_pad( decbin( hexdec( bin2hex( $cadenas[$i] ) ) ), strlen($cadenas[$i])*8, "0", STR_PAD_LEFT );
  }
  return $bin;
}

// Funcion que convierte las cadenas binarias a su equivalente en texto
function _to_text($cadenas) {
  $letras = array();

  for ($i=0; $i < sizeof($cadenas); $i++) {
    $binario = $cadenas[$i];
    $decimal = bindec($binario);
    $letra = chr($decimal);
    $letras[$i] = $letra;
  }

  return $letras;
}

// Funcion que separa una linea binaria de texto en sus caracteres de 8 en 8
function _separar_binarios($binarios) {
  $complemento = str_replace('0', '2', $binarios);
  $complemento = str_replace('1', '0', $complemento);
  $complemento = str_replace('2', '1', $complemento);
  $letras = str_split($complemento, 8);
  return $letras;
}

// Funcion que une los caracteres binarios en una sola linea
function _unir_binarios($binarios) {
  $cadena = '';
  for ($i=0; $i < sizeof($binarios); $i++) { $cadena = $cadena . $binarios[$i]; }
  return $cadena;
}


function _unir_texto($letras) {
  $texto = '';
  foreach ($letras as $letra) { $texto = $texto . $letra; }
  return $texto;
}