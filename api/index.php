<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type");

    //echo "Testing"
 
    include 'DbConnect.php';
    $objDb = new DbConnect;
    $conn = $objDb->connect();
    //var_dump($conn);

    //print_r(file_get_contents('php://input'));

    $user = file_get_contents('php://input');
    $method = $_SERVER['REQUEST_METHOD'];
    switch($method){
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
    }

?>
