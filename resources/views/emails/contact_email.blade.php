<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .email-content {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 5px;
        }
        .email-content h3 {
            text-align: center;
            color: #333;
        }
        .email-content p {
            font-size: 16px;
            line-height: 1.5;
        }
        .contact-info {
            margin-top: 20px;
        }
        .contact-info p {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="email-content">
        <h3>New Contact Form Submission</h3>
        <p><strong>Name:</strong> {{ $data['name'] }}</p>
        <p><strong>Email Address:</strong> {{ $data['email'] }}</p>
        <p><strong>Phone Number:</strong> {{ $data['phone_number'] }}</p>
        <p><strong>Message:</strong> <br>{{ $data['message'] }}</p>
    </div>
</body>
</html>
