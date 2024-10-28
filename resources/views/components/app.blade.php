<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- icon link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Vite CSS -->
    @vite('resources/css/app.css')
    {{-- font awsome link  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100 font-sans antialiased">
    {{-- nav start --}}
    <x-nav>
    </x-nav>
    {{-- nav end --}}
    {{-- new section start --}}
    <x-afternav>
    </x-afternav>
    {{-- new section end --}}

    {{-- staus check section start --}}
    <!-- Application Status Section -->
    <x-status-check>
    </x-status-check>
    {{-- staus check section end --}}
    {{-- vedio gallery section --}}
    <x-vedio-gallery></x-vedio-gallery>

    {{-- footer section --}}
    <x-footer>
    </x-footer>
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
    </script>

</body>

</html>
