<?php

class Preismodell
{
    public function calculate($factors){
        //Matrizenvergleich
        $pricingModels = json_decode(file_get_contents(__DIR__."/../public/pricingModels.json"));
        $summen = [];
        foreach ($pricingModels as $pricingModel => $pricingModelFactors) { //die Preismodelle durchlaufen
            $summe = 0;
            foreach ($pricingModelFactors as $pricingModelFactor => $factorValue) {
                //von den jew. Preismodellen die Faktoren durchlaufen
                $factorInfo = $factors[$pricingModelFactor];
                //der entsprechende Faktor, den wir über die Antworten ermittelt und übergeben bekommen haben
                if (empty($factorInfo["values"])) {//wenn Faktor nicht mit Werten belegt wurde
                    $value = 0;
                } else {
                    $value = array_sum($factorInfo["values"]) / count($factorInfo["values"]);
                    //summiert Faktoren Array und teilt sie durch die Anzahl der Einträge im Array
                }
                $differenz = $factorInfo["multiplier"] * abs($value - $factorValue);
                $summe += $differenz;
            }
            $summen[$pricingModel] = $summe;
        }
        asort($summen);
        return $summen;
    }
}