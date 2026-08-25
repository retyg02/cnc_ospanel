<?php

session_start();

header('Content-Type: application/json');

require './db.php';


$json_input = file_get_contents('php://input');
$data = json_decode($json_input, true);

if (!$data)
{
    echo json_encode(['success' => false, 'message' => 'Empty frontend inquire']);
    exit;
}

$login = isset($data['login']) ? trim($data['login']) : '';
$mode = isset($data['mode']) ? $data['mode'] : 'login';
$pass = isset($data['pass']) ? $data['pass'] : '';

if (empty($login) || empty($pass))
{
    echo json_encode(['success' => false, 'message' => 'Login and password are required']);
    exit;
}

if ($mode === 'reg')
{
    $name = isset($data['name']) ? trim($data['name']) : '';

    if (!$name)
    {
        echo json_encode(['success' => false, 'message' => 'The name field can not be empty']);
        exit;
    }

    try 
    {
        global $pdo;

        $check_sql = "SELECT id FROM users WHERE email = :email";
        $stmt = $pdo->prepare($check_sql);
        $stmt->execute(['email' => $login]);

        if ($stmt->fetch())
        {
            echo json_encode(['success' => false, 'message' => 'This email is already registered']);
            exit;
        }


        $hashed_pass = password_hash($pass, PASSWORD_BCRYPT);


        $insert_sql = "INSERT INTO users (email, pass, name) VALUES (:email, :pass, :name)";
        $insert_stmp = $pdo->prepare($insert_sql);

        $insert_stmp->execute([
            'email' => $login,
            'pass' => $hashed_pass,
            'name' => $name
        ]);

        echo json_encode(['success' => true, 'message' => 'Registration is success']);
        exit;
    } 
    catch (\PDOException $e) 
    {
        echo json_encode(['success' => false, 'message' => 'Data base error: ' . $e.getMessage()]);
        exit;
    }
}
else
{
    try 
    {
    
        global $pdo;

        $sql = "SELECT name, pass, id, role FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $login]);
    
    
        $user_data = $stmt->fetch();

    
        if ($user_data && password_verify($pass, $user_data['pass'])) 
        {
        
            $_SESSION['name'] = $user_data['name'];

            $_SESSION['user_id'] = $user_data['id'];
            $_SESSION['user_email'] = $login;
            $_SESSION['user_role'] = $user_data['role'];

            try 
            {
                $log_sql = "INSERT INTO logs (user_id, device_id, action) VALUES (:user_id, :device_id, :action)";
                $log_stmt = $pdo->prepare($log_sql);
                $log_stmt->execute([
                    'user_id'   => $user_data['id'],
                    'device_id' => null, 
                    'action'    => 'Авторизовался в системе телеметрии'
                ]);
            } 
            catch (\PDOException $e) 
            {
        
            }

            echo json_encode([
                'success' => true, 
                'message' => 'Login is success', 
                'name'    => $user_data['name']
            ]);
            exit;
        } 
        else 
        {
            echo json_encode([
                'success' => false, 
                'message' => 'Неверный Email или пароль!'
            ]);
            exit;
    }

} 
catch (\PDOException $e) 
{
    echo json_encode(['success' => false, 'message' => 'Data base error: ' . $e.getMessage()]);
    exit;
}
}