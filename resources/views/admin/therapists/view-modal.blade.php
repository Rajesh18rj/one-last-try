<div id="viewModal"
     class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50 p-6">

    <div class="bg-white/90 backdrop-blur-xl border border-white/40 rounded-[28px] shadow-[0_20px_70px_rgba(0,0,0,0.18)] w-full max-w-6xl overflow-hidden h-[90vh] flex flex-col">

        <!-- Header -->
        <div class="flex justify-between items-center px-10 py-6 border-b border-slate-200/70 bg-white/60 backdrop-blur-md">
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">
                Therapist Profile Preview
            </h2>
            <button onclick="closeViewModal()"
                    class="w-9 h-9 rounded-full flex items-center justify-center text-slate-500 hover:bg-slate-100 hover:text-slate-800 transition">
                ✕
            </button>
        </div>

        <!-- Scrollable Body -->
        <div class="overflow-y-auto p-8 flex-1">

            <div class="flex flex-col md:flex-row gap-8">

                <!-- LEFT -->
                <div class="md:w-1/3">

                    <div class="w-52 h-52 rounded-3xl overflow-hidden bg-slate-100 shadow-lg ring-4 ring-white mx-auto">
                        <img id="viewImage"
                             src=""
                             class="w-full h-full object-cover hover:scale-105 transition duration-500"
                             alt="Therapist">
                    </div>

                    <h3 class="mt-5 text-2xl font-bold text-slate-900 text-center">
                        <span id="viewName"></span>
                    </h3>

                    <p id="viewTitle"
                       class="text-emerald-600 font-semibold mt-1 text-center"></p>

                    <div class="mt-5 space-y-3">
                        <!-- Gender -->
                        <div class="flex items-center gap-3 bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 shadow-sm hover:-translate-y-0.5 hover:shadow-md transition duration-200">
                            <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-pink-100 text-pink-600">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="text-sm">
                                <p class="text-slate-400 text-xs">Gender</p>
                                <p class="font-semibold text-slate-700">
                                    <span id="viewGender"></span>
                                </p>
                            </div>
                        </div>

                        <!-- Qualifications -->
                        <div class="flex items-start gap-3 bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 shadow-sm hover:-translate-y-0.5 hover:shadow-md transition duration-200">
                            <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-purple-100 text-purple-600 mt-1">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </div>

                            <div class="text-sm">
                                <p class="text-slate-400 text-xs">Qualifications</p>
                                <p id="viewQualifications" class="font-semibold text-slate-700 leading-relaxed"></p>
                            </div>
                        </div>

                        <!-- Experience -->
                        <div class="flex items-center gap-3 bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 shadow-sm hover:-translate-y-0.5 hover:shadow-md transition duration-200">
                            <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-indigo-100 text-indigo-600">
                                <i class="fa-solid fa-briefcase"></i>
                            </div>
                            <div class="text-sm">
                                <p class="text-slate-400 text-xs">Experience</p>
                                <p class="font-semibold text-slate-700">
                                    <span id="viewExp"></span> years
                                </p>
                            </div>
                        </div>

                        <!-- Languages -->
                        <div class="flex items-start gap-3 bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 shadow-sm hover:-translate-y-0.5 hover:shadow-md transition duration-200">
                            <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-amber-100 text-amber-600 mt-1">
                                <i class="fa-solid fa-language"></i>
                            </div>

                            <div class="text-sm">
                                <p class="text-slate-400 text-xs">Languages</p>
                                <p id="viewLanguages" class="font-semibold text-slate-700"></p>
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="flex items-center gap-3 bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 shadow-sm hover:-translate-y-0.5 hover:shadow-md transition duration-200">
                            <div class="w-8 h-8 flex items-center justify-center rounded-lg bg-emerald-100 text-emerald-600">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="text-sm">
                                <p class="text-slate-400 text-xs">Location</p>
                                <p class="font-semibold text-slate-700">
                                    <span id="viewLocation"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="my-6 pt-6 border-t border-slate-200">
                        <p class="text-xs font-semibold tracking-widest uppercase text-slate-400">
                            Account Info
                        </p>
                    </div>

                    <div class="mt-2 space-y-3">
                        <!-- Plan -->
                        <div class="flex items-center justify-between bg-white border border-slate-200 rounded-xl px-4 py-3 shadow-sm hover:shadow-md transition">

                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-lg flex items-center justify-center bg-gradient-to-br from-indigo-500 to-blue-500 text-white">
                                    <i class="fa-solid fa-crown text-sm"></i>
                                </div>

                                <div>
                                    <p class="text-xs text-slate-400 mb-2">Subscription Plan</p>
                                    <p class="text-sm font-semibold text-slate-700">
                                        <span id="viewPlan"></span>
                                    </p>
                                </div>
                            </div>

                        </div>

                        <!-- Status -->
                        <div class="flex items-center justify-between bg-white border border-slate-200 rounded-xl px-4 py-3 shadow-sm hover:shadow-md transition">

                            <div class="flex items-center gap-3">
                                <div id="statusBadge" class="w-9 h-9 rounded-lg flex items-center justify-center bg-slate-100 text-slate-600">
                                    <i id="statusIcon" class="fa-solid fa-circle text-sm"></i>
                                </div>

                                <div>
                                    <p class="text-xs text-slate-400 mb-2">Approval Status</p>
                                    <p class="text-sm font-semibold text-slate-700">
                                        <span id="viewStatus"></span>
                                    </p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- RIGHT -->
                <div class="md:w-2/3 space-y-6">

                    <!-- Contact Info -->
                    <div class="bg-white/80 backdrop-blur-lg p-6 rounded-3xl border border-slate-200 shadow-md hover:shadow-xl transition duration-300">
                        <h4 class="text-lg font-bold text-slate-800 mb-4">
                            Contact Info
                        </h4>

                        <div class="grid md:grid-cols-2 gap-4 text-sm">

                            <!-- Email -->
                            <div class="flex items-center gap-4 bg-slate-50 border border-slate-200 rounded-2xl px-4 py-4 shadow-sm hover:-translate-y-0.5 hover:shadow-md transition duration-200">

                                <div class="w-11 h-11 rounded-xl flex items-center justify-center bg-blue-100 text-blue-600">
                                    <i class="fa-solid fa-envelope text-base"></i>
                                </div>

                                <div class="min-w-0">
                                    <p class="text-xs text-slate-400">Email Address</p>
                                    <p id="viewEmail" class="font-semibold text-slate-700 break-all"></p>
                                </div>

                            </div>

                            <!-- Phone -->
                            <div class="flex items-center gap-4 bg-slate-50 border border-slate-200 rounded-2xl px-4 py-4 shadow-sm hover:-translate-y-0.5 hover:shadow-md transition duration-200">

                                <div class="w-11 h-11 rounded-xl flex items-center justify-center bg-emerald-100 text-emerald-600">
                                    <i class="fa-solid fa-phone text-base"></i>
                                </div>

                                <div class="min-w-0">
                                    <p class="text-xs text-slate-400">Phone Number</p>
                                    <p id="viewPhone" class="font-semibold text-slate-700"></p>
                                </div>

                            </div>

                        </div>
                    </div>

                    <!-- Session Info -->
                    <div class="bg-white/80 backdrop-blur-lg p-6 rounded-3xl border border-slate-200 shadow-md hover:shadow-xl transition duration-300">
                        <h4 class="text-lg font-bold text-slate-800 mb-4">
                            Session Information
                        </h4>

                        <div class="grid grid-cols-2 gap-4 text-sm">

                            <div>
                                <p class="text-[#A8916C]">Fee per session</p>
                                <p class="text-xl font-bold text-emerald-600 tracking-tight">
                                    ₹ <span id="viewFee"></span>
                                </p>
                            </div>

                            <div>
                                <p class="text-[#A8916C]">Session Mode</p>
                                <p id="viewMode"
                                   class="font-semibold text-[#493F2C]"></p>
                            </div>

                        </div>
                    </div>

                    <!-- About -->
                    <div class="bg-white/80 backdrop-blur-lg p-6 rounded-3xl border border-slate-200 shadow-md hover:shadow-xl transition duration-300">
                        <h4 class="text-lg font-bold text-slate-800 mb-4">
                            About Therapist
                        </h4>
                        <p id="viewBio"
                           class="text-sm text-[#6F644C] leading-relaxed"></p>
                    </div>

                    <!-- Specializations -->
                    <div class="bg-white/80 backdrop-blur-lg p-6 rounded-3xl border border-slate-200 shadow-md hover:shadow-xl transition duration-300">
                        <h4 class="text-lg font-bold text-slate-800 mb-4">
                            Specializations
                        </h4>
                        <div id="viewSpecializations" class="flex flex-wrap gap-2"></div>
                    </div>

                    <!-- Qualification Documents -->
                    <div class="bg-white/80 backdrop-blur-lg p-6 rounded-3xl border border-slate-200 shadow-md hover:shadow-xl transition duration-300">
                        <h4 class="text-lg font-bold text-slate-800 mb-4">
                            Qualification Documents
                        </h4>
                        <div id="viewDocuments" class="space-y-2 text-sm"></div>
                    </div>

                    <!-- Availability -->
                    <div class="bg-white/80 backdrop-blur-lg p-6 rounded-3xl border border-slate-200 shadow-md hover:shadow-xl transition duration-300">
                        <h4 class="text-lg font-bold text-slate-800 mb-5 flex items-center gap-2">
                            <i class="fa-solid fa-calendar-days text-indigo-400"></i>
                            Availability
                        </h4>

                        <div id="viewAvailability" class="text-sm text-[#6F644C] space-y-2"></div>
                    </div>

                </div>

            </div>

        </div>

        <!-- Footer -->
        <div class="px-8 py-5 border-t border-slate-200 flex justify-end gap-4 bg-white/70 backdrop-blur">
            <button onclick="closeViewModal()"
                    class="px-6 py-2.5 rounded-full bg-slate-900 text-white text-sm font-semibold hover:bg-slate-800 transition shadow">
                Close
            </button>
        </div>

    </div>
</div>
@push('modalscripts')
    <script>
        (function(){

            const modal = document.getElementById('viewModal');

            // Cache DOM elements (performance boost)
            const el = {
                name: document.getElementById('viewName'),
                email: document.getElementById('viewEmail'),
                phone: document.getElementById('viewPhone'),
                title: document.getElementById('viewTitle'),
                exp: document.getElementById('viewExp'),
                fee: document.getElementById('viewFee'),
                bio: document.getElementById('viewBio'),
                qualifications: document.getElementById('viewQualifications'),
                image: document.getElementById('viewImage'),
                gender: document.getElementById('viewGender'),
                location: document.getElementById('viewLocation'),
                mode: document.getElementById('viewMode'),
                status: document.getElementById('viewStatus'),
                languages: document.getElementById('viewLanguages'),
                specializations: document.getElementById('viewSpecializations'),
                documents: document.getElementById('viewDocuments'),
                availability: document.getElementById('viewAvailability'),
                plan: document.getElementById('viewPlan'),

                statusBadge: document.getElementById('statusBadge'),
                statusIcon: document.getElementById('statusIcon'),
            };

            const text = (value, fallback = '-') => value ?? fallback;

            const therapistCache = {};
            let loading = false;

            document.addEventListener('click', async function(e){

                const btn = e.target.closest('.view-btn');
                if(!btn || loading) return;

                const id = btn.dataset.id;
                loading = true;

                openModal();
                el.name.textContent = "Loading...";

                try{

                    if(therapistCache[id]){
                        fillModal(therapistCache[id]);
                        loading = false;
                        return;
                    }

                    const response = await fetch(`/admin/therapists/${id}`);
                    const data = await response.json();

                    therapistCache[id] = data;

                    fillModal(data);

                }catch(error){
                    console.error(error);
                    alert('Failed to load therapist data');
                }finally{
                    loading = false;
                }

            });

            function fillModal(data){

                el.name.textContent = text(data.name);
                el.email.textContent = text(data.email);
                el.phone.textContent = text(data.phone);
                el.title.textContent = text(data.title);
                el.exp.textContent = data.experience ?? 0;
                el.fee.textContent = data.fee ?? 0;
                el.bio.textContent = text(data.bio);
                el.qualifications.textContent = text(data.qualifications);

                el.image.src = data.image
                    ? `/storage/${data.image}`
                    : '/images/profile_placeholder.jpg';

                el.gender.textContent = data.gender
                    ? data.gender.charAt(0).toUpperCase() + data.gender.slice(1)
                    : '-';

                el.location.textContent = `${data.city ?? '-'}, ${data.state ?? '-'}`;

                const modeMap = {
                    online: 'Online',
                    in_person: 'In-Person',
                    both: 'Online & In-Person'
                };
                el.mode.textContent = modeMap[data.mode] ?? '-';

        //Status
                const status = (data.status || '').toLowerCase();

                el.status.textContent = status
                    ? status.charAt(0).toUpperCase() + status.slice(1)
                    : '-';

            // Reset classes first
                el.statusBadge.className =
                    'w-9 h-9 rounded-lg flex items-center justify-center';

            // Apply color based on status
                if (status === 'approved') {

                    el.statusBadge.classList.add('bg-emerald-100', 'text-emerald-600');
                    el.statusIcon.className = 'fa-solid fa-circle-check text-sm';

                }
                else if (status === 'pending') {

                    el.statusBadge.classList.add('bg-amber-100', 'text-amber-600');
                    el.statusIcon.className = 'fa-solid fa-clock text-sm';

                }
                else if (status === 'rejected') {

                    el.statusBadge.classList.add('bg-red-100', 'text-red-600');
                    el.statusIcon.className = 'fa-solid fa-circle-xmark text-sm';

                }
                else {

                    el.statusBadge.classList.add('bg-slate-100', 'text-slate-600');
                    el.statusIcon.className = 'fa-solid fa-circle text-sm';

                }
                // Languages
                el.languages.textContent =
                    Array.isArray(data.languages) && data.languages.length
                        ? data.languages.join(', ')
                        : '-';

                // Specializations
                el.specializations.innerHTML =
                    Array.isArray(data.specializations) && data.specializations.length
                        ? data.specializations.map(spec =>
                            `<span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">${spec}</span>`
                        ).join('')
                        : '<span class="text-gray-400">No specializations</span>';

                el.documents.innerHTML =
                    Array.isArray(data.documents) && data.documents.length
                        ? data.documents.map(doc => {

                            const fileName = doc.split('/').pop();

                            // detect file type
                            const extension = fileName.split('.').pop().toLowerCase();

                            let icon = 'fa-file';
                            let color = 'text-slate-600 bg-slate-100';

                            if (['pdf'].includes(extension)) {
                                icon = 'fa-file-pdf';
                                color = 'text-red-600 bg-red-100';
                            }
                            else if (['jpg','jpeg','png','webp'].includes(extension)) {
                                icon = 'fa-file-image';
                                color = 'text-emerald-600 bg-emerald-100';
                            }
                            else if (['doc','docx'].includes(extension)) {
                                icon = 'fa-file-word';
                                color = 'text-blue-600 bg-blue-100';
                            }

                            return `
                            <a href="/storage/${doc}" target="_blank"
                               class="group flex items-center justify-between gap-4 p-4 rounded-2xl border border-slate-200 bg-white hover:shadow-md hover:border-indigo-300 transition duration-200">

                                <div class="flex items-center gap-3 min-w-0">

                                    <div class="w-11 h-11 rounded-xl flex items-center justify-center ${color}">
                                        <i class="fa-solid ${icon} text-lg"></i>
                                    </div>

                                    <div class="min-w-0">
                                        <p class="text-sm font-semibold text-slate-800 truncate">
                                            ${fileName}
                                        </p>
                                        <p class="text-xs text-slate-400">
                                            Click to preview
                                        </p>
                                    </div>

                                </div>

                                <div class="flex items-center gap-2 text-indigo-600 font-semibold text-xs opacity-70 group-hover:opacity-100">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    Open
                                </div>

                            </a>
                        `;
                        }).join('')
                        : `
            <div class="text-center py-10 text-slate-400">
                <i class="fa-regular fa-folder-open text-3xl mb-2"></i>
                <p>No documents uploaded</p>
            </div>
        `;

                // Availability
                el.availability.innerHTML =
                    Array.isArray(data.available_days) && data.available_days.length
                        ? data.available_days.map(day => {

                            const slots = data.available_time_slots?.[day]
                                ? data.available_time_slots[day]
                                    .map(slot =>
                                        `<div class="text-xs text-gray-700">${slot.start} - ${slot.end}</div>`
                                    ).join('')
                                : '<div class="text-gray-400 text-xs">No slots</div>';

                            return `
                                <div class="group relative rounded-3xl border border-slate-200 bg-white p-4 shadow-sm hover:shadow-lg transition duration-300">

                                    <!-- Day Header -->
                                    <div class="flex items-center justify-between mb-4">

                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-500 text-white flex items-center justify-center text-sm font-bold shadow">
                                                ${day.substring(0,3)}
                                            </div>

                                            <div>
                                                <p class="font-semibold text-slate-800 leading-none">
                                                    ${day}
                                                </p>
                                                <p class="text-xs text-slate-400">
                                                    Session Slots
                                                </p>
                                            </div>
                                        </div>

                                        <span class="text-[11px] font-medium text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-100">
                                            Available
                                        </span>

                                    </div>

                                    <!-- Time Slots -->
                                    <div class="flex flex-wrap gap-2">

                                        ${
                                                                data.available_time_slots?.[day]
                                                                    ? data.available_time_slots[day]
                                                                        .map(slot => `
                                                    <div class="px-3 py-1.5 rounded-xl text-xs font-semibold
                                                                bg-slate-50 border border-slate-200 text-slate-700
                                                                hover:bg-indigo-50 hover:border-indigo-300 hover:text-indigo-600
                                                                transition duration-200 cursor-default">
                                                        ${slot.start} – ${slot.end}
                                                    </div>
                                                `).join('')
                                                                    : `
                                                <div class="text-xs text-slate-400 italic">
                                                    No available slots
                                                </div>
                                            `
                                                            }

                                    </div>

                                </div>
                        `;
                        }).join('')
                        : '<span class="text-gray-400">No availability provided</span>';

                // Plan
                if (data.plan === 'paid') {
                    el.plan.className = 'px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700';
                    el.plan.textContent = 'Paid Plan';
                } else {
                    el.plan.className = 'px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700';
                    el.plan.textContent = 'Trial Plan';
                }
            }

            function openModal(){
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            }

            window.closeViewModal = function(){
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = '';
            }

        })();
    </script>
@endpush
