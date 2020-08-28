<?php
if(isset($_SESSION['info']))
{
    echo $_SESSION['info'];
    unset($_SESSION['info']);
}

?>

<div class="page-section">
    <h1 class="page-section-heading text-center text-light mb-5">Polecane w Kinie Jastrząb</h1>

    <div class="page-section background-image-div">

        <div class="container row indexPhotos">

            <div class="card photoMain col-xs-12 col-sm-6 col-md-6 col-lg-3 mb-5"><a href="repertoire"><img class="imgMain" title="Jak zostałem gangsterem. Historia prawdziwa (2019)" alt="Jak zostałem gangsterem. Historia prawdziwa (2019)" src="./src/Views/images/jak-zostalem-gangsterem-historia-prawdziwa.jpg"></a></div>

            <div class="card photoMain col-xs-12 col-sm-6 col-md-6 col-lg-3 mb-5"><a href="repertoire"><img class="imgMain" title="W lesie dziś nie zaśnie nikt (2020)" alt="W lesie dziś nie zaśnie nikt (2020)"  src="./src/Views/images/wlesiedzis.jpg"></a></div>
            <div class="card photoMain col-xs-12 col-sm-6 col-md-6 col-lg-3 mb-5"><a href="repertoire"><img class="imgMain" title="Doktor Dolittle (2020)" alt="Doktor Dolittle (2020)"  src="./src/Views/images/doktor%20dolittle.jpg"></a></div>
            <div class="card photoMain col-xs-12 col-sm-6 col-md-6 col-lg-3 mb-5"><a href="repertoire"><img class="imgMain" title="Bad Boy (2020)" alt="Bad Boy (2020)"  src="./src/Views/images/badboy.jpg"></a></div>
        </div>
    </div>
</div>