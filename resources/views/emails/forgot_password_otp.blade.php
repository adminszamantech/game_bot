<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Reset</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #1a73e8;
        }
        .otp {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 20px;
        }
        .footer a {
            color: #1a73e8;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h2>Password Reset Request</h2>
        <p>Dear {{ $name ?? 'Sir' }},</p>
        <p>We received a request to reset your One-Time Password (OTP) for your account. Please use the following OTP to complete the reset process:</p>
        <div class="otp">
            {{ $otp ?? '' }}
        </div>
        <p>This OTP is valid for the next [X] minutes. If you did not request this reset, please ignore this email. The OTP will expire after the specified time.</p>
        <p>If you encounter any issues or need further assistance, feel free to contact us.</p>
        <p>Thank you for choosing {{ config('app.name') }}.</p>
        <div class="footer">
            <p>Best regards,<br>The {{ config('app.name') }} Team</p>
            <p><a href="{{ config('app.url') }}">Visit our website</a></p>
        </div>
    </div>
</body>
</html>
