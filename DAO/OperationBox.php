<?php
/**
 * Description of OperationBox
 *
 * DDL  and SQL about boxes
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

class OperationBox {
     // ----->>> FUNCIONES DE CAJAS <<<----- 
    /*Introduce la caja y actualiza la ocupacion*/
    public static function addBlackBox($box, $booked){
        global $conection;
        
        if(isset($box)){
            if($box->getCodigo() == null){
            $AI = 'DEFAULT';
            }
            else{
                $AI = $box->getCodigo();
            }
                //$sql_insert->bindParam(":autoincrem", $AI);
            $type = $box->getTipoCaja();
            $height = $box->getAltura();
            $width = $box->getAnchura();
            $deep = $box->getProfundidad();
            $color = $box->getColor();
            $date = date('Y-m-d');
            $motherboard = $box->getPlaca();
            
            $shelve = $booked->getIdShelve();
            $shelf = $booked->getShelf();
            
        }

        $conection->beginTransaction();
        $result = $conection->query("INSERT INTO bdalmacen2.caja_negra VALUES ($AI, '$type',$height, $width, $deep, '$color', '$motherboard', '$date')");
        $idBox = $conection->lastInsertId();
        $result2 = $conection->query("INSERT INTO bdalmacen2.ocupacion VALUES ($shelve, $shelf, $idBox, '$type');");
        $result3 = $conection->query("UPDATE bdalmacen2.estanteria e SET e.ocupadas = e.ocupadas+1 WHERE e.id_estanteria =$shelve");
        
        if(!$result || !$result2 || !$result3){
            $conection->rollback(); 
        }else{
            $conection->commit();
            header('location: http://localhost/Almacen/View/principal.php#caja');
        }
    }
    
    /*Devuelve todas las cajas Negras en un array bidimensional[estanteria][leja]->caja*/
    public static function getBlackBox(){
        global $conection;
        $BlackBoxesAt = array();
        $result = $conection->query("SELECT * FROM bdalmacen2.caja_negra c, bdalmacen2.ocupacion o WHERE o.ID_CAJA=c.ID_CAJA AND o.TIPO_CAJA=c.TIPO_CAJA;");
        //comprobar rows
        while($blackBox = $result->fetch()){
            $auxBBox = new CajaNegra($blackBox['ALTO'], $blackBox['ANCHO'], $blackBox['PROFUNDIDAD'], $blackBox['COLOR'], $blackBox['FECHA_ENTRADA'],$blackBox['PLACA_BASE'],$blackBox['TIPO_CAJA']);
            $auxBBox->setCodigo($blackBox['ID_CAJA']);
            
            $booked = new Ocupacion($blackBox['ID_ESTANTERIA'], $blackBox['LEJA'], $blackBox['TIPO_CAJA']);
            $BlackBoxesAt[$booked->getIdShelve()][$booked->getShelf()] = $auxBBox;
        }
        return $BlackBoxesAt;
    }
       
    /*Introduce la caja y actualiza la ocupacion*/
    public static function addSurpriseBox($box, $booked){
        global $conection;
        
        if(isset($box)){
            if($box->getCodigo() == null){
            $AI = 'DEFAULT';
            }
            else{
                $AI = $box->getCodigo();
            }
                //$sql_insert->bindParam(":autoincrem", $AI);
            $type = $box->getTipoCaja();
            $height = $box->getAltura();
            $width = $box->getAnchura();
            $deep = $box->getProfundidad();
            $color = $box->getColor();
            $date = date('Y-m-d');
            $content = $box->getContenido();
            
            $shelve = $booked->getIdShelve();
            $shelf = $booked->getShelf();
        }
        
        $sql_insert_box = "INSERT INTO bdalmacen2.caja_sorpresa VALUES ($AI, '$type', $height, $width, $deep, '$color', '$content', '$date')";
//        $sql_insert_booked = "INSERT INTO bdalmacen2.ocupacion VALUES ($shelve, $shelf, $idBox, '$type');";
        $sql_update_shelve = "UPDATE bdalmacen2.estanteria e SET e.ocupadas = e.ocupadas+1 WHERE e.id_estanteria =$shelve";
        
        $conection->beginTransaction();
        $result = $conection->query($sql_insert_box);
        $idBox = $conection->lastInsertId();
        $result2 = $conection->query("INSERT INTO bdalmacen2.ocupacion VALUES ($shelve, $shelf, $idBox, '$type');");
        $result3 = $conection->query($sql_update_shelve);
        
        if(!$result || !$result2 || !$result3){
            $conection->rollback();
            
            echo 'Uuuuups!';
        }else{
//            print_r($id);
//            return $id;
            $conection->commit();
            header('location: http://localhost/Almacen/View/principal.php#caja');
        
        }
    }
    
    /*Devuelve todas las cajas Sorpresa en un array bidimensional[estanteria][leja]->caja*/
    public static function getSurpriseBox(){
        global $conection;
        $SurpriseBoxes = array();
        $result = $conection->query("SELECT * FROM bdalmacen2.caja_sorpresa c, bdalmacen2.ocupacion o WHERE o.ID_CAJA=c.ID_CAJA AND o.TIPO_CAJA=c.TIPO_CAJA;");
        //comprobar rows
        while($surpriseBox = $result->fetch()){
            $auxSBox = new CajaSorpresa($surpriseBox['ALTO'], $surpriseBox['ANCHO'], $surpriseBox['PROFUNDIDAD'], $surpriseBox['COLOR'], $surpriseBox['FECHA_ENTRADA'],$surpriseBox['CONTENIDO'],$surpriseBox['TIPO_CAJA']);
            $auxSBox->setCodigo($surpriseBox['ID_CAJA']);
            
            $booked = new Ocupacion($surpriseBox['ID_ESTANTERIA'], $surpriseBox['LEJA'], $surpriseBox['TIPO_CAJA']);
            $SurpriseBoxes[$booked->getIdShelve()][$booked->getShelf()] = $auxSBox;
        }
        return $SurpriseBoxes;
    }
    
    /*Introduce la caja y actualiza la ocupacion*/
    public static function addSecureBox($box, $booked){
        global $conection;
        
        if(isset($box)){
            if($box->getCodigo() == null){
                $AI = 'DEFAULT';
            }
            else{
                $AI = $box->getCodigo();
            }
            //$sql_insert->bindParam(":autoincrem", $AI);
            $type = $box->getTipoCaja();
            $height = $box->getAltura();
            $width = $box->getAnchura();
            $deep = $box->getProfundidad();
            $color = $box->getColor();
            $date = date('Y-m-d');
            $lock = $box->getCerradura();
            
            $shelve = $booked->getIdShelve();
            $shelf = $booked->getShelf();
        }
        
        $sql_insert_box = "INSERT INTO bdalmacen2.caja_fuerte VALUES ($AI, '$type', $height, $width, $deep, '$color', '$lock', '$date')";
        //        $sql_insert_booked = "INSERT INTO bdalmacen2.ocupacion VALUES ($shelve, $shelf, $idBox, '$type');";
        $sql_update_shelve = "UPDATE bdalmacen2.estanteria e SET e.ocupadas = e.ocupadas+1 WHERE e.id_estanteria =$shelve";
        
        $conection->beginTransaction();
        $result = $conection->query($sql_insert_box);
        $idBox = $conection->lastInsertId();
        $result2 = $conection->query("INSERT INTO bdalmacen2.ocupacion VALUES ($shelve, $shelf, $idBox, '$type');");
        $result3 = $conection->query($sql_update_shelve);
        
        if(!$result || !$result2 || !$result3){
            $conection->rollback();
        }else{
            $conection->commit();
            header('location: http://localhost/Almacen/View/principal.php#caja');
        
        }
    }
    
    /*Devuelve todas las cajas Fuertes en un array bidimensional[estanteria][leja]->caja*/
    public static function getSecureBox(){
        global $conection;
        $SecureBoxes = array();
        $result = $conection->query("SELECT * FROM bdalmacen2.caja_fuerte c, bdalmacen2.ocupacion o WHERE o.ID_CAJA=c.ID_CAJA AND o.TIPO_CAJA=c.TIPO_CAJA;");
        //comprobar rows
        while($secureBox = $result->fetch()){
            $auxSBox = new CajaFuerte($secureBox['ALTO'], $secureBox['ANCHO'], $secureBox['PROFUNDIDAD'], $secureBox['COLOR'], $secureBox['FECHA_ENTRADA'],$secureBox['CERRADURA'],$secureBox['TIPO_CAJA']);
            $auxSBox->setCodigo($secureBox['ID_CAJA']);
            
            $booked = new Ocupacion($secureBox['ID_ESTANTERIA'], $secureBox['LEJA'], $secureBox['TIPO_CAJA']);
            $SecureBoxes[$booked->getIdShelve()][$booked->getShelf()] = $auxSBox;
        }
        return $SecureBoxes;
    }
 
    /*Devuelve las cajas de una estantería concreta*/
    public static function getBoxAt($idShelve){
        global $conection;
        $boxesAt = array();
        
        $sql_black = "SELECT c.*, o.ID_ESTANTERIA, o.LEJA FROM bdalmacen2.caja_negra c, bdalmacen2.ocupacion o WHERE o.ID_CAJA=c.ID_CAJA AND o.TIPO_CAJA=c.TIPO_CAJA AND o.ID_ESTANTERIA= $idShelve";
        $sql_secure = "SELECT c.*, o.ID_ESTANTERIA, o.LEJA FROM bdalmacen2.caja_fuerte c, bdalmacen2.ocupacion o WHERE o.ID_CAJA=c.ID_CAJA AND o.TIPO_CAJA=c.TIPO_CAJA AND o.ID_ESTANTERIA= $idShelve";
        $sql_surprise = "SELECT c.*, o.ID_ESTANTERIA, o.LEJA FROM bdalmacen2.caja_sorpresa c, bdalmacen2.ocupacion o WHERE o.ID_CAJA=c.ID_CAJA AND o.TIPO_CAJA=c.TIPO_CAJA AND o.ID_ESTANTERIA= $idShelve";
        
        $resultB = $conection->query($sql_black);
        $resultF = $conection->query($sql_secure);
        $resultS = $conection->query($sql_surprise);
        
        while ( $blackBox = $resultB->fetch() ){
            $auxBBox = new CajaNegra($blackBox['ALTO'], $blackBox['ANCHO'], $blackBox['PROFUNDIDAD'], $blackBox['COLOR'], $blackBox['FECHA_ENTRADA'],$blackBox['PLACA_BASE'], $blackBox['TIPO_CAJA']);
            $auxBBox->setCodigo($blackBox['ID_CAJA']);
            $ocupacion = new Ocupacion($blackBox['ID_ESTANTERIA'], $blackBox['LEJA'], $blackBox['TIPO_CAJA']);
            $boxesAt[$ocupacion->getShelf()] = $auxBBox;
        }
        while ( $secureBox = $resultF->fetch() ){
            $auxSBox = new CajaFuerte($secureBox['ALTO'], $secureBox['ANCHO'], $secureBox['PROFUNDIDAD'], $secureBox['COLOR'], $secureBox['FECHA_ENTRADA'],$secureBox['CERRADURA'], $secureBox['TIPO_CAJA']);
            $auxSBox->setCodigo($secureBox['ID_CAJA']);
            $ocupacion = new Ocupacion($secureBox['ID_ESTANTERIA'], $secureBox['LEJA'], $secureBox['TIPO_CAJA']);
            $boxesAt[$ocupacion->getShelf()] = $auxSBox;
        }
        while ( $surpriseBox = $resultS->fetch() ){
            $auxSpBox = new CajaSorpresa($surpriseBox['ALTO'], $surpriseBox['ANCHO'], $surpriseBox['PROFUNDIDAD'], $surpriseBox['COLOR'], $surpriseBox['FECHA_ENTRADA'],$surpriseBox['CONTENIDO'], $surpriseBox['TIPO_CAJA']);
            $auxSpBox->setCodigo($surpriseBox['ID_CAJA']);
            $ocupacion = new Ocupacion($surpriseBox['ID_ESTANTERIA'], $surpriseBox['LEJA'], $surpriseBox['TIPO_CAJA']);
            $boxesAt[$ocupacion->getShelf()] = $auxSpBox;
        }
        return $boxesAt;
    }
    
    /*Devuelve todas las cajas del almacén*/
    public static function getAllBoxes(){
        global $conection;
        $boxesAt = array();
        
        $sql_black = "SELECT * FROM bdalmacen2.caja_negra ORDER BY ID_CAJA";
        $sql_secure = "SELECT * FROM bdalmacen2.caja_fuerte ORDER BY ID_CAJA";
        $sql_surprise = "SELECT * FROM bdalmacen2.caja_sorpresa ORDER BY ID_CAJA";
        
        $resultB = $conection->query($sql_black);
        $resultF = $conection->query($sql_secure);
        $resultS = $conection->query($sql_surprise);
        
        while ( $blackBox = $resultB->fetch() ){
            $auxBBox = new CajaNegra($blackBox['ALTO'], $blackBox['ANCHO'], $blackBox['PROFUNDIDAD'], $blackBox['COLOR'], $blackBox['TIPO_CAJA'], $blackBox['LEJA'], $blackBox['FECHA_ENTRADA'],$blackBox['PLACA_BASE']);
            $auxBBox->setCodigo($blackBox['ID_CAJA']);
            $blackBoxes[] = $auxBBox;
            if(count($blackBoxes) > 0){ $boxesAt['Cajas Negras'] = $blackBoxes; }
            else{ $boxesAt['Cajas Negras'] = 'No hay cajas negras'; }
        }
        while ( $secureBox = $resultF->fetch() ){
            $auxSBox = new CajaFuerte($secureBox['ALTO'], $secureBox['ANCHO'], $secureBox['PROFUNDIDAD'], $secureBox['COLOR'], $secureBox['TIPO_CAJA'], $secureBox['LEJA'], $secureBox['FECHA_ENTRADA'],$secureBox['CERRADURA']);
            $auxSBox->setCodigo($secureBox['ID_CAJA']);
            $secureBoxes[] = $auxSBox;
            if(count($secureBoxes) > 0){ $boxesAt['Cajas Fuertes'] = $secureBoxes; }
            else{ $boxesAt['Cajas Fuertes'] = 'No hay cajas fuertes';}
        }
        while ( $surpriseBox = $resultS->fetch() ){
            $auxSpBox = new CajaSorpresa($surpriseBox['ALTO'], $surpriseBox['ANCHO'], $surpriseBox['PROFUNDIDAD'], $surpriseBox['COLOR'], $surpriseBox['TIPO_CAJA'], $surpriseBox['LEJA'], $surpriseBox['FECHA_ENTRADA'],$surpriseBox['CONTENIDO']);
            $auxSpBox->setCodigo($surpriseBox['ID_CAJA']);
            $surpriseBoxes[] = $auxSpBox;
            if(count($surpriseBoxes) > 0){ $boxesAt['Cajas Sorpresa'] = $surpriseBoxes; }
            else { $boxesAt['Cajas Sorpresa'] = 'No hay cajas sorpresa'; }
        }
        return $boxesAt;
    }
    
    /*Funcion que devuelve obj caja de una $table */
    public static function onlyBoxes($table){
        global $conection;
        $Boxes = array();
        
        $sql_boxes = "SELECT * FROM bdalmacen2.$table ORDER BY ID_CAJA";
        
        $result = $conection->query($sql_boxes);
        
        while ( $Box = $result->fetch() ){
            switch($table){
                case 'caja_negra':
                    $auxBox = new CajaNegra($Box['ALTO'], $Box['ANCHO'], $Box['PROFUNDIDAD'], $Box['COLOR'], $Box['FECHA_ENTRADA'], 'ContenidoConcreto', $Box['TIPO_CAJA']);
                    $auxBox->setCodigo($Box['ID_CAJA']);
                    $Boxes[] = $auxBox;
                    break;
                case 'caja_sorpresa':
                    $auxBox = new CajaSorpresa($Box['ALTO'], $Box['ANCHO'], $Box['PROFUNDIDAD'], $Box['COLOR'], $Box['FECHA_ENTRADA'], 'ContenidoConcreto', $Box['TIPO_CAJA']);
                    $auxBox->setCodigo($Box['ID_CAJA']);
                    $Boxes[] = $auxBox;
                    break;
                case 'caja_fuerte':
                    $auxBox = new CajaFuerte($Box['ALTO'], $Box['ANCHO'], $Box['PROFUNDIDAD'], $Box['COLOR'], $Box['FECHA_ENTRADA'], 'ContenidoConcreto', $Box['TIPO_CAJA']);
                    $auxBox->setCodigo($Box['ID_CAJA']);
                    $Boxes[] = $auxBox;
                    break;
            }
        }    
        return $Boxes;
    }
    
    /*Elimina una caja con identificador $id de su tabla $table corespondiente*/
    public static function deleteBox($table, $id){
        global $conection;
        $conection->beginTransaction();
        $result = $conection->query("DELETE FROM bdalmacen2.$table WHERE ID_CAJA = $id");
        if ( !$result ){ $conection->rollback(); }
        else { $conection->commit(); }
    }
    
    /*Devuelve obj caja desde backup*/
    public static function returnBox($table){
        global $conection;
        $Boxes = array();

        $sql_return = "SELECT c.* FROM bkp_$table c, bkp_ocupacion o WHERE o.TIPO_CAJA= c.TIPO_CAJA AND o.ID_CAJA =c.ID_CAJA AND c.ID_CAJA NOT IN (SELECT ID_CAJA FROM bdalmacen2.$table);";
   
        $result = $conection->query($sql_return);
        
//        if($result->rowCount() > 0){
            while( $Box = $result->fetch() ){
                switch ($table){
                    case 'caja_sorpresa':
                        $auxBox = new CajaSorpresa($Box['ALTO'], $Box['ANCHO'], $Box['PROFUNDIDAD'], $Box['COLOR'], $Box['FECHA_ENTRADA'], $Box['CONTENIDO'], $Box['TIPO_CAJA']);
                        $auxBox->setCodigo($Box['ID_CAJA']);
                        $Boxes[] = $auxBox;
                        break;
                    case 'caja_negra':
                        $auxBox = new CajaNegra($Box['ALTO'], $Box['ANCHO'], $Box['PROFUNDIDAD'], $Box['COLOR'], $Box['FECHA_ENTRADA'], $Box['PLACA_BASE'], $Box['TIPO_CAJA']);
                        $auxBox->setCodigo($Box['ID_CAJA']);
                        $Boxes[] = $auxBox;
                        break;
                    case 'caja_fuerte':
                        $auxBox = new CajaFuerte($Box['ALTO'], $Box['ANCHO'], $Box['PROFUNDIDAD'], $Box['COLOR'], $Box['FECHA_ENTRADA'], $Box['CERRADURA'], $Box['TIPO_CAJA']);
                        $auxBox->setCodigo($Box['ID_CAJA']);
                        $Boxes[] = $auxBox;
                        break;
                }
            }
//        }
        return $Boxes;
    }   
 
    public static function getBox($table, $id){
        global $conection;
        $bigBox = array();
        $sql_getBox = "SELECT c.*, o.ID_ESTANTERIA, o.LEJA FROM $table c, ocupacion o WHERE o.TIPO_CAJA= c.TIPO_CAJA AND o.ID_CAJA =c.ID_CAJA AND c.ID_CAJA = $id;";
        $result = $conection->query($sql_getBox);
        
        if($result != null){
            
            while( $Box = $result->fetch() ){
                
                switch ($table) {
                    
                    case 'caja_negra':
                    $auxBox = new CajaNegra($Box['ALTO'], $Box['ANCHO'], $Box['PROFUNDIDAD'], $Box['COLOR'], $Box['FECHA_ENTRADA'], $Box['PLACA_BASE'], $Box['TIPO_CAJA']);
                    $auxBox->setCodigo($Box['ID_CAJA']);
                    $ocupacion = new Ocupacion($Box['ID_ESTANTERIA'], $Box['LEJA'], $Box['TIPO_CAJA']);
                    $bigBox[$ocupacion->getIdShelve()][$ocupacion->getShelf()] = $auxBox;
                    
                    break;
                
                case 'caja_sorpresa':
                    $auxBox = new CajaSorpresa($Box['ALTO'], $Box['ANCHO'], $Box['PROFUNDIDAD'], $Box['COLOR'], $Box['FECHA_ENTRADA'], $Box['CONTENIDO'], $Box['TIPO_CAJA']);
                    $auxBox->setCodigo($Box['ID_CAJA']);
                    $ocupacion = new Ocupacion($Box['ID_ESTANTERIA'], $Box['LEJA'], $Box['TIPO_CAJA']);
                    $bigBox[$ocupacion->getIdShelve()][$ocupacion->getShelf()] = $auxBox;
                    
                    break;
                
                case 'caja_fuerte':
                    $auxBox = new CajaFuerte($Box['ALTO'], $Box['ANCHO'], $Box['PROFUNDIDAD'], $Box['COLOR'], $Box['FECHA_ENTRADA'], $Box['CERRADURA'], $Box['TIPO_CAJA']);
                    $auxBox->setCodigo($Box['ID_CAJA']);
                    $ocupacion = new Ocupacion($Box['ID_ESTANTERIA'], $Box['LEJA'], $Box['TIPO_CAJA']);
                    $bigBox[$ocupacion->getIdShelve()][$ocupacion->getShelf()] = $auxBox;
                    
                    break;
                    
                }
            
            }
        }
        else{
            $bigBox = "No existe la caja.";
        }
        return $bigBox;
    }
    
 
    
}
