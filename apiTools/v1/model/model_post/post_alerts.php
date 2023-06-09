<?php
    
    class model_functions {
        function model_alert($dta) {
    
            require_once 'database/db_users.php'; // Asegúrate de proporcionar la ruta correcta al archivo de conexión a la base de datos
    
            // Realiza la conexión a la base de datos (reemplaza conn() con tu propia lógica de conexión)
            $conectar = conn();
    
            // Verifica si la conexión se realizó correctamente
            if (!$conectar) {
                return "Error de conexión a la base de datos";
            }
    
            // Escapa los valores para prevenir inyección SQL
            $escaped_uuid = mysqli_real_escape_string($conectar, $dta['uuid']);
            $escaped_value = mysqli_real_escape_string($conectar, $dta['value']);
            $escaped_sdate = mysqli_real_escape_string($conectar, $dta['sdate']);
            $escaped_user = mysqli_real_escape_string($conectar, $dta['user']);
    
            // Realiza la consulta INSERT en la base de datos
            $query = mysqli_query($conectar, "INSERT INTO alerts_general (alert_id, value, start_date, profile_id) VALUES ('$escaped_uuid', '$escaped_value', '$escaped_sdate', '$escaped_user')");
    
            if ($query) {
                return "true";
            } else {
                return "Error al insertar en la base de datos";
            }
        }
    }
    
    
?>