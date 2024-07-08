// nice select
$(document).ready(function () {
    $('select').niceSelect();
});

// date picker
$(function () {
    $("#inputDate").datepicker({
        autoclose: true,
        todayHighlight: true
    }).datepicker('update', new Date());
});

document.addEventListener('DOMContentLoaded', function () {
    var myCarousel = document.querySelector('#customCarousel1');
    var carousel = new bootstrap.Carousel(myCarousel, {
      interval: 1000,
      wrap: true
    });
});