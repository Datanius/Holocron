function surveyData() {
    return {
        questionnaire: window.questionnaire,
        pricingModels: window.pricingModels,
        preismodell: {},
        factors: {},
        tooltips: {},
        saveAnswers: function (result) {
            fetch('actions/saveResults.php', {
                method: 'post',
                body: JSON.stringify({"results": result.data})
            }).then(r => r.json())
                .then(json => {
                    this.preismodell = json.preismodell;
                    this.factors = json.factors;
                })
        },
        init: function () {
            var json = this.questionnaire;

            Survey.StylesManager.applyTheme("default");

            window.survey = new Survey.Model(json);
            survey.onComplete.add(result => {
                this.saveAnswers(result);
            });

            $("#surveyElement").Survey({
                model: survey
            });
        }
    }
}