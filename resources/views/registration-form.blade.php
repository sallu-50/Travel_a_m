<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ ucfirst($type) }} Registration</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Vite CSS -->
    @vite('resources/css/app.css')

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100 font-sans antialiased">
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg my-8">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">{{ ucfirst($type) }} Register</h2>

        <!-- Full Name Field -->
        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <input type="hidden" name="type" value="{{ $type }}">

            <!-- Full Name Field -->
            <div class="relative mb-4">
                <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input type="text" name="full_name" placeholder="Full Name"
                    class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Father's Name Field -->
            <div class="relative mb-4">
                <i class="fas fa-user-tie absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input type="text" name="fathers_name" placeholder="Father's Name"
                    class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Mother's Name Field -->
            <div class="relative mb-4">
                <i class="fas fa-female absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input type="text" name="mothers_name" placeholder="Mother's Name"
                    class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Phone Number Field -->
            <div class="relative mb-4">
                <i class="fas fa-phone-alt absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input type="tel" name="phone" placeholder="Phone Number"
                    class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Passport Number Field -->
            <div class="relative mb-4">
                <i class="fas fa-passport absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input type="text" name="passport" placeholder="Passport Number"
                    class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none">
                Submit
            </button>
            {{-- <button type="button" onclick="goToVerification()"
                class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none">
                Submit
            </button> --}}
        </form>
        <!-- Submit Button -->
        {{-- <button type="button" onclick="goToVerification()"
            class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none">
            Submit
        </button> --}}
    </div>

    <!-- Alpine.js video modal script -->
    <script>
        function videoModal() {
            return {
                isVideoModalOpen: false,
                videoId: null,
                openVideoModal(videoId) {
                    this.isVideoModalOpen = true;
                    this.videoId = videoId;
                },
                closeVideoModal() {
                    this.isVideoModalOpen = false;
                    this.videoId = null;
                }
            };
        }

        function goToVerification() {
            window.location.href = "/verification";
        }
    </script>

</body>

</html>
