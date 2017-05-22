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
/* si dans l'adresse, il y a une ancre, montre la div et va à l'ancre, sinon si clic, ouvre la div */
//show comment's text that is moderated
$('.showComment').hide();


$('#comment').click(function() {
    $('.showComment').toggle();
});




//hide response button for level 2 comments
if ($('.level2')) {
    $('.alevel2').hide();
}

//no ornated initial letter for the others pages than page 1

/* cherche dans l'adresse le numéro de la page
/*si la page est > 1
/* change le CSS .book en .book nolettrine
 */
    var url = window.location.pathname;
    var adresse = url.split('/');
   // console.log(adresse);
    var pages = [];
    for (var i = 2; i < adresse.length; i++) {
        var param = adresse[i].split('-');
        console.log(param);
    }
    if (param[2] != '1') {
        $("#chaptertext").removeClass("book");
        $("#chaptertext").addClass("book-nolettrine");
    }

// move the alert box in the page inscription
 $('#inscription').append($('#alert'));


tinymce.init({
    selector: '.chapitre',
    height: 500,
    menubar: false,
    plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code'
    ],
    toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
    content_css: '//www.tinymce.com/css/codepen.min.css'
});