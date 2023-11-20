<?php
    $Todo = $_POST['Todo'];
    $Priority = $_POST['Priority'];
    $Date = $_POST['Date'];

    if($Todo === '' || $Priority === '') {
        header('Location: index.php');
        exit();
    }

    //$dsn = 'mysql:host=
    //$user = "root";
    //$password = "";

    try{
        $db = new PDO($dsn,$user,$password);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

        $stmt = $db ->prepare(
            "
            INSERT 
            INTO 
              messages 
            (
              todo
            , priority
            , date
            ) VALUES (
              :todo
            , :priority
            , :date
            )
          ");

          $stmt->bindParam(":todo", $Todo, PDO::PARAM_STR);
          $stmt->bindParam(":priority", $Priority, PDO::PARAM_STR);
          $stmt->bindParam(":date", $Date, PDO::PARAM_STR);

          $stmt->execute();

          header('Location: index.php');
          exit();
            }catch(PDOException $e){
              die('エラー:' . $e->getMessage()); 
            }
