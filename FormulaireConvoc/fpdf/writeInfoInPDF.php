<?php
/* Sam Pache et Yassine Camba
 * 15.11.2017
 * Summary : Permet de récupérer les informations depuis le formulaire de convocation et les ajoute sur le PDF de convocation.
*/

//Ajout de la libraire fpdf.php
require('fpdf.php');

//Récupère les données du formulaire
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

//Ecrire dans le PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('ImageRetenue.jpg', 0, 0, -200);

//Print le nom et prénom de l'élève
$pdf->Text(37, 39.2, utf8_decode($lastname.' '.$firstname));

//Print la classe
$pdf->Text(37, 46.4, utf8_decode($class));

//Print le nom de l'enseignant
$pdf->Text(120, 46.4, utf8_decode($teacher));

//Print le motif
$pdf->SetXY(42, 116.4);
$pdf->MultiCell(150, 7, utf8_decode($motif));

//Print le travail à réaliser
$pdf->SetXY(42, 148.3);
$pdf->MultiCell(150, 7, utf8_decode($workToDo));


//Récupère la case cochée (retenue, arrivées tardives..)
//Récupère les informations de la date et de l'heure

//Print les croix dans la cellule cochée
switch($typeRetenue){
	case 'retenue' :
	$retenueValue = htmlspecialchars($_POST['retenueValue']);
	list($day, $month, $year, $hour, $minutes) = formatDate($retenueValue);

	$pdf->Text(23.2, 56.2, 'X');

	switch($radioChoix){
        case 'rendre':

            $pdf->Text(67, 64.8, $day . '.' . $month . '.' . $year);
            $pdf->Text(98, 64.8, $hour);
            $pdf->Text(108, 64.8, $minutes);
            $pdf->Text(130, 64.8, $salle);

            break;

        case 'convoc':

            $pdf->Text(57, 72.3, $day . '.' . $month . '.' . $year);
            $pdf->Text(91, 72.3, $hour);
            $pdf->Text(98, 72.3, $minutes);
            $pdf->Text(137.5, 72.3, $dure);
            $pdf->Text(176.5, 72.3, $salle);

            break;
    }
	break;

	case 'tardives' :

	    $tardivesValue = htmlspecialchars($_POST['tardivesValue']);
	    list($day, $month, $year, $hour, $minutes) = formatDate($tardivesValue);

	    $pdf->Text(23.2, 80, 'X');
        $pdf->Text(55.5, 97.1, $day . '.' . $month . '.' . $year);
        $pdf->Text(87, 97.1, $hour);
        $pdf->Text(93.8, 97.1, $minutes);
        $pdf->Text(133.5, 97.1, $dure);
        $pdf->Text(172.5, 97.1, $salle);


	break;

	case 'compensation' :

	    $compensationValue = htmlspecialchars($_POST['compensationValue']);
	    list($day, $month, $year, $hour, $minutes) = formatDate($compensationValue);
	
	    $pdf->Text(23.2, 89, 'X');
        $pdf->Text(55.5, 97.1, $day . '.' . $month . '.' . $year);
        $pdf->Text(87, 97.1, $hour);
        $pdf->Text(93.8, 97.1, $minutes);
        $pdf->Text(133.5, 97.1, $dure);
        $pdf->Text(172.5, 97.1, $salle);

	break;

	case 'dirigees':

	    $dirigeesValue = htmlspecialchars($_POST['dirigeesValue']);
	    list($day, $month, $year, $hour, $minutes) = formatDate($dirigeesValue);
	
	    $pdf->Text(23.2, 105, 'X');
        $pdf->Text(55.5, 114.6, $day . '.' . $month . '.' . $year);
        $pdf->Text(87, 114.6, $hour);
        $pdf->Text(93.8, 114.6, $minutes);
        $pdf->Text(133.5, 114.6, $dure);
        $pdf->Text(172.5, 114.6, $salle);


	break;
}

$pdf->Output('I', 'ConvocationRetenue.pdf');


//04 September 2017 - 06:05 pm
function formatDate($strDate){
	//Coupe la chaine de caractères en fonction des espaces
	list($day, $month, $year, $useless, $time, $timeSystem) = explode(' ', $strDate);
	list($hour, $minutes) = explode(':', $time);
	
	//Permet de passer le mois d'anglais à sa nomenclature chiffrées
	switch($month){
		case('January') :
		$month = '01';
		break;
		case('February') :
		$month = '02';
		break;
		case('March') :
		$month = '03';
		break;
		case('April') :
		$month = '04';
		break;
		case('May') :
		$month = '05';
		break;
		case('June') :
		$month = '06';
		break;
		case('July') :
		$month = '07';
		break;
		case('August') :
		$month = '08';
		break;
		case('September') :
		$month = '09';
		break;
		case('October') :
		$month = '10';
		break;
		case('November') :
		$month = '11';
		break;
		case('December') :
		$month = '12';
		break;
	}
	
	//Passe au système horaire suisse
	if($timeSystem == 'pm'){
		$hour += 12;
	}
	
	return array ($day, $month, $year, $hour, $minutes);
}
?>