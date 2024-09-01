<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        p {
            font-size: 25px;
        }

        .signature {
            font-style: italic;
        }
    </style>
</head>
<body>
<div>
    <p>Hi, {{$mailContent['name']}} </p>
    <p>Someone Commented in yor Post: <b>{{ $mailContent['title']  }}</b> </p>
    <p class="signature">Laravel</p>
</div>
</body>
</html>
