<?php

function toCurrency($symbol, $value) {
  return $symbol . '' . number_format($value, 2, ',', '.');
}

function date_formatter($date) {
  return date('d F Y', strtotime($date));
}

function reproduce_percentage($value, $total) {
  return ($value / $total) * 100;
}