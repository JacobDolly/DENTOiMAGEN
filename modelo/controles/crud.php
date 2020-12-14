<?php

require_once "modelo/conexion.php";

class DatosControles extends Conexion {
    #Vista control mensual
    #----------------------------
    public function vistaControlModelo($datosModelo, $tabla) {

        $st = Conexion::conectar()->prepare("SELECT DATE_FORMAT(cm.fecha,'%d/%m/%Y') AS Fecha, DATE_FORMAT(cm.fecha,'%H:%i') as Hora, concat(m.nombres, ' ', m.apellidos) AS Doctor, s.nombre AS Sede, cm.precioSesion 'Precio de control', cm.estadoPago AS 'Estado de pago', cm.asistencia AS Asistencia
        FROM controles_mensuales cm
        INNER JOIN clientes_tratamientos ct
        ON cm.cliente_tratamiento_id = ct.id
        INNER JOIN tratamientos t
        ON ct.tratamiento_id = t.id
        INNER JOIN medicos m
        ON t.medico_id = m.id
        INNER JOIN sedes s
        ON t.sede_id = s.id
        WHERE ct.cliente_id = $datosModelo
        ;");

        $st->execute();

        return $st->fetchAll();
    }

    #Vista control mensual perfil medico
    #---------------------------------------
    public function vistaControlMedicoModelo($datosModelo, $tabla) {

        $st = Conexion::conectar()->prepare("SELECT DATE_FORMAT(cm.fecha,'%d/%m/%Y') AS Fecha, DATE_FORMAT(cm.fecha,'%H:%i') as Hora, concat(c.nombres, ' ', c.apellidos) AS Paciente, s.nombre AS Sede, cm.precioSesion 'Precio de control', cm.estadoPago AS 'Estado de pago', cm.asistencia AS Asistencia
        FROM controles_mensuales cm
        INNER JOIN clientes_tratamientos ct
        ON cm.cliente_tratamiento_id = ct.id
        INNER JOIN tratamientos t
        ON ct.tratamiento_id = t.id
        INNER JOIN medicos m
        ON t.medico_id = m.id
        INNER JOIN clientes c
        ON ct.cliente_id = c.id
        INNER JOIN sedes s
        ON t.sede_id = s.id
        WHERE m.id = $datosModelo
        ;");

        $st->execute();

        return $st->fetchAll();
    }

    #Registro de control mensual por parte del medico
    #--------------------------------------------------
    public function registroControlMedicoModelo($datosModelo, $tabla) {

        $st = Conexion::conectar()->prepare("INSERT INTO $tabla (fecha,precioSesion,estadoPago,cliente_tratamiento_id,asistencia) VALUES (:fecha,:precioSesion,:estadoPago,:CTID,:asistencia)");

        $st->bindParam(":fecha", $datosModelo["fecha"], PDO::PARAM_STR);
        $st->bindParam(":precioSesion", $datosModelo["precio"], PDO::PARAM_STR);
        $st->bindParam(":estadoPago", $datosModelo["estado"], PDO::PARAM_STR);
        $st->bindParam(":CTID", $datosModelo["id"], PDO::PARAM_STR);
        $st->bindParam(":asistencia", $datosModelo["asistencia"], PDO::PARAM_STR);

        if ($st->execute()) {

            return "success";

        } else {
            return "error";
        }

        $st->close();
    }

}
?>