<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Coconut
 */
class Usuario {
    
    private $idUsuario;
    private $autenticacion;
    private $salt;
    private $permiso;
    
    function __construct($idUsuario, $autenticacion, $salt, $permiso) {
        $this->idUsuario = $idUsuario;
        $this->autenticacion = $autenticacion;
        $this->salt = $salt;
        $this->permiso = $permiso;
    }
    
    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getAutenticacion() {
        return $this->autenticacion;
    }

    function getSalt() {
        return $this->salt;
    }

    function getPermiso() {
        return $this->permiso;
    }

    function setPermiso($permiso) {
        $this->permiso = $permiso;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setAutenticacion($autenticacion) {
        $this->autenticacion = $autenticacion;
    }

    function setSalt($salt) {
        $this->salt = $salt;
    }



    
}
