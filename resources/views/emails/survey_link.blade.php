<!DOCTYPE html>
<html>
<head>
    <title>Survey Link</title>
</head>
<body>
    <h2>Hello {{ $registration->name }}</h2>

    <p>Thank you for registering for the event.</p>

    <p>Please complete the survey using the link below:</p>

   <a href="{{ route('survey.show', $registration->id) }}">
    Click here to fill Survey
   </a>

    <br><br>
    <p>Regards,<br>Event Team</p>
</body>
</html>
