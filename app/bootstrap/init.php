<?php

// This is the initializer

/*
 | App class
 */

require(__SITE_PATH.'app/core/App.php');

/*
 | Libraries
 */

foreach (glob(__SITE_PATH.'app/core/libs/*.php') as $filename)
{
    require $filename;
}

/*
 | Helpers
 */

foreach (glob(__SITE_PATH.'app/core/helpers/*.php') as $filename)
{
    require $filename;
}

// Redo
define('BASE_URL', URL::base());

/*
 | Abstract base classes
 */

foreach (glob(__SITE_PATH.'app/core/base/*.php') as $filename)
{
    require $filename;
}


