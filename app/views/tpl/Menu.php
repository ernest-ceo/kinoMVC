<?php
foreach ($menu as $href => $description)
{
?>
    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger text-center" href="<?=$href?>"><?=$description?></a>
<?php
}