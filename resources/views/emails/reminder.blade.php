<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Complete Your Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #333;
            margin-bottom: 10px;
        }

        .content {
            color: #555;
        }

        .incomplete-fields {
            background-color: #f8f9fa;
            border-left: 4px solid #007bff;
            padding: 15px;
            margin: 20px 0;
        }

        .field-list {
            list-style-type: none;
            padding: 0;
        }

        .field-list li {
            padding: 5px 0;
            border-bottom: 1px solid #eee;
        }

        .field-list li:last-child {
            border-bottom: none;
        }

        .cta-button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Complete Your {{ $userType }} Profile</h1>
            <p>Dear {{ $userType }},</p>
        </div>

        <div class="content">
            <p>We noticed that your profile is incomplete. Please fill in the following fields to complete your profile:
            </p>

            <div class="incomplete-fields">
                <h3>Missing Information:</h3>
                <ul class="field-list">
                    @foreach ($incompleteFields as $field)
                        <li>• {{ $field }}</li>
                    @endforeach

                </ul>
            </div>

            <p>Completing your profile helps us better understand your needs and connect you with the right
                opportunities.</p>

            <div style="text-align: center;">
                <a href="{{ route('login') }}" class="cta-button">Complete Profile Now</a>
            </div>

            <p>If you have any questions or need assistance, feel free to contact our support team.</p>
            <p>Best regards,<br>Futuretaikun</p>
        </div>

        <div class="footer">
            <p>This is an automated reminder email. Please do not reply to this email.</p>
        </div>
    </div>
</body>

</html>
