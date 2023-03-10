<?php

require_once '../modelo/Hospital.php';
require_once '../Conexion.php';

/**
 * Description of HospitalController
 *
 * @author DWES
 */
session_start();

class HospitalController {

// Este metodo controla el logueo del usuario y todos los intentos de logueo, bloquea el user si llega a 2 intentos() como empieza por 0 en realidad serian 3 intentos)
    public static function logIn($post) {
        try {
            $msg = "";
            $conn = new Conexion();
            $stmt = $conn->prepare("select * from hospital where usuario = :user and clave = :pass");
            $stmt->bindParam(":user", $post['usuario']);
            $stmt->bindParam(":pass", $post['pass']);
            $stmt->execute();
            if ($stmt->rowCount()) {
                $row = $stmt->fetchObject();
                if ($row->intentos < 2) {
                    $hospital = new Hospital($row->nombre_H, $row->direccion, $row->telefono, $row->usuario, $row->clave, $row->intentos);
                    $_SESSION['hospital'] = $hospital;
                    $conn->exec("update hospital set intentos = 0 where usuario = '$_POST[usuario]'");
                    header("Location:menu.php");
                } else {
                    $msg .= " USUARIO BLOQUEADO ";
                }
            } else {
                $msg = "Usuario o clave mal";
                $stmt = $conn->prepare("select * from hospital where usuario = :user");
                $stmt->bindParam(":user", $post['usuario']);
                $stmt->execute();
                // Entra si el usuario es correcto para sumarle intentos
                if ($stmt->rowCount()) {
                    $row = $stmt->fetchObject();
                    $intentos = 2 - $row->intentos;
                    if ($row->intentos < 2) {
                        $conn->beginTransaction();
                        if ($conn->exec("update hospital set intentos = intentos + 1 where usuario = '$_POST[usuario]'")) {
                            $conn->commit();
                        } else {
                            $conn->rollBack();
                        }
                    } else {
                        $msg .= " USUARIO BLOQUEADO ";
                    }
                    $msg .= " Le quedan $intentos intentos ";
                }
            }
            unset($conn);
            return $msg;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
