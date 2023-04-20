<?php

namespace Utils;

class Pagination
{
  public static function paginate(array $array, int $page, int $perPage): array
  {
    $offset = ($page - 1) * $perPage;
    return array_slice($array, $offset, $perPage);
  }
}
