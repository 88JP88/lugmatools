<?php

require 'flight/Flight.php';

require_once 'database/db_users.php';


Flight::route('GET /getPTasks/@id', function ($id) {
    header("Access-Control-Allow-Origin: *");
    $conectar=conn();
    $uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT profile_id,task_id,value,finish_date,start_date,created_at,prior,complete FROM personal_task  where profile_id='$id'");
       

        $tasks=[];
 
        while($row = $query->fetch_assoc())
        {
                $task=[
                    'id' => $row['task_id'],
                    'start' => $row['start_date'],
                    'finish' => $row['finish_date'],
                    'task' => $row['value'],
                    'created' => $row['created_at'],
                    'priority' => $row['prior'],
                    'status' => $row['complete'],
                    'profile' => $row['profile_id']
                    
                ];
                
                array_push($tasks,$task);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['tasks'=>$tasks]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});


Flight::route('GET /getPTasksById/@id/@task', function ($task,$id) {
    header("Access-Control-Allow-Origin: *");
    $conectar=conn();
    $uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT profile_id,task_id,value,finish_date,start_date,created_at,prior,complete FROM personal_task  where profile_id='$id' and task_id='$task'");
       

        $tasks=[];
 
        while($row = $query->fetch_assoc())
        {
                $task=[
                    'id' => $row['task_id'],
                    'start' => $row['start_date'],
                    'finish' => $row['finish_date'],
                    'task' => $row['value'],
                    'created' => $row['created_at'],
                    'priority' => $row['prior'],
                    'status' => $row['complete'],
                    'profile' => $row['profile_id']
                    
                ];
                
                array_push($tasks,$task);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['tasks'=>$tasks]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});



Flight::route('GET /getSchedule/@id', function ($id) {
    header("Access-Control-Allow-Origin: *");

    $conectar=conn();
    $uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT id,time,mon,tus,wen,thu,fri,sat,sun FROM schedules  where user_id='$id'");
       

        $sches=[];
 
        while($row = $query->fetch_assoc())
        {
                $sche=[
                    'id' => $row['id'],
                    'time' => $row['time'],
                    'mon' => $row['mon'],
                    'tus' => $row['tus'],
                    'wen' => $row['wen'],
                    'thu' => $row['thu'],
                    'fri' => $row['fri'],
                    'sat' => $row['sat'],
                    'sun' => $row['sun']
                ];
                
                array_push($sches,$sche);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['sches'=>$sches]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});


Flight::route('GET /getAlert/@id', function ($id) {
    header("Access-Control-Allow-Origin: *");

    $conectar=conn();
    $uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT DISTINCT alert_id,value,created_at,is_active,start_date,profile_id FROM alerts_general where profile_id='$id' and status=1");
       

        $alerts=[];
 
        while($row = $query->fetch_assoc())
        {
            
                $alert=[
                    'id' => $row['alert_id'],
                    'value' => $row['value'],
                    'created' => $row['created_at'],
                    'status' => $row['is_active'],
                    'sdate' => $row['start_date'],
                    'profile' => $row['profile_id']
                ];
                
                array_push($alerts,$alert);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['alerts'=>$alerts]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});



Flight::route('GET /getDis/@id', function ($id) {
    header("Access-Control-Allow-Origin: *");

    $conectar=conn();
    $uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT DISTINCT dis_id,group_id,profile_id,name,content,public_date FROM groups_discussions where group_id='$id' and status=1 and is_active=1 ORDER BY created_at DESC");
       

        $discs=[];
 
        while($row = $query->fetch_assoc())
        {
            
                $disc=[
                    'id' => $row['dis_id'],
                    'group_id' => $row['group_id'],
                    'maker' => $row['profile_id'],
                    'name' => $row['name'],
                    'content' => $row['content'],
                    'public_date' => $row['public_date']
                ];
                
                array_push($discs,$disc);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['discs'=>$discs]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});

Flight::route('GET /getDisById/@id', function ($id) {
    header("Access-Control-Allow-Origin: *");

    $conectar=conn();
    $uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT DISTINCT dis_id,group_id,profile_id,name,content,public_date FROM groups_discussions where dis_id='$id' and status=1 and is_active=1 ORDER BY created_at DESC");
       

        $discs=[];
 
        while($row = $query->fetch_assoc())
        {
            
                $disc=[
                    'id' => $row['dis_id'],
                    'group_id' => $row['group_id'],
                    'maker' => $row['profile_id'],
                    'name' => $row['name'],
                    'content' => $row['content'],
                    'public_date' => $row['public_date']
                ];
                
                array_push($discs,$disc);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['discs'=>$discs]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});

Flight::route('GET /getComments/@id', function ($id) {
    header("Access-Control-Allow-Origin: *");

    $conectar=conn();
    $uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT DISTINCT comment_id,profile_id,created_at,comment,group_id,type,parent_id FROM dis_comments where dis_id='$id' and status=1 and is_active=1 ORDER BY created_at DESC");
       

        $comms=[];
 
        while($row = $query->fetch_assoc())
        {
            
                $comm=[
                    'id' => $row['comment_id'],
                    'group_id' => $row['group_id'],
                    'maker' => $row['profile_id'],
                    'type' => $row['type'],
                    'comment' => $row['comment'],
                    'public_date' => $row['created_at'],
                    'parent_id' => $row['parent_id']
                ];
                
                array_push($comms,$comm);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['comms'=>$comms]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});
Flight::route('GET /getCreatedGroups/@id', function ($id) {
    header("Access-Control-Allow-Origin: *");

    $conectar=conn();
    $uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT DISTINCT g.group_id,g.name,g.profile_id,g.is_active,g.description,g.max_qty,g.public,g.auto_join,g.responsible_id,g.sub_responsible_id,g.public_add,g.members FROM groups_general g where g.profile_id='$id' and g.status=1");
       

        $groups=[];
 
        while($row = $query->fetch_assoc())
        {
            
                $group=[
                    'id' => $row['group_id'],
                    'group_name' => $row['name'],
                    'profile' => $row['profile_id'],
                    'status' => $row['is_active'],
                    'qty' => $row['max_qty'],
                    'public' => $row['public'],
                    'auto_join' => $row['auto_join'],
                    'responsible_id' => $row['responsible_id'],
                    'responsible_id2' => $row['sub_responsible_id'],
                    'public_add' => $row['public_add'],
                    'members' => $row['members'],
                    'description' => $row['description']
                ];
                
                array_push($groups,$group);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['groups'=>$groups]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});


Flight::route('GET /getPublicGroups/', function () {
    header("Access-Control-Allow-Origin: *");

    $conectar=conn();
    $uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT DISTINCT g.group_id,g.name,g.profile_id,g.is_active,g.description,g.max_qty,g.public,g.auto_join,g.responsible_id,g.sub_responsible_id,g.public_add,g.members FROM groups_general g  where g.public=1 and g.status=1");
       

        $groups=[];
 
        while($row = $query->fetch_assoc())
        {
            
                $group=[
                    'group_id' => $row['group_id'],
                    'group_name' => $row['name'],
                    'profile' => $row['profile_id'],
                    'group_status' => $row['is_active'],
                    'qty' => $row['max_qty'],
                    'public' => $row['public'],
                    'auto_join' => $row['auto_join'],
                    'responsible_id' => $row['responsible_id'],
                    'responsible_id2' => $row['sub_responsible_id'],
                    'public_add' => $row['public_add'],
                    'members' => $row['members'],
                    'group_description' => $row['description']
                ];
                
                array_push($groups,$group);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['groups'=>$groups]);
       
  //echo $groups;
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});


Flight::route('GET /getGroupById/@id', function ($id) {
    header("Access-Control-Allow-Origin: *");




    $conectar=conn();
    $uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT DISTINCT g.group_id,g.name,g.profile_id,g.is_active,g.description,g.max_qty,g.public,g.auto_join,g.responsible_id,g.sub_responsible_id,g.public_add,g.members FROM groups_general g  where g.group_id='$id' and g.status=1");
       

        $groups=[];
 
        while($row = $query->fetch_assoc())
        {
            
                $group=[
                    'id' => $row['group_id'],
                    'name' => $row['name'],
                    'profile' => $row['profile_id'],
                    'status' => $row['is_active'],
                    'qty' => $row['max_qty'],
                    'public' => $row['public'],
                    'auto_join' => $row['auto_join'],
                    'responsible_id' => $row['responsible_id'],
                    'responsible_id2' => $row['sub_responsible_id'],
                    'public_add' => $row['public_add'],
                    'members' => $row['members'],
                    'description' => $row['description']
                ];
                
                array_push($groups,$group);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['groups'=>$groups]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});

Flight::route('GET /getAdminGroupById/@id/@profile', function ($id,$profile) {
    header("Access-Control-Allow-Origin: *");

    $conectar=conn();
    $uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT DISTINCT g.group_id,g.name,g.profile_id,g.is_active,g.description,g.max_qty,g.public,g.auto_join,g.responsible_id,g.sub_responsible_id,g.public_add,g.members FROM groups_general g where g.group_id='$id' and g.responsible_id='$profile' and g.status=1");
       

        $groups=[];
 
        while($row = $query->fetch_assoc())
        {
            
                $group=[
                    'id' => $row['group_id'],
                    'name' => $row['name'],
                    'profile' => $row['profile_id'],
                    'status' => $row['is_active'],
                    'qty' => $row['max_qty'],
                    'public' => $row['public'],
                    'auto_join' => $row['auto_join'],
                    'responsible_id' => $row['responsible_id'],
                    'responsible_id2' => $row['sub_responsible_id'],
                    'public_add' => $row['public_add'],
                    'members' => $row['members'],
                    'description' => $row['description']
                ];
                
                array_push($groups,$group);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['groups'=>$groups]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});

Flight::route('GET /getGeneralGroupById/@id/', function ($id) {
    header("Access-Control-Allow-Origin: *");

    $conectar=conn();
    $uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT DISTINCT g.group_id,g.name,g.profile_id,g.is_active,g.description,g.max_qty,g.public,g.auto_join,g.responsible_id,g.sub_responsible_id,g.public_add,g.members FROM groups_general g where g.group_id='$id' and g.status=1 and g.public=1");
       

        $groups=[];
 
        while($row = $query->fetch_assoc())
        {
            
                $group=[
                    'id' => $row['group_id'],
                    'name' => $row['name'],
                    'profile' => $row['profile_id'],
                    'status' => $row['is_active'],
                    'qty' => $row['max_qty'],
                    'public' => $row['public'],
                    'auto_join' => $row['auto_join'],
                    'responsible_id' => $row['responsible_id'],
                    'responsible_id2' => $row['sub_responsible_id'],
                    'public_add' => $row['public_add'],
                    'members' => $row['members'],
                    'description' => $row['description']
                ];
                
                array_push($groups,$group);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['groups'=>$groups]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});

Flight::route('GET /getGroupInfo/@id/', function ($id) {
    header("Access-Control-Allow-Origin: *");

    $conectar=conn();
    $uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT DISTINCT g.group_id,g.name,g.profile_id,g.is_active,g.description,g.max_qty,g.public,g.auto_join,g.responsible_id,g.sub_responsible_id,g.public_add,g.members FROM groups_general g  where g.group_id='$id' and g.status=1 and g.public=1");
       

        $groups=[];
 
        while($row = $query->fetch_assoc())
        {
            
                $group=[
                    'id' => $row['group_id'],
                    'name' => $row['name'],
                    'profile' => $row['profile_id'],
                    'status' => $row['is_active'],
                    'qty' => $row['max_qty'],
                    'public' => $row['public'],
                    'auto_join' => $row['auto_join'],
                    'responsible_id' => $row['responsible_id'],
                    'responsible_id2' => $row['sub_responsible_id'],
                    'public_add' => $row['public_add'],
                    'members' => $row['members'],
                    'description' => $row['description']
                ];
                
                array_push($groups,$group);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['groups'=>$groups]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});


Flight::route('GET /getGroupInfoUser/@id/@profile', function ($id,$profile) {
    header("Access-Control-Allow-Origin: *");

    $conectar=conn();
    $uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT COUNT(*) as counter FROM groups_general_list where group_id='$id' and profile_id='$profile'");
       

        $groups=[];
 
        while($row = $query->fetch_assoc())
        {
            
                $group=[
                    'counter_group_user' => $row['counter']
                ];
                
                array_push($groups,$group);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['groups'=>$groups]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});

Flight::route('GET /getModerGroupById/@id/@profile', function ($id,$profile) {
    header("Access-Control-Allow-Origin: *");

    $conectar=conn();
    $uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT DISTINCT g.group_id,g.name,g.profile_id,g.is_active,g.description,g.max_qty,g.public,g.auto_join,g.responsible_id,g.sub_responsible_id,g.public_add,g.members FROM groups_general g  where g.group_id='$id' and g.sub_responsible_id='$profile' and g.status=1");
       

        $groups=[];
 
        while($row = $query->fetch_assoc())
        {
            
                $group=[
                    'id' => $row['group_id'],
                    'name' => $row['name'],
                    'profile' => $row['profile_id'],
                    'status' => $row['is_active'],
                    'qty' => $row['max_qty'],
                    'public' => $row['public'],
                    'auto_join' => $row['auto_join'],
                    'responsible_id' => $row['responsible_id'],
                    'responsible_id2' => $row['sub_responsible_id'],
                    'public_add' => $row['public_add'],
                    'members' => $row['members'],
                    'description' => $row['description']
                ];
                
                array_push($groups,$group);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['groups'=>$groups]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});
Flight::route('GET /getResponsibleGroups/@id', function ($id) {
    header("Access-Control-Allow-Origin: *");

    $conectar=conn();
   // $uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT DISTINCT g.group_id,g.name,g.profile_id,g.is_active,g.description,g.max_qty,g.public,g.auto_join,g.responsible_id,g.sub_responsible_id,g.public_add,g.members FROM groups_general g where g.responsible_id='$id' and g.status=1");
       

        $groups=[];
 
        while($row = $query->fetch_assoc())
        {
            
                $group=[
                    'id' => $row['group_id'],
                    'name' => $row['name'],
                    'profile' => $row['profile_id'],
                    'status' => $row['is_active'],
                    'qty' => $row['max_qty'],
                    'public' => $row['public'],
                    'auto_join' => $row['auto_join'],
                    'responsible_id' => $row['responsible_id'],
                    'responsible_id2' => $row['sub_responsible_id'],
                    'public_add' => $row['public_add'],
                    'members' => $row['members'],
                    'description' => $row['description']
                ];
                
                array_push($groups,$group);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['groups'=>$groups]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});


Flight::route('GET /getSubResponsibleGroups/@id', function ($id) {
    header("Access-Control-Allow-Origin: *");

    $conectar=conn();
    $uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT DISTINCT g.group_id,g.name,g.profile_id,g.is_active,g.description,g.max_qty,g.public,g.auto_join,g.responsible_id,g.sub_responsible_id,g.public_add,g.members FROM groups_general g where g.sub_responsible_id='$id' and g.status=1");
       

        $groups=[];
 
        while($row = $query->fetch_assoc())
        {
            
                $group=[
                    'id' => $row['group_id'],
                    'name' => $row['name'],
                    'profile' => $row['profile_id'],
                    'status' => $row['is_active'],
                    'qty' => $row['max_qty'],
                    'public' => $row['public'],
                    'auto_join' => $row['auto_join'],
                    'responsible_id' => $row['responsible_id'],
                    'responsible_id2' => $row['sub_responsible_id'],
                    'public_add' => $row['public_add'],
                    'members' => $row['members'],
                    'description' => $row['description']
                ];
                
                array_push($groups,$group);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['groups'=>$groups]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});


Flight::route('GET /getParticipantGroups/@id', function ($id) {
    header("Access-Control-Allow-Origin: *");

    $conectar=conn();
    $uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT DISTINCT gl.group_id,g.name,g.profile_id,g.is_active,g.description,g.max_qty,g.public,g.auto_join,g.responsible_id,g.sub_responsible_id,g.public_add,g.members FROM groups_general g JOIN groups_general_list gl ON gl.group_id=g.group_id where gl.profile_id='$id' and gl.member_type in('member') and g.status=1 and gl.status=1");
       

        $groups=[];
 
        while($row = $query->fetch_assoc())
        {
            
                $group=[
                    'id' => $row['group_id'],
                    'name' => $row['name'],
                    'profile' => $row['profile_id'],
                    'status' => $row['is_active'],
                    'qty' => $row['max_qty'],
                    'public' => $row['public'],
                    'auto_join' => $row['auto_join'],
                    'responsible_id' => $row['responsible_id'],
                    'responsible_id2' => $row['sub_responsible_id'],
                    'public_add' => $row['public_add'],
                    'members' => $row['members'],
                    'description' => $row['description']
                ];
                
                array_push($groups,$group);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['groups'=>$groups]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});




Flight::route('GET /getUserGroups/@id', function ($id) {
    header("Access-Control-Allow-Origin: *");

    $conectar=conn();
    $uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT  gl.group_id,gl.profile_id,gl.status,gl.member_type FROM groups_general_list gl where gl.group_id='$id' and gl.member_type in ('LowAdmin','HighAdmin','member')");
       

        $groups=[];
 
        while($row = $query->fetch_assoc())
        {
            
                $group=[
                    'id' => $row['group_id'],
                    'status' => $row['status'],
                    'profile' => $row['profile_id'],
                    'member_type' => $row['member_type']
                ];
                
                array_push($groups,$group);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['groups'=>$groups]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});
Flight::route('GET /getGroupsMakerCounter/@id', function ($id) {
    header("Access-Control-Allow-Origin: *");

    $conectar=conn();
    $uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT COUNT(*) as counterl FROM groups_general where profile_id='$id' and status=1");
       

        $groups=[];
 
        while($row = $query->fetch_assoc())
        {
            
                $group=[
                    'counter' => $row['counterl']
                ];
                
                array_push($groups,$group);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['groups'=>$groups]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});

Flight::route('GET /getGroupsPublicCounter/@id', function ($id) {
    header("Access-Control-Allow-Origin: *");

    $conectar=conn();
    $uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT COUNT(*) as counterl FROM groups_general where public=1 and status=1");
       

        $groups=[];
 
        while($row = $query->fetch_assoc())
        {
            
                $group=[
                    'counter' => $row['counterl']
                ];
                
                array_push($groups,$group);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['groups'=>$groups]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});

Flight::route('GET /getGroupsHighCounter/@id', function ($id) {
    header("Access-Control-Allow-Origin: *");

    $conectar=conn();
    //$uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT COUNT(*) as counter2 FROM groups_general where responsible_id='$id' and status=1");
       

        $groups=[];
 
        while($row = $query->fetch_assoc())
        {
            
                $group=[
                    'counter' => $row['counter2']
                ];
                
                array_push($groups,$group);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['groups'=>$groups]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});


Flight::route('GET /getGroupsLowCounter/@id', function ($id) {
    header("Access-Control-Allow-Origin: *");

    $conectar=conn();
    //$uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT COUNT(*) as counter2 FROM groups_general where sub_responsible_id='$id' and status=1");
       

        $groups=[];
 
        while($row = $query->fetch_assoc())
        {
            
                $group=[
                    'counter' => $row['counter2']
                ];
                
                array_push($groups,$group);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['groups'=>$groups]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});


Flight::route('GET /getGroupsMemberCounter/@id', function ($id) {
    header("Access-Control-Allow-Origin: *");

    $conectar=conn();
    //$uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT COUNT(*) as counter2 FROM groups_general_list where profile_id='$id' and member_type='member' and status=1");
       

        $groups=[];
 
        while($row = $query->fetch_assoc())
        {
            
                $group=[
                    'counter' => $row['counter2']
                ];
                
                array_push($groups,$group);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['groups'=>$groups]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});


Flight::route('GET /getGroupsTotalCounter/@id', function ($id) {
    header("Access-Control-Allow-Origin: *");

    $conectar=conn();
    //$uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT COUNT(*) as counter2 FROM groups_general_list where profile_id='$id' and member_type in ('member','HighAdmin','LowAdmin') and status=1");
       

        $groups=[];
 
        while($row = $query->fetch_assoc())
        {
            
                $group=[
                    'counter' => $row['counter2']
                ];
                
                array_push($groups,$group);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['groups'=>$groups]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});


Flight::route('GET /getAlertCounter/@id', function ($id) {
    header("Access-Control-Allow-Origin: *");

    $conectar=conn();
    $uri = $_SERVER['REQUEST_URI'];

    $fechaActual = date("Y-m-d");
    //echo $fechaActual;
    
    $query= mysqli_query($conectar,"SELECT COUNT(*) as counter FROM alerts_general where profile_id='$id' and is_active=1 and status=1 and start_date >= '$fechaActual'");
       

        $alerts=[];
 
        while($row = $query->fetch_assoc())
        {
                $alert=[
                    'counter' => $row['counter']
                ];
                
                array_push($alerts,$alert);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['alerts'=>$alerts]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});



Flight::route('POST /putSchedule', function () {
    $conectar=conn();
    //$uri = $_SERVER['REQUEST_URI'];


    $day=(Flight::request()->data->day);
    $id=(Flight::request()->data->id);
    $value=(Flight::request()->data->value);
    $user=(Flight::request()->data->user_id);

    $data = array(
        'id' =>$id, 
        'day' => $day,
        'value' => $value,
        'user_id' => $user
        );
    

        $query= mysqli_query($conectar,"UPDATE schedules SET $day='$value' WHERE user_id='$user' and id='$id'");
       //echo json_encode( $data);
    echo 'true';
       
    

     
   
    
});


Flight::route('POST /postSchedule', function () {
    $conectar=conn();
   // $uri = $_SERVER['REQUEST_URI'];


    $user=(Flight::request()->data->user_id);

    
   
        for ($i = 0; $i < 24; $i++) {
            $rel=$i.":00";
            $query= mysqli_query($conectar,"INSERT INTO schedules (user_id,time) VALUES ('$user','$rel')");
            
        }              
        $query1= mysqli_query($conectar,"UPDATE schedules  SET mon=' ',tus=' ',wen=' ',thu=' ',fri=' ',sat=' ',sun=' ' WHERE user_id='$user'");
                   
    echo 'true';
       
    

     
   
    
});



Flight::route('POST /postAlert', function () {
    $dta = [
        'sdate' => Flight::request()->data->sdate,
        'value' => Flight::request()->data->value,
        'user' => Flight::request()->data->user
    ];

    require_once('../../apiTools/v1/controller/groups/post_functions.php');
    
            $post_alerts = new post_functions();
            echo $post_alerts->post_alert($dta);
       
});


Flight::route('POST /postGroups', function () {
    require_once('../../apiTools/v1/controller/groups/post_functions.php');
    
    $dta=[
            
        
        'group'=>(Flight::request()->data->group),
        'description'=>(Flight::request()->data->description),
       'qty'=>(Flight::request()->data->qty),
    'responsable_1'=>(Flight::request()->data->responsable_1),
    'responsable_2'=>(Flight::request()->data->responsable_2),
    'user'=>(Flight::request()->data->profile_id)

    ];
       $post_groups=new post_functions();

   echo $post_groups->post_groups($dta);
   // echo json_encode( $dta);
    
});



Flight::route('POST /putMakerGroups', function () {
    $conectar=conn();
    //$uri = $_SERVER['REQUEST_URI'];


    $group=(Flight::request()->data->group);
    $description=(Flight::request()->data->description);
    
    $qty=(Flight::request()->data->qty);
    
    $status=(Flight::request()->data->status);
    
    $public=(Flight::request()->data->public);
    $auto_join=(Flight::request()->data->auto_join);
    $auto_add=(Flight::request()->data->auto_add);
    $group_id=(Flight::request()->data->group_id);
    $user=(Flight::request()->data->profile_id);

   
                             $query= mysqli_query($conectar,"UPDATE groups_general SET name='$group',description='$description',max_qty='$qty',is_active='$status',public='$public', auto_join='$auto_join',public_add='$auto_add' WHERE profile_id='$user' and group_id='$group_id'");
                            
    
    echo 'true';
     
   
    
});

Flight::route('POST /putAdminGroups', function () {
    $conectar=conn();
    //$uri = $_SERVER['REQUEST_URI'];

    $description=(Flight::request()->data->description);
    
    $qty=(Flight::request()->data->qty);
    
    $status=(Flight::request()->data->status);
    
    $public=(Flight::request()->data->public);
    $auto_join=(Flight::request()->data->auto_join);
    $auto_add=(Flight::request()->data->auto_add);
    $group_id=(Flight::request()->data->group_id);
    $user=(Flight::request()->data->profile_id);

   
                             $query= mysqli_query($conectar,"UPDATE groups_general SET description='$description',max_qty='$qty',is_active='$status',public='$public', auto_join='$auto_join',public_add='$auto_add' WHERE responsible_id='$user' and group_id='$group_id'");
                            
    
    echo 'true';
     
   
    
});

Flight::route('POST /putHideUsersGroups', function () {
    $conectar=conn();
    //$uri = $_SERVER['REQUEST_URI'];


    $value=(Flight::request()->data->value);
    $group_id=(Flight::request()->data->group_id);
    $user=(Flight::request()->data->profile_id);

    if($value=="block"){
        $query= mysqli_query($conectar,"UPDATE groups_general_list SET status=0 WHERE profile_id='$user' and group_id='$group_id'");
                            

    }
    if($value=="unblock"){
        $query= mysqli_query($conectar,"UPDATE groups_general_list SET status=1 WHERE profile_id='$user' and group_id='$group_id'");
                            

    }
    if($value=="del"){
        $query= mysqli_query($conectar,"DELETE FROM groups_general_list WHERE profile_id='$user' and group_id='$group_id'");
        $query= mysqli_query($conectar,"SELECT COUNT(*) as counter FROM groups_general_list WHERE group_id='$group_id'");
       

        $users=[];
 
        while($row = $query->fetch_assoc())
        {
                $user1=[
                    'counter' => $row['counter']
                ];
                
                array_push($users,$user1);
                
        }
        $row=$query->fetch_assoc();

        $response= json_encode(['users'=>$users]);
       
        $data = json_decode($response);
        foreach ($data->users as $character) {
          
           
        }
    
      $suma=  $character->counter;
      $suma1=$suma-1; 



             $query= mysqli_query($conectar,"UPDATE groups_general SET members='$suma1' WHERE group_id='$group_id'");


    }

   
                            
    
    echo 'true';
     
   
    
});

Flight::route('POST /putMakerAdminModerGroups', function () {
    $conectar=conn();
    //$uri = $_SERVER['REQUEST_URI'];

    $value=(Flight::request()->data->value);
    $group_id=(Flight::request()->data->group_id);
    $profile_id=(Flight::request()->data->profile_id);
    $user=(Flight::request()->data->user);

 if($value=="admin"){



    $query= mysqli_query($conectar,"SELECT * FROM groups_general_list where profile_id='$user' and group_id='$group_id'");
                   $nr=mysqli_num_rows($query);
                   if($nr>=1){
    $query= mysqli_query($conectar,"UPDATE groups_general SET responsible_id='$user' WHERE profile_id='$profile_id' and group_id='$group_id'");
    $query= mysqli_query($conectar,"UPDATE groups_general_list SET member_type='member' WHERE group_id='$group_id' and member_type='HighAdmin'");
   
    $query= mysqli_query($conectar,"UPDATE groups_general_list SET member_type='HighAdmin' WHERE profile_id='$user' and group_id='$group_id' and member_type IN ('member','LowAdmin')");
                   }else{
                    $query= mysqli_query($conectar,"SELECT COUNT(*) as counter FROM groups_general_list WHERE group_id='$group_id'");
       

                    $users=[];
             
                    while($row = $query->fetch_assoc())
                    {
                            $user1=[
                                'counter' => $row['counter']
                            ];
                            
                            array_push($users,$user1);
                            
                    }
                    $row=$query->fetch_assoc();
            
                    $response= json_encode(['users'=>$users]);
                   
                    $data = json_decode($response);
                    foreach ($data->users as $character) {
                      
                       
                    }
                
                  $suma=  $character->counter;
                  $suma1=$suma+1; 
                  $query= mysqli_query($conectar,"SELECT max_qty FROM groups_general WHERE group_id='$group_id'");
       

                  $users=[];
           
                  while($row = $query->fetch_assoc())
                  {
                          $user2=[
                              'counter' => $row['max_qty']
                          ];
                          
                          array_push($users,$user2);
                          
                  }
                  $row=$query->fetch_assoc();
          
                  $response= json_encode(['users'=>$users]);
                 
                  $data = json_decode($response);
                  foreach ($data->users as $character2) {
                    
                     
                  }
              
                $suma11=  $character2->counter;
            if($suma1 > $suma11){
                echo "false";
            }
            if($suma1<=$suma11){
                $query= mysqli_query($conectar,"UPDATE groups_general SET members='$suma1' WHERE group_id='$group_id'");
    
                    
                $query= mysqli_query($conectar,"INSERT INTO groups_general_list (group_id,profile_id,member_type) values ('$group_id','$user','member')");
                $query= mysqli_query($conectar,"UPDATE groups_general SET responsible_id='$user' WHERE profile_id='$profile_id' and group_id='$group_id'");
$query= mysqli_query($conectar,"UPDATE groups_general_list SET member_type='member' WHERE group_id='$group_id' and member_type='HighAdmin'");

$query= mysqli_query($conectar,"UPDATE groups_general_list SET member_type='HighAdmin' WHERE profile_id='$user' and group_id='$group_id' and member_type IN ('member')");
         echo "true";
            }

                        
                   }

 }
 if($value=="moder"){
   
    $query= mysqli_query($conectar,"SELECT * FROM groups_general_list where profile_id='$user' and group_id='$group_id'");
                   $nr=mysqli_num_rows($query);
                   if($nr>=1){
    $query= mysqli_query($conectar,"UPDATE groups_general SET sub_responsible_id='$user' WHERE profile_id='$profile_id' and group_id='$group_id'");
    $query= mysqli_query($conectar,"UPDATE groups_general_list SET member_type='member' WHERE group_id='$group_id' and member_type='LowAdmin'");
   
    $query= mysqli_query($conectar,"UPDATE groups_general_list SET member_type='LowAdmin' WHERE profile_id='$user' and group_id='$group_id' and member_type IN ('member','LowAdmin')");
                   }else{

                    $query= mysqli_query($conectar,"SELECT COUNT(*) as counter FROM groups_general_list WHERE group_id='$group_id'");
       

                    $users=[];
             
                    while($row = $query->fetch_assoc())
                    {
                            $user1=[
                                'counter' => $row['counter']
                            ];
                            
                            array_push($users,$user1);
                            
                    }
                    $row=$query->fetch_assoc();
            
                    $response= json_encode(['users'=>$users]);
                   
                    $data = json_decode($response);
                    foreach ($data->users as $character) {
                      
                       
                    }
                
                  $suma=  $character->counter;
                  $suma1=$suma+1; 
    

                  $query= mysqli_query($conectar,"SELECT max_qty FROM groups_general WHERE group_id='$group_id'");
       

                  $users=[];
           
                  while($row = $query->fetch_assoc())
                  {
                          $user2=[
                              'counter' => $row['max_qty']
                          ];
                          
                          array_push($users,$user2);
                          
                  }
                  $row=$query->fetch_assoc();
          
                  $response= json_encode(['users'=>$users]);
                 
                  $data = json_decode($response);
                  foreach ($data->users as $character2) {
                    
                     
                  }
              
                $suma11=  $character2->counter;
            if($suma1 > $suma11){
                echo "false";
            }
            if($suma1<=$suma11){
                $query= mysqli_query($conectar,"UPDATE groups_general SET members='$suma1' WHERE group_id='$group_id'");
    
                    $query= mysqli_query($conectar,"INSERT INTO groups_general_list (group_id,profile_id,member_type) values ('$group_id','$user','member')");
                    $query= mysqli_query($conectar,"UPDATE groups_general SET sub_responsible_id='$user' WHERE profile_id='$profile_id' and group_id='$group_id'");
    $query= mysqli_query($conectar,"UPDATE groups_general_list SET member_type='member' WHERE group_id='$group_id' and member_type='LowAdmin'");
   
    $query= mysqli_query($conectar,"UPDATE groups_general_list SET member_type='LowAdmin' WHERE profile_id='$user' and group_id='$group_id' and member_type IN ('member')");
            echo "true";
            }
   
                    

 }
                           
   
   
                           
    }
     
    if($value=="member"){
   
        $query= mysqli_query($conectar,"SELECT * FROM groups_general_list where profile_id='$user' and group_id='$group_id'");
                       $nr=mysqli_num_rows($query);
                       if($nr>=1){
                        
                   }else{
    
                    $query= mysqli_query($conectar,"SELECT COUNT(*) as counter FROM groups_general_list WHERE group_id='$group_id' and member_type IN ('member','LowAdmin','HighAdmin')");
       

                    $users=[];
             
                    while($row = $query->fetch_assoc())
                    {
                            $user1=[
                                'counter' => $row['counter']
                            ];
                            
                            array_push($users,$user1);
                            
                    }
                    $row=$query->fetch_assoc();
            
                    $response= json_encode(['users'=>$users]);
                   
                    $data = json_decode($response);
                    foreach ($data->users as $character) {
                      
                       
                    }
                
                  $suma=  $character->counter;
                  $suma1=$suma+1; 
    
                  $query= mysqli_query($conectar,"SELECT max_qty FROM groups_general WHERE group_id='$group_id'");
       

                  $users=[];
           
                  while($row = $query->fetch_assoc())
                  {
                          $user2=[
                              'counter' => $row['max_qty']
                          ];
                          
                          array_push($users,$user2);
                          
                  }
                  $row=$query->fetch_assoc();
          
                  $response= json_encode(['users'=>$users]);
                 
                  $data = json_decode($response);
                  foreach ($data->users as $character2) {
                    
                     
                  }
              
                $suma11=  $character2->counter;
            if($suma1 > $suma11){
                echo "false";
            }
            if($suma1<=$suma11){
                $query= mysqli_query($conectar,"INSERT INTO groups_general_list (group_id,profile_id,member_type) values ('$group_id','$user','member')");
                $query= mysqli_query($conectar,"UPDATE groups_general SET members='$suma1' WHERE group_id='$group_id'");
                echo "true";
            }

   
                       
    
     }
                               
       
       
                               
        }
   
    
});


Flight::route('POST /delMakerGroups', function () {
    $conectar=conn();
    //$uri = $_SERVER['REQUEST_URI'];

   
    $group_id=(Flight::request()->data->group_id);
    $profile_id=(Flight::request()->data->profile_id);


    $query= mysqli_query($conectar,"UPDATE groups_general SET status=0 WHERE profile_id='$profile_id' and group_id='$group_id'");
    $query= mysqli_query($conectar,"UPDATE groups_general_list SET status=0 WHERE group_id='$group_id'");
    

                           
   
   
                           
    
    echo 'true';
     
   
    
});


Flight::route('POST /putAlert', function () {
    $conectar=conn();
    $uri = $_SERVER['REQUEST_URI'];


    $status=(Flight::request()->data->status);
    $profile=(Flight::request()->data->profile);
    $alert_id=(Flight::request()->data->alert_id);

    if($status=="is_active"){
        $query= mysqli_query($conectar,"UPDATE alerts_general  set is_active=0 where alert_id='$alert_id' and profile_id='$profile'");
       
    }
    if($status=="start"){
        $query= mysqli_query($conectar,"UPDATE alerts_general  set is_active=1 where alert_id='$alert_id' and profile_id='$profile'");
       
    }
    if($status=="del"){
        $query= mysqli_query($conectar,"DELETE FROM alerts_general where alert_id='$alert_id' and profile_id='$profile'");
       
    }

        
    echo 'true';
       
    

     
   
    
});

Flight::route('POST /putTask', function () {
    try {
        $conectar=conn();
        //$uri = $_SERVER['REQUEST_URI'];

        $task=(Flight::request()->data->task);
        $sdata=(Flight::request()->data->sdata);
        $fdata=(Flight::request()->data->fdata);
        $priority=(Flight::request()->data->priority);
        $profile=(Flight::request()->data->profile);
        $task_id=(Flight::request()->data->task_id);

        

       $query= mysqli_query($conectar,"UPDATE personal_task SET value='$task',finish_date='$fdata',start_date='$sdata',prior='$priority' WHERE profile_id='$profile' and task_id='$task_id'");
//echo $task_id." ". $profile;
  echo 'true';
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
   
    
});


Flight::route('POST /putTaskStatus', function () {
    try {
        $conectar=conn();
        //$uri = $_SERVER['REQUEST_URI'];

        $status=(Flight::request()->data->status);
        $profile=(Flight::request()->data->profile);
        $task_id=(Flight::request()->data->task_id);

     

        $query= mysqli_query($conectar,"UPDATE personal_task SET complete='$status' WHERE profile_id='$profile' and task_id='$task_id'");

        echo 'true';
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
   
    
});

Flight::route('POST /putTaskDel', function () {
    try {
        $conectar=conn();
        //$uri = $_SERVER['REQUEST_URI'];

        $status=(Flight::request()->data->status);
        $profile=(Flight::request()->data->profile);
        $task_id=(Flight::request()->data->task_id);
if($status=="hide"){
    $query= mysqli_query($conectar,"UPDATE personal_task SET is_active=0 WHERE profile_id='$profile' and task_id='$task_id'");

    echo 'true';

}
if($status=="blc"){
    $query= mysqli_query($conectar,"UPDATE personal_task SET status=0 WHERE profile_id='$profile' and task_id='$task_id'");

    echo 'true';

}
if($status=="del"){
    $query= mysqli_query($conectar,"DELETE from personal_task WHERE profile_id='$profile' and task_id='$task_id'");

    echo 'true';

}
if($status=="ublc"){
    $query= mysqli_query($conectar,"UPDATE personal_task SET status=1 WHERE profile_id='$profile' and task_id='$task_id'");

    echo 'true';

}
if($status=="uhide"){
    $query= mysqli_query($conectar,"UPDATE personal_task SET is_active=1 WHERE profile_id='$profile' and task_id='$task_id'");

    echo 'true';

}

       
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
   
    
});


Flight::route('POST /postTask', function () {
    try {
        $conectar=conn();
        $uri = $_SERVER['REQUEST_URI'];

        $task=(Flight::request()->data->task);
        $sdata=(Flight::request()->data->sdata);
        $fdata=(Flight::request()->data->fdata);
        $priority=(Flight::request()->data->priority);
        $profile=(Flight::request()->data->profile);

        require('../../apiTools/v1/model/modelSecurity/uuid/uuidd.php');
        $con=new generateUuid();
        $myuuid = $con->guidv4();
        $primeros_ocho = substr($myuuid, 0, 8);

        $query= mysqli_query($conectar,"INSERT personal_task (task_id,profile_id,value,finish_date,start_date,prior,complete) VALUES ('$primeros_ocho','$profile','$task','$fdata','$sdata','$priority','created')");

        echo 'true';
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
});



Flight::route('POST /postDis', function () {
    try {
        $conectar=conn();
        $uri = $_SERVER['REQUEST_URI'];

        $name=(Flight::request()->data->name);
        $content=(Flight::request()->data->content);
        $profile_id=(Flight::request()->data->profile_id);
        $group_id=(Flight::request()->data->group_id);

        require('../../apiTools/v1/model/modelSecurity/uuid/uuidd.php');
        $con=new generateUuid();
        $myuuid = $con->guidv4();
        $primeros_ocho = substr($myuuid, 0, 8);
        $fechaActual = date("Y-m-d");
        $query= mysqli_query($conectar,"INSERT INTO groups_discussions (dis_id,group_id,profile_id,name,content,public_date) VALUES ('$primeros_ocho','$group_id','$profile_id','$name','$content','$fechaActual')");

        echo 'true';
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
});


Flight::route('POST /postComment', function () {
    try {
        $conectar=conn();
       
        $dis_id=(Flight::request()->data->dis_id);
        $profile_id=(Flight::request()->data->profile_id);
        $group_id=(Flight::request()->data->group_id);
        $comment=(Flight::request()->data->comment);

        require('../../apiTools/v1/model/modelSecurity/uuid/uuidd.php');
        $con=new generateUuid();
        $myuuid = $con->guidv4();
        $primeros_ocho = substr($myuuid, 0, 8);
        $fechaActual = date("Y-m-d");
        $query= mysqli_query($conectar,"INSERT INTO dis_comments (comment_id,group_id,profile_id,comment,dis_id,type,parent_id) VALUES ('$primeros_ocho','$group_id','$profile_id','$comment','$dis_id','main','$primeros_ocho')");

        echo 'true';
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
});

Flight::route('GET /getSubs/', function () {
    header("Access-Control-Allow-Origin: *");
    $conectar=conn();
    $uri = $_SERVER['REQUEST_URI'];


    $query= mysqli_query($conectar,"SELECT sub_id,name,info,total_ammount,day_amount,rate_day,sub_type FROM subscriptions where status=1 and is_active=1");
       

        $subs=[];
 
        while($row = $query->fetch_assoc())
        {
                $sub=[
                    'sub_id' => $row['sub_id'],
                    'name' => $row['name'],
                    'info' => $row['info'],
                    'total' => $row['total_ammount'],
                    'day' => $row['day_amount'],
                    'rate' => $row['rate_day'],
                    'type' => $row['sub_type']
                ];
                
                array_push($subs,$sub);
                
        }
        $row=$query->fetch_assoc();

        echo json_encode(['subs'=>$subs]);
       
  
  // echo $uri; // muestra "/mi-pagina.php?id=123"

       
   

});


Flight::start();
