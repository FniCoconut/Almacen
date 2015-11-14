<?php

/**
 * Description of OperationShelve
 *
 * @author Coconut
 */
include 'conexBBDD.php';
include_once '../Model/Estanteria.php'; //no es necesario porque pasa el tipo de objeto.
include_once '../Model/Caja.php';
include_once '../Model/CajaSorpresa.php';
include_once '../Model/CajaFuerte.php';
include_once '../Model/CajaNegra.php';
include_once '../Model/Ocupacion.php';

global $conection;

class OperationShelve {
    // ----->>> FUNCIONES DE ESTANTERÍAS <<<-----
    
    /*Funcion que devuelve todos los pasillos*/
    public static function getCorridor(){
        global $conection;
        $all_ways = array();
        $sql_all_ways = "SELECT DISTINCT e.PASILLO FROM bdalmacen2.estanteria e ORDER BY e.PASILLO";
        $result = $conection->query($sql_all_ways);
        //comprobar rows
        
        while($way = $result->fetch()){
            $all_ways[] = $way['PASILLO'];
        }
        return $all_ways;
    }
    
    /*Funcion para añadir una estantería a la BB.DD.*/
    public static function addShelve($Shelve){//empty shelve creation.
        global $conection;
//        prepared query:
        //$sql_insert = $conection->prepare('INSERT INTO bdalmacen.estanteria VALUES (:autoincrem, :numShelves, :height, :width, :deep, :ocupied, :material, :corridor)');
        //recogemos los datos de $_estanteria por separado
        if (isset($Shelve)){
            $AI = 'DEFAULT';
                //$sql_insert->bindParam(":autoincrem", $AI);
            $nShelves = $Shelve->getNumLejas(); //I
                //$sql_insert->bindParam(":numShelves", $nLejas);
            $height = $Shelve->getAltura(); //I
                //$sql_insert->bindParam(":height",$altura);
            $width = $Shelve->getAnchura(); //I
                //$sql_insert->bindParam(":width", $anchura);
            $deep = $Shelve->getProfundidad(); //I
                //$sql_insert->bindParam(":deep", $profundidad);
            $ocupied = $Shelve->getOcupados(); //I
                //$sql_insert->bindParam(":ocupied", $ocupadas);
            $material = $Shelve->getMaterial(); //S
                //$sql_insert->bindParam(":material",$material);
            $corridor = $Shelve->getPasillo(); //S
                //$sql_insert->bindParam(":corridor",$pasillo);
            $numCorridor = $Shelve->getNumPasillo();
        }

        $conection->beginTransaction();
        $sql_insert = "INSERT INTO bdalmacen2.estanteria VALUES ($AI,$nShelves,$height,$width,$deep,$ocupied,'$material','$corridor', $numCorridor)";
        $result = $conection->query($sql_insert);
        print_r($result);
        //$sql_insert->execute();
        if($result == 0){
            $conection->rollback();
            echo 'algo pasa';
        }else{
            $conection->commit();
            header('location: http://localhost/Almacen/View/principal.php#estanteria');
        }
    }
    
    /*Funcion que devuelve todas las estanterias del almacén*/
    public static function getShelves(){//get a shelve's array
        global $conection;    
        $allShelves = array();
        $sql_list_shelves = "SELECT * FROM bdalmacen2.estanteria ORDER BY PASILLO;"; //e WHERE e.OCUPADAS < e.NUM_LEJAS;"
        $result = $conection->query($sql_list_shelves);
        //comprobar rows
        
        while($shelve = $result->fetch()){
            //extraemos los indices del array asociativo $estanteria y recreamos los objetos
            $auxShelve = new Estanteria($shelve['NUM_LEJAS'], $shelve['OCUPADAS'], $shelve['ANCHO_LEJA'], $shelve['ALTO_LEJA'], $shelve['PROF_LEJA'], $shelve['MATERIAL'], $shelve['PASILLO'], $shelve['NUMERO']);
            $auxShelve->setCodigo($shelve['ID_ESTANTERIA']);
            //$allShelves[] = $estanteria;
            $allShelves[] = $auxShelve;
        } 
        return $allShelves;
    }
    
    /*Funcion que devuelve las estanterias con lejas libres*/
    public static function freeShelves(){
        global $conection;
        $freeShelves = array();
        $sql_free_shelves = "SELECT * FROM bdalmacen2.estanteria e WHERE e.OCUPADAS < e.NUM_LEJAS ORDER BY e.PASILLO;";
        
        $result = $conection->query($sql_free_shelves);
        while($shelve = $result->fetch()){
            $auxShelve = new Estanteria($shelve['NUM_LEJAS'], $shelve['OCUPADAS'], $shelve['ANCHO_LEJA'], $shelve['ALTO_LEJA'], $shelve['PROF_LEJA'], $shelve['MATERIAL'], $shelve['PASILLO'], $shelve['NUMERO']);
            $auxShelve->setCodigo($shelve['ID_ESTANTERIA']);
            $freeShelves[] = $auxShelve;
        }
        return $freeShelves;
    }
    
    /*Funcion que devuelve las lejas ocupadas de una estanteria*/
    public static function shelfAt($Shelve){
        global $conection;
        $bookedShelf = array();

        $sql_not_booked = "SELECT * FROM bdalmacen2.ocupacion o WHERE o.ID_ESTANTERIA = $Shelve ORDER BY o.LEJA";
        $result = $conection->query($sql_not_booked);
        
        while( $shelve = $result->fetch() ){
            $booked = new Ocupacion($shelve['ID_ESTANTERIA'], $shelve['LEJA'], $shelve['TIPO_CAJA']);
            $bookedShelf[] = $booked;
        }
        return $bookedShelf;
    }
    
    /*Funcion que devuelve el numero de lejas de una estanteria*/
    public static function getTotalAt($Shelve){
        global $conection;

        $sql_num_shelves = "SELECT NUM_LEJAS FROM estanteria WHERE ID_ESTANTERIA = $Shelve;";
        $result = $conection->query($sql_num_shelves);
        
        while( $shelf = $result->fetch() ){
            $num = $shelf['NUM_LEJAS'];
        }
        return $num;
    }

    /*Function que devuelve los materiales para la estanteria*/
    public static function getMaterial(){
        global  $conection;
        
        $result = $conection->query("SELECT * FROM bdalmacen2.material");
        
        while( $material = $result->fetch()){
            $materials[] = $material['MATERIAL_ESTANTERIA'];
        }
        return $materials;
    }
    
    /*Funcion que devuelve los pasillos con posiciones disponibles*/
    public static function availableCorridor(){
        global  $conection;
        
        $result = $conection->query("SELECT ID_PASILLO FROM bdalmacen2.pasillo WHERE POSICIONES > 0;");
        
        while( $pasillo = $result->fetch() ){
            $corridors[] = $pasillo['ID_PASILLO'];
        }
        return $corridors;
    }
    
    /*Funcion que devuelve las posiciones disponibles de un pasillo*/
    public static function getFreePositionAt($corridor){
        global $conection;
        
        $sql_booked_corridor = "SELECT e.NUMERO FROM bdalmacen2.estanteria e WHERE e.PASILLO = '$corridor';";
        $sql_total_position = "SELECT p.POSICIONES FROM bdalmacen2.pasillo p WHERE p.ID_PASILLO = '$corridor';";
        
        $result = $conection->query($sql_booked_corridor);
        $result2 = $conection->query($sql_total_position);
        
        if( $result->rowCount() == 0){
            $positions[0] = 0;
            $positions[1] = 0;
        }
        else{
            while( $posit_shelve = $result->fetch() ){
                $positions[] = $posit_shelve['NUMERO'];
            }
        }
        
        while( $total = $result2->fetch() ){
            $num = $total['POSICIONES'];
        }
        
        for ($i = 1 ; $i <= $num ; $i++){
            if( !(in_array($i, $positions))){
                $available[] = $i;
            }
        }
        return $available;
    }
    
    /*funcion que divuelve las estanterias ocupadas*/
    public static function getBookedShelves(){
        global $conection;
        
        $result = $conection->query();
        
        while( $shelve = $result->fetch()){
            
        }
        
    }
}
