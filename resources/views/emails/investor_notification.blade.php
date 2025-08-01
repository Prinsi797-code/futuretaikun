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
            background-color: #1e40af;
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
            background-color: #1e40af;
            color: #ffffff;
            text-decoration: none;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 4px;
            transition: background-color 0.2s;
        }

        .cta a:hover {
            background-color: #1e3a8a;
        }

        .footer {
            background-color: #e5e7eb;
            text-align: center;
            padding: 16px;
            font-size: 14px;
            color: #6b7280;
        }

        .footer a {
            color: #1e40af;
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
            <h1>New Entrepreneur Approved</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <p>A new entrepreneur has been approved. Here are the details:</p>

            <div class="details-box">
                <ul>
                    <li><span>Business Name:</span> {{ $business_name }}</li>
                    <li><span>Brand Name:</span> {{ $brand_name }}</li>
                    <li><span>Fund Asked:</span> {{ $fund_asked }}</li>
                    <li><span>Equity Offered:</span> {{ $equity_offered }}%</li>
                    <li><span>Company Valuation:</span> {{ $company_valuation }}</li>
                </ul>
            </div>

            <p>Please review this opportunity in your investor dashboard.</p>

            <!-- CTA Button -->
            <div class="cta">
                <a href="{{ route('login') }}">View Dashboard</a>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
            <p>If you have any questions, contact us at <a
                    href="mailto:support@yourcompany.com">support@yourcompany.com</a>.</p>
        </div>
    </div>
</body>

</html>
