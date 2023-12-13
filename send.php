<?php
// Файлы phpmailer
require 'libs/phpmailer/PHPMailer.php';
require 'libs/phpmailer/SMTP.php';
require 'libs/phpmailer/Exception.php';

# проверка, что ошибки нет
if (!error_get_last()) {

    // Переменные, которые отправляет пользователь
    $name = $_POST['name'] ;
    $email = $_POST['email'];
    $text = $_POST['text'];
    $phone = $_POST['phone'];
    
    
    // Формирование самого письма
    $title = "Заголовок письма";
    $body = "<h2>Новое письмо</h2>
    <b>Имя:</b> $name<br>
    <b>Телефонный номер:</b> $phone<br>
    <b>Почта:</b> $email<br><br>
    <b>Сообщение:</b><br>$text";
    
    // Настройки PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['data']['debug'][] = $str;};
    
    // Настройки вашей почты
    $mail->Host       = 'smtp.beget.com'; // SMTP сервера вашей почты
    $mail->Username   = 'site@datsumetals.com'; // Логин на почте
    $mail->Password   = 'Yq2%Fxmk'; // Пароль на почте - Нужно использовать не пароль от самой почты, а «Пароль приложения». В настройках вашей почты, будь то Gmail, Yandex или Mailru — есть раздел «Пароли приложений», где вы можете специально создать отдельный сгенерированный пароль. Именно этот пароль нужно использовать
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 465;
    $mail->setFrom('site@datsumetals.com', 'Datsu Metal'); // Адрес самой почты и имя отправителя
    
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
        $data['result'] = "error";
        $data['info'] = "Сообщение не было отправлено. Ошибка при отправке письма";
        $data['desc'] = "Причина ошибки: {$mail->ErrorInfo}";
    }
    
} else {
    $data['result'] = "error";
    $data['info'] = "В коде присутствует ошибка";
    $data['desc'] = error_get_last();
}

// Отправка результата
header('Content-Type: application/json');
echo json_encode($data);

?>
