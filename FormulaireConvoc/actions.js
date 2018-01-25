/**
 * Created by cambaya
 */

function findStudentID(){

    var urlActuel = document.location.href;

    var tab = urlActuel.split("/");

    return tab[tab.length-1];


}

function sendIDStudent(){
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "",true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(".idStudent="+findStudentID());
}

