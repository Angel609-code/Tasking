<?php
    include 'conexion.php';
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == "OPTIONS") {
        die();
    }

    $pdo = new Conexion();

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

        if(isset($_GET['id'])){
            $sql = $pdo->prepare("SELECT * FROM Events WHERE id=:id");
            $sql->bindValue(':id', $_GET['id']);
        }else{
            $sql = $pdo->prepare("SELECT * FROM Events");
        }

        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode($sql->fetchAll());
        exit;
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $sql = "INSERT INTO Events (useremail, title, start, allDay, className) VALUES (:useremail, :title, :start, :allDay, :className)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':useremail', $_POST['useremail']);
        $stmt->bindValue(':title', $_POST['title']);
        $stmt->bindValue(':start', $_POST['start']);
        $stmt->bindValue(':allDay', $_POST['allDay']);
        $stmt->bindValue(':className', $_POST['className']);
        $stmt->execute();

        $idPost = $pdo->lastInsertId();
        if($idPost){
            header("HTTP/1.1 200 OK");
            echo $idPost;
            exit;
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'PUT'){
        $sql = "UPDATE Events SET useremail= :useremail, title= :title, start = :start, allDay =:allDay, className=:className WHERE id= :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':useremail', $_GET['useremail']);
        $stmt->bindValue(':title', $_GETT['title']);
        $stmt->bindValue(':start', $_GET['start']);
        $stmt->bindValue(':allDay', $_GET['allDay']);
        $stmt->bindValue(':className', $_GET['className']);
        $stmt->bindValue(':id', $_GET['id']);

        $stmt->execute();

        header("HTTP/1.1 200 OK");
        echo "data upadated";
        exit;
    }

    if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
        $sql = "DELETE FROM Events WHERE id= :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();

        header("HTTP/1.1 200 OK");
        echo "data deleted";
        exit;
    }
?>

<!-- var settings = {
                    "url": "https://angel609.es/testproyects/Data/events.php?useremail=" + 
                        window.localStorage.getItem("username") +
                        "&title=" + t + "&start=" + a+ "&allDay=" + b + "&className=" + d + "&id=" + s,
                    "method": "PUT",
                    "timeout": 0,
                };
                  
                $.ajax(settings).done(function (response) {
                    alert(response);
                }); -->