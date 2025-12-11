<section class="bg-white py-16">

    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Add Your Basic Details</h2>

        <form action="{{ route('therapist.register.store') }}" method="POST" enctype="multipart/form-data"
              class="bg-white shadow-sm ">

            @csrf

            <!-- Profile Pic -->
            <div class="mb-6">
                <label class="text-sm font-medium text-[#4B4B4B] mb-2 block">
                    Profile Picture<span class="text-red-500">*</span>
                </label>

                <div class="flex items-center gap-4">
                    <!-- Preview circle -->
                    <div class="relative">
                        <img id="profile-preview"
                             src="{{ asset('images/profile_placeholder.jpg') }}"
                             alt="Profile preview"
                             class="h-20 w-20 rounded-full object-cover border border-[#D7DCC8] bg-[#FFFCF4] shadow-sm">
                        <!-- small overlay icon -->
                        <span class="absolute bottom-0 right-0 inline-flex h-6 w-6 items-center justify-center rounded-full bg-orange-500 text-white text-xs shadow">
                <i class="fa-solid fa-camera"></i>
            </span>
                    </div>

                    <!-- File input area -->
                    <div class="flex-1">
                        <label
                            for="profile_image"
                            class="flex cursor-pointer items-center justify-between rounded-md border border-dashed border-[#D7DCC8] bg-[#FFFCF4] px-4 py-3 text-sm text-[#4B4B4B] hover:border-orange-400 hover:bg-orange-50 transition"
                        >
                <span class="flex flex-col">
                    <span class="font-medium">Click to upload</span>
                    <span class="text-xs text-gray-500">
                        JPG, PNG, max 2MB
                    </span>
                </span>
                            <span class="inline-flex items-center rounded-md bg-orange-500 px-3 py-1 text-xs font-semibold text-white shadow-sm">
                    Browse
                </span>
                        </label>

                        <input
                            id="profile_image"
                            type="file"
                            name="profile_image"
                            accept="image/*"
                            class="hidden"
                        >

                        @error('profile_image')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Name -->
            <div class="mb-6">
                <label class="text-sm font-medium text-[#4B4B4B]">Your Name*</label>
                <x-text-input class="block w-full mt-1 border-[#D7DCC8] bg-[#FFFCF4] placeholder-gray-300"
                              name="name"
                              value="{{ old('name') }}"
                              placeholder="Enter your name" />

                @error('name')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-6">
                <label class="text-sm font-medium text-[#4B4B4B]">Your Email*</label>
                <x-text-input type="email" class="block w-full mt-1 border-[#D7DCC8] bg-[#FFFCF4] placeholder-gray-300"
                              name="email"
                              value="{{ old('email') }}"
                              placeholder="Enter your email " />

                @error('email')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label class="text-sm font-medium text-[#4B4B4B]">Set Password*</label>
                <x-text-input type="password"
                              name="password"
                              value="{{ old('password') }}"
                              class="block w-full mt-1 border-[#D7DCC8] bg-[#FFFCF4] placeholder-gray-300"
                               placeholder="Enter password" />

                @error('password')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label class="text-sm font-medium text-[#4B4B4B]">Confirm Password*</label>
                <x-text-input type="password"
                              name="password_confirmation"
                              value="{{ old('password_confirmation') }}"
                              class="block w-full mt-1 border-[#D7DCC8] bg-[#FFFCF4] placeholder-gray-300"
                               placeholder="Confirm password" />
            </div>

            <!-- Phone -->
            <div class="mb-6">
                <label class="text-sm font-medium text-[#4B4B4B]">Phone*</label>
                <x-text-input name="phone"
                              value="{{ old('phone') }}"
                              placeholder="Enter Phone Number"
                              class="block w-full mt-1 border-[#D7DCC8] bg-[#FFFCF4] placeholder-gray-300" />
                @error('phone')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Gender -->
            <div class="mb-6">
                <label class="text-sm font-medium text-[#4B4B4B]">Gender*</label>
                <select name="gender"
                        class="block w-full mt-1 border-[#D7DCC8] bg-[#FFFCF4] rounded-md px-3 py-3 placeholder-gray-300">
                    <option disabled class="text-gray-300">Select Gender</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                </select>

                @error('gender')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Professional Title -->
            <div class="mb-6">
                <label class="text-sm font-medium text-[#4B4B4B]">Professional Title*</label>
                <x-text-input name="professional_title"
                              value="{{ old('professional_title') }}"
                              placeholder="e.g. Clinical Psychologist"
                              class="block w-full mt-1 border-[#D7DCC8] bg-[#FFFCF4] placeholder-gray-300" />
                @error('professional_title')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Qualifications -->
            <div class="mb-6">
                <label class="text-sm font-medium text-[#4B4B4B]">Qualifications*</label>
                <textarea name="qualifications"
                          rows="3"
                          class="block w-full border-[#D7DCC8] bg-[#FFFCF4] rounded-md p-3 text-sm placeholder-gray-300"
                          placeholder="e.g. MA in Psychology, PG Diploma">{{ old('qualifications') }}</textarea>
                @error('qualifications')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Upload Qualification Documents -->
            <div class="mb-6">
                <label class="text-sm font-medium text-[#4B4B4B]">Upload Qualification Documents</label>
                <input type="file" id="qualification_documents" name="qualification_documents[]" multiple
                       class="block w-full rounded-md border border-[#D7DCC8] bg-[#FFFCF4] px-4 py-3 text-sm placeholder-gray-300" />
                <p class="text-xs text-gray-500 mt-1">Upload up to 5 files (PDF, JPG, PNG) — 5MB Max</p>

                <ul id="file-list" class="text-sm text-gray-700 mt-2 space-y-1"></ul>

                @error('qualification_documents')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Experience -->
            <div class="mb-6">
                <label class="text-sm font-medium text-[#4B4B4B]">Years Of Experience*</label>
                <x-text-input type="number" name="experience_years"
                              value="{{ old('experience_years') }}"
                              placeholder="e.g. 5"
                              class="block w-full mt-1 border-[#D7DCC8] bg-[#FFFCF4] placeholder-gray-300" />

                @error('experience_years')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bio -->
            <div class="mb-6">
                <label class="text-sm font-medium text-[#4B4B4B]">Brief Bio*</label>
                <textarea name="bio" rows="4"
                          class="block w-full mt-1 border-[#D7DCC8] bg-[#FFFCF4] rounded-md p-3 text-sm placeholder-gray-300"
                          placeholder="Who you are & how you help clients?">{{ old('bio') }}</textarea>

                @error('bio')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Specializations -->
            @php
                $specializationsOptions = [
                    'Addiction',
                    'ADHD',
                    'Anger',
                    'Art Therapy',
                    'Behavior Therapy'
                ];

                $oldSpecializations = old('specializations', []);
            @endphp

                <!-- Specializations -->
            <div class="mb-6">
                <label class="text-sm font-medium text-[#4B4B4B] mb-1 block">
                    Specializations<span class="text-red-500">*</span>
                </label>

                <!-- Wrapper -->
                <div class="relative" id="specializations-wrapper">
                    <!-- Trigger / fake select -->
                    <button
                        type="button"
                        id="specializations-trigger"
                        class="w-full flex items-center justify-between rounded-md border border-[#D7DCC8] bg-[#FFFCF4]
                   px-3 py-2 text-sm text-left shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500"
                    >
            <span id="specializations-label"
                  class="truncate text-gray-700">
                {{ count($oldSpecializations) ? implode(', ', $oldSpecializations) : 'Select Your Specializations' }}
            </span>

                        <svg id="specializations-arrow"
                             class="h-4 w-4 text-gray-400 transition-transform"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M6 9l6 6 6-6" />
                        </svg>
                    </button>

                    <!-- Dropdown panel -->
                    <div
                        id="specializations-dropdown"
                        class="hidden absolute left-0 right-0 mt-2 max-h-64 overflow-y-auto rounded-md border border-[#D7DCC8]
                   bg-white shadow-lg z-20"
                    >
                        <ul class="py-2 text-sm text-gray-700 space-y-1">
                            @foreach($specializationsOptions as $spec)
                                <li class="px-3">
                                    <label class="flex items-center gap-2 py-1 cursor-pointer hover:bg-gray-50 rounded">
                                        <input
                                            type="checkbox"
                                            name="specializations[]"
                                            value="{{ $spec }}"
                                            class="spec-checkbox h-4 w-4 rounded border-gray-300 text-green-600 focus:ring-green-500"
                                            {{ in_array($spec, $oldSpecializations) ? 'checked' : '' }}
                                        >
                                        <span>{{ $spec }}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <p class="text-xs text-gray-500 mt-1">
                    Choose all that apply to your practice.
                </p>

                @error('specializations')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Languages -->
            <div class="mb-6">
                <label class="text-sm font-medium text-[#4B4B4B]">Languages Spoken*</label>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-2 mt-2 text-sm">
                    @foreach(['Tamil', 'English','Hindi','Telugu','Malayalam','Kannada'] as $lang)
                        <label class="inline-flex items-center gap-2">
                            <input type="checkbox" name="languages[]" value="{{ $lang }}"
                                {{ in_array($lang, old('languages', [])) ? 'checked' : '' }}>
                            {{ $lang }}
                        </label>
                    @endforeach
                </div>

                @error('languages')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Fee -->
            <div class="mb-6">
                <label class="text-sm font-medium text-[#4B4B4B]">Fees Per Hour (₹)*</label>
                <x-text-input name="session_fee"
                              value="{{ old('session_fee') }}" placeholder="e.g. 1000"
                              class="block w-full mt-1 border-[#D7DCC8] bg-[#FFFCF4] placeholder-gray-300" />
                @error('session_fee')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <!-- Session Mode -->
            <div class="mb-6">
                <label class="text-sm font-medium text-[#4B4B4B]">Session Mode*</label>
                <div class="flex gap-6 mt-2 text-sm">
                    <label><input type="radio" name="session_mode" value="online" {{ old('session_mode')=='online'?'checked':'' }}> Online</label>
                    <label><input type="radio" name="session_mode" value="in_person" {{ old('session_mode')=='in_person'?'checked':'' }}> In-Person</label>
                    <label><input type="radio" name="session_mode" value="both" {{ old('session_mode')=='both'?'checked':'' }}> Both</label>
                </div>
                @error('session_mode')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Day Wise Slots -->
            <div class="mb-10">
                <label class="text-sm font-medium text-[#4B4B4B]">Available Days & Time Slots*</label>

                @php
                    $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
                    $oldSlots = old('available_time_slots', []);
                    $oldDays = old('available_days', []);
                @endphp

                <div class="mt-4 space-y-5">
                    @foreach($days as $day)
                        <div class="border border-[#D7DCC8] rounded-xl p-4 bg-[#FFFCF4] shadow-sm">

                            <div class="flex items-center justify-between mb-3">
                                <label class="flex items-center gap-3">
                                    <input type="checkbox"
                                           class="day-checkbox accent-[#B2C58B]"
                                           data-day="{{ $day }}"
                                           name="available_days[]"
                                           value="{{ $day }}"
                                        {{ in_array($day, $oldDays) ? 'checked' : '' }}>
                                    <span class="font-semibold text-gray-700">{{ $day }}</span>
                                </label>

                                <div class="flex items-center gap-3">
                                    <button type="button"
                                            class="copy-btn text-xs bg-white shadow-md text-gray-600 px-3 py-1 rounded-full
                                {{ in_array($day, $oldDays) ? 'flex' : 'hidden' }} items-center gap-1"
                                            data-day="{{ $day }}">
                                        <i class="fa-regular fa-copy text-sm"></i>
                                        Copy to All
                                    </button>

                                    <button type="button"
                                            class="add-range text-xs bg-[#f7921e] text-white px-3 py-1 rounded-full
                                {{ in_array($day, $oldDays) ? '' : 'disabled opacity-40' }}"
                                            data-day="{{ $day }}"
                                        {{ in_array($day, $oldDays) ? '' : 'disabled' }}>
                                        + Add Slot
                                    </button>
                                </div>
                            </div>

                            <div class="day-slots space-y-3" data-day="{{ $day }}">
                                @if(isset($oldSlots[$day]))
                                    @foreach($oldSlots[$day] as $index => $slot)
                                        <div class="slot-card flex items-center justify-between bg-white rounded-lg border border-[#FFFCF4] p-3 shadow-sm">
                                            <span class="slot-number text-xs font-bold text-gray-600">{{ $index+1 }}</span>

                                            <div class="flex items-center gap-2">
                                                <input type="time"
                                                       name="available_time_slots[{{ $day }}][{{ $index }}][start]"
                                                       value="{{ $slot['start'] ?? '' }}"
                                                       class="start border rounded-md bg-[#FAFBF7] p-1.5 text-sm outline-none">

                                                <span class="text-gray-500">→</span>

                                                <input type="time"
                                                       name="available_time_slots[{{ $day }}][{{ $index }}][end]"
                                                       value="{{ $slot['end'] ?? '' }}"
                                                       class="end border rounded-md bg-[#FAFBF7] p-1.5 text-sm outline-none">
                                            </div>

                                            <button type="button" class="delete-slot text-red-500 hover:text-red-700 text-sm">✕</button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <p class="text-xs text-gray-500 mt-2">
                    Select a day → Add one or more time slots → Ensure times don’t overlap
                </p>
            </div>

            <template id="premium-slot-template">
                <div class="slot-card flex items-center justify-between bg-white rounded-lg border border-[#FFFCF4] p-3 shadow-sm transition transform opacity-0 translate-y-2">
                    <span class="slot-number text-xs font-bold text-gray-600"></span>

                    <div class="flex items-center gap-2">
                        <input type="time" class="start border rounded-md bg-[#FAFBF7] p-1.5 text-sm outline-none">
                        <span class="text-gray-500">→</span>
                        <input type="time" class="end border rounded-md bg-[#FAFBF7] p-1.5 text-sm outline-none">
                    </div>

                    <button type="button" class="delete-slot text-red-500 hover:text-red-700 text-sm">
                        ✕
                    </button>
                </div>
            </template>


            <!-- City,  Pin Code -->
            <div class="grid grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="text-sm font-medium text-[#4B4B4B]">City*</label>
                    <x-text-input name="city"
                                  value="{{ old('city') }}"
                                  class="block w-full mt-1 border-[#D7DCC8] bg-[#FAFBF7]" />
                    @error('city')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="text-sm font-medium text-[#4B4B4B]">Pin Code*</label>
                    <x-text-input name="pin_code"
                                  value="{{ old('pin_code') }}"
                                  class="block w-full mt-1 border-[#D7DCC8] bg-[#FAFBF7]" />
                    @error('pin_code')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <!-- State & Country -->

            <div class="grid grid-cols-2 gap-6 mb-6">

            <div>
                <label class="text-sm font-medium text-[#4B4B4B]">State*</label>
                <x-text-input name="state"
                              value="{{ old('state') }}"
                              class="block w-full mt-1 border-[#D7DCC8] bg-[#FAFBF7]" />
                @error('state')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Country -->
            <div class="mb-6">
                <label class="text-sm font-medium text-[#4B4B4B]">Country*</label>
                <x-text-input name="country"
                              value="{{ old('country') }}"
                              class="block w-full mt-1 border-[#D7DCC8] bg-[#FAFBF7]" />
                @error('country')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>



            </div>


            <!-- Terms -->
{{--            <label class="flex gap-2 mb-6 text-sm">--}}
{{--                <input type="checkbox" name="accept_terms" required>--}}
{{--                I have read and agree with Terms and Conditions.--}}
{{--            </label>--}}

            <button class="max-w-6xl bg-[#f7921e] hover:bg-[#df7d0e] text-white py-3 px-10 font-semibold rounded-full">
                Submit
            </button>

        </form>

    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
        const template = document.getElementById('premium-slot-template');

        function animateSlot(el){
            requestAnimationFrame(() => {
                el.classList.add("opacity-100","translate-y-0");
            });
        }

        function addSlot(day) {
            const container = document.querySelector(`.day-slots[data-day="${day}"]`);
            const index = container.children.length;
            const clone = template.content.cloneNode(true);

            const slot = clone.querySelector('.slot-card');
            const startInput = clone.querySelector('.start');
            const endInput = clone.querySelector('.end');
            const numberLabel = clone.querySelector('.slot-number');

            numberLabel.textContent = `Slot ${index+1}`;

            startInput.name = `available_time_slots[${day}][${index}][start]`;
            endInput.name   = `available_time_slots[${day}][${index}][end]`;

            // Auto-correct end time if earlier
            endInput.addEventListener("change", () => {
                if(endInput.value <= startInput.value){
                    endInput.value = "";
                    alert("End time should be later than start time!");
                }
            });

            clone.querySelector('.delete-slot').addEventListener('click', () => {
                slot.remove();
                renumber(day);
            });

            container.appendChild(slot);
            animateSlot(slot);
            renumber(day);
        }

        function renumber(day){
            document.querySelectorAll(`.day-slots[data-day="${day}"] .slot-number`)
                .forEach((el,i)=> el.textContent = `Slot ${i+1}`);
        }

        // Enable controls if day checked
        document.querySelectorAll('.day-checkbox').forEach(cb => {
            cb.addEventListener('change', function(){
                const day = this.dataset.day;
                const addBtn = document.querySelector(`.add-range[data-day="${day}"]`);
                const copyBtn= document.querySelector(`.copy-btn[data-day="${day}"]`);
                const container = document.querySelector(`.day-slots[data-day="${day}"]`);

                if(this.checked){
                    addBtn.disabled = false;
                    copyBtn.classList.remove("hidden");
                    if(container.children.length === 0) addSlot(day);
                } else {
                    addBtn.disabled = true;
                    copyBtn.classList.add("hidden");
                    container.innerHTML = "";
                }
            });
        });

        // Add slot handler
        document.querySelectorAll('.add-range').forEach(btn=>{
            btn.addEventListener('click', ()=> addSlot(btn.dataset.day));
        });

        // Copy slots to all days
        document.querySelectorAll('.copy-btn').forEach(btn=>{
            btn.addEventListener('click', function(){
                const sourceDay = this.dataset.day;
                const srcContainer = document.querySelector(`.day-slots[data-day="${sourceDay}"]`);

                let data = [];
                srcContainer.querySelectorAll(".slot-card").forEach(slot=>{
                    data.push({
                        start: slot.querySelector(".start").value,
                        end  : slot.querySelector(".end").value
                    });
                });

                days.forEach(day=>{
                    if(day !== sourceDay){
                        const cb = document.querySelector(`.day-checkbox[data-day="${day}"]`);
                        cb.checked = true;
                        cb.dispatchEvent(new Event('change'));
                        const targetContainer = document.querySelector(`.day-slots[data-day="${day}"]`);
                        targetContainer.innerHTML = "";
                        data.forEach((range,i)=>{
                            addSlot(day);
                            targetContainer.children[i].querySelector(".start").value = range.start;
                            targetContainer.children[i].querySelector(".end").value = range.end;
                        });
                    }
                });
                alert("Slots copied!");
            });
        });

    });
</script>

<!-- Script for Specializations Dropdown -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const wrapper   = document.getElementById('specializations-wrapper');
        const trigger   = document.getElementById('specializations-trigger');
        const dropdown  = document.getElementById('specializations-dropdown');
        const labelEl   = document.getElementById('specializations-label');
        const arrowEl   = document.getElementById('specializations-arrow');
        const hiddenBox = document.getElementById('specializations-hidden');

        function getCheckedValues() {
            return Array.from(dropdown.querySelectorAll('input[type="checkbox"]:checked'))
                .map(cb => cb.value);
        }

        function updateLabelAndHidden() {
            const values = getCheckedValues();

            // label text
            if (values.length === 0) {
                labelEl.textContent = 'Select Your Specializations';
            } else {
                labelEl.textContent = values.join(', ');
            }

            // hidden inputs
            hiddenBox.innerHTML = '';
            values.forEach(v => {
                const input = document.createElement('input');
                input.type  = 'hidden';
                input.name  = 'specializations[]';
                input.value = v;
                hiddenBox.appendChild(input);
            });
        }

        function openDropdown() {
            dropdown.classList.remove('hidden');
            arrowEl.classList.add('rotate-180');
        }

        function closeDropdown() {
            dropdown.classList.add('hidden');
            arrowEl.classList.remove('rotate-180');
        }

        trigger.addEventListener('click', function () {
            const isOpen = !dropdown.classList.contains('hidden');
            if (isOpen) {
                closeDropdown();
            } else {
                openDropdown();
            }
        });

        // When any checkbox changes
        dropdown.addEventListener('change', function (e) {
            if (e.target.matches('input[type="checkbox"]')) {
                updateLabelAndHidden();
            }
        });

        // Click outside to close
        document.addEventListener('click', function (e) {
            if (!wrapper.contains(e.target)) {
                closeDropdown();
            }
        });

        // Init (in case of old values pre-checked from backend)
        updateLabelAndHidden();
    });
</script>

<!-- Script for Profile Picture -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input   = document.getElementById('profile_image');
        const preview = document.getElementById('profile-preview');

        if (!input) return;

        input.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (!file) return;

            if (!file.type.startsWith('image/')) {
                alert('Please select an image file');
                input.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function (event) {
                preview.src = event.target.result;
            };
            reader.readAsDataURL(file);
        });
    });
</script>

<!-- Script for Qualification Documents -->
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const input = document.getElementById('qualification_documents');
        const fileListUI = document.getElementById('file-list');

        // To keep persistent files list
        let filesArray = [];

        input.addEventListener('change', function (event) {
            let selectedFiles = Array.from(event.target.files);

            // Append instead of replace
            filesArray = [...filesArray, ...selectedFiles];

            // Prevent storing more than 5 files
            if (filesArray.length > 5) {
                Swal.fire({
                    icon: 'error',
                    title: 'Maximum 5 documents allowed',
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 3000
                });

                filesArray = filesArray.slice(0, 5);
            }

            // Update UI list
            fileListUI.innerHTML = '';
            filesArray.forEach(file => {
                const li = document.createElement('li');
                li.textContent = file.name;
                fileListUI.appendChild(li);
            });

            // Update real input files
            const dataTransfer = new DataTransfer();
            filesArray.forEach(file => dataTransfer.items.add(file));
            input.files = dataTransfer.files;
        });

    });
</script>




