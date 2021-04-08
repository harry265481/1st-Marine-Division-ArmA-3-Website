<?php
    include_once 'functions.php';
    function generateCitation($id) {

        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $recordinforow = mysqli_fetch_row(mysqli_query($link, "SELECT memberID, promorank, recorddate FROM records WHERE ID=" . $id));
        $memberID = $recordinforow[0];
        $rankname = getRankName($recordinforow[1]);
        $date = date_format(date_create($recordinforow[2]), "d-M-Y");
        $day = date_format(date_create($recordinforow[2]), "jS");
        $month = date_format(date_create($recordinforow[2]), "F");
        $year1 = date_format(date_create($recordinforow[2]), "y");
        $year2 = date_format(date_create($recordinforow[2]), "Y");

        //0 - LCpl/PFC
        //1 - Sgt/Cpl
        //2 - SNCO
        //3 - Company/Warrant Grade
        //4 - Field Grade

        //Init citation
        if($recordinforow[1] <= 7) {
            $citation = imagecreatefrompng("images/citation/LCpl-PFC-Citation.png");
            $type = 0;
            $namex = 1240;
            $namey = 1030;
            $rankx = 1467;
            $ranky = 1098;
            $day1x = 1205;
            $day2x = 680;
            $day1y = 1430;
            $day2y = 2280;
            $month1x = 1880;
            $month1y = 1430;
            $month2x = 1365;
            $month2y = 2280;
            $year1x = 680;
            $year1y = 1500;
            $year2x = 835;
            $year2y = 2235;
            $datex = 660;
            $datey = 2620;
        } else if($recordinforow[1] >= 8 && $recordinforow[1] <= 11) {
            $citation = imagecreatefrompng("images/citation/Sgt-Cpl-Citation.png");
            $type = 1;
            $namex = 1240;
            $namey = 1030;
            $rankx = 1467;
            $ranky = 1105;
            $day1x = 1205;
            $day2x = 680;
            $day1y = 1430;
            $day2y = 2280;
            $month1x = 1880;
            $month1y = 1430;
            $month2x = 1365;
            $month2y = 2280;
            $year1x = 525;
            $year1y = 1500;
            $year2x = 705;
            $year2y = 2355;
            $datex = 660;
            $datey = 2620;
            $year2 = $year1;
        } else if($recordinforow[1] >= 12 && $recordinforow[1] <= 20) {
            $citation = imagecreatefrompng("images/citation/SNCO-Citation.png");
            $type = 2;
            $namex = 1240;
            $namey = 1030;
            $rankx = 1467;
            $ranky = 1135;
            $day1x = 1205;
            $day2x = 680;
            $day1y = 1430;
            $day2y = 2280;
            $month1x = 1880;
            $month1y = 1430;
            $month2x = 1365;
            $month2y = 2280;
            $year1x = 680;
            $year1y = 1500;
            $year2x = 835;
            $year2y = 2350;
            $datex = 660;
            $datey = 2620;
        } else if(($recordinforow[1] >= 22 && $recordinforow[1] <= 26) || ($recordinforow[1] >= 29 && $recordinforow[1] <= 34)) {
            $citation = imagecreatefrompng("images/citation/Company-Grade-Officer.png");
            $type = 3;
            $namex = 1240;
            $namey = 1050;
            $rankx = 1240;
            $ranky = 1100;
            $day1x = 930;
            $day2x = 1200;
            $day1y = 1400;
            $day2y = 2153;
            $month1x = 1330;
            $month1y = 1400;
            $month2x = 1670;
            $month2y = 2153;
            $year1x = 1820;
            $year1y = 1400;
            $year2x = 520;
            $year2y = 2205;
        } else if($recordinforow[1] >= 35) {
            $citation = imagecreatefrompng("images/citation/Field-Grade-Officer.png");
            $type = 4;
            $namex = 1240;
            $namey = 1050;
            $rankx = 1580;
            $ranky = 1100;
            $day1x = 930;
            $day2x = 1200;
            $day1y = 1400;
            $day2y = 2153;
            $month1x = 1330;
            $month1y = 1400;
            $month2x = 1670;
            $month2y = 2153;
            $year1x = 1820;
            $year1y = 1400;
            $year2x = 520;
            $year2y = 2205;
        }

        //CONSTANTS: text size: 7; Font: FRABK.ttf
        putenv('GDFONTPATH=' . realpath('.'));
        $font =  dirname(__FILE__) . '/times.ttf';
        $fontsize = 38;
        $angle = 0;
        $black = imagecolorallocate($citation, 0, 0, 0);

        //Name
        $name = getMemberFullName($memberID);
        $namebb = imagettfbbox($fontsize, $angle, $font, $name);
        $namewidth = $namebb[2] - $namebb[0];
        $namex = (imagesx($citation) / 2) - ($namewidth / 2);
        
        imagettftext($citation, $fontsize, $angle, $namex, $namey, $black, $font, $name);

        //Rank
        $rankbb = imagettfbbox($fontsize, $angle, $font, $rankname);
        $rankwidth = $rankbb[2] - $rankbb[0];
        $rankx = $rankx - ($rankwidth / 2);
        imagettftext($citation, $fontsize, $angle, $rankx, $ranky, $black, $font, $rankname);

        //Day
        $daybb = imagettfbbox($fontsize, $angle, $font, $day);
        $daywidth = $daybb[2] - $daybb[0];
        $day1x = $day1x - ($daywidth / 2);
        $day2x = $day2x - ($daywidth / 2);
        imagettftext($citation, $fontsize, $angle, $day1x, $day1y, $black, $font, $day);
        imagettftext($citation, $fontsize, $angle, $day2x, $day2y, $black, $font, $day);

        //Month
        $monthbb = imagettfbbox($fontsize, $angle, $font, $month);
        $monthwidth = $monthbb[2] - $monthbb[0];
        $month1x = $month1x - ($monthwidth / 2);
        $month2x = $month2x - ($monthwidth / 2);
        imagettftext($citation, $fontsize, $angle, $month1x, $month1y, $black, $font, $month);
        imagettftext($citation, $fontsize, $angle, $month2x, $month2y, $black, $font, $month);

        //Year
        $year1bb = imagettfbbox($fontsize, $angle, $font, $year1);
        $year1width = $year1bb[2] - $year1bb[0];
        $year2bb = imagettfbbox($fontsize, $angle, $font, $year2);
        $year2width = $year2bb[2] - $year2bb[0];
        $year1x = $year1x - ($year1width / 2);
        $year2x = $year2x - ($year2width / 2);
        imagettftext($citation, $fontsize, $angle, $year1x, $year1y, $black, $font, $year1);
        imagettftext($citation, $fontsize, $angle, $year2x, $year2y, $black, $font, $year2);

        //Date
        if($type == 0 || $type == 1) {
            $datebb = imagettfbbox($fontsize, $angle, $font, $date);
            $datewidth = $datebb[2] - $datebb[0];
            $datex = $datex - ($datewidth / 2);
            imagettftext($citation, $fontsize, $angle, $datex, $datey, $black, $font, $date);
        }

        //export
        ob_start();
        imagepng($citation);
        $image_data = ob_get_contents();
        ob_end_clean();
        $generateBase64 = base64_encode($image_data);
        return $generateBase64;
    }
?>
<img src="data:image/png;base64,<?php echo generateCitation($_GET['id']); ?>" />