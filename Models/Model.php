<?php

namespace App\Models;

use App\Core\Db;

/**
 * 
 */
class Model extends Db
{
    protected $table;
    protected $db;

    public function findAll()
    {
        return $req = $this->requette("SELECT * FROM " . $this->table)->fetchAll();
    }

    public function findBy(array $donnees)
    {
        // on veu faire : select * from utilisateur where name = massire and active = 1
        // on cree deux tableau pour stocker le champ et valeur reçu des donnees
        $champs = [];
        $valeurs = [];

        // on fait la boucle pour sauvegarder champ et valeur
        foreach ($donnees as $champ => $valeur) {
            $champs[] = " $champ = ? ";
            $valeurs[] = $valeur;
        }

        // convertir les tableaus en string
        $listChamps = implode(" AND ", $champs);

        // requette
        $req = $this->requette("SELECT * FROM " . $this->table . " WHERE " . $listChamps, $valeurs)->fetchAll();

        return $req;
    }

    public function find(int $id)
    {

        return $req = $this->requette('SELECT * FROM ' . $this->table . " WHERE id = ?", [$id])->fetch();

        if ($req) {
            return $req;
        }
    }

    public function create()
    {
        // ce qu'on veut faire : INSERT INTO utilisateur(nom, pseudo, ...) VALUE(?,?)
        // on cree deux tableau pour stocker le champ et valeur reçu des donnees
        $champs = [];
        $inter = [];
        $valeurs = [];

        // on fait la boucle pour sauvegarder champ et valeur
        foreach ($this as $champ => $valeur) {

            if ($champ != "db" && $champ != "table" && $champ != null && $valeur !== null) {

                $champs[] = " $champ ";
                $inter[] = " ? ";
                $valeurs[] = $valeur;
            }
        }

        // convertir les tableaus en string
        $listChamps = implode(" , ", $champs);
        $lisInter = implode(" , ", $inter);

        // requette
        $req = $this->requette('INSERT INTO ' . $this->table . " ( " . $listChamps . " ) " . " VALUES(" . $lisInter . " ) ", $valeurs);
        return $req;
    }

    public function update()
    {
        // ce qu'on veut faire : UPDATE utilisateur SET pseudo = ?, email = ? WHERE id = ?
        // on cree deux tableau pour stocker le champ et valeur reçu des donnees
        $champs = [];
        $valeurs = [];

        // on fait la boucle pour sauvegarder champ et valeur
        foreach ($this as $champ => $valeur) {

            if ($champ != "db" && $champ != "table" && $champ != null && $valeur !== null && $champ != "id") {
                $champs[] = " $champ= ? ";
                $valeurs[] = $valeur;
            }
        }
        $valeurs[] = $this->id;

        // convertir les tableaus en string
        $listChamps = implode(" , ", $champs);

        // requette
        $req = $this->requette("UPDATE " . $this->table . " SET " . $listChamps . " WHERE id = ?", $valeurs);
    }

    public function hydrater($data)
    {
        // ce quon vet faire : $this->setId($id)
        foreach ($data as $key => $value) {
            $metod = "set" . ucfirst($key);
            if (method_exists($this, $metod)) {
                $this->$metod(strip_tags($value));
            }
        }
        return $this;
    }

    public function delete(int $id)
    {
        return $this->requette('DELETE FROM ' . $this->table . ' WHERE ID = ?', [$id]);
    }

    public function requette(String $sql, array $attributs = null)
    {
        // on assigne la connexion dans la variabke DB
        $this->db = parent::getInstance();
        // si l'attribus est null => requette simple, sinon requette prepare

        // si null
        if ($attributs !== null) {
            $req = $this->db->prepare($sql);
            $req->execute($attributs);
            return $req;
        } else {
            return  $this->db->query($sql);
        }
    }
}
