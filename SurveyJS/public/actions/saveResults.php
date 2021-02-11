<?php

require_once __DIR__ . "/../../src/Questions/Question.php";
require_once __DIR__ . "/../../src/FactorObserver.php";
require_once __DIR__ . "/../../src/Preismodell.php";
require_once __DIR__ . "/../../src/Answer.php";

//Questions reinladen
//Kunden
require_once __DIR__ . "/../../src/Questions/Kunden/Kunden_welche_art.php";
require_once __DIR__ . "/../../src/Questions/Kunden/Kunden_wer_ist.php";
require_once __DIR__ . "/../../src/Questions/Kunden/Kunden_wie_viele.php";
//Kundennutzen
require_once __DIR__ . "/../../src/Questions/Kundennutzen/Nutzen_wie_erfolgt.php";
require_once __DIR__ . "/../../src/Questions/Kundennutzen/Nutzen_wie_haeufig.php";
//Kundensituation
require_once __DIR__ . "/../../src/Questions/Kundensituation/Kundensit_bisherig_geeignet.php";
require_once __DIR__ . "/../../src/Questions/Kundensituation/Kundensit_bisherige_loesung.php";
require_once __DIR__ . "/../../src/Questions/Kundensituation/Kundensit_budgetsituation.php";
require_once __DIR__ . "/../../src/Questions/Kundensituation/Kundensit_kerngeschaeft_korreliert.php";
require_once __DIR__ . "/../../src/Questions/Kundensituation/Kundensit_loesung_aufwaendig.php";
require_once __DIR__ . "/../../src/Questions/Kundensituation/Kundensit_nutzergruppen.php";
require_once __DIR__ . "/../../src/Questions/Kundensituation/Kundensit_planungssicherheit.php";
require_once __DIR__ . "/../../src/Questions/Kundensituation/Kundensit_traegt_er_risiko.php";
require_once __DIR__ . "/../../src/Questions/Kundensituation/Kundensit_tragen_sie_risiko.php";
require_once __DIR__ . "/../../src/Questions/Kundensituation/Kundensit_zahlungsbereitschaft.php";
require_once __DIR__ . "/../../src/Questions/Kundensituation/Kundensit_zusammenbrechen_service.php";
//Markt
require_once __DIR__ . "/../../src/Questions/Markt/Markt_eigenrealisierung.php";
require_once __DIR__ . "/../../src/Questions/Markt/Markt_entwicklung.php";
require_once __DIR__ . "/../../src/Questions/Markt/Markt_preismodell_alt.php";
require_once __DIR__ . "/../../src/Questions/Markt/Markt_vergleichbare_produkte.php";
//netzwerk
require_once __DIR__ . "/../../src/Questions/Netzwerk/Netzwerk_gewinnbeteiligung.php";
require_once __DIR__ . "/../../src/Questions/Netzwerk/Netzwerk_kunden_kooperation.php";
//Technik
require_once __DIR__ . "/../../src/Questions/Technik/Technik_erfassung_moeglich.php";
require_once __DIR__ . "/../../src/Questions/Technik/Technik_hohe_fixkosten.php";
require_once __DIR__ . "/../../src/Questions/Technik/Technik_welche_erfassung.php";


$json = json_decode(trim(file_get_contents("php://input")), true);

$surveyIdentifier = uniqid();

$results = $json["results"];

$FactorObserver = new FactorObserver();

foreach($results as $key => $result) {
    $Answer = new Answer($surveyIdentifier, $key, $result, date("Y-m-d H:i:s"));
    $Answer->attach($FactorObserver);
    $Answer->save();
}

$Preismodell = new Preismodell();


echo json_encode([
    "preismodell" => $Preismodell->calculate($FactorObserver->getFactors(),$FactorObserver->getExcluded()),
    "factors" => $FactorObserver->getFactors()
]);