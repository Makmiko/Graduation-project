$(document).ready(function() {
    //Contacts fade toggling
    function showSocial(event) {
        let social = document.getElementById("social");
        if(event.target == social) {
        $(".social").fadeToggle("slow");
        } else {
        $(".social").fadeOut("slow");
        }
    }
    $("body").click(showSocial);

    //Toggling account menus
    function toggleRealtyAddForm() {
        $(".fadeRealty").fadeOut();
        $(".fadeAddRealty").fadeIn();
    }
    function toggleRealty() {
        $(".fadeRealty").fadeIn();
        $(".fadeAddRealty").fadeOut();
    }
    $("#addNewRealty").click(toggleRealtyAddForm);
    $("#myObjects").click(toggleRealty);
    $(".fadeOut").click((event) => {
        $(event.target).fadeOut();
    });

    //Image carousel in a certain one realty by slick
    $('.slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        responsive: true,
        prevArrow: $('.fas.fa-arrow-left'),
        nextArrow: $('.fas.fa-arrow-right'),
        autoplay: true,
        autoplaySpeed: 2000,
    });
});