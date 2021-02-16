<?php include("header.html"); ?>

<style>
    .preismodell {
        display: flex;
    }

    .preismodell > * {
        flex: 1;
    }

    .progress {
        background: #4caf50;
        height: 100%;
    }

    .flexbox {
        display: flex;
    }

    .progress-outer {
        width: 100px;
        display: flex;
        justify-content: flex-start;
        align-content: center;
        align-items: center;
    }

    .progress-inner {
        height: 2px;
        width: 100%;
        background: #ddd;
    }

    .box-preismodell {
        align-items: center;
        align-content: center;
        display: flex;
    }

    .tooltip {
        position: absolute;
        bottom: 0;
        left: 0;
        padding: 20px;
        z-index: 100;
        background: #fff;
        border: 1px solid #ccc;
        margin-left: 40px;
    }
</style>

<script>
    window.questionnaire = <?php echo file_get_contents(__DIR__ . "/questionnaire.json"); ?>;
    window.pricingModels = <?php echo file_get_contents(__DIR__ . "/pricingModels.json"); ?>;
</script>

<div x-data="surveyData()" x-init="init()">
    <div id="surveyElement"></div>
    <div id="surveyResultElement"></div>
    <script src="scripts/index.js"></script>
    <div id="surveyResult"></div>
    <template x-for="[modell, value] in Object.entries(preismodell)">
        <div class="preismodell">
            <div class="box-preismodell">
                <span x-text="modell"></span>
                <!-- Verzweigung excludete Modelle anzeigen  x-show wenn

                <div x-show="tooltips[modell in excluded]" x-on:click.away="tooltips[modell] = false" class="tooltip">

                andere divs wenn nicht model in excluded z.B. in zeile 74
                -->
<!--
                <div class="flexbox">
                    Durch Fragen ermittelter Faktor | Preismodelleignung nach Faktor
                </div> -->
                
                <span x-on:click="tooltips[modell] = true" style="position:relative; cursor:pointer;">
                    <svg width="24" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div x-show="tooltips[modell]" x-on:click.away="tooltips[modell] = false" class="tooltip">
                        <template x-for="[factor, factorValue] in Object.entries(factors)">


                            <div class="flexbox">
                                <div style="width: 300px" x-text="factor"></div>
                                <div class="progress-outer" style="flex: 1;">
                                    <div class="progress-inner">
                                        <div class="progress" :style="`width: ${factorValue.value * 10}%`"></div>
                                    </div>
                                </div>
                                <div class="progress-outer" style="flex: 1; margin-left: 10px;">
                                    <div class="progress-inner">
                                        <div class="progress" :style="`width: ${pricingModels[modell][factor] * 10}%`"></div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </span>
            </div>
            <div class="progress-outer">
                <div class="progress" :style="`width: ${value / 1}%`"></div>
            </div>
        </div>
    </template>
</div>

<?php include("footer.html"); ?>
