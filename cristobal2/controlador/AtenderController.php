<?php

require_once '../modelo/Atender.php';
require_once '../controlador/PacientesController.php';
require_once '../Conexion.php';
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of AtenderController
 *
 * @author DWES
 */
class AtenderController {

// Este metodo añade citas de pacientes con una imagen de volante y un doctor y resta 50$ al saldo del paciente
    public static function addAtender($a, $file) {
        try {
            $conn = new Conexion();
            $path = time() . "-" . $a->nss . "-" . $file['img']['name'];
            move_uploaded_file($file['img']['tmp_name'], "../fotos/" . $path);
            $stmt = $conn->exec("insert into atender values('$a->dni_medico','$a->nss','$a->fecha','$a->hora',$a->consulta,'$path')");
            PacientesController::gastarSaldo($a->nss);
            unset($conn);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

// Este metodo saca la info de una cita mediante el dni del medico
    public static function getAtender($dni) {
        try {
            $datos = array();
            $conn = new Conexion();
            $stmt = $conn->query("select a.*,p.nombre,p.telefono from atender a, pacientes p where dni_medico = '$dni' and a.nss = p.nss");
            if ($stmt->rowCount()) {
                while ($row = $stmt->fetchObject()) {
                    $datos[] = $row;
                }
            }
            unset($conn);
            return $datos;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
