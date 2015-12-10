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
var SOURCE_COL      = 4;
var LANGUAGE_COL    = 6;
var YEAR_COL        = 7;
var MODALITY_COL    = 8;
var ID_COL          = 9;
var TYPE_COL        = 10;

var THEMES_LIST     = "";

// Allow to format the lang level to include label class instead of pure text
var formatLangLevel = function(data) {
    var formatted = "";
    $.each(data, function(index, value) {
        formatted = formatted + '<span class="label label-primary">' + value + '</span>&nbsp;';
    });
    return formatted;
};

// Format type to translate ugly acronyms
var formatType = function(data) {
    var formatted = "";
    var datas = data[0].split(" ");
    $.each(datas, function(index, value) {
        formatted = formatted + Translator.trans(value, {}, 'medias');
    });
    return formatted;
}

var getThemeWithAlts = function(themes) {
    var themesWithAlts = fiThemeValue.slice();
    if ($.inArray("tourismus", fiThemeValue) != -1) {
        themesWithAlts.push("reise");
    }
    if ($.inArray("literatur", fiThemeValue) != -1) {
        themesWithAlts.push("literaturwissenschaft");
    }
    if ($.inArray("gastronomie", fiThemeValue) != -1) {
        themesWithAlts.push("hotellerie");
    }
    if ($.inArray("naturwissenschaft", fiThemeValue) != -1) {
        themesWithAlts.push("akademisch");
        themesWithAlts.push("wissenschaft");
    }
    if ($.inArray("informatik", fiThemeValue) != -1) {
        themesWithAlts.push("internet");
    }
    if ($.inArray("medizin", fiThemeValue) != -1) {
        themesWithAlts.push("pharmazie");
    }
    if ($.inArray("", fiThemeValue) != -1) {
        // here we check every theme the col may have that is not present in
        // the complete list of themes, if so, just add it when no particular
        // theme is chosen
        $.each( themes, function(key, value) {
            if ($.inArray(value, THEMES_LIST) == -1) {
                themesWithAlts.push(value);
            }
        });
    }

    return themesWithAlts;
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

function isUncommonSource(source) {
    var commonSources = ["deutsch", "englisch", "französisch", "italienisch", "spanisch"];
    return commonSources.indexOf(source) == -1;
}

// Check each row to filter
$.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {

        // fiLanguage
        var languages = data[LANGUAGE_COL].toUpperCase().split(" ");
        var languagesCheck = false;
        if (languages.indexOf(fiLanguageValue) == -1 && fiLanguageValue != "ALL") {
            return false;
        }

        // fiTheme
        var themes = data[THEME_COL].toLowerCase().split(" ");
        var themesWithAlts = getThemeWithAlts(themes);
        var themesCheck = false;
        // iterate over each theme to check if there is correspondance
        themesWithAlts.filter(function(n) {
            themesCheck = (themes.indexOf(n) != -1) ? true : themesCheck;
        });
        if (!themesCheck) {
            return false;
        }

        // fiModality
        var modalities = data[MODALITY_COL].toLowerCase().split(" ");
        var modalitiesCheck = false;
        // iterate over each modality to check if there is correspondance
        fiModalityValue.filter(function(n) {
            modalitiesCheck = (modalities.indexOf(n) != -1) ? true : modalitiesCheck;
        });
        if (!modalitiesCheck) {
            return false;
        }

        // fiSource
        var sources = data[SOURCE_COL].toLowerCase().split(", ");
        var sourcesCheck = false;
        // iterate over each source to check if there is correspondance
        fiSourceValue.filter(function(n) {
            if (n == "other") {
                var uncommonSources = sources.filter(isUncommonSource);
                sourcesCheck = (uncommonSources.length > 0) ? true : sourcesCheck;
            }
            else {
                sourcesCheck = (sources.indexOf(n) != -1) ? true : sourcesCheck;
            }
        });
        if (!sourcesCheck) {
            return false;
        }

        // fiType
        var types = data[TYPE_COL].toLowerCase().split(",");
        var typesCheck = false;
        // iterate over each type to check if there is correspondance
        fiTypeValue.filter(function(n) {
            typesCheck = (types.indexOf(n) != -1) ? true : typesCheck;
        });
        if (!typesCheck) {
            return false;
        }

        // fiYear
        var year = data[YEAR_COL];
        if (fiYearValue != "all" && year < fiYearValue) {
            return false;
        }

        return true;
    }
)


$(document).ready(function() {

    // Set list of themes
    $.ajax({
        url: "/materials/themes",
        dataType: "JSON",
        success: function(json) {
            THEMES_LIST = json;
        }
    })

    // Get current lang
    var currentLang = $("html").attr("lang");
    var langUrl = "//cdn.datatables.net/plug-ins/1.10.10/i18n/English.json";
    if (currentLang == "de") langUrl = "//cdn.datatables.net/plug-ins/1.10.10/i18n/German.json";
    else if (currentLang == "fr") langUrl = "//cdn.datatables.net/plug-ins/1.10.10/i18n/French.json";

    // Datatable init
    materialsTable = $("#materials .table").DataTable({
        "rowId": "id",
        "select": true,
        "ajax": "/materials.json",
        "deferRender": true,
        "fixedHeader": true,
        "pageLength": 25,
        "columns": [
            { "data": "title" },
            { "data": "lang_level", "render": function (data, type, full, meta) { return formatLangLevel(data) } },
            { "data": "skills[, ]" },
            { "data": "thematic[<br> ]" },
            { "data": "lang_source[, ]" },
            { "data": "medium", "render": function (data, type, full, meta) { return formatType(data) } },
            { "data": "lang_target", "visible": false },
            { "data": "year", "visible": false },
            { "data": "modality", "visible": false },
            { "data": "id", "visible": false },
            { "data": "type", "visible": false }
        ],
        "language": {
            "url": langUrl,
            "loadingRecords": '<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%"><span class="sr-only">45% Complete</span></div></div>',
        },
        "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row well'<'col-sm-5'i><'col-sm-7'p>>",
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
