$(document).ready(function () {

    $('.intro_slide').bxSlider({
        auto: true,
        controls: false,
        autoControls: true
    });

    $('.visual_banner_slide').bxSlider({
        auto: true,
        controls: false,
        autoControls: true,
        mode: 'fade',
        speed: 3000 //속도
    });

    $('.banner_left').bxSlider({
        slideWidth: 230,
        minSlides: 3,
        maxSlides: 4,
        moveSlides: 1,
        auto: true,
        controls: true,
        autoControls: true,
        pager: false
    });

    $("#banner_zone .bx-start").click(function () {
        $(this).css("display", "none");
        $(".bx-stop").css("display", "block");
    });

    $("#banner_zone .bx-stop").click(function () {
        $(this).css("display", "none");
        $(".bx-start").css("display", "block");
    });

    $(".family_site dt a").click(function () {
        $(".family_site dd").css("display", "block");
    });

    $(".family_close").click(function () {
        $(".family_site dd").css("display", "none");
    });

    $(".calendar_dd>li>a").click(function () {
        $(".calendar_dd>li").removeClass("on");
        $(this).addClass("on");
    });
    /*
    $(".visual_wrap>ul>li").mouseenter(function () {
    	$(".visual_wrap>ul>li").removeClass("on");
    	$(this).addClass("on");
    	$(this).find(".main_v_dt").attr("src", $(this).find(".main_v_dt").attr("src").replace(".png", "_on.png"));
    });

    $(".visual_wrap>ul>li").mouseleave(function () {
    	$(".visual_wrap>ul>li").removeClass("on");
    	$(this).find(".main_v_dt").attr("src", $(this).find(".main_v_dt").attr("src").replace("_on.png", ".png"));
    });*/

    $(".calendar_dd>li>a").mouseenter(function () {
        $(".calendar_dd>li").removeClass("on");
        $(this).parent().addClass("on");
        $(".calendar_info").css("display", "none");
        $(this).next(".calendar_info").css("display", "block");
    });

    $(".notice>ul>li").mouseenter(function () {
        $(".notice>ul>li").removeClass("on");
        $(this).addClass("on");
    });

    $(".notice>ul>li").mouseleave(function () {
        $(".notice>ul>li").removeClass("on");
    });

    $(".links>ul>li").mouseenter(function () {
        $(".links>ul>li").removeClass("on");
        $(this).addClass("on");
    });

    $(".links>ul>li").mouseleave(function () {
        $(".links>ul>li").removeClass("on");
    });



    var dep02_ww = $(window).width();

    if (dep02_ww < 1340) {
        $(".dep02").css("width", 1340 + "px");
    } else {
        $(".dep02").css("width", dep02_ww);
    }


    $(window).resize(function () {
        var dep02_ww = $(window).width();

        if (dep02_ww < 1340) {
            $(".dep02").css("width", 1340 + "px");
        } else {
            $(".dep02").css("min-width", dep02_ww);
        }
    });

    // 상단 메뉴
    $(".gnb1dp").mouseenter(function () {
        $(this).find("ul").show();
        $(this).addClass("ov");
    }).mouseleave(function () {
        $(this).find("ul").hide();
        $(this).removeClass("ov");
    });



});

//슬라이드
function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ($active.length == 0) $active = $('#slideshow IMG:last');

    var $next = $active.next().length ? $active.next() :
        $('#slideshow IMG:first');

    $active.addClass('last-active');

    $next.css({
            opacity: 0.0
        })
        .addClass('active')
        .animate({
            opacity: 1.0
        }, 1000, function () {
            $active.removeClass('active last-active');
        });
}

$(function () {
    setInterval("slideSwitch()", 5000);
});