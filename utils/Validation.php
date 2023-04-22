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

  public static function validateName($name)
  {
    if (preg_match('/^[a-zA-Z ]{2,30}$/', $name)) {
      return $name;
    }
    throw new Exception('Invalid name');
  }

  public static function validatePhone($phone)
  {
    if (preg_match('/^[0-9]{10}$/', $phone)) {
      return $phone;
    }
    throw new Exception('Invalid phone number');
  }

  public static function validatePassword($password)
  {
    if (preg_match('/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};\'\\:"|<,\.>\/?]{8,30}$/', $password)) {
      return $password;
    }
    throw new Exception('Invalid password');
  }
  public static function validateCreditCardNumber($cardNumber)
  {
    if (preg_match('/^4[0-9]{12}(?:[0-9]{3})?$/', $cardNumber)) {
      return $cardNumber;
    }
    throw new Exception('Invalid credit card number');
  }
}