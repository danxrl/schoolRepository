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

// Funcion que separa una linea binaria de texto en sus caracteres de 8 en 8
function _encriptar_linea($cadenas) {
  $letras = str_split($cadenas, 8);
  $encriptados = array();
  $random1 = random_int(0, 7);
  $random2 = random_int(0, 7);
  $random2 = ($random1 == $random2) ? random_int(0, 7) : $random2;

  for ($i=0; $i < sizeof($letras); $i++) {
    $binario = $letras[$i];
    $binarios = str_split($binario);
    $binarios[$random1] = ($binarios[$random1] == '0') ? '1' : '0';
    $binarios[$random2] = ($binarios[$random2] == '0') ? '1' : '0';
    $aux = '';
    foreach ($binarios as $valor) { $aux = $aux . $valor; }
    $letras[$i] = $aux;
  }

  $bin1 = _agregar_ceros(decbin($random1));
  $bin2 = _agregar_ceros(decbin($random2));

  array_push($letras, $bin1, $bin2);
  
  return $letras;
}

function _agregar_ceros($string) {
  for ($i=strlen($string); $i < 8; $i++) {  $string = '0' . $string; }
  return $string;
}

function _unir_linea($palabras) {
  $texto = '';
  foreach ($palabras as $palabra) { $texto = $texto . $palabra; }
  return $texto;
}

function _desencriptar_linea($caracteres) {
  $letras = str_split($caracteres, 8);
  $random1 = bindec(array_pop($letras));
  $random2 = bindec(array_pop($letras));

  for ($i=0; $i < sizeof($letras); $i++) { 
    $letra = $letras[$i];

    $binarios = str_split($letra);
    $binarios[$random1] = ($binarios[$random1] == '0') ? '1' : '0';
    $binarios[$random2] = ($binarios[$random2] == '0') ? '1' : '0';
    $aux = '';
    foreach ($binarios as $valor) { $aux = $aux . $valor; }

    $letras[$i] = $aux;
  }

  return $letras;
}

function _to_text($binarios) {
  $linea = '';
  for ($i=0; $i < sizeof($binarios); $i++) { 
    $decimal = bindec($binarios[$i]);
    $letra = chr($decimal);
    $linea = $linea . $letra;
  }

  return $linea;
}
