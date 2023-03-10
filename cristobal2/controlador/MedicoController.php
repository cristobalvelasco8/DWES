<?php

require_once '../modelo/Medico.php';
require_once '../Conexion.php';
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of MedicoController
 *
 * @author DWES
 */
class MedicoController {

// Saca los medicos de un hospital
    public static function getAllMedicosFromHospital($nombreH) {
        try {
            $medicos = array();
            $conn = new Conexion();
            $stmt = $conn->query("select * from medicos where nombre_hospital = '$nombreH'");
            if ($stmt->rowCount()) {
                while ($row = $stmt->fetchObject()) {
                    $medicos[] = new Medico($row->dni, $row->nombre, $row->especialidad, $row->nombre_hospital);
                }
                unset($conn);
                return $medicos;
            } else {
                unset($conn);
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

// Saca un medico por su dni
    public static function getMedico($dni) {
        try {
            $conn = new Conexion();
            $stmt = $conn->query("select * from medicos where dni = '$dni'");
            if ($stmt->rowCount()) {
                $row = $stmt->fetchObject();
                $medico = new Medico($row->dni, $row->nombre, $row->especialidad, $row->nombre_hospital);
                unset($conn);
                return $medico;
            } else {
                unset($conn);
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
