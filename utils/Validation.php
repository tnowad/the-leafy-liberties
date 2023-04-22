<?php
namespace Utils;

use Exception;

class Validation
{
  public static function validateEmail($email)
  {
    if (preg_match('/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/', $email)) {
      return $email;
    }
    throw new Exception('Invalid email');
  }
  public static function validatePassword($password)
  {
    if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $password)) {
      $password;
    }
    throw new Exception('Invalid password');
  }
  public static function validateCreditCardNumber($cardNumber)
  {
    if (preg_match('/^4[0-9]{12}(?:[0-9]{3})?$/', $cardNumber)) {
      $cardNumber;
    }
    throw new Exception('Invalid credit card number');
  }
}