<section class="section_cv_content" id="div_skill_details">
    <link rel="stylesheet" type="text/css" href="./libs/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="./libs/slick/slick-theme.css"/>
    <script type="text/javascript" src="./libs/slick/slick.min.js"></script>

    <script src="./css/skill.js" ></script>

    <div class="Content_title" id="div_skills_title">
        <p> Skills </p>
        <img src="./img/icons/cogs.png" id="img_skills"> </img>
    </div>

<?php
    try {
            $bdd = new PDO('mysql:host=localhost;dbname=id2203613_flazdb;charset=utf8', 'id2203613_flazdbuser', 'FlazDbUser123',
							array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }

        $skill_list = $bdd->query('SELECT * FROM skills  ORDER BY Level DESC');
?>


 
    <div id="verticalCarousel">
        <div class="centerme">
            <div class="vc_goUp">
                <a href="#" > 
                    <i class="fa fa-fw fa-angle-up"></i>
                </a>
            </div>

            <div class="carouselBody">
                <!--<ul class="verticalCarouselGroup vc_list">-->
                <?php
                    while( $skill = $skill_list->fetch())
                    {
                    echo    ' <div class="SkillLink" data="'.$skill['IdSkills'].'">'
                            .'              <a> <img src="./img/skills/'.$skill['Icon'].'"  class="skillIcon" ></img>'
                            .'              </a>'
                            .'</div>';
                    }
                ?>
                <!--</ul>-->
            </div>

            <div class="vc_goDown">
                <a href="#" > 
                    <i class="fa fa-fw fa-angle-down"></i>
                </a>
            </div>
        <div>

    </div>
        <script type="text/javascript">
            $(document).ready(function(){
                
            $('.carouselBody').slick({
                slidesToShow: 6,
                slidesToScroll: 3,
                vertical: true,
                accessibility: true,
                arrows: false
            });
            });
        </script>

 
    <div id="skillDetails">
        
    </div>

</section>