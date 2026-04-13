<?php

namespace helpers;

class StringUtils {

  // We use a static function to avoid instantiating an object from StringUtils, saving memory and improving readability
  public static function h($str) {
    return htmlspecialchars($str ?? '', ENT_QUOTES);
  }

  // Allows converting the title into a slug:
    // convert it to lowercase
    // replace accented characters with unaccented letters
    // replace all non-alphanumeric characters with -
    // replace multiple hyphens with a single hyphen
    // trim outer spaces and hyphens
  public static function slugify($title) {
    $title = strtolower($title);
    $search = ['à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ'];
    $rpl = ['a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y'];
    $title = str_replace($search, $rpl, $title);
    $title = preg_replace('/[^a-z0-9]+/', '-', $title);
    $title = preg_replace('/-+/', '-', $title);
    return trim($title, '-');
  }

}