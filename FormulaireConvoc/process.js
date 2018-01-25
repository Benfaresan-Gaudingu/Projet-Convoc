/**
 * Created by cambaya on 29.11.2017.
 */
function hideOthers(n){
    var toHide = document.getElementsByClassName("toHide");

    for(var x = 0; x < toHide.length; x++)
    {

        toHide[x].style.display = "block";
        document.body.style.backgroundColor = "red";

    }

    document.getElementById(n).style.display = "block";
}
document.body.style.backgroundColor = "blue";