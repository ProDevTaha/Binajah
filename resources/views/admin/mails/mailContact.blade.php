<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body style="font-family: Arial, sans-serif;">
    <div style="margin-top: 3%; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div style="background-color: #464AC8; color: #fff; padding: 10px; border-bottom: 1px solid #ccc;">
            <h4 style="margin: 0;">New Contact</h4>
        </div>
        <div style="padding: 20px;">
            <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left; background-color: #f2f2f2;">Name</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left; background-color: #f2f2f2;">Email</th>
                        <th style="border: 1px solid #ddd; padding: 8px; text-align: left; background-color: #f2f2f2;">Message</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $contact['fullname'] }}</td>
                        <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $contact['email'] }}</td>
                        <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $contact['message'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
