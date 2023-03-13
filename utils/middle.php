<?php

  require '../lang/config.php';

  if(isset($_GET["languageSet"])) {
      $_SESSION["lang"] = $_GET["lang"];
      echo json_encode(true);
  }

  if(isset($_POST['loginform'])) {
    $query_confirm = "SELECT * FROM bo_user WHERE email=:email AND password=:passsword";
    $stmt = $DB_con->prepare($query_confirm);
    $stmt->bindparam(":email", $_POST['email']);
    $stmt->bindparam(":passsword", $_POST['password']);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      if($row['status'] != "1") {
        $authMessage = $ln['user_blocked'];
        echo json_encode([
          "success" => false,
          "message" => $ln['user_blocked']
        ]); exit;
      } else {
        $hash = $crud->addHash($_POST['email']);
        setcookie ("login_pass", $hash, time() + 7*86400, "/");
        setcookie ("user", json_encode(['id' => $row['id'], 'role' => $row['role']]), time() + 7*86400, "/");
        $role = $row['role'];
        echo json_encode([
          "success" => true,
          "message" => $ln['login_success'],
          "data" => $role
        ]); exit;
        exit();
      }
    }
    else {
        $authMessage = $ln['invalid_msg'];
        echo json_encode([
          "success" => false,
          "message" => $ln['invalid_msg']
        ]); exit;
    }
  }

?>