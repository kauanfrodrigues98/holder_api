<?php

namespace App\Traits;

use Carbon\Carbon;
use DateInterval;

trait HelperTrait {

    /**
     * Compara duas datas e retorna o intervalo entre as duas
     *
     * @author Kauan Rodrigues <kauanfrodrigues98@gmail.com>
     * @access public
     * @param string $initialDate
     * @param string $finalDate
     * @return DateInterval
     */
    public static function getDuration(string $initialDate, string $finalDate):DateInterval
    {
        $initialDate = Carbon::createFromFormat('Y-m-d H:i:s', $initialDate);
        $finalDate = Carbon::createFromFormat('Y-m-d H:i:s', $finalDate);

        return $initialDate->diff($finalDate);
    }

    /**
     * Retorna o resultado da subtração do valor de venda - valor de compra
     *
     * @author Kauan Rodrigues <kauanfrodrigues98@gmail.com>
     * @access public
     * @param float $saleValue
     * @param float $purchaseValue
     * @return string|float|int $result
     */
    public static function getResult(float $saleValue, float $purchaseValue): string|float|int
    {
        $result = ($saleValue - $purchaseValue);

        return $result;
    }
}