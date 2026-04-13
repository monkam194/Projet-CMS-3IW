<?php

namespace helpers;

class checkInputs {
  public static function isSafePassword($psw) {
    return preg_match('/^(?=.*[A-Z])(?=.*[\W_]).{8,}$/', $psw) === 1;
  }
  public static function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
  }
}