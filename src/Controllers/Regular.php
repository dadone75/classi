<?php

namespace Davide\Classi\Controllers;

class Regular{

    public static function test(){

        $nome="davide";
        
        //^inizio della parola
        //$fine parola
        // il simbolo \ indica che parte la regola
        //w è il carattere
        //+ significa più caratteri

        $expression='/^\w+$/';

        if(preg_match($expression,$nome)){

            echo "corrisponde";

        }else{

            echo "non corsisponde";
        }

        
        $piva="23454326789";
        
      
        //d è il numero
        //tra le graffe il numero dei digit
        // il simbolo \ per dividere le espressioni

        $expression='/^\d{11}$/';

        if(preg_match($expression,$piva)){

            echo "<br>corrisponde";

        }else{

            echo "<br>non corsisponde";
        }

        $CF="CPRDVD75R09F205O";
        
       
        $expression='/^\w{6}\d{2}\w{1}\d{2}\w{1}\d{3}\w{1}$/';

        if(preg_match($expression,$CF)){

            echo "<br>corrisponde";

        }else{

            echo "<br>non corsisponde";
        }

        $telefono="+393409998140";
        
        //da 5 a 10 
        //se sono gli spazi
        // se non metto il nuemro si aspetta un carattere
        //il punto di domanda indica il facoltativo

        $expression='/^\+\d{2}\s?\d{3}\d{5,10}$/';

        //piva
        echo str_pad("123",11,0,STR_PAD_LEFT);


        if(preg_match($expression,$telefono))

            {
                echo"<br>corrisponde";

            }else{

                echo"<br>non corrisponde";
            }

            $string1="S01";
            $stringa2="SAB";

        //tra quadra è quando posso mettere un set di lettere
        //da S a S
        
        $expression='/^\[M-S]$/';
        
        //tra tonda e | è quando posso mettere M o S
        //da S a S
        //la tonda raggruppa delle condizioni
        $expression='/^\(M|S)$/';
        //si può fare anche così
        $expression='/^\[MS]$/';

        //in questo caso è un carattere identificato con S quindi tolglo la barra \e metto direttamente la S
        //uso la or per verificare due tipologie di codice per lo stesso elemento

        $expression='/^S(\w{2}|\d{2})$/';

        if(preg_match($expression,$string1))

            {
                echo"<br>corrisponde or";

            }else{

                echo"<br>non corrisponde or";
            }


            ///validatore di date

            $expression='^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d$';

            // validatore mail
            //il più dopo la quadra è come il + dopo la w. indica più caratteri 
            //il 2, indica da due in su
           
            $expression=' ^[A-z0-9._%+-]+@[A-z0-9.-]+\.[A-z]{2,}$';


            //validatore sito
            //la barra che separa va solo prima di s w d
            $stringa="http://www.ilbagaglio.com";

            //se metto il carattere / devo anteporre il \ escpae

            $expression='/^(http|https):\/\/[A-z0-9.-]+\.[A-z]{2,}$/';

            if(preg_match($expression,$stringa))

            {
                echo"<br>corrisponde sito";

            }else{

                echo"<br>non corrisponde sito";
            }


            /*regole

\ 	Carattere generico di escape
^ 	Delimitatore di inizio della stringa
$ 	Delimitatore di fine della stringa
. 	Definisce ogni carattere eccetto il carattere di invio
[ 	Carattere di inizio della definizione di classe
] 	Carattere di fine della definizione di classe
| 	Inizio di un ramo alternativo
( 	Inizio subpattern
) 	Fine subpattern
? 	Indica 0 o 1 occorrenze
* 	0 o più occorrenze
+ 	1 o più occorrenze
{ 	Inizio intervallo minim
{ 	Inizio intervallo minimo/massimo di occorrenze
} 	Fine intervallo minimo/massimo di occorrenze
- 	Indica un range di caratteri all'interno di parentesi []
. 	Indica un singolo carattere
\s 	Un carattere di spaziatura (space, tab, newline)
\S 	Tutto eccetto un carattere di spaziatura
\d 	Un carattere numerico (0-9)
\D 	Tutto eccetto un carattere numerico
\w 	Una lettera (a-z, A-Z, 0-9, _)
\W 	Tutto eccetto una lettera
[aeiou] 	Uno dei caratteri compresi nella parentesi
[^aeiou] 	Tutto eccetto

            */

    }//fine metodo

}//fine classe




?>