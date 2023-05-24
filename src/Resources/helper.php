<?php
    function getComponent($url){
        return fread(fopen($url, "r"), filesize($url));
    }
?>