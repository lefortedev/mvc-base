<?php

function dd(...$vars)
{
    echo '<pre style="background: #f5f5f5"; 
    color: #212529; 
    padding: 10px; 
    margin: 10px;
    border-radius: 5px; 
    font-family: monospace;">';
    echo "<strong> Debug Output: </strong><br>";
    foreach($vars as $var) {
        echo '<pre style="background: #d1d1d1"; 
    color: #212529; 
    padding: 10px; 
    margin: 10px;
    border-radius: 5px; 
    font-family: monospace;">';
        var_dump($var);
        echo "</pre>";
    }
    // Pega as ultimas funções chamadas
    $backtrace = debug_backtrace()[0];

    echo "<strong> Arquivo: ".$backtrace["file"]." </strong><br>";
    echo "<strong> Linha: ".$backtrace["line"]." </strong><br>";
    echo '</pre>';
    die();
}