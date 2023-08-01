<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Promotion</title>
</head>
<body>

    {{-- <h4>{{ $promotionMail['title'] }}</h4> --}}
    <h4>{{ $promotionMail['body'] }}</h4>
    <p>Dear {{ $user->name }},</p>
    <img src="{{ $message->embed(public_path().'/8.jpg') }}">

    <p>Thank you for your great work with us. We are excited to have you as a member of our community.</p>

    <h2>Your Account Details</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>

            </tr>
        </tbody>
    </table>

    <p>If you have any questions or need any assistance, please feel free to contact us.</p>
    <p>Best regards,</p>
    <p>Your development Team</p>

</body>
</html>
