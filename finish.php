<?php
// Проверка метода запроса
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Обработка данных
    $form_type = $_POST['form_type'] ?? '';
    $source_page = $_POST['source_page'] ?? '';

    // Добавьте остальные поля формы, которые вы ожидаете
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $service = $_POST['service'] ?? '';
    $message = $_POST['message'] ?? '';

    // Сгенерируем уникальный номер заявки
    $order_number = uniqid();

    // Ваш код для сохранения данных в файл
    $data = "Order Number: $order_number\n";
    $data .= "Form Type: $form_type\n";
    $data .= "Source Page: $source_page\n";
    $data .= "Name: $name\n";
    $data .= "Email: $email\n";
    $data .= "Phone: $phone\n";
    $data .= "Service: $service\n";
    $data .= "Message: $message\n\n";

    file_put_contents("all_orders.txt", $data, FILE_APPEND | LOCK_EX);

    // Определение, успешно ли прошла операция
    $success = true;

    if ($success) {
        // Если успешно, перенаправляем на accept.php
        header("Location: accept.php?order_number=$order_number");
        exit();
    } else {
        // Если неудачно, перенаправляем на cancel.php
        header("Location: cancel.php");
        exit();
    }
} else {
    // Вывод всех заявок на экран
    echo "<h2>Все заявки</h2>";

    // Ваш код для получения и отображения всех заявок
    // Пример: отображение заявок из файла
    if (file_exists("all_orders.txt")) {
        $all_orders = file_get_contents("all_orders.txt");
        echo nl2br($all_orders);
    } else {
        echo "Нет заявок.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Остальные теги head -->
</head>
<body>
    <!-- Ваш контент (можете добавить информацию, которую хотите отобразить на странице) -->
</body>
</html>
