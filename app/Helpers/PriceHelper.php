<?php
namespace App\Helpers;

class PriceHelper
{
    public static function salePrice($purchasePrice, $utilityPercent)
    {
        return round ($purchasePrice * (1 + $utilityPercent / 100), 2);
    }

    public static function unitSalePrice($purchasePrice, $unitsBox, $utilityPercent)
    {
        if ($unitsBox <= 0) return 0;
        $unitCost = $purchasePrice / $unitsBox;
        return round($unitCost * (1 + $utilityPercent / 100), 2);
    }

    public static function blisterSalePrice($purchasePrice, $unitsBox, $unitsBlister, $utilityPercent)
    {
        if ($unitsBox <= 0 || $unitsBlister <= 0) return 0;
        $unitCost = $purchasePrice / $unitsBox;
        $blisterCost = $unitCost * $unitsBlister;
        return round($blisterCost * (1 + $utilityPercent / 100), 2);
    }
}