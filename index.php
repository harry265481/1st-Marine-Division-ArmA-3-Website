<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>1st Marine Division - Home</title>
        <?php include 'header.php' ?>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <?php include 'nav.php' ?>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/slide1.png" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="images/slide2.png" class="d-block w-100">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="spacer"></div>
        <div id="servers" class="container-fluid text-center">
            <div class="row">
                <div class="col-sm-6">
                    <div class="server">
                        <div id="ts3viewer_1124353" style="width:auto; height:500px; "></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="server">
                        <iframe src="https://discord.com/widget?id=817490859540217856&theme=dark" height="500px" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function showMenu() {
            var x = document.getElementById("navside");
            if (x.className.indexOf("show") == -1) {
                    x.className += " show";
                } else { 
                    x.className = x.className.replace(" show", "");
                }   
            }
        </script>
        <script src="https://static.tsviewer.com/short_expire/js/ts3viewer_loader.js"></script>
        <script>
        var ts3v_url_1 = "https://www.tsviewer.com/ts3viewer.php?ID=1124353&text=757575&text_size=12&text_family=6&text_s_color=000000&text_s_weight=normal&text_s_style=normal&text_s_variant=normal&text_s_decoration=none&text_i_color=&text_i_weight=normal&text_i_style=normal&text_i_variant=normal&text_i_decoration=none&text_c_color=&text_c_weight=normal&text_c_style=normal&text_c_variant=normal&text_c_decoration=none&text_u_color=000000&text_u_weight=normal&text_u_style=normal&text_u_variant=normal&text_u_decoration=none&text_s_color_h=&text_s_weight_h=bold&text_s_style_h=normal&text_s_variant_h=normal&text_s_decoration_h=none&text_i_color_h=000000&text_i_weight_h=bold&text_i_style_h=normal&text_i_variant_h=normal&text_i_decoration_h=none&text_c_color_h=&text_c_weight_h=normal&text_c_style_h=normal&text_c_variant_h=normal&text_c_decoration_h=none&text_u_color_h=&text_u_weight_h=bold&text_u_style_h=normal&text_u_variant_h=normal&text_u_decoration_h=none&iconset=default_colored_2014_tsv";
        ts3v_display.init(ts3v_url_1, 1124353, 100);
        </script>
    </body>
</html>