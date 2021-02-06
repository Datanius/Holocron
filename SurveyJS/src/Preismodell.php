<?php

class Preismodell
{
    public function calculate($factors){
        //Matrizenvergleich
        $pricingModels = [
            "Time and Material" => ["Nutzer" => 10, "Risiko" => 0, "Preisbereitschaft" => 0, "Anzahl Nutzergruppen" => 0, "Budgetsituation Kunde" => 10,
                "Bedürfnishäufigkeit" => 3, "Skalierbarkeit" => 0, "Nutzungsabhängig" => 0, "Erfahrung_Kunde" => 10, "Nutzungserfassung" => 0, "Modell_am_Markt" => 0],
            "Transaktionsbasiert" => ["Nutzer" => 5, "Risiko" => 10, "Preisbereitschaft" => 2, "Anzahl Nutzergruppen" => 5, "Budgetsituation Kunde" => 10,
                "Bedürfnishäufigkeit" => 10, "Skalierbarkeit" => 10, "Nutzungsabhängig" => 10, "Erfahrung_Kunde" => 5, "Nutzungserfassung" => 10, "Modell_am_Markt" => 5],
            "Inhaltsbasiert" => ["Nutzer" => 3, "Risiko" => 0, "Preisbereitschaft" => 10, "Anzahl Nutzergruppen" => 5, "Budgetsituation Kunde" => 3,
                "Bedürfnishäufigkeit" => 10, "Skalierbarkeit" => 10, "Nutzungsabhängig" => 10, "Erfahrung_Kunde" => 10, "Nutzungserfassung" => 10, "Modell_am_Markt" => 0],
            "Volumenbasiert" => ["Nutzer" => 4, "Risiko" => 5, "Preisbereitschaft" => 3, "Anzahl Nutzergruppen" => 5, "Budgetsituation Kunde" => 3,
                "Bedürfnishäufigkeit" => 10, "Skalierbarkeit" => 10, "Nutzungsabhängig" => 7, "Erfahrung_Kunde" => 5, "Nutzungserfassung" => 10, "Modell_am_Markt" => 5],
            "Nutzungspauschale" => ["Nutzer" => 5, "Risiko" => 7, "Preisbereitschaft" => 5, "Anzahl Nutzergruppen" => 0, "Budgetsituation Kunde" => 5,
                "Bedürfnishäufigkeit" => 0, "Skalierbarkeit" => 0, "Nutzungsabhängig" => 0, "Erfahrung_Kunde" => 10, "Nutzungserfassung" => 0, "Modell_am_Markt" => 3],
            "Pro Asset basiert" => ["Nutzer" => 5, "Risiko" => 7, "Preisbereitschaft" => 8, "Anzahl Nutzergruppen" => 0, "Budgetsituation Kunde" => 5,
                "Bedürfnishäufigkeit" => 0, "Skalierbarkeit" => 0, "Nutzungsabhängig" => 0, "Erfahrung_Kunde" => 10, "Nutzungserfassung" => 0, "Modell_am_Markt" => 3]
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