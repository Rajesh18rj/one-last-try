<div class="p-6 w-full">

    ```
    <!-- ================= HEADER ================= -->
    <div class="flex items-center gap-4 mb-8">

        <div class="w-12 h-12 rounded-2xl bg-pink-100 text-pink-600 flex items-center justify-center shadow-sm">
            <i class="fa-solid fa-user-pen text-lg"></i>
        </div>

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Edit Therapist Profile
            </h1>
            <div class="w-24 h-1 bg-pink-500 rounded-full mt-2"></div>
        </div>

    </div>


    <div class="bg-white rounded-2xl shadow border p-6 max-w-4xl">

        <form method="POST" action="{{ route('therapist.profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-2 gap-6">

                <!-- NAME -->
                <div>
                    <label class="text-sm font-medium text-gray-600">Name</label>
                    <input type="text" name="name"
                           value="{{ auth()->user()->name }}"
                           class="w-full mt-1 border border-gray-200 rounded-xl px-4 py-2 focus:ring-2 focus:ring-pink-400">
                </div>

                <!-- EMAIL -->
                <div>
                    <label class="text-sm font-medium text-gray-600">Email</label>
                    <input type="email" name="email"
                           value="{{ auth()->user()->email }}"
                           class="w-full mt-1 border border-gray-200 rounded-xl px-4 py-2 focus:ring-2 focus:ring-pink-400">
                </div>

                <!-- PHONE -->
                <div>
                    <label class="text-sm font-medium text-gray-600">Phone</label>
                    <input type="text" name="phone"
                           value="{{ auth()->user()->phone }}"
                           class="w-full mt-1 border border-gray-200 rounded-xl px-4 py-2 focus:ring-2 focus:ring-pink-400">
                </div>

                <!-- GENDER -->
                <div>
                    <label class="text-sm font-medium text-gray-600">Gender</label>

                    <select name="gender"
                            class="w-full mt-1 border border-gray-200 rounded-xl px-4 py-2 focus:ring-2 focus:ring-pink-400">

                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>

                    </select>
                </div>

                <!-- PROFESSIONAL TITLE -->
                <div>
                    <label class="text-sm font-medium text-gray-600">
                        Professional Title
                    </label>

                    <input type="text" name="professional_title"
                           value="{{ $profile->professional_title ?? '' }}"
                           class="w-full mt-1 border border-gray-200 rounded-xl px-4 py-2 focus:ring-2 focus:ring-pink-400">
                </div>

                <!-- EXPERIENCE -->
                <div>
                    <label class="text-sm font-medium text-gray-600">
                        Experience (Years)
                    </label>

                    <input type="number" name="experience_years"
                           value="{{ $profile->experience_years ?? '' }}"
                           class="w-full mt-1 border border-gray-200 rounded-xl px-4 py-2 focus:ring-2 focus:ring-pink-400">
                </div>

                <!-- SESSION MODE -->
                <div>
                    <label class="text-sm font-medium text-gray-600">
                        Session Mode
                    </label>

                    <select name="session_mode"
                            class="w-full mt-1 border border-gray-200 rounded-xl px-4 py-2 focus:ring-2 focus:ring-pink-400">

                        <option value="online">Online</option>
                        <option value="in_person">In Person</option>
                        <option value="both">Both</option>

                    </select>
                </div>

                <!-- SESSION FEE -->
                <div>
                    <label class="text-sm font-medium text-gray-600">
                        Session Fee
                    </label>

                    <input type="number" name="session_fee"
                           value="{{ $profile->session_fee ?? '' }}"
                           class="w-full mt-1 border border-gray-200 rounded-xl px-4 py-2 focus:ring-2 focus:ring-pink-400">
                </div>

                <!-- CITY -->
                <div>
                    <label class="text-sm font-medium text-gray-600">
                        City
                    </label>

                    <input type="text" name="city"
                           value="{{ $profile->city ?? '' }}"
                           class="w-full mt-1 border border-gray-200 rounded-xl px-4 py-2 focus:ring-2 focus:ring-pink-400">
                </div>

                <!-- STATE -->
                <div>
                    <label class="text-sm font-medium text-gray-600">
                        State
                    </label>

                    <input type="text" name="state"
                           value="{{ $profile->state ?? '' }}"
                           class="w-full mt-1 border border-gray-200 rounded-xl px-4 py-2 focus:ring-2 focus:ring-pink-400">
                </div>

            </div>

            <!-- BIO -->
            <div class="mt-6">
                <label class="text-sm font-medium text-gray-600">
                    Bio
                </label>

                <textarea name="bio" rows="4"
                          class="w-full mt-1 border border-gray-200 rounded-xl px-4 py-2 focus:ring-2 focus:ring-pink-400">{{ $profile->bio ?? '' }}</textarea>
            </div>

            <!-- PROFILE IMAGE -->
            <div class="mt-6">
                <label class="text-sm font-medium text-gray-600">
                    Profile Image
                </label>

                <input type="file" name="profile_image"
                       class="mt-1 block w-full text-sm text-gray-600">
            </div>

            <!-- SAVE BUTTON -->
            <div class="mt-6 flex justify-end">
                <button type="submit"
                        class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-2 rounded-xl shadow-sm flex items-center gap-2">

                    <i class="fa-solid fa-save"></i>
                    Save Profile

                </button>
            </div>

        </form>

    </div>
    ```

</div>
