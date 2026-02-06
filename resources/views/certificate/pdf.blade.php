<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }
        .box {
            border: 5px solid #000;
            padding: 40px;
        }
    </style>
</head>
<body>

<div class="box">
    <h1>Certificate of Participation</h1>

    <p>This is to certify that</p>

    <h2>{{ $registration->name }}</h2>

    <p>
        has successfully participated in the event
        <strong>{{ $registration->event->name }}</strong>
    </p>

    <p>
        Date: {{ $registration->event->event_date }}
    </p>

    <br><br>
    <p>Authorized Signature</p>
</div>

</body>
</html>
