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
                $differenz = $factorInfo["multiplier"] * abs($factorInfo["value"] - $factorValue);
                $summe += $differenz;
            }
            $summen[$pricingModel] = $summe;
        }
        asort($summen);
        return $summen;
    }
}