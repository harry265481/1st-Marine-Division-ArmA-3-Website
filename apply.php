<?php include_once 'config.php' ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $unitname ?> - Apply</title>
        <?php include 'header.php' ?>
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="apply.css">
    </head>
    <body class="bg-dark text-center">
        <main class="form-apply">
            <form action="submitapplication.php" method="post">
                <img class="mb-4" src="images/1MD.png" width="150px">
                <h1 class="h3 mb-3 fw-normal" style="color: white;">Apply</h1>
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname">
                            <label for="firstname" class="form-label text-dark">First Name</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="surname" placeholder="Surname" name="surname">
                            <label for="firstname" class="form-label text-dark">Surname</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="discord" placeholder="Discord" name="discord">
                    <label for="discord" class="form-label text-dark">Discord</label>
                    <div id="discordhint" class="form-text text-light">Name#1234</div>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="dob" placeholder="dob" name="dob">
                    <label for="discord" class="form-label text-dark">Date of Birth</label>
                    <div id="dobhint" class="form-text text-light">This is not saved anywhere except in your application</div>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="referralselect" name="referralselect">
                        <option selected>Choose one</option>
                        <option value="Steam">Steam Discussion</option>
                        <option value="Reddit">Reddit</option>
                        <option value="Clanlist">Clan List</option>
                        <option value="Armaholic Forums">Armaholic Forums</option>
                        <option value="Member">Unit Member</option>
                    </select>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="referrer" placeholder="referrer" name="referrer">
                    <label for="referrer" class="form-label text-dark">Referrer</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="steamid" placeholder="steamid" name="steamid">
                    <label for="steamid" class="form-label text-dark">SteamID 64</label>
                </div>
                <div class="form-check">
                    <div id="platoonhint" class="form-text text-light h3">Which Operations suit you best?</div>
                    <input class="form-check-input" type="radio" name="platoon" id="first" value="First">
                    <label class="form-check-label text-light" for="first">Sunday 8pm-10pm EST | 1am-3am GMT</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="platoon" id="second" value="Second">
                    <label class="form-check-label text-light" for="second">Sunday 1pm-3pm EST | 6pm-8pm GMT</label>
                </div>
                <div class="form-check mb-5">
                    <input class="form-check-input" type="radio" name="platoon" id="both" value="Both">
                    <label class="form-check-label text-light" for="both">Both</label>
                </div>
                <div class="form-check">
                    <div id="platoonhint" class="form-text text-light h3">What MOS/Career Field are you applying for?</div>
                    <input class="form-check-input" type="radio" name="career" id="rifle" value="Rifleman">
                    <label class="form-check-label text-light" for="both">0311 Rifleman (Infantry)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="career" id="corpsman" value="Corpsman">
                    <label class="form-check-label text-light" for="both">L03A Field Medical Technician (Corpsman) [CLOSED]</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="career" id="pilot" value="Pilot">
                    <label class="form-check-label text-light" for="both">7599 Student Naval Aviator (Pilot) [CLOSED]</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="career" id="armor" value="Armor">
                    <label class="form-check-label text-light" for="both">1812 Tank Crewman (Armor) [CLOSED]</label>
                </div>
                <div class="form-check mb-5">
                    <input class="form-check-input" type="radio" name="career" id="weapons" value="Machine Gunner">
                    <label class="form-check-label text-light" for="both">0331 Machine Gunner (Weapons Platoon)</label>
                </div>
                <div class="form-check">
                    <div id="platoonhint" class="form-text text-light h3">Have you been or are currently in  Armed Service of the Military?<br></div>
                    <input class="form-check-input" type="radio" name="veteran" id="yes" value="Yes">
                    <label class="form-check-label text-light" for="both">Yes</label>
                </div>
                <div class="form-check mb-5">
                    <input class="form-check-input" type="radio" name="veteran" id="no" value="No">
                    <label class="form-check-label text-light" for="both">No</label>
                </div>
                <div class="form-floating mb-3">
                    <div id="otherunitshint" class="form-text text-light h3">Are you currently, or have you been, in any other ARMA 3 Milsim units? If so declare them below.</div>
                    <input type="text" class="form-control" id="otherunits" placeholder="otherunits" name="otherunits">
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </main>
    </body>
</html>