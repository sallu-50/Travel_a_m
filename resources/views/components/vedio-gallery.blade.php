<section class="container mx-auto px-4 py-8 text-center" id="video-gallery" x-data="videoModal()">
    <h2 class="text-4xl font-bold mb-4 text-gray-800">Video Gallery</h2>
    <p class="text-lg text-gray-600 mb-8">Explore our collection of videos.</p>

    <!-- Video Thumbnails -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <!-- Example video thumbnails -->
        <div class="relative">
            <h2>Video 1</h2>
            <img src="https://via.placeholder.com/300x200" alt="Video Thumbnail"
                class="w-full h-48 object-cover rounded-lg">
            <button @click="openVideoModal('video1')"
                class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 hover:bg-opacity-75 rounded-lg">
                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
            </button>
            <path d="M8 5v14l11-7z"></path>
            </svg>

        </div>
        <div class="relative">
            <h2>Video 1</h2>
            <img src="https://via.placeholder.com/300x200" alt="Video Thumbnail"
                class="w-full h-48 object-cover rounded-lg">
            <button @click="openVideoModal('video1')"
                class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 hover:bg-opacity-75 rounded-lg">
                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
            </button>
            <path d="M8 5v14l11-7z"></path>
            </svg>

        </div>
        <div class="relative">
            <h2>Video 1</h2>
            <img src="https://via.placeholder.com/300x200" alt="Video Thumbnail"
                class="w-full h-48 object-cover rounded-lg">
            <button @click="openVideoModal('video1')"
                class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 hover:bg-opacity-75 rounded-lg">
                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
            </button>
            <path d="M8 5v14l11-7z"></path>
            </svg>

        </div>

        <div class="relative">
            <img src="https://via.placeholder.com/300x200" alt="Video Thumbnail"
                class="w-full h-48 object-cover rounded-lg">
            <button @click="openVideoModal('video2')"
                class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 hover:bg-opacity-75 rounded-lg">
                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"></path>
                </svg>
            </button>
        </div>
        <!-- Add more thumbnails as needed -->
    </div>
    <hr>

    <!-- Video Modal -->
    <div x-show="isVideoModalOpen" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75"
        style="display: none;">
        <div @click.away="closeVideoModal()" class="bg-white rounded-lg p-6 w-11/12 md:w-3/4 lg:w-1/2">
            <button @click="closeVideoModal()" class="text-gray-600 hover:text-gray-800 float-right">X</button>
            <div class="mt-4">
                <template x-if="videoId === 'video1'">
                    <iframe src="https://www.youtube.com/embed/your-video-id-1" class="w-full h-64 md:h-96 rounded-lg"
                        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </template>

                <template x-if="videoId === 'video2'">
                    <iframe src="https://www.youtube.com/embed/your-video-id-2" class="w-full h-64 md:h-96 rounded-lg"
                        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </template>
                <!-- Add more videos as needed with unique IDs -->
            </div>
        </div>
    </div>
</section>
