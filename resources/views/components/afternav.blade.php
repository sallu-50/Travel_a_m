<!-- Main Section with Register Button -->
<section x-data="{ isModalOpen: false }" class="px-4 py-8 text-center bg-gray-300">
    <h2 class="text-4xl font-bold mb-4 text-gray-800">Join Us for Hajj, Umrah, or Work Opportunities!</h2>
    <p class="text-lg text-gray-600 mb-8">Experience spiritual journeys and rewarding work opportunities with us.</p>
    <button @click="isModalOpen = true" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">Register
        Now</button>

    <!-- Modal -->
    <div x-show="isModalOpen" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75">
        <div @click.away="isModalOpen = false" class="bg-white rounded-lg p-6 w-96">
            <h3 class="text-2xl font-bold mb-4">Choose an Option</h3>
            <div class="space-y-4">
                <!-- Option Buttons -->
                <a href="{{ route('register.hajj') }}"
                    class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg block text-center hover:bg-blue-600">Hajj</a>
                <a href="{{ route('register.umrah') }}"
                    class="w-full bg-green-500 text-white px-4 py-2 rounded-lg block text-center hover:bg-green-600">Umrah</a>
                <a href="{{ route('register.work') }}"
                    class="w-full bg-indigo-500 text-white px-4 py-2 rounded-lg block text-center hover:bg-indigo-600">Work</a>
            </div>
        </div>
    </div>
</section>

<hr class="border-t-2 border-black my-8">
