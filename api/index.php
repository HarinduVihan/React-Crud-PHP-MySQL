<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Access-Control-Allow-Methods: *");

    //echo "Testing"
 
    include 'DbConnect.php';
    $objDb = new DbConnect;
    $conn = $objDb->connect();
    //var_dump($conn);

    //print_r(file_get_contents('php://input'));

    $user = file_get_contents('php://input');
    $method = $_SERVER['REQUEST_METHOD'];

    switch($method){

        case "GET":
            $sql = "SELECT * FROM users";
            $path = explode('/', $_SERVER['REQUEST_URI']);
            //print_r($path);
            if(isset($path[5]) && is_numeric($path[5])){
                $sql .= " WHERE id = :id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $path[5]);
                $stmt->execute();
                $users = $stmt->fetch(PDO::FETCH_ASSOC);
            }else{
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            echo json_encode($users);
            break;

        case "PUT":
            $user = json_decode(file_get_contents('php://input'));
            $sql = "UPDATE users SET name= :name, email= :email, mobile= :mobile, updated_at= :updated_at WHERE id= :id";
            $stmt = $conn->prepare($sql);
            $updated_at = date('y-m-d');

            $stmt->bindParam(":id", $user->inputs->id);
            $stmt->bindParam(":name", $user->inputs->name);
            $stmt->bindParam(":email", $user->inputs->email);
            $stmt->bindParam(":mobile", $user->inputs->mobile);
            $stmt->bindParam(":updated_at", $updated_at);

            if($stmt->execute()){
                $response = ['status' => 1, 'message' => 'Record updated succeessfully.'];
            }else{
                $response = ['status' => 0, 'message' => 'Faild to update record.'];
            }
            break;

        case "POST":
            $user = json_decode(file_get_contents('php://input'));
            $sql = "INSERT INTO users(id, name, email, mobile, created_at) VALUES(null, :name, :email, :mobile, :created_at)";
            $stmt = $conn->prepare($sql);
            $created_at = date('y-m-d');

            // var_dump($user);
            // exit;

            $stmt->bindParam(":name", $user->inputs->name);
            $stmt->bindParam(":email", $user->inputs->email);
            $stmt->bindParam(":mobile", $user->inputs->mobile);
            $stmt->bindParam(":created_at", $created_at);

            if($stmt->execute()){
                $response = ['status' => 1, 'message' => 'Record created succeessfully.'];
            }else{
                $response = ['status' => 0, 'message' => 'Faild to create record.'];
            }
            break;

        case "DELETE":
            $sql = "DELETE FROM users WHERE id = :id";
            $path = explode('/', $_SERVER['REQUEST_URI']);
            //print_r($path);
            if(isset($path[5]) && is_numeric($path[5])){
                
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $path[5]);
            }
            if($stmt->execute()){
                $response = ['status' => 1, 'message' => 'Record deleted succeessfully.'];
            }else{
                $response = ['status' => 0, 'message' => 'Faild to delete record.'];
            }
            break;
    }

?>
