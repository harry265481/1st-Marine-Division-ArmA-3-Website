<?php
    include_once 'config.php';

    //Generate 3D uniform for the member
    //id      | int | id of the member
    //grade   | str | grade given as "{firstLetter}{number}"
    //$branch | int | id of branch
    function generateUniform($id, $grade, $branch, $path = "", $armybranch) {
        
        //check branch and create resource from background
        //marine
        if($branch == 0) {
            $branchname = "army";
            $bg = imagecreatefrompng($path . "images/uniform/army.png");
            //navy
        } else if($branch == 1) {
            $branchname = "airforce";
            $bg = imagecreatefrompng($path . "images/uniform/airforce.png");
        }

        //Get grade type; E or O
        $gradetype = substr($grade, 0, 1);
        $gradenum = substr($grade, 1, 1);
        
        //create colors
        $white = imagecolorallocate($bg, 255, 255, 255);

        //place nameplate and text
        //Army nameplate
        if($branch == 0) {
            //CONSTANTS: text size: 7; Font: FRABK.ttf
            putenv('GDFONTPATH=' . realpath('.'));
            $font =  dirname(__FILE__) . '/FRABK.ttf';
            $fontsize = 40;
            $angle = 0;
            $name = getMemberLastName($id);
            $bb = imagettfbbox($fontsize, $angle, $font, $name);
            $textwidth = $bb[2] - $bb[0];
            $textheight = $bb[7] - $bb[1];
            $namex = 593 - ($textwidth / 2);
            $namey = 802 - ($textheight / 2);
            imagettftext($bg, $fontsize, $angle, $namex, $namey, $white, $font, $name);
            
            if(getMemberRankID($id) < 22) {
                $rank = imagecreatefrompng($path . "images/uniform/armyranks/" . getMemberRankID($id) . ".png");
                $rankx = 182 - (imagesx($rank) / 2);
                $ranky = 720;
                imagecopy($bg, $rank, $rankx, $ranky, 0, 0, imagesx($rank), imagesy($rank));
                imagecopy($bg, $rank, imagesx($bg) - (imagesx($rank) + $rankx), $ranky, 0, 0, imagesx($rank), imagesy($rank));

                if($armybranch == 0) {
                    $lapelpinl = imagecreatefrompng($path . "images/uniform/ENL-INFL.png");
                    $lapelpinr = imagecreatefrompng($path . "images/uniform/ENL-INFR.png");
                    $infantrylapely = 316 - (imagesy($lapelpinl) / 2);
                    $infantrylapelx1 = 693 - (imagesx($lapelpinl) / 2);
                    $infantrylapelx2 = 1350 - (imagesx($lapelpinr) / 2);
                    imagecopy($bg, $lapelpinl, $infantrylapelx1, $infantrylapely, 0, 0, imagesx($lapelpinl), imagesy($lapelpinl));
                    imagecopy($bg, $lapelpinr, $infantrylapelx2, $infantrylapely, 0, 0, imagesx($lapelpinr), imagesy($lapelpinr ));
                } else if($armybranch == 1) {
                    $lapelpinl = imagecreatefrompng($path . "images/uniform/ENL-AVIL.png");
                    $lapelpinr = imagecreatefrompng($path . "images/uniform/ENL-AVIR.png");
                    $infantrylapely = 316 - (imagesy($lapelpinl) / 2);
                    $infantrylapelx1 = 693 - (imagesx($lapelpinl) / 2);
                    $infantrylapelx2 = 1350 - (imagesx($lapelpinr) / 2);
                    imagecopy($bg, $lapelpinl, $infantrylapelx1, $infantrylapely, 0, 0, imagesx($lapelpinl), imagesy($lapelpinl));
                    imagecopy($bg, $lapelpinr, $infantrylapelx2, $infantrylapely, 0, 0, imagesx($lapelpinr), imagesy($lapelpinr ));
                }
            } else {
                $rank = imagecreatefrompng($path . "images/uniform/armyranks/" . getMemberRankID($id) . "L.png");
                $rank2 = imagecreatefrompng($path . "images/uniform/armyranks/" . getMemberRankID($id) . "R.png");
                $rankx = 230;
                $ranky = 141;
                imagecopy($bg, $rank, $rankx, $ranky, 0, 0, imagesx($rank), imagesy($rank));
                imagecopy($bg, $rank2, imagesx($bg) - (imagesx($rank2) + $rankx), $ranky, 0, 0, imagesx($rank2), imagesy($rank2));

                $lapelpinl = imagecreatefrompng($path . "images/uniform/OFFL.png");
                $lapelpinr = imagecreatefrompng($path . "images/uniform/OFFR.png");
                $officerlapely = 317 - (imagesy($lapelpinl) / 2);
                $officerlapelx1 = 682 - (imagesx($lapelpinl) / 2);
                $officerlapelx2 = 1377 - (imagesx($lapelpinl) / 2);
                imagecopy($bg, $lapelpinl, $officerlapelx1, $officerlapely, 0, 0, imagesx($lapelpinl), imagesy($lapelpinl));
                imagecopy($bg, $lapelpinr, $officerlapelx2, $officerlapely, 0, 0, imagesx($lapelpinr), imagesy($lapelpinr ));
                if($armybranch == 0) {
                    $lapelpinl = imagecreatefrompng($path . "images/uniform/OFF-INFL.png");
                    $lapelpinr = imagecreatefrompng($path . "images/uniform/OFF-INFR.png");
                    $infantrylapely = 410 - (imagesy($lapelpinl) / 2);
                    $infantrylapelx1 = 731 - (imagesx($lapelpinl) / 2);
                    $infantrylapelx2 = 1313 - (imagesx($lapelpinr) / 2);
                    imagecopy($bg, $lapelpinl, $infantrylapelx1, $infantrylapely, 0, 0, imagesx($lapelpinl), imagesy($lapelpinl));
                    imagecopy($bg, $lapelpinr, $infantrylapelx2, $infantrylapely, 0, 0, imagesx($lapelpinr), imagesy($lapelpinr ));
                } else if($armybranch == 1) {
                    $lapelpinl = imagecreatefrompng($path . "images/uniform/OFF-AVIL.png");
                    $lapelpinr = imagecreatefrompng($path . "images/uniform/OFF-AVIR.png");
                    $aviationlapely = 410 - (imagesy($lapelpinl) / 2);
                    $aviationlapelx1 = 731 - (imagesx($lapelpinl) / 2);
                    $aviationlapelx2 = 1313 - (imagesx($lapelpinr) / 2);
                    imagecopy($bg, $lapelpinl, $aviationlapelx1, $aviationlapely, 0, 0, imagesx($lapelpinl), imagesy($lapelpinl));
                    imagecopy($bg, $lapelpinr, $aviationlapelx2, $aviationlapely, 0, 0, imagesx($lapelpinr), imagesy($lapelpinr ));
                }
            }

        }

        
        //Ribbons
        $ribbonrack = createRibbonGrid(getMemberAwardsFileName($id));
        $rowcount = 0;
        $columncount = 0;
            $ribbony = 686;
            $ribbonwidth = 108;
            $ribbonheight = 30;
            $threewidesrcx = 1494;
            $twowidesrcx = 1440;
            $onewidesrcx = 1386;

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
                $curr_ribbon = imagecreatefromjpeg($path . "images/awards/ribbons/" . $column[0] . ".jpg");
                imagecopyresampled($bg, $curr_ribbon, $dstx, $dsty, 0, 0, $ribbonwidth, $ribbonheight, imagesx($curr_ribbon), imagesy($curr_ribbon));
                $columncount = $columncount + 1;
            }
            $columncount = 0;
            $rowcount = $rowcount + 1;
        }
        
        /*
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
                $riflebadge = imagecreatefrompng($path . "images/awards/badges/" . $riflefile . ".png");
                $aspect = imagesx($riflebadge) / imagesy($riflebadge);
                $rifleh = $riflew * $aspect;
                imagecopyresampled($bg, $riflebadge, $riflex, $badgey, 0, 0, $riflew, $rifleh, imagesx($riflebadge), imagesy($riflebadge));
            }
            
            if($pistol > 0) {
                $pistolbadge = imagecreatefrompng($path . "images/awards/badges/" . $pistolfile . ".png");
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
        */
        //export
        ob_start();
        imagepng($bg);
        $image_data = ob_get_contents();
        ob_end_clean();
        $generateBase64 = base64_encode($image_data);
        return $generateBase64;
    }

    function generatePilotPatch($id, $grade, $branch, $path) {
        //Init patch
        $patch = imagecreatefrompng($path . "images/patch/Leather.png");

        //Add badge
        $aviatorbadge = imagecreatefrompng($path . "images/patch/naval-aviator-gold.png");
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

    //Returns Status name of a member
    function getMemberStatusName($id) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $status = mysqli_fetch_row(mysqli_query($link, "SELECT status FROM personnel WHERE ID=" . $id));
        $statusname = mysqli_fetch_row(mysqli_query($link, "SELECT status FROM personnel WHERE ID=" . $status));
        return $statusname[0];
    }

    //Returns ID of army branch of a member
    function getMemberArmyBranchID($id) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $armybranch = mysqli_fetch_row(mysqli_query($link, "SELECT armybranch FROM personnel WHERE ID=" . $id));
        return $armybranch[0];
    }

    //Returns name of a status
    function getStatusName($id) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $statusname = mysqli_fetch_row(mysqli_query($link, "SELECT status FROM status WHERE ID=" . $id));
        return $statusname[0];
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
    
    /**
     * getMemberRankAbbrev
     *
     * @param  int $id
     * @return string
     */
    function getMemberRankAbbrev($id) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $rank = mysqli_fetch_row(mysqli_query($link, "SELECT rank FROM personnel WHERE ID=" . $id));
        $rankrow = mysqli_fetch_row(mysqli_query($link, "SELECT abbrev FROM rank WHERE ID=" . $rank[0]));
        $string = $rankrow[0];
        return $string;
    }

    //Returns pay grade of a member as {type}{number}
    function getMemberGrade($id) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $rank = mysqli_fetch_row(mysqli_query($link, "SELECT rank FROM personnel WHERE ID=" . $id));
        $rankrow = mysqli_fetch_row(mysqli_query($link, "SELECT paygrade FROM rank WHERE ID=" . $rank[0]));
        $string = substr($rankrow[0], 0, 1) . substr($rankrow[0], 2, 1);
        return $string;
    }

    //Returns pay grade of a member as {type}{number}
    function getMemberGradeLong($id) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        
        $rank = mysqli_fetch_row(mysqli_query($link, "SELECT rank FROM personnel WHERE ID=" . $id));
        $rankrow = mysqli_fetch_assoc(mysqli_query($link, "SELECT paygrade FROM rank WHERE ID=" . $rank[0]));
        return $rankrow['paygrade'];
    }

    //Returns name of the rank of a member
    function getRankName($id) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $rank = mysqli_fetch_row(mysqli_query($link, "SELECT rank_name FROM rank WHERE ID=" . $id));
        return $rank[0];
    }

    //Returns name of the rating of a member
    function getMemberRateID($id) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $rating = mysqli_fetch_row(mysqli_query($link, "SELECT rating FROM personnel WHERE ID=" . $id));
        return $rating[0];
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

    /**
     * getMemberAwardsFileName
     *
     * @param  int $id
     * @return array(string)
     */
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
    
    /**
     * createRibbonGrid
     *
     * @param  array $array
     * @return array
     */
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
    
    /**
     * getMemberBranchID
     *
     * @param  int $id
     * @return int
     */
    function getMemberBranchID($id) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $branch = mysqli_fetch_row(mysqli_query($link, "SELECT branch FROM personnel WHERE ID=" . $id));
        return $branch[0];
    }
    
    /**
     * getMemberBranchNameAbbrev
     *
     * @param  int $id
     * @return string
     */
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

    /**
     * isMemberPilot
     *
     * @param  int $id
     * @return bool
     */
    function isMemberPilot($id) {
        $pilot = mysqli_fetch_row(mysqli_query($link, "SELECT pilot FROM personnel WHERE ID=" . $id));
        if ($pilot[0] == 1) {
            return true;
        } else {
            return false;
        }
        return false;
    }
    
    /**
     * getPositionName
     *
     * @param  int $id
     * @return int
     */
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
                return "<td>Enlisted in the 1st Infantry Division</td>";
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
            case 7:
                return "<td>Returned from ELOA</td>";
                break;
        }
    }

    /**
     * buildRetirementRecord
     *
     * @param  int $type
     *  0 - Honorable Discharge
     *  1 - General Discharge
     *  2 - Administrative Separation
     *  3 - Other than Honorable
     *  4 - Bad Conduct Discharge
     *  5 - Dishonorable Discharge
     *  6 - Retired
     * @return string 
     */
    function buildRetirementRecord($type) {
        switch($type) {
            case 0:
                return "<td>Discharged from the 1st Infantry Division - Honorable</td>";
                break;
            case 1:
                return "<td>Discharged from the 1st Infantry Division - General</td>";
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
                return "<td>Retired from the 1st Infantry Division</td>";
                break;
        }
        return false;
    }
    
    /**
     * buildPromotionRecord
     *
     * @param  int $rankID
     * @return string table row
     */
    function buildPromotionRecord($rankID) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $rankrow = mysqli_fetch_row(mysqli_query($link, "SELECT rank_name, paygrade FROM rank WHERE ID=" . $rankID));
        $string = $rankrow[0] . " " . $rankrow[1];
        return "<td>Promoted to " . $string . "</td>";
    }
 
    /**
     * buildDemotionsRecord
     *
     * @param  int $rankID
     * @return string table row
     */
    function buildDemotionRecord($rankID) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $rankrow = mysqli_fetch_row(mysqli_query($link, "SELECT rank_name, paygrade FROM rank WHERE ID=" . $rankID));
        $string = $rankrow[0] . " " . $rankrow[1];
        return "<td>Demoted to " . $string . "</td>";
    }
    
    /**
     * buildTransferRecord
     *
     * @param  int $oldunit
     * @param  int $newunit
     * @param  int $oldpos
     * @param  int $newpos
     * @return string
     */
    function buildTransferRecord($oldunit, $newunit, $oldpos, $newpos) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $oldunitrow = mysqli_fetch_row(mysqli_query($link, "SELECT unitname FROM units WHERE ID=" . $oldunit));
        $newunitrow = mysqli_fetch_row(mysqli_query($link, "SELECT unitname FROM units WHERE ID=" . $newunit));
        $oldposrow = mysqli_fetch_row(mysqli_query($link, "SELECT positionname FROM positions WHERE ID=" . $oldpos));
        $newposrow = mysqli_fetch_row(mysqli_query($link, "SELECT positionname FROM positions WHERE ID=" . $newpos));
        return "<td>Transferred from" . $oldunitrow[0] . " " . $oldposrow[0] . " to " . $newunitrow[0] . " " . $newposrow[0] . "</td>";
    }

    function buildUnitMemberTable($unitid, $path) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $results = mysqli_query($link, "SELECT * FROM personnel WHERE unitID=" . $unitid . " ORDER BY rank desc");
        if($results == "false") {
            return false;
        }
        foreach ($results as $result)  {
            $statusrow = mysqli_fetch_row(mysqli_query($link, "SELECT * FROM status WHERE ID=" . $result['status']));
            $rank = getRankName($result['rank']);
            $imagename = $result['rank'];
            $position = getPositionName($result['position']);

            if($result['branch'] == 0) {
                $branch = "army";
            } else if($result['branch'] == 1) {
                $branch = "airforce";
            }

            $imagestring = $path . "images/ranks/" . $branch . "/small/" . $imagename;
        
            echo "<tr>";
            echo    "<td width=\"30px\"><img class=\"mx-auto d-block\"  height=\"30px\" src=" . $imagestring . ".png></td>";
            echo    "<td width=\"130px\">" . substr($result['FirstName'], 0, 1) . ". " . $result['LastName'] . "</td>";
            echo    "<td>" . $position  ."</td>";
            echo    "<td width=\"70px\"><span class=\"badge rounded-pill bg-" . $statusrow[2] . " text-" . $statusrow[3] . "\">" . $statusrow[1] . "</span></td>";
            echo    "<td class=\"d-none d-lg-table-cell\" width=\"200px\">" . $rank . "</td>";
            echo    "<td width=\"100px\">" . $result['DOE'] . "</td>";
            echo    "<td width=\"22px\">";

            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                echo    "<div class=\"dropdown\">";
                echo        "<button class=\"btn btn-secondary dropdown-toggle\" type=\"button\" id=\"dropdownMenuButton1\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\"></button>";
                echo        "<ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton1\">";
                echo            "<li><a class=\"dropdown-item\" href=\"promote.php?id=" . $result['ID'] . "\"><i class=\"fas fa-angle-double-up\"></i> Promote</a></li>";
                echo            "<li><a class=\"dropdown-item\" href=\"demote.php?id=" . $result['ID'] . "\"><i class=\"fas fa-angle-double-down\"></i> Demote</a></li>";
                echo            "<li><a class=\"dropdown-item\" href=\"transfer.php?id=" . $result['ID'] . "\"><i class=\"fas fa-arrows-alt-h\"></i> Transfer</a></li>";
                echo            "<li><a class=\"dropdown-item\" href=\"graduate.php?id=" . $result['ID'] . "\"><i class=\"fas fa-graduation-cap\"></i> Qualification</a></li>";
                echo            "<li><a class=\"dropdown-item\" href=\"award.php?id=" . $result['ID'] . "\"><i class=\"fas fa-medal\"></i></i> Award</a></li>";
                echo            "<li><a class=\"dropdown-item\" href=\"discharge.php?id=" . $result['ID'] . "\"><i class=\"fas fa-times-circle\"></i> Discharge</a></li>";
                echo        "</ul>";
                echo    "</div>";
            }

            echo    "</td>";
            echo    "<td width=\"25px\"><a class=\"text-light\" href=\"member.php?id=" . $result['ID'] . "\"><i class=\"fas fa-id-badge\"></i></a></td>";
            echo "</tr>";
        }
        return true;
    }

    function buildAttendanceRow($unitid, $path) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $results = mysqli_query($link, "SELECT ID, FirstName, LastName, branch, rank FROM personnel WHERE unitID=" . $unitid . " ORDER BY rank desc");
        if($results == "false") {
            return false;
        }
        foreach ($results as $result)  {
            $imagename = $result['rank'];

            if($result['branch'] == 0) {
                $branch = "army";
            } else if($result['branch'] == 1) {
                $branch = "airforce";
            }

            $imagestring = $path . "images/ranks/" . $branch . "/small/" . $imagename;
        
            echo "<tr>";
            echo    "<td width=\"30px\"><img class=\"mx-auto d-block\"  height=\"30px\" src=" . $imagestring . ".png></td>";
            echo    "<td width=\"130px\">" . substr($result['FirstName'], 0, 1) . ". " . $result['LastName'] . "</td>";
            echo    "<td width=\"22px\">";
            echo        "<select name=\"attendance[" . $result['ID'] . "][presence]\" >";
            echo            "<option value=\"0\">Present</option>";
            echo            "<option value=\"1\">Absent</option>";
            echo            "<option value=\"2\">LOA</option>";
            echo        "</select>";
            echo    "</td>";
            echo "</tr>";
        }
        return true;
    }

    function buildMassAwardRow($unitid, $path) {
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        $results = mysqli_query($link, "SELECT ID, FirstName, LastName, branch, rank FROM personnel WHERE unitID=" . $unitid . " ORDER BY rank desc");
        if($results == "false") {
            return false;
        }
        foreach ($results as $result)  {
            $imagename = $result['rank'];

            if($result['branch'] == 0) {
                $branch = "army";
            } else if($result['branch'] == 1) {
                $branch = "airforce";
            }

            $imagestring = $path . "images/ranks/" . $branch . "/small/" . $imagename;
        
            echo "<tr>";
            echo    "<td width=\"30px\"><img class=\"mx-auto d-block\"  height=\"30px\" src=" . $imagestring . ".png></td>";
            echo    "<td width=\"130px\">" . substr($result['FirstName'], 0, 1) . ". " . $result['LastName'] . "</td>";
            echo    "<td width=\"22px\">";
            echo        "<input type=\"checkbox\" value=\"" . $result['ID'] . "\" name=\"member[]\">";
            echo    "</td>";
            echo "</tr>";
        }
        return true;
    }
?>