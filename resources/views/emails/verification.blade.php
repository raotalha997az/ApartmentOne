<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>

<style>
    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    body div .t-btn{
    padding: 10px 20px !important;
    background: #15c !important;
    color: #fff !important;
    text-decoration: none !important;
    border-radius: 10px !important;
}

</style>
</head>
<body>
    <div style="text-align: center;">
        <img src="{{ env('APP_URL') }}/{{ asset('assets/images/header-logo.png') }}" alt="" style="text-align: center;">
    <p style="text-align: center;">Hello {{ $user->name }},</p>
    <p style="text-align: center;">Thank you for registering! Please verify your email by clicking the button below:</p>
    <a href="{{ env('APP_URL') }}/verify-email/{{$user->verification_token}}" class="t-btn" style="padding: 10px 20px !important;
        background: #15c !important;
        color: #fff !important;
        text-decoration: none !important;
        border-radius: 10px !important;">Verify Now</a>
    <p style="text-align: center;">If you did not register, please ignore this email.</p>
    </div>
</body>
</html>
