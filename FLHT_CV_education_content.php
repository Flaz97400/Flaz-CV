<section class="section_cv_content" id="div_educ_details">

    <div class="Content_title" id="div_educ_title">
        <p> Education </p>
        <img src="./img/icons/school.png" id="img_education"> </img>
    </div>

    <?php
        try
        {
//id2203613_flazdb, 'mysql:host=localhost;dbname=FlazDb;charset=utf8'
        
$bdd = new PDO('mysql:host=localhost;dbname=id2203613_flazdb;charset=utf8', 'id2203613_flazdbuser', 'FlazDbUser123',
							array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }

        $reponse1 = $bdd->query('SELECT * FROM diplomas WHERE Type = "degree" ORDER BY Date DESC');
        $reponse2 = $bdd->query('SELECT * FROM diplomas WHERE Type = "certificate" ORDER BY Date DESC');
    
    ?>
    


        <div class="div_cv_content">

            <div class="Educ-timeline-container">
                <div class="Educ-timeline" id="Educ-timeline-diploma">
                <?php
                    $i = 0;
                    
                    while ( $diploma =  $reponse1->fetch())
                    {
                        //$position = (($i % 2) == 1) ? 'right' : ''; 
                        $position = 'right';

                        $diploma_date = strtotime($diploma['Date']);
                        $trophy = '';
                        if ($diploma['GradeScan'] != null)
                        {
                            $trophy = '<a href="'.  $diploma['GradeScan'] . '" > <img src="..\CV\img\icons\trophy.png" style="height: 20px;"></a>';
                        }

                        if ($diploma['Type'] == "degree")
                        {
                                $diploma_icon = "..\CV\img\icons\school.png"; 
                                $formatted_date = $mysqldate = date( 'Y ', $diploma_date );
                        }                     
                        else{
                                $diploma_icon = "..\CV\img\icons\certificate_icon.png";
                                $formatted_date = $mysqldate = date( 'm/Y ', $diploma_date ); 
                        }

                        $mention = '';
                        switch ($diploma['Mention']) {
                            case 'P':    $mention = "Passable </br>";    break;
                            case 'AB':   $mention = "Assez Bien </br>";  break;
                            case 'B':    $mention = "Bien </br>";        break;
                            case 'TB':   $mention = "Trés Bien </br>";   break;
                        }
                        
                        $details = '';
                        if ($diploma['Details'] != '')
                        {
                            $details = $diploma['Details']  . ' </br>';
                        }
                        

                        echo '<div class="Educ-timeline-item ">';
                        echo  '   <div class="Educ-timeline-icon">';
                        echo   '      <img src="' .  $diploma_icon . '" height="50px" width="50px" >';
                        echo   '  </div>';
                        echo   '  <div class="Educ-timeline-content '. $position .'">';
                        echo   '      <h2>';
                        echo   '          <div class="Educ-title"> ' . $formatted_date . ': '. $diploma['Title'] .' </div>';
                        echo   '          <div class="Educ-scans">';
                        
                        echo   '				 <a href="'.  $diploma['DiplomaScan'] . '" >';                    
                        echo   '              	<img src="..\CV\img\icons\certificate.png" style="height: 30px;" class="diploma_link" id="'. $diploma['DiplomaScan'] .'">';
                        echo   '              </a>';
                        echo   '              '  . $trophy;
                        echo   '          </div>';
                        echo   '      </h2>';
                        echo   '      <p>';
                        echo   '          '. $details . '' . $mention  . ''. $diploma['SchoolName'] ;
                        echo   '      </p>';
                        echo   '  </div>';
                        echo   '</div>';
                        
                        $i++;
                    }

                ?>
           

                </div>
            </div>
            
            <div class="Educ-timeline-container">
                <div class="Educ-timeline" id="Educ-timeline-certificate">
                <?php
                    while ( $certificate =  $reponse2->fetch())
                    {
                        //$position = (($i % 2) == 1) ? 'right' : ''; 
                        $position = 'right';
                    
                        $certificate_date = strtotime($certificate['Date']);
                        $trophy = '';
                        if ($certificate['GradeScan'] != null)
                        {
                            $trophy = '<a href="'.  $certificate['GradeScan'] . '" > <img src="..\CV\img\icons\trophy.png" style="height: 20px;"></a>';
                        }

                        if ($certificate['Type'] == "degree")
                        {
                                $certificate_icon = "..\CV\img\icons\school.png"; 
                                $formatted_date = $mysqldate = date( 'Y ', $certificate_date );
                        }                     
                        else{
                                $certificate_icon = "..\CV\img\icons\certificate_icon.png";
                                $formatted_date = $mysqldate = date( 'm/Y ', $certificate_date ); 
                        }

                        $mention = '';
                        switch ($certificate['Mention']) {
                            case 'P':    $mention = "Passable </br>";    break;
                            case 'AB':   $mention = "Assez Bien </br>";  break;
                            case 'B':    $mention = "Bien </br>";        break;
                            case 'TB':   $mention = "Trés Bien </br>";   break;
                        }
                        
                        $details = '';
                        if ($certificate['Details'] != '')
                        {
                            $details = $certificate['Details']  . ' </br>';
                        }
                        

                        echo '<div class="Educ-timeline-item ">';
                        echo  '   <div class="Educ-timeline-icon">';
                        echo   '      <img src="' .  $certificate_icon . '" height="60px" width="60px" >';
                        echo   '  </div>';
                        echo   '  <div class="Educ-timeline-content '. $position .'">';
                        echo   '      <h2>';
                        echo   '          <div class="Educ-title"> ' . $formatted_date . ': '. $certificate['Title'] .' </div>';
                        echo   '          <div class="Educ-scans">';
                        
                        echo   '				 <a href="'.  $certificate['DiplomaScan'] . '" >';                    
                        echo   '              	<img src="..\CV\img\icons\certificate.png" style="height: 30px;" class="diploma_link" id="'. $certificate['DiplomaScan'] .'">';
                        echo   '              </a>';
                        echo   '              '  . $trophy;
                        echo   '          </div>';
                        echo   '      </h2>';
                        echo   '      <p>';
                        echo   '          '. $details . '' . $mention  . ''. $certificate['SchoolName'] ;
                        echo   '      </p>';
                        echo   '  </div>';
                        echo   '</div>';
                        
                        $i++;
                    }

                ?>
            

                </div>   
            </div>   

        </div>


<!--
<div class="popup" data-popup="popup-1" id="PdfViewer">
    <div class="popup-inner">
        <h2>Wow! This is Awesome! (Popup #1)</h2>
        <p>Donec in volutpat nisi. In quam lectus, aliquet rhoncus cursus a, congue et arcu. Vestibulum tincidunt neque id nisi pulvinar aliquam. Nulla luctus luctus ipsum at ultricies. Nullam nec velit dui. Nullam sem eros, pulvinar sed pellentesque ac, feugiat et turpis. Donec gravida ipsum cursus massa malesuada tincidunt. Nullam finibus nunc mauris, quis semper neque ultrices in. Ut ac risus eget eros imperdiet posuere nec eu lectus.</p>
        <p><a class="close_pdf_viewer" href="#">Close</a></p>
        <a class="popup-close close_pdf_viewer" href="#">x</a>
    </div>
</div>
-->

		
</section>