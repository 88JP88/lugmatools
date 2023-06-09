<?php
    
    class post_functions {
        function post_alert($dta) {
            
            require_once '../../apiTools/v1/model/modelSecurity/uuid/uuidd.php';
            require_once '../../apiTools/v1/model/model_post/post_alerts.php';
           
            $gen_uuid = new generateUuid();
            $myuuid = $gen_uuid->guidv4();
            $primeros_ocho = substr($myuuid, 0, 8);
            $dta['uuid'] = $primeros_ocho;
            $model = new model_functions();
            return $model->model_alert($dta);
        }

        function post_groups($dta) {
            
            require_once '../../apiTools/v1/model/modelSecurity/uuid/uuidd.php';
            require_once '../../apiTools/v1/model/model_post/post_groups.php';
           
            $gen_uuid = new generateUuid();
            $myuuid = $gen_uuid->guidv4();
            $primeros_ocho = substr($myuuid, 0, 8);
            $dta['uuid'] = $primeros_ocho;
            $model = new model_functions();
            return $model->model_groups($dta);
        }
    }
    
?>