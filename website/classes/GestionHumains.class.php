<?php

/**
 * Class GestionHumains
 */
class GestionHumains
{
    public static $db;
    /**
     * @var array
     */
    private $liste = [];

    /**
     * @param PDO $PDO
     * @return Humain[]
     */
    public function loadAll(): array
    {
        $stmt = self::$db->prepare("SELECT * FROM humains");
        $stmt->execute();
        $humains = $stmt->fetchAll();

        foreach($humains as $humain)
        {
            $newHumain = new Humain();
            $newHumain->loadData($humain);

            $this->liste[] = $newHumain;
        }

        return $this->liste;

    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->liste;
    }

}