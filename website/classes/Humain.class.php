<?php

class Humain
{
    //c'est la mauvaise manière
    private $name;
    private $surname;
    private $age;
    private $id;

    public function setName(string $name)
    {
        $this->name = $name;
    }

    function setSurname(string $surname)
    {
        $this->surname = $surname;
    }


    public function getFullName() : string
    {
        return $this->name . " ". $this->surname;
    }

    public function insert(PDO $PDO)
    {
        $params = [];
        $params["n"] = $this->name;
        $params["s"] = $this->surname;
        return $this->execute($PDO,"INSERT INTO humains(name, surname) VALUES(:n,:s)",$params);

    }

    public function update(PDO $PDO)
    {
        $params = [];
        $params["n"] = $this->name;
        $params["s"] = $this->surname;
        $params["i"] = $this->id;
        return $this->execute($PDO,"UPDATE humains SET name = :n,  surname = :s WHERE id :i",$params);

    }

    private function execute(PDO $PDO, $sql, $params)
    {
        $s = $PDO->prepare($sql);

        foreach($params as $key=>$param)
        {
            $s->bindParam($key,$param);
        }
        return $s->execute();
    }


}