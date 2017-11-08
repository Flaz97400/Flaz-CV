function toggleCommon() {

    $("#education_content").css("left", "-102vw");
    $("#experiences_content").css("top", "-102vh");
    $("#skills_content").css("top", "200vh");

}


$(document).on('click', '#img_nav_home', function() {

    $("#article_contact").css("display", "block");
    $("#article_hobbies").css("display", "block");
    $("#section_contact_hobbies").css("width", "280px");
    //window.location = FLHT_CurriculumVitae.html;

    toggleCommon();

    $("#div_nav_link2").css("display", "none");
    $("#div_nav_link1").css("display", "block");

});


function navigateCommon() {


    $("#article_contact").css("display", "none");

    $("#article_hobbies").css("display", "none");

    $("#section_contact_hobbies").css("width", "100px"); //280px

    $("#div_nav_link1").css("display", "none");
    $("#div_nav_link2").css("display", "block");
    // $("#div_nav_link").css("width", "50px");
    // $("#div_nav_link").css("vertical-align", "middle");

    // $(".img_nav").css("display", "block");
    // $(".img_nav").css("width", "50px");
    // $(".img_nav").css("height", "50px");
    // $(".img_nav").css("border-radius", "35px");

    var photoSectionLeft = 100 - 40;
    $("#section_photo_name").css("left", photoSectionLeft);
    $("#img_photoid").css("left", photoSectionLeft);

}


function logLoadingError(responseTxt, statusTxt, xhr) {

    if (statusTxt !== "success")

        console.log("Error: " + xhr.status + ": " + xhr.statusText);

};



// $("#section_education").load("FLHT_CV_dashboard_education.html");

// $("#section_experience_profile_skill").load("FLHT_CV_dashboard_experience_profile_skill.html");



$("#education_content").load("FLHT_CV_education_content.php", logLoadingError);

$("#experiences_content").load("FLHT_CV_experiences_content.html", logLoadingError);

$("#skills_content").load("FLHT_CV_skill_content.php", logLoadingError);


$(document).on('click', '#article_education', function() {

    navigateCommon();

    $("#education_content").animate({ left: "100px" }, 500);

});



$(document).on('click', '#article_experiences', function() {

    navigateCommon();

    $("#experiences_content").animate({ top: "0px" }, 500);

});


$(document).on('click', '#article_education', function() {

    navigateCommon();

    $("#education_content").animate({ left: "100px" }, 500);

});


$(document).on('click', '#article_skills', function() {

    navigateCommon();

    $("#skills_content").animate({ top: "0px" }, 500);

});



$(document).on('click', '#img_nav_education', function() {

    navigateCommon();

    toggleCommon();

    $("#education_content").animate({ left: "100px" }, 500);

});



$(document).on('click', '#img_nav_profil', function() {

    toggleCommon();

    $("#article_contact").css("display", "block");

    $("#article_hobbies").css("display", "block");

    $("#section_contact_hobbies").css("width", "280px");

    window.location = "./FLHT_CurriculumVitae.html";

});



$(document).on('click', '#img_nav_experiences', function() {

    navigateCommon();

    toggleCommon();

    $("#experiences_content").animate({ top: "0px" }, 500);

});



$(document).on('click', '#img_nav_skills', function() {

    navigateCommon();

    toggleCommon();

    $("#skills_content").animate({ top: "0px" }, 500);

});


//----- OPEN

// $('[data-popup-open]').on('click', function(e)  {
// var targeted_popup_class = jQuery(this).attr('data-popup-open');
// $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

// e.preventDefault();
// });




// $(document).on('click ', '.diplomaLink', function() {
// var id = $(this).attr('id');
// alert(id);
// });


/*    $(document).on('click', '.diploma_link', function(e)  {
        var id = $(this).attr('id');
       jQuery('#PdfViewer').fadeIn(350);
        e.preventdefault();
    });
 
     $(document).on('click', '.close_pdf_viewer', function(e)  {
        var id = $(this).attr('id');
       jQuery('#PdfViewer').fadeOut(350);
        e.preventdefault();
    });*/


// $('[data-popup-close]').on('click', function(e)  {
// var targeted_popup_class = jQuery(this).attr('data-popup-close');
// $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);

// e.preventDefault();
// });


// //----- CLOSE
// $(document).on('click', 'PdfViewer-close', function(e)  {
// var id = $(this).attr('id');
// $('#PdfViewer').fadeOut(350);
// e.preventDefault();
// });



// $(document).ready(function() {



//     // jQuery methods go here..







// });