<?php

    foreach(glob("Controllers/*.php") as $file){
	    require_once "$file";
    }

?>