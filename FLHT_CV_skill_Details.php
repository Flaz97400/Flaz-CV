<?php

    if (isset($_GET['skill']))
    {
        $idSkill = (int) $_GET['skill'];
        try {
                $bdd = new PDO('mysql:host=localhost;dbname=id2203613_flazdb;charset=utf8', 'id2203613_flazdbuser', 'FlazDbUser123',
                                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }
            catch (Exception $e)
            {
                    die('Erreur : ' . $e->getMessage());
            }


            $query =    'SELECT s.Name skillName, s.Icon skillIcon, s.Level skillLevel, '
                        .' se.IdExperience IdExperience, se.IdDiploma idDiploma, se.Detail expDetail, '
                        .' DATE_FORMAT(e.date, "%m/%Y") expDate '
                        .' FROM skills AS s '
                        .' INNER JOIN  skillsexperiences AS se ON s.IdSkills=se.IdSkill'
                        .' LEFT JOIN  experiences AS e ON se.IdExperience=e.IdExperience'
                        .' WHERE s.IdSkills='.$idSkill.' AND se.IdDiploma IS NULL'
                        .' ORDER BY expDate DESC';

            //echo ' <p> '.$query.'</p>';           
            $skill_exp_details = $bdd->query($query);
            $num_rows =$skill_exp_details->rowCount();
            if ( $num_rows>0)
            {
                $details = $skill_exp_details->fetch();
                echo    ' <div class=skillIconContainer> <img src="./img/skills/'.$details['skillIcon'].'"  class="imgSkillIconHeader"/> </div>'
                        .' <div class="skillHeader">'
                        .'      <div id="fillerIconTitle"> </div>'
                        .'      <div class="skillTitle"> '.$details['skillName'].' </div>';

                echo    '       <div class="rate">';

                for  ( $i = 5; $i>0; $i--)
                {
                    $check = '';
                    if ((6-$i) <= (int) $details['skillLevel'])
                    {
                            $check = 'checked';
                    } 

                    echo     '  <input type="radio" id="star'.$i.'" name="rate" value="'.$i.' " '.$check.' />'
                                .'  <label for="star'.$i.'" title="text">'.$i.' stars</label>';

                }
                echo    '</div> <div id="fillerRate"> </div> </div>';

                echo    ' <div class="expHeader"> <div class="ex"></div><div class="ex2"><img src="./img/icons/suitcase.png" id="skillExpIcon"></div><div class="ex"></div> </div>';
                echo'<div class="detailsList">'              
                        .'  <ul>'
                        .'      <li>'.$details['expDate'].': '. $details['expDetail']. '</li>';

                while( $details = $skill_exp_details->fetch())
                {
                    echo    '   <li>'.$details['expDate'].': '. $details['expDetail']. '</li>';
                }
                echo    '   </ul>'
                        .'</div>';
                $skill_exp_details->closeCursor();
            }


            

            $query =    'SELECT s.Name skillName, s.Icon skillIcon, s.Level skillLevel, '
                        .' se.IdExperience IdExperience, se.IdDiploma idDiploma, se.Detail expDetail, '
                        .' DATE_FORMAT(d.date, "%m/%Y") dipDate '
                        .' FROM skills AS s '
                        .' INNER JOIN  skillsexperiences AS se ON s.IdSkills=se.IdSkill'
                        .' LEFT JOIN  diplomas AS d ON se.IdDiploma=d.Id'
                        .' WHERE s.IdSkills='.$idSkill.' AND se.IdExperience IS NULL'
                        .' ORDER BY dipDate DESC';


            $skill_dip_details = $bdd->query($query);
            $details = $skill_dip_details->fetch();
            $num_rows =$skill_dip_details->rowCount();
            if ( $num_rows>0)
            {
                echo    ' <div class="dipHeader">     <div class="dip"></div><div class="dip2"><img src="./img/icons/school.png" id="skillDipIcon"></div><div class="dip"></div> </div>';
                echo'<div class="detailsList">'              
                        .'  <ul>'
                        .'      <li>'.$details['dipDate'].': '. $details['expDetail']. '</li>';

                while( $details = $skill_dip_details->fetch())
                {
                    echo    '   <li>'.$details['dipDate'].': '. $details['expDetail']. '</li>';
                }
                echo    '   </ul>'
                        .'</div>';
                
                $skill_dip_details->closeCursor();
            }
    }


?>

<!--<p> ALLO ! </p>-->
