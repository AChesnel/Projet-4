<?php


trait Validator
{
    public function IsEgal($val1, $val2)
    {
        if( $val1 === $val2) return true;
        return false;
    }

    public function isExistInBdd($value, $field, $table)
    {

    }
}

abstract class BddManager
{
    public function getBdd()
    {
        return $bdd;
    }
}

// classs
class UserManager extends BddManager
{

    use Validator;
    
    public function hasPostDataValid($values)
    {
        $bdd = $this->getBdd();

        if($this->IsEgal($values['password'], $values['confirm'])) return false;
        return true;
    }

};