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
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/slide1.png" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="images/slide2.png" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="images/slide3.png" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="images/slide4.png" class="d-block w-100">
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
        <div class="spacer">
        </div>
        <div class="container-fluid text-center grey">
            <h2 class="title">WHO WE ARE</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla imperdiet vel ex varius rhoncus. Mauris fringilla dapibus iaculis. Fusce scelerisque fermentum imperdiet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nulla rutrum quis orci in aliquet. Nullam at ligula in tellus viverra condimentum at sit amet sapien. Nulla in turpis magna. Mauris commodo placerat neque ac consectetur.<br><br>
               Pellentesque et sapien ut orci mattis luctus venenatis in nisl. Integer fermentum dui id nisl dignissim dignissim. Aenean sit amet ipsum sem. Donec nec dolor pretium, ornare nunc at, malesuada elit. Nulla vulputate urna sit amet odio malesuada, in mollis sem dictum. Suspendisse eu dolor sodales, maximus nunc eget, malesuada purus. Quisque odio nulla, tempor vitae mauris at, fringilla convallis elit. Ut sit amet risus sodales, tempus augue vitae, pulvinar nisl. Cras est orci, vulputate a vulputate vitae, congue in leo. Quisque leo lorem, elementum nec mauris ac, ullamcorper pharetra ex.<br><br>
               Nullam vitae enim sit amet eros pharetra suscipit. Suspendisse aliquet elit vel lacus interdum, eget dignissim lacus ornare. Maecenas tristique eleifend euismod. Vivamus sed ante dapibus nisi tristique consectetur quis maximus orci. Mauris molestie auctor arcu in ornare. Donec lacus metus, dapibus nec mi a, pulvinar finibus eros. Curabitur efficitur orci nisl, eu scelerisque dui ultrices nec.<br><br>
               Quisque vestibulum tincidunt luctus. Donec viverra commodo leo fringilla efficitur. Vestibulum et purus imperdiet, pellentesque purus at, molestie tortor. Praesent at dictum tortor. Donec quis nisl posuere, aliquet eros sed, convallis tellus. Quisque fringilla non leo non interdum. Cras ac pellentesque orci. Phasellus vestibulum odio mi, eget imperdiet metus tincidunt a. Proin ullamcorper tellus ex, eget ullamcorper est luctus in. Nunc est est, porta et libero ac, accumsan scelerisque massa. Duis scelerisque elementum dolor convallis hendrerit. Vivamus in ante massa. Vivamus id porttitor mauris. Vivamus suscipit turpis ac viverra laoreet. Praesent lobortis metus lectus, quis ultrices tortor sagittis eget. Morbi fermentum dapibus posuere.<br><br>
               Donec et convallis mauris, id sodales lorem. Sed ut purus arcu. Duis id ipsum vel elit varius vehicula. Morbi faucibus metus sed nunc pretium, quis hendrerit justo convallis. Phasellus quam odio, posuere non quam ullamcorper, iaculis ullamcorper sem. Donec posuere suscipit nibh ultrices pulvinar. Sed sit amet urna pellentesque, fringilla justo at, lacinia felis. In sagittis in nisl id ultrices. Sed pretium tellus massa, vitae maximus felis dictum sit amet. Pellentesque ullamcorper, quam sed convallis semper, est eros condimentum mauris, id hendrerit libero nisl et elit. Suspendisse orci erat, convallis finibus est in, vehicula consectetur ipsum.</p>
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
    </body>
</html>