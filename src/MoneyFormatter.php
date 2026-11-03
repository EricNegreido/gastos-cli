<?php
declare(strict_types=1);

namespace App;
use TypeError;
class MoneyFormatter
{

    static function format(int $cents): string
    {

      $is_multiple_of_100 = $cents % 100 === 0;
      if($is_multiple_of_100) {
        $cents = (string) ($cents / 100) . ',00';
      }else{
        if($cents % 10 === 0) {
          $cents = (string) ($cents / 100) . '0';
        }else{
          $cents = (string) ($cents / 100);
        }
      }

      return (string) str_replace('.', ',', $cents);
    }


    static function parse(string $cents): ?int
    {
      $cents = str_replace('.', '', $cents);
      $cents = str_replace(',', '', $cents);


      return is_numeric($cents) ? (int) $cents : null;


    }

    static function sum(int ...$amounts): int 
    {
        return array_sum($amounts);
    }
}

var_dump(MoneyFormatter::parse("0")) . PHP_EOL;
var_dump(MoneyFormatter::parse("abc")) . PHP_EOL;