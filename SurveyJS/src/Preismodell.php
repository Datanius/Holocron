<?php

class Preismodell
{
    public function calculate($factors){
        //Matrizenvergleich
        $pricingModels = [
            "Transaktionsbasiert" => ["Risikobereitschaft" => 5, "Budgetsituation_Kunde" => 2],
            "Time and Material" => ["Risikobereitschaft" => 5, "Budgetsituation_Kunde" => 2]
        ];
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