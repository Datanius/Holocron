function init() {
  var json = window.questionnaire;

  Survey.StylesManager.applyTheme("default");

  window.survey = new Survey.Model(json);
  survey.onComplete.add(function(result) {

    fetch('http://holocron.anton-bechtloff.de/SurveyJS/public/actions/saveResults.php', {
      method: 'post',
      body: JSON.stringify({"results": result.data})
    }).then(r => r.json())
        .then(json => {
          $("#surveyResultElement").append(
            '<div class="preismodell">Preismodell: '+json.preismodell+'</div>'
          );
          for (factor in json.factors) {

            var value = json.factors[factor];
            value = (value === null) ? "" : value;

            $("#surveyResultElement").append(
              '<div class="factor"><div class="key">' + factor + ':</div>'
                + '<div class="value">'+value+'</div></div>'
            );
          }
          // $("#surveyResultElement").text(text);
        })
  });

  $("#surveyElement").Survey({
    model: survey
  });
}

if (!window["%hammerhead%"]) {
  init();
}