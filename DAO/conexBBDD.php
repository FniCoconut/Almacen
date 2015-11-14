<?php

/* 
 * Archivo de conexión a la base de datos empleando
 */

$conection = new PDO('mysql:host=localhost;dbname=bdalmacen2', 'root', 'root') or die ('Error al establecer conexión.');
