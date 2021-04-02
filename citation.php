<?php
    include_once 'functions.php';
    function generateCitation($id) {

        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $recordinforow = mysqli_fetch_row(mysqli_query($link, "SELECT memberID, promorank, recorddate FROM records WHERE ID=" . $id));
        $memberID = $recordinforow[0];
        $rankname = getRankName($recordinforow[1]);
        $day = date_format(date_create($recordinforow[2]), "jS");
        $month = date_format(date_create($recordinforow[2]), "F");
        $year1 = date_format(date_create($recordinforow[2]), "y");
        $year2 = date_format(date_create($recordinforow[2]), "Y");

        //Init citation
        $citation = imagecreatefrompng("images/citation/Company-Grade-Officer.png");

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
        $namey = 1050;
        imagettftext($citation, $fontsize, $angle, $namex, $namey, $black, $font, $name);

        //Rank
        $rankbb = imagettfbbox($fontsize, $angle, $font, $rankname);
        $rankwidth = $rankbb[2] - $rankbb[0];
        $rankx = (imagesx($citation) / 2) - ($rankwidth / 2);
        $ranky = 1098;
        imagettftext($citation, $fontsize, $angle, $rankx, $ranky, $black, $font, $rankname);

        //Day
        $daybb = imagettfbbox($fontsize, $angle, $font, $day);
        $daywidth = $daybb[2] - $daybb[0];
        $day1x = 925 - ($daywidth / 2);
        $day1y = 1400;
        $day2x = 1192 - ($daywidth / 2);
        $day2y = 2153;
        imagettftext($citation, $fontsize, $angle, $day1x, $day1y, $black, $font, $day);
        imagettftext($citation, $fontsize, $angle, $day2x, $day2y, $black, $font, $day);

        //Month
        $monthbb = imagettfbbox($fontsize, $angle, $font, $month);
        $monthwidth = $monthbb[2] - $monthbb[0];
        $month1x = 1340 - ($monthwidth / 2);
        $month1y = 1400;
        $month2x = 1680 - ($monthwidth / 2);
        $month2y = 2153;
        imagettftext($citation, $fontsize, $angle, $month1x, $month1y, $black, $font, $month);
        imagettftext($citation, $fontsize, $angle, $month2x, $month2y, $black, $font, $month);

        //Year
        $year1bb = imagettfbbox($fontsize, $angle, $font, $year1);
        $year1width = $year1bb[2] - $year1bb[0];
        $year2bb = imagettfbbox($fontsize, $angle, $font, $year2);
        $year2width = $year2bb[2] - $year2bb[0];
        $year1x = 1825 - ($year1width / 2);
        $year1y = 1400;
        $year2x = 520 - ($year2width / 2);
        $year2y = 2205;
        imagettftext($citation, $fontsize, $angle, $year1x, $year1y, $black, $font, $year1);
        imagettftext($citation, $fontsize, $angle, $year2x, $year2y, $black, $font, $year2);

        

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