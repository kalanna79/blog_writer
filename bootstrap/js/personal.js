//visible or hidden excerpts

$('.showButton').mouseover(function() {
    var nb = $(this).attr('id');
    $('#details-'+nb).show();
});

$('.showButton').mouseout(function() {
    $('.details-chap').hide();
})
