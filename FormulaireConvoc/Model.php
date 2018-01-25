<?php

/**
 * Created by PhpStorm.
 * User: cambaya
 * Date: 08.01.2018
 * Time: 08:54
 */
class Model
{

    //TODO : pdo a régler
    public function connect()
    {
        try {
            $connexion = new PDO('mysql:host=localhost;dbname=gestelevesprodtest;charset=utf8', 'root', 'root');

        }catch(Exception $e){ $connexion = null;}

        return $connexion;
    }

    // insère ls convocation dans la bdd (table crée par le professeur)
    public function insertRfemedial($remDate, $remType, $remNote,$remDuree, $remMotif, $studentLink)
    {
        $bdd = $this->connect();

        $query = "INSERT INTO t_remedial (remDate, remType, remNote, remNbPeriod, fkStudent) VALUES ('".$remDate."','".$remType."','".$remNote."','".$remDuree."','".$studentLink."')";

        $req = $bdd->prepare($query);

        try{
            $req->execute();
        }catch(Exception $e){}
    }

    //insère la convocation dans la bdd (table crée par yassine)
    public function insertRemedial2($remConveneBy,$remSalle, $remMotif, $remWorkToDo, $remDate, $remType,$remDuree, $studentLink)
    {
        $bdd = $this->connect();

        $query = "INSERT INTO t_remedial (remConveneBy, remSalle, remMotif, remWorkToDo, remType, remDuration, remDate, fkStudent) VALUES ('".$remConveneBy."','".$remSalle."','".$remMotif."','".$remWorkToDo."','".$remType."','".$remDuree."','".$remDate."','".$studentLink."')";

        $req = $bdd->prepare($query);

        try{
            $req->execute();
        }catch(Exception $e){}
    }

    // Rcupère le nom et le prénom de l'élève
    public function returnStudentInfo($id)
    {
        $bdd = $this->connect();

        $query = "SELECT name, first_name FROM students WHWERE id = $id";
        $req = $bdd->prepare($query);

        try{
            $result = $req->execute();
        }catch(Exception $e){}

        $result = $req->fetchAll();

        return $result;
    }

    public function selectRemedial($id)
    {
        $bdd = $this->connect();

        $query = "SELECT * FROM t_remedial2 WHWERE id = $id";
        $req = $bdd->prepare($query);

        try{
            $req->execute();
        }catch(Exception $e){}

        $result = $req->fetchAll();

        return $result;
    }

}


