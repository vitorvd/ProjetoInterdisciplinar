

$(document).ready(function() {
    /*-----------------------Navbar Fundo-------------------------*/
    $(window).on("scroll", function() {
        if($(this).scrollTop() > 90) {
            $(".navbar").addClass("navbar-fundo");
        }
        else {
            $(".navbar").removeClass("navbar-fundo");
        }
    });
    /*-----------------------Video-------------------------------*/
    const videoSrc = $("#player-1").attr("src");
    $(".video-play-btn, .video-popup").on("click", function() {
        if($(".video-popup").hasClass("open")) {
            $(".video-popup").removeClass("open");
            $("#player-1").attr("src", "");
        }
        else {
            $(".video-popup").addClass("open");
            if($("#player-1").attr("src")== '') {
                $("#player-1").attr("src", videoSrc);
            }
        }
    });
});