//visible or hidden excerpts in index

$('.showButton').mouseover(function() {
    var nb = $(this).attr('id');
    $('.details-chap').last().hide();
    $('#details-'+nb).show();
});

$('.showButton').mouseout(function() {
    $('.details-chap').hide();
    $('.details-chap').last().show();
})

$('.showButton').ready(function() {
   // $('h3').last().add('<span id="new">NEW</span>').prependTo(document.getElementsByClassName('details-chap'));

    $('.details-chap').last().show();
})


//visible or hidden reply to comment
$('.showForm').click(function() {
    var nb = $(this).attr('id');
    $('#rep-'+nb).show();

});

//toggle comments in chapter view
$('#comment').click(function() {
    $('.showComment').toggle();
});


//hide response button for level 2 comments
if ($('.level2')) {
    $('.alevel2').hide();
};

//no ornated initial letter for the others pages than page 1

/* cherche dans l'adresse le numéro de la page
/*si la page est > 1
/* change le CSS .book en .book nolettrine
 */

    var adresse = location.search.substring(1).split('&');
    var pages = [];
    for (var i = 0; i < adresse.length; i++) {
        var param = adresse[i].split('=');
        pages[param[0]] = param[1];
    }
    if (pages['page'] != '1') {
        $("#chaptertext").removeClass("book");
        $("#chaptertext").addClass("book-nolettrine");
    }
