<?php
    
    class model_functions {
        function model_groups($dta) {
    

            require_once 'database/db_users.php'; // Asegúrate de proporcionar la ruta correcta al archivo de conexión a la base de datos
    
            // Realiza la conexión a la base de datos (reemplaza conn() con tu propia lógica de conexión)
            $conectar = conn();



            // Verifica si la conexión se realizó correctamente
            if (!$conectar) {
                return "Error de conexión a la base de datos";
            }
    
            // Escapa los valores para prevenir inyección SQL
            $escaped_uuid = mysqli_real_escape_string($conectar, $dta['uuid']);
            $escaped_group = mysqli_real_escape_string($conectar,$dta['group']);
            $escaped_description = mysqli_real_escape_string($conectar, $dta['description']);
            $escaped_qty = mysqli_real_escape_string($conectar,$dta['qty']);
            $escaped_responsable_1 = mysqli_real_escape_string($conectar,$dta['responsable_1']);
            $escaped_responsable_2 = mysqli_real_escape_string($conectar,$dta['responsable_2']);
            $escaped_user = mysqli_real_escape_string($conectar,$dta['user']);
    
            // Realiza la consulta INSERT en la base de datos
            
            $query= mysqli_query($conectar,"INSERT INTO groups_general (group_id,name,profile_id,description,max_qty,responsible_id,sub_responsible_id,members) values ('$escaped_uuid','$escaped_group','$escaped_user','$escaped_description','$escaped_qty','$escaped_responsable_1','$escaped_responsable_2',1)");
            $query= mysqli_query($conectar,"INSERT INTO groups_general_list (group_id,profile_id,member_type) values ('$escaped_uuid','$escaped_user','maker')");
  
            if ($query) {
                return "true";
            } else {
                return "Error al insertar en la base de datos";
            }

            
   


  
        }
    }
    
?>