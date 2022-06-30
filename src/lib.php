<?php


function showErrorArray($e) {
    if(DEBUG === true) {
        echo '<pre>';
        var_dump($e);
        echo '</pre>';
    }
}