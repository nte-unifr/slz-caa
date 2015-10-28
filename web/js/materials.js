var materialsTable;

var fiLanguage      = $("#fiLanguage");
var fiTheme         = $("#fiTheme");
var fiModality      = $("#fiModality");
var fiVocabulary    = $("#fiVocabulary");
var fiReading       = $("#fiReading");
var fiListening     = $("#fiListening");
var fiSpeaking      = $("#fiSpeaking");
var fiPronunciation = $("#fiPronunciation");
var fiWriting       = $("#fiWriting");
var fiSpelling      = $("#fiSpelling");
var fiGrammar       = $("#fiGrammar");
var fiTests         = $("#fiTests");
var fiSource        = $("#fiSource");
var fiType          = $("#fiType");
var fiYear          = $("#fiYear");

var fiLanguageValue      = "";
var fiThemeValue         = "";
var fiModalityValue      = "";
var fiVocabularyValue    = "";
var fiReadingValue       = "";
var fiListeningValue     = "";
var fiSpeakingValue      = "";
var fiPronunciationValue = "";
var fiWritingValue       = "";
var fiSpellingValue      = "";
var fiGrammarValue       = "";
var fiTestsValue         = "";
var fiSourceValue        = "";
var fiTypeValue          = "";
var fiYearValue          = "";

var THEME_COL       = 3;
var LANGUAGE_COL    = 6;
var MODALITY_COL    = 8;

// Allow to format the lang level to include label class instead of pure text
var formatLangLevel = function(data) {
    var formatted = "";
    $.each(data, function(index, value) {
        formatted = formatted + '<span class="label label-primary">' + value + '</span>&nbsp;';
    });
    return formatted;
};
var filterTable = function(table, col, value) {
    value = value.toLowerCase() == "all" ? "" : value;
    table.columns(col).search(value).draw();
};

var setThemeAlts = function(themes) {
    if ($.inArray('reise', themes) != -1) {
        themes.push("tourismus");
    }
    if ($.inArray('literatur', themes) != -1) {
        themes.push("literaturwissenschaft");
    }
    if ($.inArray('gastronomie', themes) != -1) {
        themes.push("hotellerie");
    }
    if ($.inArray('geisteswissenschaft', themes) != -1) {
        themes.push("akademisch");
        themes.push("wissenschaft");
    }
    if ($.inArray('naturwissenschaft', themes) != -1) {
        themes.push("akademisch");
        themes.push("wissenschaft");
    }
    if ($.inArray('informatik', themes) != -1) {
        themes.push("internet");
    }
    if ($.inArray('medizin', themes) != -1) {
        themes.push("pharmazie");
    }
    return themes;
}

var setFiltersValues = function() {
    fiLanguageValue      = fiLanguage.chosen().val();
    fiThemeValue         = fiTheme.chosen().val();
    fiModalityValue      = fiModality.chosen().val();
    fiVocabularyValue    = fiVocabulary.chosen().val();
    fiReadingValue       = fiReading.chosen().val();
    fiListeningValue     = fiListening.chosen().val();
    fiSpeakingValue      = fiSpeaking.chosen().val();
    fiPronunciationValue = fiPronunciation.chosen().val();
    fiWritingValue       = fiWriting.chosen().val();
    fiSpellingValue      = fiSpelling.chosen().val();
    fiGrammarValue       = fiGrammar.chosen().val();
    fiTestsValue         = fiTests.chosen().val();
    fiSourceValue        = fiSource.chosen().val();
    fiTypeValue          = fiType.chosen().val();
    fiYearValue          = fiYear.chosen().val();
}

// Check each row to filter
$.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {

        // fiLanguage
        if (data[LANGUAGE_COL] != fiLanguageValue) {
            return false;
        }

        // fiTheme
        var themes = setThemeAlts(data[THEME_COL].toLowerCase().split(" "));
        var themesCheck = false;
        // iterate over every themes values to check if there is correspondance
        fiThemeValue.filter(function(n) {
            themesCheck = (themes.indexOf(n) != -1) ? true : themesCheck;
        });
        if (!themesCheck) {
            return false;
        }

        // fiModality
        var modalities = data[MODALITY_COL].toLowerCase().split(" ");
        var modalitiesCheck = false;
        // iterate over every themes values to check if there is correspondance
        fiModalityValue.filter(function(n) {
            modalitiesCheck = (modalities.indexOf(n) != -1) ? true : modalitiesCheck;
        });
        if (!modalitiesCheck) {
            return false;
        }

        return true;
    }
)


$(document).ready(function() {

    // Datatable init
    materialsTable = $("#materials .table").DataTable({
        "select": true,
        "ajax": "/materials.json",
        "deferRender": true,
        "fixedHeader": true,
        "columns": [
            { "data": "title" },
            { "data": "lang_level", "render": function (data, type, full, meta) { return formatLangLevel(data) } },
            { "data": "skills[, ]" },
            { "data": "thematic[<br> ]" },
            { "data": "lang_source[, ]" },
            { "data": "medium", "render": function (data, type, full, meta) { return data[0] } },
            { "data": "lang_target", "visible": false },
            { "data": "year", "visible": false },
            { "data": "asl", "visible": false }
        ],
        "language": {
            loadingRecords: '<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%"><span class="sr-only">45% Complete</span></div></div>'
        }
    });

    // Chosen init
    chosenElem = $(".js-chosen");
    chosenElem.chosen({width: "95%"});

    // Init filters values
    setFiltersValues();

    // Chosen on change
    chosenElem.change(function () {
        setFiltersValues();
        materialsTable.draw();
    });
})
