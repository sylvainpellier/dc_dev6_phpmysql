<?php

class Humain
{
    public static $bd;

    private $name;
    private $surname;
    private $age;

    public function __construct(string $name, string $surname)
    {
        if($name && $surname)
        {
            $this->name = $name;
            $this->surname = $surname;
        }

        $this->age = 1;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
    private $id;


    public function getFullName() : string
    {
        return $this->name . " ". $this->surname;
    }

    public function loadData(array $data): self
    {
        $this->name = $data["name"];
        $this->surname = $data["surname"];
        $this->id = $data["id"];
        return $this;
    }

    public function load( int $id): self
    {
        $params = [];
        $params["id"] = $id;
        $stmt = $this->execute("SELECT * FROM  humains WHERE id = :id",$params);
        if($data = $stmt->fetch())
        {
            $this->loadData($data);
        }


        return $this;
    }

    public function insert():PDOStatement
    {
        $params = [];
        $params["n"] = $this->name;
        $params["s"] = $this->surname;
        return $this->execute("INSERT INTO humains(name, surname) VALUES(:n,:s)",$params);

    }

    public function update():PDOStatement
    {
        $params = [];
        $params["n"] = $this->name;
        $params["s"] = $this->surname;
        $params["id"] = $this->id;
        return $this->execute("UPDATE humains SET name = :n,  surname = :s WHERE id = :id",$params);

    }

    private function execute($sql, $params) :PDOStatement
    {
        $dbh = self::$bd;
        $s = $dbh->prepare($sql);

        foreach($params as $key => $param)
        {
            $s->bindValue($key,$param);
        }
        $s->execute();
        return $s;
    }


}