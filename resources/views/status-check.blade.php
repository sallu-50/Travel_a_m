<!-- resources/views/status-check.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Status</title>
    <!-- Fonts and CSS (Add Tailwind or Vite CSS here if needed) -->
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans antialiased">
    <x-nav>
    </x-nav>
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-4xl font-bold mb-4 text-center text-gray-800">Application Status</h2>
        <p class="text-lg text-center text-gray-600 mb-8">Here is the current status of your application:</p>

        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <span class="text-2xl font-semibold text-gray-800">
                {{-- Status: {{ $status }} --}}
                well done
            </span>
            <p class="text-gray-600 mt-4">
                <!-- Add additional status details or instructions here, if necessary -->
                Please check back for updates or contact us if you have questions.
            </p>
        </div>
    </div>
</body>

</html>
