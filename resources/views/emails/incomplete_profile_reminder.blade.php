<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Complete Your Profile - Future Taikun</title>
</head>

<body style="font-family: 'Segoe UI', Roboto, sans-serif; background-color: #f7f7f7; margin: 0; padding: 0;">
    <table width="100%" cellspacing="0" cellpadding="0" style="background-color: #f7f7f7; padding: 30px 0;">
        <tr>
            <td align="center">
                <table width="600" cellspacing="0" cellpadding="0"
                    style="background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
                    <tr>
                        <td style="background-color: #003366;; padding: 20px; text-align: center;">
                            <h1 style="color: white; margin: 0; font-size: 24px;">Future Taikun</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 30px;">
                            <p style="font-size: 18px; color: #333;">Hi {{ ucfirst($role) }},</p>

                            <p style="font-size: 16px; color: #555; line-height: 1.6;">
                                We noticed you registered as an <strong>{{ ucfirst($role) }}</strong> on <strong>Future
                                    Taikun</strong> but haven’t completed your profile yet.
                            </p>

                            <p style="font-size: 16px; color: #555; line-height: 1.6;">
                                To unlock full access to business opportunities, networking, and tailored
                                recommendations, please complete your profile now.
                            </p>

                            <p style="text-align: center; margin: 30px 0;">
                                <a href="{{ route('login') }}"
                                    style="background-color: #003366; color: white; padding: 12px 24px; text-decoration: none; font-weight: bold; border-radius: 6px; display: inline-block;">
                                    Complete Your Profile
                                </a>
                            </p>

                            <p style="font-size: 16px; color: #555;">
                                If you’ve already completed your profile, you can safely ignore this email.
                            </p>

                            <p style="margin-top: 40px; font-size: 16px; color: #333;">
                                Thank you,<br>
                                <strong>Future Taikun Team</strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td
                            style="background-color: #f0f0f0; padding: 20px; text-align: center; font-size: 12px; color: #999;">
                            © {{ date('Y') }} Future Taikun. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
