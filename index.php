<?php
    session_start(); // Démarage de la session
    require_once('Utils.php'); // Inclure le fichier 'Utils.php'
    define("NB_MOT","nb_mot");

    $tab_mot=[];
    $nb_mot="";
    $is_envoi=$is_valide=false;
    if(isset($_POST['evoie_nb_mot'])){ //Vérification de l'envoie du nombre de mot
        $is_envoi=true;
        if(is_numeric($_POST[NB_MOT])){     // Vérification de la validté du nombre de mot
            $nb_mot=$_SESSION[NB_MOT]=$_POST[NB_MOT];
        }
        
    }

    if(isset($_POST['valide_nb_mot'])){ //
        $is_valide=$is_envoi=true;
        $nb_mot=$_SESSION[NB_MOT];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div id="contener">
    <div id="gache">
    <form action="" method="post">
        <fieldset>
            <legend> Nombre de mots: </legend>
            <input type="text" name="nb_mot" size="20"    placeholder="Nombre de mots"  value="<?= $nb_mot ?>"/>
            <input type="submit" value="Envoyer" name="evoie_nb_mot" />
            <input type="reset" value="Effacer" />
        </fieldset>
    </form>
    <form action="" method="post">
    <?php
    if($is_envoi){    
        if((is_numeric($nb_mot))||$is_valide){               
        ?> 
            <fieldset>
            <legend> Les mots</legend>
            <?php 
                for($i=1;$i<=$nb_mot;$i++){
                    $classe='';
                   
                    $mot =  "mot_".$i;
                    $vam_mot="";
                    if( $is_valide){
                        $t['mot']=$vam_mot=$_POST[$mot];
                        if(($t['is_valide']=mot_valide($_POST[$mot]))==false){
                            $classe=' class="erreur"';
                        }
                        $t['as_m']=is_m_in_mot($_POST[$mot]);
                        $tab_mot[$i]=$t;
                    }
            ?>
                    <p>
                        <label for="<?= $mot ?>"> Mot <?= $i ?>  </label>
                        <input type="text" name="<?= $mot ?>" value="<?= $vam_mot ?>" <?= $classe ?>>
                    </p>         
            <?php 
                }
            ?> 
            </fieldset>
            <input type="hidden" name="is_send" value="1">
            <p> 
                <input type="submit" value="Envoyer" name="valide_nb_mot" />
                <input type="reset" value="Effacer" />
            </p>
        </form>
        <?php 
        }else{        
            ?>
                <fieldset>
                    <legend> Entier non valide</legend>
                    <p id="no_int">Veuillez donner un entier</p>
                </fieldset>
            <?php
        }
    }
    
    ?>
    </div>
    <div id="droite">
    <?php
        if($is_valide){
            ?>
            <fieldset>
                <legend> Les mots contanant n/M</legend>
                <?php
                foreach ($tab_mot as $value) {
                    if($value["as_m"]&& $value["is_valide"]){
                        echo  " <h3>".$value["mot"]."</h3>";                                                
                    }
                }
                ?>
               
            </fieldset> 
        <?php
        }
    ?>
    </div>
    </div>
</body>
</html>
    