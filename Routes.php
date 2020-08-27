<?php

// if(isset($_GET['url']))
// $class_name = $_GET['url'];
// $class_name = ucfirst($class_name);



// function __autoload($class_name)
// {
//     if (file_exists('./classes/'.$class_name.'.php'))
//         require_once './classes/'.$class_name.'.php';
//     elseif (file_exists('./controllers'.$class_name.'.php'))
//         require_once './controllers/'.$class_name.'.php';
// }



require_once ('classes/Route.php');
require_once ('app/controllers/AboutUs.php');
require_once ('app/controllers/ContactUs.php');
require_once ('app/controllers/Index.php');

Route::set('index', function(){
    Index::CreateView('index');
});

Route::set('about-us', function(){
    AboutUs::CreateView('about-us');
});

Route::set('contact-us', function(){
    ContactUs::CreateView('contact-us');
});