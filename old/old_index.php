<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome to JQuery</title>
    <meta charset="UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../SurveyJS/public/stylesheets/survey.css" />
    <script src="../SurveyJS/public/scripts/survey.js"></script>
    <style>
        .factor {
            display: flex;
        }
    </style>
</head>

<body>
<?php

if(!isset($_GET["view"])) {
    echo "Hier gehts zur <a href='survey'>Umfrage</a>";
}
?>
</body>
</html>
