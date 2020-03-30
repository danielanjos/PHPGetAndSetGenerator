<?php
    
    function loadClasses($class){       
        if(file_exists("classes/". $class . ".php")){
            require_once("classes/". $class . ".php");
        } 
        
    }

    spl_autoload_register("loadClasses");