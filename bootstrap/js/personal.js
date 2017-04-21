//visible or hidden excerpts

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