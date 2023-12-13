<?php
// Файлы phpmailer
require 'libs/phpmailer/PHPMailer.php';
require 'libs/phpmailer/SMTP.php';
require 'libs/phpmailer/Exception.php';

// Используем try-catch для обработки исключений
try {
    // Переменные, которые отправляет пользователь
    $name = $_POST['name'];
    $email = $_POST['email'];
    $text = $_POST['text'];
    $phone = $_POST['phone'];

    // Формирование самого письма
    $title = "Новая заявка с сайта Datsu";
    $body = "<h2>Новое письмо</h2>
    <b>Имя:</b> $name<br>
    <b>Телефонный номер:</b> $phone<br>
    <b>Почта:</b> $email<br><br>
    <b>Сообщение:</b><br>$text";

    // Настройки PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();

    //$mail->isSMTP();
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth = true;
    // $mail->SMTPDebug = 2; // Раскомментируйте для отладки
    $mail->Debugoutput = function($str, $level) {$GLOBALS['data']['debug'][] = $str;};

    // Настройки вашей почты
    $mail->Host = 'smtp.yandex.ru'; // SMTP сервера вашей почты
    $mail->Username = 'datsumetal'; // Логин на почте
    $mail->Password = 'nG4-DUf-8tS-iSX'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('datsumetal@yandex.ru', 'Datsu Metal'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('davydikm@inoxhub.com');
    $mail->addAddress('roman.sky.andreev@gmail.com'); // Ещё один, если нужен

    // Отправка сообщения
    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $body;

    // Проверяем отправленность сообщения
    if ($mail->send()) {
        $data['result'] = "success";
        $data['info'] = "Сообщение успешно отправлено!";
    } else {
        throw new Exception("Сообщение не было отправлено. Ошибка при отправке письма: {$mail->ErrorInfo}");
    }
} catch (Exception $e) {
    $data['result'] = "error";
    $data['info'] = $e->getMessage();
}

// Отправка результата
header('Content-Type: application/json');
echo json_encode($data);
?>
