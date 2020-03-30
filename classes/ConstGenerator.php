<?php

class ConstGenerator
{
    public static function generate(array $gsGenerators){
        $constructor = "";
        $params = "";
        $setAttributes = "";
        foreach($gsGenerators as $gen){
            $params.= $gen->getVarValue() . ", ";
            $setAttributes.= "\t\$this->{$gen->getVarNameUcFirst()} = {$gen->getVarValue()};\n";
        }

        $params = substr($params, 0, strlen($params) - 2);
        $constructor = "public function __construct($params){\n"
                        . "{$setAttributes}"
                        . "}\n";
        return $constructor;
    }
}