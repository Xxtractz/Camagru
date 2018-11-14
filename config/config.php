<?php

    define ("DEBUG", true);
    
    // default controller, if there isn't one defined on url 
    define ("DEFAULT_CONTROLLER", "Home"); 

    // if no layout is set in the controller use this layout
    define ("DEFAULT_LAYOUT", "default");
    
    // default controller, empty link 
    define ("PROOT", "/Camagru/"); 

    // this will be set if the site title
    define ("SITE_TITLE", "Camagru");  
    
    // Session name for logged user
    define("CURRENT_USER_SESSION_NAME", "ly8il8t8YIFdK324ch4SrxR3A53zEFyICre3iC8tFyuF6u921llgG");

    // cookie name for logged in user remember me
    define("REMEMBER_ME_COOKIE_NAME", "ly8il8t8YIFdKyICre3iC8tFyuhjbv7wo40w0u49712lgG");

    // how long should cookie last
    define("REMEMBER_ME_COOKIE_EXPIRY", 280000);