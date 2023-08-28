<?php

namespace Core;

use DateTime;

class Validator 
{
  public static function string($value, $min_length = 1, $max_length = INF)
  {
    $value = trim($value);
    return (strlen($value) >= $min_length && strlen($value) <= $max_length) ? true : false;
  }

  public static function email($value)
  {
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }

  public static function date($value, $format = 'Y-m-d H:i:s')
  {
      $date = DateTime::createFromFormat($format, $value);
      return $date && $date->format($format) === $value;
  }

  public static function contactNumber($value)
  {
      // Remove all non-digit characters from the contact number
      $cleanedNumber = preg_replace('/\D/', '', $value);
      
      // Validate the cleaned number based on your specific requirements
      // For example, you can check length or specific patterns
      
      // Example: Validate if the cleaned number is exactly 10 digits
      return strlen($cleanedNumber) <= 13;
  }
}