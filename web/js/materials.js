$(document).ready(function() {
    $('#materials').DataTable({
        select: true,
        "ajax": "/materials.json",
        "deferRender": true,
        "columns": [
            { "data": "title" },
            { "data": "lang_level" },
            { "data": "skills" },
            { "data": "thematic" },
            { "data": "lang_source" },
            { "data": "medium" }
        ]
    });
} );
