<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : false;

if (!$username) {
    header("Location: login.php");
}
require 'templates/header.php';
?>

<div class="jumbotron jumbotron-fluid text-center" style: margin-top: -25px;>
    <div class="container">
        <h1 class="display-4 text-white" style="margin-top: 150px; font-family: Bebas Neue;">Posko Replace Al-Quran</h1>
        <p class="lead text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris feugiat, odio nec eleifend pretium, purus ex auctor mauris, non consectetur ante purus vitae diam. Proin ullamcorper ipsum sed nunc tempor fermentum. In lectus felis, interdum ac mauris et, euismod blandit nibh. Ut imperdiet pharetra ipsum et scelerisque. Pellentesque erat justo, rhoncus a urna eu, aliquet scelerisque urna. Duis lobortis auctor euismod. In malesuada porttitor augue, sed dictum nisl convallis at.
        </p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>
</div>

<section id="about">
    <div class="container">
        <h1 class="page-header text-center ">About</h1>
        <hr style="width: 15%; background-color: blueviolet; height: 3px;">
        <div class="row mt-5 mb-5">
            <div class="col">
                <img src="https://img.freepik.com/free-photo/about-us-sign-as-crossword-cube-blocks-white-background-3d-rendering_476612-13679.jpg?size=626&ext=jpg" class="rounded-lg" width="500px" height="300px" alt="about">
            </div>
            <div class="col">
                <p class=" text-left mt-5" style="font-size: 18px;">Aplikasi ini dirancang dan dibangun sebagai upaya menjadikan sunnah nabi sebagai solusi dalam perkara memuliakan al-Quran yang usang. Disamping itu, memberikan opsi lain sehingga dapat mengurangi al-Quran yang menumpuk dan berdebu.
                </p>
            </div>
        </div>
    </div>
</section>
<section id="contact">
    <div class="container">
        <h1 class="page-header text-center ">Contact Us</h1>
        <hr style="width: 15%; background-color: blueviolet; height: 3px;">
        <div class="row mt-5 mb-5 mx-auto">
            <div class="col align-self-end text-center">
                <p class=""><i class="fas fa-map-marker-alt "> </i> Jl. Cimahi no. 13 Klojen, Malang Kota</p>
                <p class=""><i class="fas fa-envelope"></i> <a href="mailto:info@gmail.com" class=''>anasusb11@gmail.com</a> </p>
                <hr style="background-color: rgb(255, 255, 255);">
                <h5 class="">@anasusb11 || @hanzaryu</h5>
                <i class="fab fa-2x fa-github "></i>
                <i class="fab fa-2x fa-facebook "></i>
                <i class="fab fa-2x fa-instagram "></i>
            </div>
            <div class="col">
                <img src="https://images.unsplash.com/photo-1596524430615-b46475ddff6e?ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8Y29udGFjdHN8ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80" class="rounded-lg" width="500px" height="300px" alt="about">
            </div>
        </div>
    </div>
</section>
<?php
require 'templates/footer.php'; ?>