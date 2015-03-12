<?php   
 /* CAT:Bar Chart */
 /* pChart library inclusions */
 include("pChart/class/pData.class.php");
 include("pChart/class/pDraw.class.php");
 include("pChart/class/pImage.class.php");


	$recupidTag = $dbconnexion->query('SELECT u.idTag
                                  FROM utilisateurs u
                                  /*WHERE u.login = login*/
                                  WHERE u.login = "gcourvite"
                                  ');

    $idTagArray = $recupidTag->fetch();
    $idTag = $idTagArray['idTag'];
    //$idTag = $_SESSION["idTag"];

     $reponseJanvier = $dbconnexion->query("SELECT TIME_TO_SEC(r.temps) as temps
                                    FROM resultats r, utilisateurs u
                                    WHERE r.idTag = u.idTag
                                    AND u.idTag = '$idTag'
                                    AND YEAR(r.Date) = YEAR(NOW())
                                    AND MONTH(r.Date) = '01'
                                    ORDER BY temps
                                  ");

	$donneesJanvier = $reponseJanvier->fetch();


    $reponseFevrier = $dbconnexion->query("SELECT TIME_TO_SEC(r.temps) as temps
                                    FROM resultats r, utilisateurs u
                                    WHERE r.idTag = u.idTag
                                    AND u.idTag = '$idTag'
                                    AND YEAR(r.Date) = YEAR(NOW())
                                    AND MONTH(r.Date) = '02'
                                    ORDER BY temps
                                  ");

	$donneesFevrier = $reponseFevrier->fetch();

	$reponseMars = $dbconnexion->query("SELECT TIME_TO_SEC(r.temps) as temps
                                    FROM resultats r, utilisateurs u
                                    WHERE r.idTag = u.idTag
                                    AND u.idTag = '$idTag'
                                    AND YEAR(r.Date) = YEAR(NOW())
                                    AND MONTH(r.Date) = '03'
                                    ORDER BY temps
                                  ");

	$donneesMars = $reponseMars->fetch();

	$reponseAvril = $dbconnexion->query("SELECT TIME_TO_SEC(r.temps) as temps
                                    FROM resultats r, utilisateurs u
                                    WHERE r.idTag = u.idTag
                                    AND u.idTag = '$idTag'
                                    AND YEAR(r.Date) = YEAR(NOW())
                                    AND MONTH(r.Date) = '04'
                                    ORDER BY temps
                                  ");

	$donneesAvril = $reponseAvril->fetch();

	$reponseMai = $dbconnexion->query("SELECT TIME_TO_SEC(r.temps) as temps
                                    FROM resultats r, utilisateurs u
                                    WHERE r.idTag = u.idTag
                                    AND u.idTag = '$idTag'
                                    AND YEAR(r.Date) = YEAR(NOW())
                                    AND MONTH(r.Date) = '05'
                                    ORDER BY temps
                                  ");

	$donneesMai = $reponseMai->fetch();

	$reponseJuin = $dbconnexion->query("SELECT TIME_TO_SEC(r.temps) as temps
                                    FROM resultats r, utilisateurs u
                                    WHERE r.idTag = u.idTag
                                    AND u.idTag = '$idTag'
                                    AND YEAR(r.Date) = YEAR(NOW())
                                    AND MONTH(r.Date) = '06'
                                    ORDER BY temps
                                  ");

	$donneesJuin = $reponseJuin->fetch();

	$reponseJuillet = $dbconnexion->query("SELECT TIME_TO_SEC(r.temps) as temps
                                    FROM resultats r, utilisateurs u
                                    WHERE r.idTag = u.idTag
                                    AND u.idTag = '$idTag'
                                    AND YEAR(r.Date) = YEAR(NOW())
                                    AND MONTH(r.Date) = '07'
                                    ORDER BY temps
                                  ");

	$donneesJuillet = $reponseJuillet->fetch();

	$reponseAout = $dbconnexion->query("SELECT TIME_TO_SEC(r.temps) as temps
                                    FROM resultats r, utilisateurs u
                                    WHERE r.idTag = u.idTag
                                    AND u.idTag = '$idTag'
                                    AND YEAR(r.Date) = YEAR(NOW())
                                    AND MONTH(r.Date) = '08'
                                    ORDER BY temps
                                  ");

	$donneesAout = $reponseAout->fetch();

	$reponseSeptembre = $dbconnexion->query("SELECT TIME_TO_SEC(r.temps) as temps
                                    FROM resultats r, utilisateurs u
                                    WHERE r.idTag = u.idTag
                                    AND u.idTag = '$idTag'
                                    AND YEAR(r.Date) = YEAR(NOW())
                                    AND MONTH(r.Date) = '09'
                                    ORDER BY temps
                                  ");

	$donneesSeptembre = $reponseSeptembre->fetch();

	$reponseOctobre = $dbconnexion->query("SELECT TIME_TO_SEC(r.temps) as temps
                                    FROM resultats r, utilisateurs u
                                    WHERE r.idTag = u.idTag
                                    AND u.idTag = '$idTag'
                                    AND YEAR(r.Date) = YEAR(NOW())
                                    AND MONTH(r.Date) = '10'
                                    ORDER BY temps
                                  ");

	$donneesOctobre = $reponseOctobre->fetch();

	$reponseNovembre = $dbconnexion->query("SELECT TIME_TO_SEC(r.temps) as temps
                                    FROM resultats r, utilisateurs u
                                    WHERE r.idTag = u.idTag
                                    AND u.idTag = '$idTag'
                                    AND YEAR(r.Date) = YEAR(NOW())
                                    AND MONTH(r.Date) = '11'
                                    ORDER BY temps
                                  ");

	$donneesNovembre = $reponseNovembre->fetch();

	$reponseDecembre = $dbconnexion->query("SELECT TIME_TO_SEC(r.temps) as temps
                                    FROM resultats r, utilisateurs u
                                    WHERE r.idTag = u.idTag
                                    AND u.idTag = '$idTag'
                                    AND YEAR(r.Date) = YEAR(NOW())
                                    AND MONTH(r.Date) = '12'
                                    ORDER BY temps
                                  ");

	$donneesDecembre = $reponseDecembre->fetch();



 /* Create and populate the pData object */
 $MyData = new pData();  
 $MyData->addPoints(array($donneesJanvier['temps'],$donneesFevrier['temps'],$donneesMars['temps'],$donneesAvril['temps'],$donneesMai['temps'],$donneesJuin['temps'],$donneesJuillet['temps'],$donneesAout['temps'],$donneesSeptembre['temps'],$donneesOctobre['temps'],$donneesNovembre['temps'],$donneesDecembre['temps']),"Vos meilleurs scores au fil des mois");
 $MyData->setAxisName(0,"Temps(secondes)");
 $MyData->addPoints(array("Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"),"Mois");
 $MyData->setSerieDescription("Months","Month");
 $MyData->setAbscissa("Mois");
 /* Create the pChart object */
 $myPicture = new pImage(1710,2000,$MyData);
 /* Turn of Antialiasing */
 $myPicture->Antialias = FALSE;
 /* Add a border to the picture */
 $myPicture->drawGradientArea(0,0,1705,600,DIRECTION_VERTICAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>100));
 $myPicture->drawGradientArea(0,0,1705,600,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>20));
 $myPicture->drawRectangle(0,0,1705,600,array("R"=>0,"G"=>0,"B"=>0));
 /* Set the default font */
 $myPicture->setFontProperties(array("FontName"=>"pChart/fonts/calibri.ttf","FontSize"=>6));
 /* Define the chart area */
 $myPicture->setGraphArea(60,40,1300,500);
 /* Draw the scale */
 $scaleSettings = array("GridR"=>200,"GridG"=>200,"GridB"=>200,"DrawSubTicks"=>TRUE,"CycleBackground"=>TRUE);
 $myPicture->drawScale($scaleSettings);
 /* Write the chart legend */
 $myPicture->drawLegend(1500,12,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));
 /* Turn on shadow computing */ 
 $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));
 /* Draw the chart */
 $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));
 $settings = array("Surrounding"=>-500,"InnerSurrounding"=>500,"Interleave"=>0);
 $myPicture->drawBarChart($settings);
 /* Render the picture (choose the best way) */
 $myPicture->Render("pChart/img/example.drawBarChart.spacing.png");
?>