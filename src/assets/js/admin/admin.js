$(document).ready(function () {
    // Menü-Navigation
    $('.sidebar a').on('click', function (e) {
        e.preventDefault();
        var target = $(this).attr('href');
        $('.content > div').hide();
        $(target).show();
        if ($(window).width() <= 768) {
            $('.sidebar').removeClass('active');
        }
    });


    // Neue Seite hinzufügen
    $('#addPage').on('click', function () {
        var pageTitle = prompt("Titel der neuen Seite:");
        if (pageTitle) {
            $('#pageList').append(`
                <div class="card">
                    <div class="card-title">${pageTitle}</div>
                    <div class="card-content">
                        <button class="btn edit-page">Bearbeiten</button>
                        <button class="btn delete-page">Löschen</button>
                    </div>
                </div>
            `);
        }
    });

    // Seite bearbeiten und löschen
    $('#pageList').on('click', '.edit-page', function () {
        var card = $(this).closest('.card');
        var currentTitle = card.find('.card-title').text();
        var newTitle = prompt("Seitentitel bearbeiten:", currentTitle);
        if (newTitle) {
            card.find('.card-title').text(newTitle);
        }
    });

    $('#pageList').on('click', '.delete-page', function () {
        if (confirm("Möchten Sie diese Seite wirklich löschen?")) {
            $(this).closest('.card').remove();
        }
    });
});