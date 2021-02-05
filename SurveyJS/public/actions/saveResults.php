<?php

require_once __DIR__ . "/../../src/Questions/Question.php";
require_once __DIR__ . "/../../src/Questions/template_question_risk.php";
require_once __DIR__ . "/../../src/Questions/RiskSharing.php";
require_once __DIR__ . "/../../src/FactorObserver.php";
require_once __DIR__ . "/../../src/Preismodell.php";
require_once __DIR__ . "/../../src/Answer.php";

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
    "preismodell" => $Preismodell->calculate($FactorObserver->getFactors()),
    "factors" => $FactorObserver->getFactors()
]);