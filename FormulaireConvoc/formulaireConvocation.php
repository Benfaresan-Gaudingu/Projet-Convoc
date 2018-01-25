<!--
Yassine camba
ETML
summary : Page contenant le formulaire à remplir pou la génération du pdf
-->
<html lang="fr">
<head>
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <link href="style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="bootstrap-datetimepicker-master/sample%20in%20bootstrap%20v2/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="bootstrap-datetimepicker-master/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
    <script type="text/javascript">
        $('.form_datetime').datetimepicker({
            //language:  'fr',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        });
    </script>


</head>

<body>
<!-- Bouton permettant d'afficher le modal -->
<a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a>


<!-- Div Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Remplissez le formulaire</h3>
    </div>

    <!-- Body du modal, ici que se retrouvera le formulaire -->
    <div class="modal-body">

        <!-- Form dans lequel seront placé nos différents inputs -->
        <form class="form-horizontal" action="fpdf/writeInfoInPDF.php" method="post">

            <!-- Div flex principale, elle contiens les autre div et nous permet de les disposer comme bon nous semble -->
            <div id="flex">

                <!-- Div qui se retrouvera à gauche de notre formulaire -->
                <div id="divFlex">

                    <!-- input pour le nom -->
                    <div class="control-group">
                            <input type="text" id="lastname" name="lastname" placeholder="Nom" />
                    </div>

                    <!-- input pour le prénom -->
                    <div class="control-group">
                        <input type="text" id="firstname" name="firstname" placeholder="Prénom" />
                    </div>

                    <!-- input pour la classe -->
                    <div class="control-group">
                            <input type="text" id="class" name="class" placeholder="classe"/>
                    </div>

                    <!-- input pour "Convoqué par.." -->
                    <div class="control-group">
                            <input type="text" id="teacher" name="teacher" placeholder="Convoqué par"/>
                    </div>

                    <div class="control-group">
                        <input type="text" id="salle" name="salle" placeholder="Salle">
                    </div>

                    <!-- Input pour le motif -->
                    <div class="control-group">
                            <textarea  id="motif" name="motif" rows="3" placeholder="Motif..."></textarea>
                    </div>

                    <!-- Input pour le travail à effectuer -->
                    <div class="control-group">
                            <textarea id="workToDo" name="workToDo" rows="3" placeholder="Travail à effectuer..."></textarea>
                    </div>

                    <!-- Bouton permettant "l'envoi" de notre formulaire -->
                    <div class="control-group">
                            <button type="submit" class="btn">Envoyer</button>
                    </div>
                </div>

                <!-- Div se retrouvant à droite du modal -->
                <div id="divFlex2">
                    <p>
                        <!-- Partie concernant les retenues -->
                        <div id="retenue">
                            <label class="radio"><input onclick="hideOthers(1)" type="radio" name="typeRetenue" id="retenue" value="retenue">Retenue</label>
                            <div class="toHide" id="1">
                                <label class="radioChoix"><input onclick="retenueRendre()" type="radio" name="choix" id="rendre" value="rendre">Rendre un travail</label>
                                <label class="radioChoix"><input onclick="retenuePresenter()" type="radio" name="choix" id="convoc" value="convoc">Convocation</label>
                                <!-- TODO : mettre une value par defaut cohérente (Dates) -->
                                <div class="input-append date form_datetime" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                    <input id="retenueValue" name="retenueValue" size="16" type="text" value="" readonly placeholder="Doit rendre son travail le..">

                                    <span class="add-on"><i class="icon-remove"></i></span>
                                    <span class="add-on"><i class="icon-th"></i></span>
                                </div>
                                <input id="dure" name="dure" placeholder="Pour une durée de...">
                            </div>

                        </div>

                        <!-- Partie concernant les arrivées tardives -->
                        <div id="tardives">
                            <label class="radio"><input onclick="hideOthers(2)" type="radio" name="typeRetenue" id="retenueTardives" value="tardives">Retenue (arrivées tardives)</label>

                            <div class="toHide" id="2">
                                <div class="input-append date form_datetime" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                    <input id="tardivesValue" name="tardivesValue" size="16" type="text" value="" readonly placeholder="Est convoqué le..">
                                    <span class="add-on"><i class="icon-remove"></i></span>
                                    <span class="add-on"><i class="icon-th"></i></span><br/>

                                </div>

                                <input type="text" placeholder="pour une durée de" id="dure" name="dure">
                            </div>

                        </div>

                    <!-- Partie concernant les compensation -->
                        <div id="compensation">
                            <label class="radio"><input onclick="hideOthers(3)" type="radio" name="typeRetenue" id="compensation" value="compensation">Compensation</label>

                            <div class="toHide" id="3">
                                <div class="input-append date form_datetime" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                    <input id="compensationValue" name="compensationValue" size="16" type="text" value="" readonly placeholder="Est convoqué le..">
                                    <span class="add-on"><i class="icon-remove"></i></span>
                                    <span class="add-on"><i class="icon-th"></i></span><br/>

                                </div>

                                <input type="text" placeholder="pour une durée de" id="dure" name="dure">
                            </div>

                        </div>

                            <!-- Partie concernant les études dirigées -->
                        <div id="etudeDiriger">
                            <label class="radio"><input onclick="hideOthers(4)" type="radio" name="typeRetenue" id="retenueDiriger" value="dirigees">Retenue(études dirigées)</label>

                            <div class="toHide" id="4">
                                <div class="input-append date form_datetime" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                    <input id="dirigeesValue" name="dirigeesValue" size="16" type="text" value="" readonly placeholder="Est convoqué le..">
                                    <span class="add-on"><i class="icon-remove"></i></span>
                                    <span class="add-on"><i class="icon-th"></i></span><br/>

                                </div>

                                <input type="text" placeholder="pour une durée de" id="dure" name="dure">
                            </div>

                        </div>
                    </p>


                </div>
            </div>
        </form>

    </div>


</div>



<script type="text/javascript">
    $(".form_datetime").datetimepicker({language: 'pt-BR'});
</script>

<!-- Script permettant d'afficher ou de masquer les inputs en fonction du radio button séléctionné  -->
<script>

    // Permet de cacher le contenu en dessous des radioButton non selectionnés
    function hideOthers(n){
        //TODO ; enlever ça si tout les test on été passés
        //var toHide = document.getElementsByClassName("toHide");

        for(var x = 0; x < toHide.length; x++)
        {

            toHide[x].style.display = "none";

            //TODO : enlever si programme fini
            document.body.style.backgroundColor = "red";

        }

        document.getElementById(n).style.display = "block";
    }

    // Permet d'adapter le formulaire en fonction du choix effectué (Convocation/rendre un travail)
    function retenueRendre(){
        document.getElementById("dure").style.display = "none";
        document.getElementById('retenueValue').placeholder = "Doit rendre son traval le...";
    }

    // Permet d'adapter le formulaire en fonction du choix effectué (Convocation/rendre un travail)
    function retenuePresenter(){

        document.getElementById("dure").style.display = "block";
        document.getElementById('retenueValue').placeholder = "Doit se présenter le...";
    }


    // Permets de cacher le contenu en dessous de tous les radio button
    var toHide = document.getElementsByClassName("toHide");
    for(var x = 0; x < toHide.length; x++)
    {
        toHide[x].style.display = "none";
    }
</script>


</body>

</html>