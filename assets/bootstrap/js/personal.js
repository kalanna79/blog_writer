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


// move the alert box in the page inscription
 $('#inscription').append($('#alert'));


//configuration of tinyMCE
tinymce.init({
    selector: '.chapitre',  // change this value according to your HTML
    plugin: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code'
    ],
    a_plugin_option: true,
    a_configuration_option: 400,

    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
    theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",

    toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
    content_css: '//www.tinymce.com/css/codepen.min.css'
});

//Flashmessages
var flashalert = $('#flashcontent');
var divflash = $('#divflash');
if (flashalert.length > 0)
{
    divflash.show().slideDown(500).delay(3000).slideUp(500);
};


var url = window.location.pathname;
var adresse = url.split('-');
console.log(adresse);
var pages = [];
for (var i = 2; i < adresse.length; i++) {
    var param = adresse[i];
}
if (param != '1') {
    $("#chaptertext").removeClass("book");
    $("#chaptertext").addClass("book-nolettrine");
}

var page = $('.numpage-'+param);
console.log(page);
$(page).css({
    color : '#1B6D85',
    fontsize : 'larger',
    width : '30px'
});

