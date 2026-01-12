<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Feedback</title>
    <style>
        /* General Resets */
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f7f6;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        /* Responsive */
        @media only screen and (max-width: 600px) {
            .container {
                width: 100% !important;
                padding: 20px !important;
            }

            .content-table {
                padding: 0 !important;
            }
        }
    </style>
</head>
<body style="background-color: #f4f7f6; margin: 0; padding: 40px 0;">

<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td align="center">

            <table class="container" role="presentation" border="0" cellpadding="0" cellspacing="0" width="600"
                   style="background-color: #ffffff; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.05); overflow: hidden;">

                <tr>
                    <td style="background-color: #4f46e5; height: 6px;"></td>
                </tr>

                <tr>
                    <td style="padding: 40px;">
                        <table class="content-table" width="100%">

                            <tr>
                                <td align="center" style="padding-bottom: 25px;">
                                    <h2 style="margin: 0; color: #1f2937; font-size: 24px; font-weight: 700;">New
                                        Feedback! 🌟</h2>
                                    <p style="margin: 10px 0 0; color: #6b7280; font-size: 14px;">Someone just left a
                                        review on your portfolio.</p>
                                </td>
                            </tr>

                            <tr>
                                <td style="border-bottom: 1px solid #e5e7eb; padding-bottom: 25px;"></td>
                            </tr>

                            <tr>
                                <td style="padding-top: 25px;">
                                    <table width="100%">
                                        <tr>
                                            <td width="40" style="vertical-align: top;">
                                                <div
                                                    style="width: 40px; height: 40px; background-color: #e0e7ff; border-radius: 50%; text-align: center; line-height: 40px; color: #4f46e5; font-weight: bold; font-size: 18px;">
                                                    {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                                                </div>
                                            </td>
                                            <td style="padding-left: 15px; vertical-align: middle;">
                                                <p style="margin: 0; color: #111827; font-weight: 600; font-size: 16px;">{{ $testimonial->name }}</p>
                                                <a href="mailto:{{ $testimonial->email }}"
                                                   style="margin: 0; color: #6b7280; text-decoration: none; font-size: 14px;">{{ $testimonial->email }}</a>
                                            </td>
                                            <td align="right" style="vertical-align: middle;">
                                                <div
                                                    style="background-color: #fffbeb; color: #b45309; padding: 5px 12px; border-radius: 20px; font-size: 13px; font-weight: 600; display: inline-block;">
                                                    {{ $testimonial->evaluation }}/5 ⭐
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td style="padding-top: 25px;">
                                    <p style="margin: 0 0 10px; color: #374151; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px;">
                                        Message Content</p>
                                    <div
                                        style="background-color: #f9fafb; border-left: 4px solid #4f46e5; padding: 20px; border-radius: 4px; color: #4b5563; font-style: italic; line-height: 1.6;">
                                        "{{ $testimonial->message }}"
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td align="center" style="padding-top: 35px;">
                                    <a href="{{ config('app.url') }}"
                                       style="background-color: #111827; color: #ffffff; padding: 12px 30px; border-radius: 6px; text-decoration: none; font-weight: 600; font-size: 14px; display: inline-block;">View
                                        Dashboard</a>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="background-color: #f9fafb; padding: 20px; text-align: center; border-top: 1px solid #e5e7eb;">
                        <p style="margin: 0; color: #9ca3af; font-size: 12px;">
                            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                        </p>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>

</body>
</html>
