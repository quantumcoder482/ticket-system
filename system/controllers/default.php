<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/



// From v 4.1



// r2(U.'login/');

if(isset($config['default_landing_page'])){
    r2(U.$config['default_landing_page'].'/');
}
else{
    r2(U.'login'.'/');
}

