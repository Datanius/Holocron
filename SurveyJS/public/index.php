<?php include ("header.html"); ?>

<script>
    window.questionnaire = <?php echo file_get_contents(__DIR__ . "/questionnaire.json"); ?>
</script>
<div id="surveyElement"></div>
<div id="surveyResultElement"></div>
<script src="scripts/index.js"></script>
<div id="surveyResult"></div>
<?php include ("footer.html"); ?>