<?php

class Preismodell
{
    public function calculate($factors){
        //Matrizenvergleich
        $pricingModels = json_decode(file_get_contents(__DIR__."/../public/pricingModels.json"));
        $summen = [];
        foreach ($pricingModels as $pricingModel => $pricingModelFactors) {
            $summe = 0;
            foreach ($pricingModelFactors as $pricingModelFactor => $factorValue) {
                $factorInfo = $factors[$pricingModelFactor];
                //     $differenz = $factorInfo["multiplier"] * abs($factorInfo["values"] - $factorValue);
                if (empty($factorInfo["values"])) {
                    $value = 0;
                } else {
                    $value = array_sum($factorInfo["values"]) / count($factorInfo["values"]);
                }
                //    $value = array_sum($factorInfo["values"]) / count($factorInfo["values"]);

                $differenz = $factorInfo["multiplier"] * abs($value - $factorValue);
                $summe += $differenz;
            }
            $summen[$pricingModel] = $summe;
        }
        asort($summen);
        return $summen;
    }
}