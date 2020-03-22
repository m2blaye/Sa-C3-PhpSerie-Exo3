<?php
    /*------------------------------------------------------------
                RENVOI LA TAILLE DU TABLEAU
    ------------------------------------------------------------*/
    function taille_tab($tab){ 
        $taille=0; 
        if(is_array($tab)){// Permet de renvoyer la valeur 0 si $tab n'est pas un tableau
            foreach($tab as $v){
                $taille++;
            } 
        } 
        return $taille;
    }

    /*------------------------------------------------------------
            SORTIR LORSQUE LE CARACTERE EST TROUVE
    ------------------------------------------------------------*/
    function is_car_in_tab($car,$tab){
        $trouve=false;
        for($i=0;$i<taille_tab($tab);$i++){
            if($car == $tab[$i]){
                $trouve=true;
            }
            if($trouve == true){
                break; // Sortir lorsque le caractère est trouvé
            }
        }
        return $trouve;
    }

    /*------------------------------------------------------------
               TESTE SI UN MOT EST VALIDE
    ------------------------------------------------------------*/
    function mot_valide($mot){   
        /*  Les caractère invalide pour un mot   
            La liste n'est pas exhaustive  
        */
        $tabCartInvalide = array(' ',';','.',',',':','?','{','}','(',')','[',']','|','#','~','`','@','','°','=','/','\\','_','*','+','$','§','£','µ','*','\'','"','!');
        $valide=true; 
        $v=true;  
        $i=0;
        while($v){ // parcours une chaine sans utiliser strlen        
            if(isset($mot[$i])){                
                if(is_car_in_tab($mot[$i],$tabCartInvalide)){ // Teste si le caratère est dans le Tableau 
                    $valide=false;
                }
                $i++;
            }else{
                $v=false;
            }
        }
        if($i>20){ // Si la taille du mot dépasse 20 caractère
            $valide=false;
        }
        return $valide;
    }

     /*------------------------------------------------------------
            SORTIR LORSQUE LE CARACTERE EST TROUVE
    ------------------------------------------------------------*/
    function is_m_in_mot($mot){
        $valide=false; 
        $v=true;  
        $i=0;
        while($v){ // parcours une chaine sans utiliser strlen        
            if(isset($mot[$i])){                
                if(($mot[$i]=='m')||($mot[$i]=='M')){ // Teste si le carctère est égale à m ou M
                    $valide=true;
                    $v=false; //Permet de sortir dès que le premier m/M esr trouvé
                }
                $i++;
            }else{
                $v=false;
            }
        }
        return $valide;
    }
    /*------------------------------------------------------------
                AFFICHAGE D’UN TABLEAU FORMATE
    ------------------------------------------------------------*/
    function affiche_tab($tab,$type=0){  
        echo "<pre>"; 
        if($type==0){
            print_r($tab);
        }else{
            var_dump($tab);
        }
        echo "</pre>";  
    }
?>