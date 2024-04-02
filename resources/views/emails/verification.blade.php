<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin: 0 auto;
            width: 500px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            text-align: center;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ $message->embed(public_path('images/logo.png')) }}" alt="Logo">
            <h1>Welcome to Our Website!</h1>
        </div>
        <div class="content">
            <p>Thank you for registering with us. Before you can start using our website, you need to verify your email address.</p>
            <a href="{{ $verificationUrl }}" class="button">Verify Email Address</a>
        </div>
        <div class="footer">
            <p>If you have any questions, please contact us at <a href="mailto:support@oursite.com">support@oursite.com</a>.</p>
        </div>
    </div>
</body>
</html>