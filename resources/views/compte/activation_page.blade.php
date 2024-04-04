<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Activation</title>
</head>
<body>
    <h1>Account Activation</h1>
    
    <p>Please enter the activation code you received to activate your account.</p>

    @if (session('error'))
        <div>{{ session('error') }}</div>
    @endif

    <form action="{{ route('compte.process_activation', ['num_cmt' => $compte->num_cmt, 'activation_code' => $activation_code]) }}" method="POST">
        @csrf
        <label for="activation_code">Activation Code:</label>
        <input type="text" id="activation_code" name="activation_code" required>
        <button type="submit">Activate Account</button>
    </form>
</body>
</html>
