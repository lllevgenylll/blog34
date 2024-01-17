<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['form_type'])) {
        // Проверяем, какая форма отправила данные
        if ($_POST['form_type'] === 'contact') {
            // Обработка данных формы "Contact"
            $name = isset($_POST["name"]) ? $_POST["name"] : '';
            $email = isset($_POST["email"]) ? $_POST["email"] : '';
            $service = isset($_POST["service"]) ? $_POST["service"] : '';
            $phone = isset($_POST["phone"]) ? $_POST["phone"] : '';
            $message = isset($_POST["message"]) ? $_POST["message"] : '';
        } elseif ($_POST['form_type'] === 'subscribe') {
            // Обработка данных формы "Subscribe"
            $email = isset($_POST["email"]) ? $_POST["email"] : '';
        } else {
            echo "Invalid form type.";
            exit();
        }

        // Перенаправление на страницу "accept.php"
        header("Location: accept.php?success=1");
        exit();
    } else {
        echo "Form type not set.";
        exit();
    }
} else {
    echo "Invalid request method.";
}
?>