<?php

class FactorObserver implements SplObserver
{
    private $factors = [
        "Nutzer" => ["value" => null, "multiplier" => 1, "called"=>null],
        "Risiko" => ["value" => null, "multiplier" => 1], "called"=>null,
        "Preisbereitschaft" => ["value" => null, "multiplier" => 1, "called"=>null],
        "Anzahl Nutzergruppen" => ["value" => null, "multiplier" => 1,"called"=>null],
        "Budgetsituation Kunde" => ["value" => null, "multiplier" => 1,"called"=>null],
        "Bedürfnishäufigkeit" => ["value" => null, "multiplier" => 1,"called"=>null],
        "Skalierbarkeit" => ["value" => null, "multiplier" => 1,"called" =>null],
        "Nutzungsabhängig" => ["value" => null, "multiplier" => 1,"called"=>null],
        "Erfahrung_Kunde" => ["value" => null, "multiplier" => 1,"called"=>null],
        "Nutzungserfassung" => ["value" => null, "multiplier" => 1,"called"=>null],
        "Modell_am_Markt" => ["value" => null, "multiplier" => 1,"called"=>null]
    ];

    public function getFactors()
    {
        return $this->factors;
    }

    public function update($answer)
    {
        $this->calculate($answer->getKey(), $answer->getValue());
    }

    public function calculate(string $questionKey, $value)
    {
        $questions = [
            //Kunden
            "kunden_wer_ist"=>Kunden_wer_ist::class,
            "kunden_welche_art" => Kunden_welche_art::class,
            "kunden_wie_viele" =>Kunden_wie_viele::class,
            //Kundensituation
            "kundensit_traegt_er_risiko" => Kundensit_traegt_er_risiko::class,
            "kundensit_tragen_sie_risiko" => Kundensit_tragen_sie_risiko::class,
            "kundensit_zusammenbrechen_service" => Kundensit_zusammenbrechen_service::class,
            "kundensit_kerngeschaeft_korreliert" => Kundensit_kerngeschaeft_korreliert::class,
            "kundensit_loesung_aufwaendig" => Kundensit_loesung_aufwaendig::class,
            "kundensit_bisherig_geeignet" => Kundensit_bisherig_geeignet::class,
            "kundensit_bisherige_loesung"=>Kundensit_bisherige_loesung::class,
            "kundensit_nutzergruppen" => Kundensit_nutzergruppen::class,
            "kundensit_zahlungsbereitschaft" => Kundensit_zahlungsbereitschaft::class,
            "kundensit_planungssicherheit" => Kundensit_planungssicherheit::class,
            "kundensit_budgetsituation"=>Kundensit_budgetsituation::class,
            //Kundennutzen
            "nutzen_wie_haeufig" => Nutzen_wie_haeufig::class,
            "nutzen_wie_erfolgt" => Nutzen_wie_erfolgt::class,
            //Markt
            "markt_vergleichbare_produkte" => Markt_vergleichbare_produkte::class,
            "markt_preismodell_alt" => Markt_preismodell_alt::class,
            "markt_entwicklung" => Markt_entwicklung::class,
            "markt_eigenrealisierung" => Markt_eigenrealisierung::class,
            //Netzwerk
            "netzwerk_gewinnbeteiligung" => Netzwerk_gewinnbeteiligung::class,
            "netzwerk_kunden_kooperation" => Netzwerk_kunden_kooperation::class,
            //Technik
            "technik_hohe_fixkosten" => Technik_hohe_fixkosten::class,
            "technik_erfassung_moeglich" => Technik_erfassung_moeglich::class,
            "technik_welche_erfassung" => Technik_welche_erfassung::class,
        ];
        $class = $questions[$questionKey];
        $class = new $class();
        $class->calculate($value, $this->factors);
    }
}