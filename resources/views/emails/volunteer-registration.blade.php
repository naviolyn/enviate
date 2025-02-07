<!DOCTYPE html>
<html>
<head>
    <title>Volunteer Registration Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        p {
            font-size: 16px;
            color: #666;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hello, {{ $userName }}!</h2>
        <p>Thank you for registering as a volunteer for <strong>{{ $volunteerName }}</strong>!</p>
        <p>We appreciate your commitment to making a difference.</p>
        <p>Stay tuned for further updates regarding your volunteering schedule.</p>
        <br>
        <p class="footer">Best regards,</p>
        <p class="footer"><strong>Enviate Team</strong></p>
    </div>
</body>
</html>
