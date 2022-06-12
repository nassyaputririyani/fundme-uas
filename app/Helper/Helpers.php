<?php

function toCurrency($symbol, $value) {
  return $symbol . '' . number_format($value, 2, ',', '.');
}

function date_formatter($date) {
  return date('d F Y', strtotime($date));
}

function reproduce_percentage($value, $total) {
  $total_percentage = ($value / $total) * 100;

  if ($total_percentage > 100) {
    return 100;
  } else {
    return intval($total_percentage);
  }
}