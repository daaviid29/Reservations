<?php

    // Construimos una función con la cual vamos a cargar todos los ficheros que tengamos en el directorio Controllers, es decir, todos los
    // Controladores de la aplicación, lo haremos de esta manera para que cada vez que tengamos que crear uno nuevo, no tengamos que requerirlo en el index
    // si no que se hará de forma automática únicamente requeriendo este fichero en el index
    foreach(glob("Controllers/*.php") as $file){
	    require_once "$file";
    }

?>