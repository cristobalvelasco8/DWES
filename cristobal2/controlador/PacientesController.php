<?php

require_once '../modelo/Paciente.php';
require_once '../Conexion.php';
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of PacientesController
 *
 * @author DWES
 */
class PacientesController {

// Saca un paciente por su nss
    public static function getPaciente($nss) {
        try {
            $conn = new Conexion();
            $stmt = $conn->prepare("select * from pacientes where nss = :nss");
            $stmt->bindParam(":nss", $_POST['nss']);
            $stmt->execute();
            if ($stmt->rowCount()) {
                $row = $stmt->fetchObject();
                unset($conn);
                return new Paciente($nss, $row->nombre, $row->fecha_nac, $row->domicilio, $row->telefono, $row->provincia, $row->pais, $row->saldo);
            } else {
                unset($conn);
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

// Le quita saldo al paciente
    public static function gastarSaldo($nss) {
        try {
            $conn = new Conexion();
            $stmt = $conn->exec("update pacientes set saldo = saldo - 50 where nss = '$nss'");
            unset($conn);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
