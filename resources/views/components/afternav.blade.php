<!-- Main Section with Register Button -->
<section x-data="{ isModalOpen: false, selectedForm: null, step: 1 }" class="px-4 py-8 text-center bg-gray-300 ">
    <h2 class="text-4xl font-bold mb-4 text-gray-800">Join Us for Hajj, Umrah, or Work Opportunities!</h2>
    <p class="text-lg text-gray-600 mb-8">Experience spiritual journeys and rewarding work opportunities with us.</p>
    <button @click="isModalOpen = true" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">Register
        Now</button>

    <!-- Modal -->
    <div x-show="isModalOpen" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75">
        <div @click.away="isModalOpen = false; selectedForm = null; step = 1;" class="bg-white rounded-lg p-6 w-96">
            <h3 class="text-2xl font-bold mb-4">Choose an Option</h3>
            <div class="space-y-4">
                <!-- Option Buttons -->
                <button @click="selectedForm = 'hajj'"
                    class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Hajj</button>
                <button @click="selectedForm = 'umrah'"
                    class="w-full bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Umrah</button>
                <button @click="selectedForm = 'work'"
                    class="w-full bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600">Work</button>
            </div>

            <!-- Registration Form for Hajj, Umrah, and Work -->
            <template x-if="['hajj', 'umrah', 'work'].includes(selectedForm)">
                <div>
                    <!-- Step 1: Registration Form -->
                    <form x-show="step === 1" class="mt-6 space-y-4" @submit.prevent="step = 2">
                        <h4 class="text-xl font-semibold mb-2 capitalize" x-text="`${selectedForm} Registration`"></h4>

                        <div class="relative mb-4">
                            <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" placeholder="Full Name"
                                class="w-full pl-10 pr-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="relative mb-4">
                            <i
                                class="fas fa-user-tie absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" placeholder="Father's Name"
                                class="w-full pl-10 pr-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="relative mb-4">
                            <i
                                class="fas fa-female absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" placeholder="Mother's Name"
                                class="w-full pl-10 pr-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="relative mb-4">
                            <i
                                class="fas fa-phone-alt absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="tel" placeholder="Phone Number"
                                class="w-full pl-10 pr-4 py-2 border rounded-lg" required>
                        </div>

                        <div class="relative mb-4">
                            <i
                                class="fas fa-passport absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" placeholder="Passport Number"
                                class="w-full pl-10 pr-4 py-2 border rounded-lg" required>
                        </div>
                        <button type="submit"
                            class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Submit</button>
                    </form>

                    <!-- Step 2: Verification Form -->
                    <div x-show="step === 2" class="mt-6 space-y-4 text-center">
                        <h4 class="text-xl font-semibold mb-2">Two-Step Verification</h4>
                        <p class="text-gray-600 mb-4">Please check your phone and enter the code for a verification code
                            to
                            complete your registration.</p>
                        <input type="text" placeholder="Enter Verification Code"
                            class="w-full px-4 py-2 border rounded-lg" required>
                        <button type="button" @click="isModalOpen = false; step = 1; selectedForm = null;"
                            class="w-full bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Verify</button>
                    </div>
                </div>
            </template>
        </div>
    </div>
</section>

<hr class="border-t-2 border-black my-8">
