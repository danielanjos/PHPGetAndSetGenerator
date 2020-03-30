<?php

class GSGenerator
{
    private $VarValue;
    private $VarName;
    private $VarNameUcFirst;

    public function __construct($value)
    {
        $this->VarValue = substr($value, strpos($value, '$'));
        $this->VarName = substr($this->VarValue, 1);
        $this->VarNameUcFirst = ucfirst($this->VarName);
    }


    //These GETTERS and SETTERS were made by this generator xD

    public function getVarValue()
    {
        return $this->VarValue;
    }

    public function setVarValue($VarValue)
    {
        $this->VarValue = $VarValue;
    }

    public function getVarName()
    {
        return $this->VarName;
    }

    public function setVarName($VarName)
    {
        $this->VarName = $VarName;
    }

    public function getVarNameUcFirst()
    {
        return $this->VarNameUcFirst;
    }

    public function setVarNameUcFirst($VarNameUcFirst)
    {
        $this->VarNameUcFirst = $VarNameUcFirst;
    }

    //Generator
    public function generate()
    {
        $get = "public function get{$this->VarNameUcFirst}()\n{ \n"
            . "     return \$this->{$this->VarName};\n"
            . "} \n";

        $set = "public function set{$this->VarNameUcFirst}({$this->VarValue})\n{ \n"
            . "     \$this->{$this->VarName} = {$this->VarValue};\n"
            . "} \n";

        return $get . "\n" . $set . "\n";
    }
}
