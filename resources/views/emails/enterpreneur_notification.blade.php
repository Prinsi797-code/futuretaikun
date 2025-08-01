<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Entrepreneur Approved</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .header {
            background-color: #003366;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        .content {
            padding: 20px;
        }

        .content p {
            color: #4b5563;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 16px;
        }

        .details-box {
            background-color: #f9fafb;
            border-radius: 6px;
            padding: 16px;
            margin-bottom: 16px;
        }

        .details-box ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .details-box li {
            font-size: 16px;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .details-box li span {
            font-weight: 600;
        }

        .cta {
            text-align: center;
            margin-top: 24px;
        }

        .cta a {
            display: inline-block;
            background-color: #003366;
            color: #ffffff;
            text-decoration: none;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 4px;
            transition: background-color 0.2s;
        }

        .cta a:hover {
            background-color: #003366;
        }

        .footer {
            background-color: #e5e7eb;
            text-align: center;
            padding: 16px;
            font-size: 14px;
            color: #6b7280;
        }

        .footer a {
            color: #003366;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @media screen and (max-width: 600px) {
            .container {
                margin: 10px;
            }

            .header h1 {
                font-size: 20px;
            }

            .content p,
            .details-box li {
                font-size: 14px;
            }

            .cta a {
                padding: 8px 16px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>New Investor Approved</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <p>We’re thrilled to announce a new investment opportunity through FutureTaikun.</p>

            <div class="details-box">
                <ul>
                    <li><span>Investment Range:</span> {{ $investment_range }}</li>
                    <li><span>Investor Type:</span> {{ $investor_type }}</li>
                </ul>
            </div>

            <p>If this investor shows interest in your idea, we will pitch it on your behalf through FutureTaikun. To
                explore this opportunity. Our team will review and guide you further.</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>This is an automated reminder email. Please do not reply to this email.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Your FutureTaikun. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
