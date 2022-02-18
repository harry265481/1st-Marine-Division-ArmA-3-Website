<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="images/unit-icon.png" width="35px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="roster.php"><i class="fas fa-clipboard-list"></i> Roster</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="ts3server://ts3.1stmda3.com"><i class="fab fa-teamspeak"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="https://discord.gg/RB6Jz3gx6T"><i class="fab fa-discord"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav d-flex" style="border-color: #f00 !important">
                <a class="nav-link active" aria-current="page" href="apply.php"><i class="fas fa-clipboard"></i> Apply</a>
                <?php 
                    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
                        echo "<a class=\"nav-link active\" aria-current=\"page\" href=\"sign-in.php\"><i class=\"fas fa-id-card\"></i> Sign In</a>";
                    } else {
                        echo "<a class=\"nav-link active\" aria-current=\"page\" href=\"admin/dashboard.php\"><i class=\"fas fa-desktop\"></i> Dashboard</a>";
                        echo "<a class=\"nav-link active\" aria-current=\"page\" href=\"sign-out.php\"><i class=\"fas fa-id-card\"></i> Sign Out</a>";
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>