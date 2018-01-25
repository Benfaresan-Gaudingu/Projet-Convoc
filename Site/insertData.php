<?php
/**
 * Created by PhpStorm.
 * User: cambaya
 * Date: 18.01.2018
 * Time: 08:33
 */

include Model::class;

$lastname = htmlspecialchars($_POST['lastname']);
$firstname = htmlspecialchars($_POST['firstname']);
$class = htmlspecialchars($_POST['class']);
$teacher = htmlspecialchars($_POST['teacher']);
$salle = htmlspecialchars($_POST['salle']);
$motif = htmlspecialchars($_POST['motif']);
$workToDo = htmlspecialchars($_POST['workToDo']);

$typeRetenue = htmlspecialchars($_POST['typeRetenue']);
if(!empty($_POST['choix'])) {
    $radioChoix = htmlspecialchars($_POST['choix']);
}
$dure = htmlspecialchars($_POST['dure']);

$bdd = new Model;

$fkStudent = "AMettreIci";

$bdd->insertRemedial2($teacher, $class, $motif, $workToDo, $typeRetenue, $dure, $fkStudent);


?>