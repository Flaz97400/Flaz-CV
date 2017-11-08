$('.SkillLink').click(function(e) {
    e.preventDefault();
    var idSkill = $(this).attr('data');
    var url = './FLHT_CV_skill_Details.php?skill=' + idSkill;
    $("#skillDetails").load(url);
    return false;
})

$('.vc_goUp').click(function(e) {
    e.preventDefault();
    $(".carouselBody").slick('slickPrev');
    return false;
})

$('.vc_goDown').click(function(e) {
    e.preventDefault();
    $(".carouselBody").slick('slickNext');
    return false;
})