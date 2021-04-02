<?php
include_once 'config.php';

    //Generate 3D uniform for the member
    //id      | int | id of the member
    //grade   | str | grade given as "{firstLetter}{number}"
    //$branch | int | id of branch
    function generateUniform($id, $grade, $branch) {
        $bg;
        $branchname;
        //check branch and create resource from background
        //marine
        if($branch == 0) {
            $branchname = "marine";
            $bg = imagecreatefrompng("images/uniform/USMCBG.png");
            //navy
        } else if($branch == 1) {
            $branchname = "navy";
            $bg = imagecreatefrompng("images/uniform/USNBG.png");
        }

        //Get grade type; E or O
        $gradetype = substr($grade, 0, 1);
        $gradenum = substr($grade, 1, 1);

        //get uniform and create a resource
        $uniform = imagecreatefrompng("images/uniform/" . $branchname . "/" . $grade . ".png");
        imagecopy($bg, $uniform, 0, 0, 0, 0, imagesx($uniform), imagesy($uniform));
        
        //create colors
        $white = imagecolorallocate($bg, 255, 255, 255);

        //Marine only stuff
        if($branch == 0) {
            imagecopy($bg, imagecreatefrompng("images/uniform/marine/marinehead.png"), 0, 0, 0, 0, imagesx($uniform), imagesy($uniform));
            if($gradetype == "E") {
                imagecopy($bg, imagecreatefrompng("images/uniform/marine/cover-E.png"), 0, 0, 0, 0, imagesx($uniform), imagesy($uniform));
            } else if($gradetype == "W") {
                imagecopy($bg, imagecreatefrompng("images/uniform/marine/cover-C.png"), 0, 0, 0, 0, imagesx($uniform), imagesy($uniform));
            } else if($gradetype == "O") {
                if($gradenum <= 3) {
                    imagecopy($bg, imagecreatefrompng("images/uniform/marine/cover-C.png"), 0, 0, 0, 0, imagesx($uniform), imagesy($uniform));
                } else if($gradenum >= 4) {
                    imagecopy($bg, imagecreatefrompng("images/uniform/marine/cover-F.png"), 0, 0, 0, 0, imagesx($uniform), imagesy($uniform));
                }
            }
        }

        //place nameplate and text
        //Only applies to navy
        if($branch == 1) {
            //CONSTANTS: text size: 7; Font: FRABK.ttf
            putenv('GDFONTPATH=' . realpath('.'));
            $font =  dirname(__FILE__) . '/FRABK.ttf';
            $fontsize = 7;
            $angle;

            //Get grade type; E or O
            $gradetype = substr($grade, 0, 1);
            $gradenum = substr($grade, 1, 1);

            //if member is enlisted ranks
            if($gradetype == "E") {

                //HM3 (E-6) or below
                //If grade is less than or equal to 6; use 'crackerjack' version and print text at -5 deg
                if($gradenum <= 6) {
                    $angle = 5;
                    $name = getMemberLastName($id);
                    $bb = imagettfbbox($fontsize, $angle, $font, $name);
                    $textwidth = $bb[2] - $bb[0];
                    $textheight = $bb[7] - $bb[1];
                    $namex = 102 - ($textwidth / 2);
                    $namey = 235 - ($textheight / 2);
                    imagecopy($bg, imagecreatefrompng("images/uniform/navy/NPJ.png"), 0, 0, 0, 0, imagesx($uniform), imagesy($uniform));
                    imagettftext($bg, $fontsize, $angle, $namex, $namey, $white, $font, $name);
                    imagecopy($bg, imagecreatefrompng("images/uniform/navy/faceE.png"), 0, 0, 0, 0, imagesx($uniform), imagesy($uniform));
                    imagecopy($bg, imagecreatefrompng("images/uniform/navy/cover-E.png"), 0, 0, 0, 0, imagesx($uniform), imagesy($uniform));

                //HMC (E-7) or above
                //If grade is  greater than or equal to 7; use 'officer jacket' version and print text at -2 deg
                } else if ($gradenum >= 7) {
                    $angle = 0;
                    $name = getMemberLastName($id);
                    $bb = imagettfbbox($fontsize, $angle, $font, $name);
                    $textwidth = $bb[2] - $bb[0];
                    $textheight = $bb[7] - $bb[1];
                    $namex = 102 - ($textwidth / 2);
                    $namey = 258 - ($textheight / 2);
                    imagecopy($bg, imagecreatefrompng("images/uniform/navy/NPS.png"), 0, 0, 0, 0, imagesx($uniform), imagesy($uniform));
                    imagettftext($bg, $fontsize, $angle, $namex, $namey, $white, $font, $name);
                    imagecopy($bg, imagecreatefrompng("images/uniform/navy/faceS.png"), 0, 0, 0, 0, imagesx($uniform), imagesy($uniform));
                    imagecopy($bg, imagecreatefrompng("images/uniform/navy/cover-" . $grade . ".png"), 0, 0, 0, 0, imagesx($uniform), imagesy($uniform));
                }

            //if member is an officer
            //If grade type is O; use officer version; -2 deg
            } else if ($gradetype == "O") {
                $angle = 0;
                $name = getMemberLastName($id);
                $bb = imagettfbbox($fontsize, $angle, $font, $name);
                $textwidth = $bb[2] - $bb[0];
                $textheight = $bb[7] - $bb[1];
                $namex = 103 - ($textwidth / 2);
                $namey = 257 - ($textheight / 2);
                imagecopy($bg, imagecreatefrompng("images/uniform/navy/NPO.png"), 0, 0, 0, 0, imagesx($uniform), imagesy($uniform));
                imagettftext($bg, $fontsize, $angle, $namex, $namey, $white, $font, $name);
                imagecopy($bg, imagecreatefrompng("images/uniform/navy/faceO.png"), 0, 0, 0, 0, imagesx($uniform), imagesy($uniform));
                if($gradenum == 0) {
                    imagecopy($bg, imagecreatefrompng("images/uniform/navy/cover-O0png"), 0, 0, 0, 0, imagesx($uniform), imagesy($uniform));
                } else if($gradenum >= 1 && $gradenum < 4) {
                    imagecopy($bg, imagecreatefrompng("images/uniform/navy/cover-J.png"), 0, 0, 0, 0, imagesx($uniform), imagesy($uniform));
                } else if($gradenum >= 4) {
                    imagecopy($bg, imagecreatefrompng("images/uniform/navy/cover-S.png"), 0, 0, 0, 0, imagesx($uniform), imagesy($uniform));
                }
            }
        }

        //Ribbons
        $ribbonrack = createRibbonGrid(getMemberAwardsFileName($id));
        $rowcount = 0;
        $columncount = 0;
        if($branch == 0) {
            $ribbony = 288;
            $ribbonwidth = 28;
            $ribbonheight = 7;
            $threewidesrcx = 272;
            $twowidesrcx = 258;
            $onewidesrcx = 243;
        } else {
            $ribbony = 258;
            $ribbonwidth = 19;
            $ribbonheight = 4;
            $threewidesrcx = 269;
            $twowidesrcx = 240;
            $onewidesrcx = 250;
        }

        foreach($ribbonrack as $row) {
            foreach($row as $column) {
                $dsty = $ribbony - ($rowcount * $ribbonheight);
                if(count($row) == 3) {
                    $dstx = $threewidesrcx - ($columncount * $ribbonwidth);
                } else if(count($row) == 2) {
                    $dstx = $twowidesrcx - ($columncount * $ribbonwidth);
                } else if(count($row) == 1) {
                    $dstx = $onewidesrcx - ($columncount * $ribbonwidth);
                }
                $curr_ribbon = imagecreatefromjpeg("images/awards/ribbons/" . $column[0] . ".jpg");
                imagecopyresampled($bg, $curr_ribbon, $dstx, $dsty, 0, 0, $ribbonwidth, $ribbonheight, imagesx($curr_ribbon), imagesy($curr_ribbon));
                $columncount = $columncount + 1;
            }
            $columncount = 0;
            $rowcount = $rowcount + 1;
        }
        
        //marksmenship badges
        if($branch == 0) {
            $rifle = 0;
            $pistol = 0;
            $riflefile;
            $pistolfile;
            $badgey = 298;
            $riflex = 223;
            $pistolx = 264;
            $riflew = 33;
            $pistolw = 27;
            $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
            $marksmenship = mysqli_query($link, "SELECT awardID FROM awardrecord WHERE memberID=" . $id);
            foreach($marksmenship as $mark) {
                $marks = mysqli_fetch_row(mysqli_query($link, "SELECT ID, awardfilename, awardtype FROM awards WHERE ID=" . $mark['awardID']));
                if($marks[2] == "2") {
                    switch($marks[0]) {
                        case 43:
                            $pistol = 3;
                            break;
                        case 44:
                            if($pistol <= 2) {
                                $pistol = 2;
                            }
                            break;
                        case 45:
                            if($pistol <= 1) {
                                $pistol = 1;
                            }
                            break;
                        case 46:
                            $rifle = 3;
                            break;
                        case 47:
                            if($rifle <= 2) {
                                $rifle = 2;
                            }
                            break;
                        case 48:
                            if($rifle <= 1) {
                                $rifle = 1;
                            }
                            break;
                    }
                }
            }

            switch($rifle) {
                case 0:
                    break;
                case 1:
                    $riflefile = "RM";
                    break;
                case 2:
                    $riflefile = "RS";
                    break;
                case 3:
                    $riflefile = "RE";
                    break;
            }

            switch($pistol) {
                case 0:
                    break;
                case 1:
                    $pistolfile = "PM";
                    break;
                case 2:
                    $pistolfile = "PS";
                    break;
                case 3:
                    $pistolfile = "PE";
                    break;
                
            }

            if($rifle > 0) {
                $riflebadge = imagecreatefrompng("images/awards/badges/" . $riflefile . ".png");
                $aspect = imagesx($riflebadge) / imagesy($riflebadge);
                $rifleh = $riflew * $aspect;
                imagecopyresampled($bg, $riflebadge, $riflex, $badgey, 0, 0, $riflew, $rifleh, imagesx($riflebadge), imagesy($riflebadge));
            }
            
            if($pistol > 0) {
                $pistolbadge = imagecreatefrompng("images/awards/badges/" . $pistolfile . ".png");
                $aspect;
                if(imagesx($pistolbadge) > imagesy($pistolbadge)) {
                    $aspect = imagesy($pistolbadge) / imagesx($pistolbadge);
                } else {
                    $aspect = imagesx($pistolbadge) / imagesy($pistolbadge);
                }
                $pistolh = $pistolw * $aspect;
                imagecopyresampled($bg, $pistolbadge, $pistolx, $badgey, 0, 0, $pistolw, $pistolh, imagesx($pistolbadge), imagesy($pistolbadge));
            }
        }
        
        //Border
        imagecopy($bg, imagecreatefrompng("images/uniform/border.png"), 0, 0, 0, 0, imagesx($uniform), imagesy($uniform));
        
        //export
        ob_start();
        imagepng($bg);
        $image_data = ob_get_contents();
        ob_end_clean();
        $generateBase64 = base64_encode($image_data);
        return $generateBase64;
    }

    function generatePilotPatch($id, $grade, $branch) {
        //Init patch
        $patch = imagecreatefrompng("images/patch/Leather.png");

        //Add badge
        $aviatorbadge = imagecreatefrompng("images/patch/naval-aviator-gold.png");
        $beige = imagecolorallocate($patch, 245, 210, 147);
        $badgew = 255;
        $badgeh = 92;
        $dstx = (imagesx($patch) / 2) - ($badgew / 2);
        $dsty = 24;
        imagecopyresampled($patch, $aviatorbadge, $dstx, $dsty, 0, 0, $badgew, $badgeh, imagesx($aviatorbadge), imagesy($aviatorbadge));

        //Add font
        putenv('GDFONTPATH=' . realpath('.'));
        $font =  dirname(__FILE__) . '/arial.ttf';
        $fontsize = 20;

        //Add name
        $fname = getMemberFirstName($id);
        $sname = getMemberLastName($id);
        $name = substr($fname, 0, 1) . ". " . $sname;
        $bb = imagettfbbox($fontsize, 0, $font, $name);
        $namelength = $bb[2] - $bb[0];
        $namex = (imagesx($patch) / 2) - ($namelength / 2);
        $namey = (imagesy($patch) / 2) + 20;
        imagettftext($patch, $fontsize, 0, $namex, $namey, $beige, $font, $name);

        //Bottom row
        $marginsize = imagesx($patch) * 0.1;
        $bottommargin = imagesy($patch) - (imagesy($patch) * 0.15);

        //Rank - Left
        $rank = getMemberRankAbbrev($id);
        $bb = imagettfbbox($fontsize, 0, $font, $rank);
        $ranklength = $bb[2] - $bb[0];
        $rankx = $marginsize;
        $ranky = $bottommargin;
        imagettftext($patch, $fontsize, 0, $rankx, $ranky, $beige, $font, $rank);

        //Branch - Right
        $branch = getMemberBranchNameAbbrev($id);

        $bb = imagettfbbox($fontsize, 0, $font, $branch);
        $branchlength = $bb[2] - $bb[0];
        $branchx = (imagesx($patch)) - $marginsize - $branchlength;
        $branchy = $bottommargin;
        imagettftext($patch, $fontsize, 0, $branchx, $branchy, $beige, $font, $branch);

        //export
        ob_start();
        imagepng($patch);
        $image_data = ob_get_contents();
        ob_end_clean();
        $generateBase64 = base64_encode($image_data);
        return $generateBase64;
    }

    //Returns LastName of a member
    function getMemberLastName($id) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $lastName = mysqli_fetch_row(mysqli_query($link, "SELECT LastName FROM personnel WHERE ID=" . $id));
        return $lastName[0];
    }

    //Returns FirstName of a member
    function getMemberFirstName($id) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $firstName = mysqli_fetch_row(mysqli_query($link, "SELECT FirstName FROM personnel WHERE ID=" . $id));
        return $firstName[0];
    }

    //Returns Full name of a member
    function getMemberFullName($id) {
        return getMemberFirstName($id) . " " . getMemberLastName($id);
    }

    //Returns ID of the rank of a member
    function getMemberRankID($id) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $branch = mysqli_fetch_row(mysqli_query($link, "SELECT rank FROM personnel WHERE ID=" . $id));
        return $branch[0];
    }

    //Returns name of the rank of a member
    function getMemberRankAbbrev($id) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $rank = mysqli_fetch_row(mysqli_query($link, "SELECT rank FROM personnel WHERE ID=" . $id));
        $rankrow = mysqli_fetch_row(mysqli_query($link, "SELECT abbrev FROM rank WHERE ID=" . $rank[0]));
        $string = $rankrow[0];
        return $string;
    }

    //Returns name of the rank of a member
    function getRankName($id) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $rank = mysqli_fetch_row(mysqli_query($link, "SELECT rank_name FROM rank WHERE ID=" . $id));
        return $rank[0];
    }

    //Returns pay grade of a member as {type}{number}
    function getMemberGrade($id) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $rank = mysqli_fetch_row(mysqli_query($link, "SELECT rank FROM personnel WHERE ID=" . $id));
        $rankrow = mysqli_fetch_row(mysqli_query($link, "SELECT paygrade FROM rank WHERE ID=" . $rank[0]));
        $string = substr($rankrow[0], 0, 1) . substr($rankrow[0], 2, 1);
        return $string;
    }

    //Returns Array of awards in ascending order of precedence (ribbons only)
    function getMemberAwards($id) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $awards = mysqli_query($link, "SELECT awardID FROM awardrecord WHERE memberID='" . $id . "' ORDER BY awardID desc");
        $awardarray = array();
        foreach($awards as $award) {
            array_push($awardarray, $award[0]);
        }
        return $awardarray;
    }

    //Returns Array of award filenames in ascending order of precedence (ribbons only)
    function getMemberAwardsFileName($id) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $awards = mysqli_query($link, "SELECT awardID FROM awardrecord WHERE memberID='" . $id . "' ORDER BY awardID desc");
        
        $awardarray = array();
        foreach($awards as $award) {
            $awardfilename = mysqli_fetch_row(mysqli_query($link, "SELECT awardfilename, awardtype FROM awards WHERE ID=" . $award['awardID']));
            if($awardfilename[1] == "0" || $awardfilename[1] == "3") {
                $name = $awardfilename[0];
                array_push($awardarray, $awardfilename);
            }
        }
        return $awardarray;
    }

    //Returns an array of IDs in order
    function createRibbonGrid($array) {
        $grid = array();
        $row = 0;
        $column = 0;
        foreach ($array as $award) {
            $grid[$row][$column] = $award;
            $column = $column + 1;
            if($column == 3) {
                $column = 0;
                $row += 1;
            }
        }
        return $grid;
    }

    //Returns branch ID of a member
    //0 - USMC
    //1 - USN
    function getMemberBranchID($id) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $branch = mysqli_fetch_row(mysqli_query($link, "SELECT branch FROM personnel WHERE ID=" . $id));
        return $branch[0];
    }

    //Returns branch ID of a member
    //0 - USMC
    //1 - USN
    function getMemberBranchNameAbbrev($id) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $branch = mysqli_fetch_row(mysqli_query($link, "SELECT branch FROM personnel WHERE ID=" . $id));
        if($branch[0] == 0) {
            return "USMC";
        } else if($branch[0] == 1) {
            return "USN";
        } else {
            return "false";
        }
    }

    //Returns if the member is a pilot
    function isMemberPilot($id) {
        $pilot = mysqli_fetch_row(mysqli_query($link, "SELECT pilot FROM personnel WHERE ID=" . $id));
        if ($pilot[0] == 1) {
            return true;
        } else {
            return false;
        }
        return false;
    }

    //Returns ID of the rank of a member
    function getPositionName($id) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $position = mysqli_fetch_row(mysqli_query($link, "SELECT positionname FROM positions WHERE ID=" . $id));
        return $position[0];
    }

    function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' ) {
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);
        $interval = date_diff($datetime1, $datetime2);
        return $interval->format($differenceFormat);
    }

    /*'library' function
        $record - Array from SQL
        Based on $record['recordtype'], will return a table cell with the record
        0 - enlisted
        1 - retirement
        2 - promotion
        3 - demotion
        4 - transfer
        5 - graduation
        6 - ELOA
        7 - End of ELOA
    */
    function buildRecord($record) {
        switch($record['recordType']) {
            case 0:
                return "<td>Enlisted in the 1st Marine Division</td>";
                break;
            case 1:
                return buildRetirementRecord($record['retirementtype']);
                break;
            case 2:
                return buildPromotionRecord($record['promorank']);
                break;
            case 3:
                return buildDemotionRecord($record['demorank']);
                break;
            case 4:
                return buildTransferRecord($record['transferfrom'], $record['transferto'], $record['oldpos'], $record['newpos']);
                break;
            case 5:
                return buildGraduationRecord($record['demorank']);
                break;
            case 6:
                return "<td>Placed on ELOA</td>";
                break;
            case 6:
                return "<td>Returned from ELOA</td>";
                break;
        }
    }

    /*Returns a table cell for retirements
        $type(int) - type of retirement
        0 - Honorable Discharge
        1 - General Discharge
        2 - Administrative Separation
        3 - Other than Honorable
        4 - Bad Conduct Discharge
        5 - Dishonorable Discharge
        6 - Retired */
    function buildRetirementRecord($type) {
        switch($type) {
            case 0:
                return "<td>Discharged from the 1st Marine Division - Honorable</td>";
                break;
            case 1:
                return "<td>Discharged from the 1st Marine Division - General</td>";
                break;
            case 2:
                return "<td>Administrative Seperation</td>";
                break;
            case 3:
                return "<td>Other than Honorable Discharge</td>";
                break;
            case 4:
                return "<td>Bad Conduct Discharge</td>";
                break;
            case 5:
                return "<td>Dishonorable Discharge</td>";
                break;
            case 6:
                return "<td>Retired from the 1st Marine Division</td>";
                break;
        }
        return false;
    }

    /*Returns a table cell for promotions
      Queries the rank table for the rank name and paygrade 
    */
    function buildPromotionRecord($rankID) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $rankrow = mysqli_fetch_row(mysqli_query($link, "SELECT rank_name, paygrade FROM rank WHERE ID=" . $rankID));
        $string = $rankrow[0] . " " . $rankrow[1];
        return "<td>Promoted to " . $string . "</td>";
    }

    /*Returns a table cell for demotions
      Queries the rank table for the rank name and paygrade 
    */
    function buildDemotionsRecord($rankID) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $rankrow = mysqli_fetch_row(mysqli_query($link, "SELECT rank_name, paygrade FROM rank WHERE ID=" . $rankID));
        $string = $rankrow[0] . " " . $rankrow[1];
        return "<td>Demoted to " . $string . "</td>";
    }

    function buildTransferRecord($oldunit, $newunit, $oldpos, $newpos) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $oldunitrow = mysqli_fetch_row(mysqli_query($link, "SELECT unitname FROM units WHERE ID=" . $oldunit));
        $newunitrow = mysqli_fetch_row(mysqli_query($link, "SELECT unitname FROM units WHERE ID=" . $newunit));
        $oldposrow = mysqli_fetch_row(mysqli_query($link, "SELECT positionname FROM positions WHERE ID=" . $oldpos));
        $newposrow = mysqli_fetch_row(mysqli_query($link, "SELECT positionname FROM positions WHERE ID=" . $newpos));
        return "<td>Transferred from" . $oldunitrow[0] . " " . $oldposrow[0] . " to " . $newunitrow[0] . " " . $newposrow[0] . "</td>";
    }
?>