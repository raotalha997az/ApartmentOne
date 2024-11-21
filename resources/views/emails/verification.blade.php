<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
</head>
<body>
    <p>Hello {{ $user->name }},</p>
    <p>Thank you for registering! Please verify your email by clicking the button below:</p>
    <a href="{{ env('APP_URL') }}/verify-email/{{$user->verification_token}}" style="display: inline-block; padding: 10px 20px; color: #fff; background-color: #007bff; text-decoration: none; border-radius: 5px;">Verify Now</a>
    <p>If you did not register, please ignore this email.</p>
</body>
</html>
