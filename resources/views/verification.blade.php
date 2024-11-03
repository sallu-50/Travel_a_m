<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans antialiased">
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg my-8">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Enter Verification Code</h2>

        <!-- Verification Code Field -->
        <div class="relative mb-4">
            <input type="text" placeholder="Verification Code"
                class="w-full pl-4 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <!-- Submit Button -->
        <button type="button" onclick="verifyCode()"
            class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none">
            Verify
        </button>
    </div>

    <script>
        function verifyCode() {
            // Redirect or perform verification here
            alert("Verification successful!"); // Placeholder action
        }
    </script>
</body>

</html>
