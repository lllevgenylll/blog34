<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение данных из формы
if(isset($_POST['name'])) {
    $name = $_POST['name'];
} else {
    $name = "";
}

if(isset($_POST['email'])) {
    $email = $_POST['email'];
} else {
    $email = "";
}

if(isset($_POST['service'])) {
    $service = $_POST['service'];
} else {
    $service = "";
}

if(isset($_POST['phone'])) {
    $phone = $_POST['phone'];
} else {
    $phone = "";
}

if(isset($_POST['message'])) {
    $message = $_POST['message'];
} else {
    $message = "";
}

// Подготовка и выполнение SQL-запроса для вставки данных
$sql = "INSERT INTO orders (name, email, service, phone, message) VALUES ('$name', '$email', '$service', '$phone', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Данные успешно отправлены.";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

// Закрытие соединения с базой данных
$conn->close();
?>
