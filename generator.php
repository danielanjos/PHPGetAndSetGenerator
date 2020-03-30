<?php
    require_once('autoload.php');
    
    $txtClass = $_POST['txtClass'];
    $split = explode(";", $txtClass);
    $gettersAndSetters = "";
    $createConstructor = isset($_POST["generateConstructor"]) ? true : false;

    $gsGenerators = [];

    foreach($split as $key => $value){
        if((strpos($value, 'private') !== false || strpos($value, 'protected') !== false)){
            $gsGenerator = new GSGenerator($value);
            $gettersAndSetters .= $gsGenerator->generate();
        } else if(strpos($value, 'public') !== false){
            //public attribute
            $gsGenerator = new GSGenerator($value);
        } else {
            continue;
        }

        $gsGenerators[] = $gsGenerator;
    }

    $constructor = "";
    //create constructor
    if($createConstructor){
        $constructor = ConstGenerator::generate($gsGenerators);
    }

    $return = $constructor . "\n" . $gettersAndSetters;

    echo $return;
    
    session_start();
    $_SESSION["txtClass"] = $txtClass;
    $_SESSION["resultado"] = $return;

    header("location: index.php");
