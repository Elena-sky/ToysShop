<!DOCTYPE html>
<html>
<head>
    <title>Письмо от пользователя</title>
</head>
<body>

Id письма: {{$dataMail['mail_id']}}
@if($dataMail['user_id'])
    <h2>Пользователь с ID: {!! $dataMail['user_id'] !!} </h2> <br>
@endif

<h2>Имя пользователя: {!! $dataMail['name'] !!} </h2> <br>
Email: {{$dataMail['email']}} <br>
Тема письма: {{$dataMail['subject']}} <br>
Текст сообщения: {{$dataMail['message']}}


</body>
</html>