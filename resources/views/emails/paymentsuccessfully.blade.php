<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paymenet Confirmation</title>
</head>
<body>
    <h1>Payment Confirmation</h1>
    <h4>Dear {{ $user->name }},</h4>
    <p>Thank you for your payment! We’ve successfully processed your transaction.</p>
    <p>Amount of <span> 100$ </span> has been successfully paid:</p>
    <p>If you have any questions, feel free to contact us.</p>
    <p>Regards,</p>
    <p>ApartmentOne Team</p>
</body>
</html>
