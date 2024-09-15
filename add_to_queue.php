<?php
session_start();
$code = $_POST['code'];
$queue = isset($_SESSION['queue']) ? $_SESSION['queue'] : [];

// Leer el archivo JSON
$jsonData = file_get_contents('users.json');
$users = json_decode($jsonData, true);

// Buscar el usuario por código
$user = array_filter($users, function($user) use ($code) {
    return $user['code'] === $code;
});

if (!empty($user)) {
    $user = array_values($user)[0]; // Obtener el primer elemento del array filtrado
    $name = $user['name'];

    if (!in_array($name, $queue)) {
        $queue[] = $name;
        $_SESSION['queue'] = $queue;
        echo json_encode(['status' => 'success', 'queue' => $queue]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'El usuario ya está en la cola']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Código no válido']);
}
?>

