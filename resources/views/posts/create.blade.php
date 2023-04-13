<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@if ($result)
    <ul>
        @foreach($result as $res)
            <li>{{ json_decode($res, true)['id'] }}</li>
            <li>{{ json_decode($res, true)['title'] }}</li>
            <li>{{ json_decode($res, true)['author'] }}</li>
            <li>{{ json_decode($res, true)['content'] }}</li>
        @endforeach
    </ul>
@else
<h4>The posts have been successfully created!</h4>
@endif
</body>
</html>
