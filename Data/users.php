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
            $sql = $pdo->prepare("SELECT * FROM Users WHERE id=:id");
            $sql->bindValue(':id', $_GET['id']);
        }else if(isset($_GET['email']) && isset($_GET['password'])){
            $sql = $pdo->prepare("SELECT * FROM Users WHERE email=:email and password =:password");
            $sql->bindValue(':email', $_GET['email']);
            $sql->bindValue(':password', $_GET['password']);
        }else if(isset($_GET['name'])){
            $sql = $pdo->prepare("SELECT * FROM Users WHERE name=:name");
            $sql->bindValue(':name', $_GET['name']);
        }else if(isset($_GET['email'])){
            $sql = $pdo->prepare("SELECT * FROM Users WHERE email=:email");
            $sql->bindValue(':email', $_GET['email']);
        }else{
            $sql = $pdo->prepare("SELECT * FROM Users");
        }

        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode($sql->fetchAll());
        exit;
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST['photo']){
            $sql = "UPDATE Users SET photo= :photo WHERE id= :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $_POST['id']);
            $stmt->bindValue(':photo', $_POST['photo']);
            $stmt->execute();
            
            header("HTTP/1.1 200 OK");
            echo "data upadated";
            exit;
        }else{
            $sql = "INSERT INTO Users (name, email, password) VALUES (:name, :email, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':name', $_POST['name']);
            $stmt->bindValue(':email', $_POST['email']);
            $stmt->bindValue(':password', $_POST['password']);
            $stmt->execute();
            
            $idPost = $pdo->lastInsertId();
            if($idPost){
                header("HTTP/1.1 200 OK");
                echo "data inserted";
                exit;
            }
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'PUT'){
        $sql = "UPDATE Users SET name= :name, email= :email, pasword = :password WHERE id= :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->bindValue(':name', $_GET['email']);
        $stmt->bindValue(':passord', $_GET['password']);
        $stmt->execute();

        header("HTTP/1.1 200 OK");
        echo "data upadated";
        exit;
    }

    if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
        $sql = "DELETE FROM Users WHERE id= :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();

        header("HTTP/1.1 200 OK");
        echo "data deleted";
        exit;
    }
?>