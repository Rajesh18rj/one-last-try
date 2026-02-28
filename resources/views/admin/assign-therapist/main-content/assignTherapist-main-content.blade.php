<div class="p-6 w-full">

    <!-- ================= HEADER ================= -->
    <div class="flex items-center justify-between mb-6">

        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-pink-100 text-pink-600 flex items-center justify-center shadow-sm">
                <i class="fa-solid fa-people-arrows text-lg"></i>
            </div>

            <div>
                <h1 class="text-2xl font-bold text-gray-800 leading-none">
                    Assign Therapist
                </h1>
                <div class="w-20 h-1 bg-pink-500 rounded-full mt-2"></div>
            </div>
        </div>

        <!-- TOTAL -->
        <span class="text-sm text-gray-500 font-medium">
            Total: {{ $assignments->total() }}
        </span>
    </div>


    <!-- ================= NEW BUTTON ================= -->
    <div class="flex justify-end mb-6">
        <button onclick="openAssignModal()"
                class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-xl shadow">
            <i class="fa-solid fa-plus mr-2"></i> New
        </button>
    </div>


    <!-- ================= SUCCESS ALERT ================= -->
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                confirmButtonColor: '#ec4899'
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops',
                text: '{{ session('error') }}',
                confirmButtonColor: '#ef4444'
            });
        </script>
    @endif


    <!-- ================= TABLE ================= -->
    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <table class="w-full text-sm">
            <thead class="bg-gray-50">
            <tr>
                <th class="p-4 text-left">Customer</th>
                <th class="p-4 text-left">Therapist</th>
                <th class="p-4 text-left">Scheduled on</th>
                <th class="p-4 text-left">Fee</th>
                <th class="p-4 text-left">Status</th>
                <th class="p-4 text-center">Action</th>
            </tr>
            </thead>

            <tbody class="divide-y">

            @forelse($assignments as $assign)

                <tr class="hover:bg-gray-50">

                    <td class="p-4">
                        <div class="font-semibold">{{ $assign->customer->name }}</div>
                        <div class="text-xs text-gray-500">{{ $assign->customer->email }}</div>
                    </td>

                    <td class="p-4">
                        {{ $assign->therapist->name }}
                    </td>

                    <td class="p-4">
                        {{ $assign->scheduled_at ? $assign->scheduled_at->format('d M Y h:i A') : '-' }}
                    </td>

                    <td class="p-4">
                        {{ $assign->fee ? '₹'.$assign->fee : '-' }}
                    </td>

                    <td class="p-4">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                            @if($assign->status=='completed') bg-green-100 text-green-700
                            @elseif($assign->status=='pending') bg-yellow-100 text-yellow-700
                            @elseif($assign->status=='cancelled') bg-red-100 text-red-700
                            @else bg-gray-100 text-gray-700
                            @endif">
                            {{ ucfirst(str_replace('_',' ',$assign->status)) }}
                        </span>
                    </td>

                    <td class="p-4 text-center">
                        <form method="POST" action="{{ route('admin.assign.therapist.delete',$assign->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:text-red-800">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>

                </tr>

            @empty
                <tr>
                    <td colspan="6" class="text-center p-6 text-gray-400">
                        No therapist assigned yet.
                    </td>
                </tr>
            @endforelse

            </tbody>
        </table>

        <div class="p-4">
            {{ $assignments->links() }}
        </div>
    </div>



    <!-- ================= ASSIGN MODAL ================= -->
    @include('admin.assign-therapist.create')
</div>


<script>
    let therapistSlots = {};
    let therapistDays = [];

    function openAssignModal(){
        document.getElementById('assignModal').classList.remove('hidden');
    }

    function closeAssignModal(){
        document.getElementById('assignModal').classList.add('hidden');
    }

    /* availability loader */
    document.getElementById('therapistSelect').addEventListener('change', function(){

        const slotBox = document.getElementById('timeSlots');
        const dateInput = document.getElementById('sessionDate');

        // If therapist removed (user selects empty)
        if(!this.value){

            // disable date
            dateInput.disabled = true;
            dateInput.value = '';

            // reset hidden scheduled field
            document.getElementById('scheduledAt').value = '';

            // reset slots message
            slotBox.innerHTML = `
                <div class="col-span-full bg-gray-50 border border-dashed border-gray-300 text-gray-400 text-sm px-4 py-4 rounded-xl text-center">
                    Select therapist first
                </div>
                `;

            // hide availability card
            document.getElementById('therapistAvailability').classList.add('hidden');

            return;
        }

    // Therapist selected → enable date picker
        dateInput.disabled = false;
        slotBox.innerHTML = `
        <div class="col-span-full bg-gray-50 border border-dashed border-gray-300 text-gray-400 text-sm px-4 py-4 rounded-xl text-center">
            Select date first
        </div>
    `;

        let id = this.value;
        if(!id) return;

        fetch(`/admin/therapist/${id}/availability`)
        .then(res => res.json())
        .then(data => {
            therapistSlots = data.slots || {};
            therapistDays  = data.days || [];

        document.getElementById('therapistAvailability').classList.remove('hidden');

        /* -------- AVAILABLE DAYS -------- */
            const daysBox = document.getElementById('availableDays');
            daysBox.innerHTML = '';

            if(data.days && data.days.length){

                data.days.forEach(day=>{
                    const badge = document.createElement('span');
                    badge.className =
                        "px-2.5 py-1 rounded-lg bg-white border text-gray-700 text-xs font-medium shadow-sm";
                    badge.innerText = day;
                    daysBox.appendChild(badge);
                });

            }else{
                daysBox.innerHTML = '<span class="text-gray-400">Not set</span>';
            }

        /* -------- TIME SLOT FORMATTER -------- */
        function formatTime(t){
        let [h,m] = t.split(':');
        let hour = parseInt(h);
        let ampm = hour >= 12 ? 'PM' : 'AM';
        hour = hour % 12 || 12;
        return `${hour}:${m} ${ampm}`;
    }

        const slotContainer = document.getElementById('availableSlots');
        slotContainer.innerHTML = '';

        if(data.slots && Object.keys(data.slots).length){

            for(const day in data.slots){

                const dayCard = document.createElement('div');
                dayCard.className =
                    "bg-white border border-indigo-100 rounded-xl p-3 shadow-sm";

                // Day Title
                const dayTitle = document.createElement('div');
                dayTitle.className =
                    "text-sm font-semibold text-indigo-700 mb-2 flex items-center gap-2";

                dayTitle.innerHTML =
                    `<i class="fa-solid fa-calendar-day text-indigo-500"></i> ${day}`;

                dayCard.appendChild(dayTitle);

                // Slot badges
                const slotsWrapper = document.createElement('div');
                slotsWrapper.className = "flex flex-wrap gap-2";

                data.slots[day].forEach(slot=>{

                    const badge = document.createElement('span');
                    badge.className =
                        "px-3 py-1 rounded-full bg-indigo-100 text-indigo-700 text-xs font-medium hover:bg-indigo-200 transition";

                    badge.innerText =
                        `${formatTime(slot.start)} - ${formatTime(slot.end)}`;

                    slotsWrapper.appendChild(badge);
                });

                dayCard.appendChild(slotsWrapper);
                slotContainer.appendChild(dayCard);
            }

        }else{
            slotContainer.innerHTML =
                '<span class="text-gray-400 text-sm">No time slots configured</span>';
        }


        /* -------- FEE -------- */
        if(data.fee){
        document.querySelector('input[name="fee"]').value = data.fee;
        document.getElementById('availableFee').innerText = '₹ ' + data.fee;
    }else{
        document.getElementById('availableFee').innerText = 'Not set';
    }

        /* -------- MODE -------- */
        document.getElementById('availableMode').innerText =
        data.mode ? data.mode.replace('_',' ') : 'Not set';

    });
    });

    document.getElementById('sessionDate').addEventListener('change', function(){

        const therapist = document.getElementById('therapistSelect').value;
        const slotBox = document.getElementById('timeSlots');

        // 🚫 Therapist not selected
        if(!therapist){
            this.value = '';

            slotBox.innerHTML = `
        <div class="col-span-full bg-gray-50 border border-dashed border-gray-300 text-gray-400 text-sm px-4 py-4 rounded-xl text-center">
            Select therapist first
        </div>
        `;
            return;
        }

        const selectedDate = new Date(this.value);
        const dayName = selectedDate.toLocaleDateString('en-US', { weekday: 'long' });

        // clear old slots
        slotBox.innerHTML = '';

        // ❌ Therapist not available that day
        if(!therapistSlots[dayName]){
            slotBox.innerHTML = `
        <div class="col-span-full bg-red-50 border border-red-200 text-red-600 text-sm px-4 py-3 rounded-xl text-center">
            Therapist not available on this day
        </div>
        `;
            return;
        }

        // ✔ Show slots
        therapistSlots[dayName].forEach(slot => {

            const btn = document.createElement('button');
            btn.type = "button";
            btn.className =
                "inline-flex items-center justify-center whitespace-nowrap rounded-xl border border-gray-200 bg-white px-4 py-2 text-xs font-semibold text-gray-700 shadow-sm transition duration-200 hover:border-pink-400 hover:bg-pink-50 hover:text-pink-600";

            const format = (t)=>{
                let [h,m]=t.split(':');
                let hour=parseInt(h);
                let ampm=hour>=12?'PM':'AM';
                hour=hour%12||12;
                return `${hour}:${m} ${ampm}`;
            }

            btn.innerHTML = `
            ${format(slot.start)}
            <span class="mx-1 text-gray-400">–</span>
            ${format(slot.end)}
        `;

            btn.onclick = function(){

                // remove previous selection
                document.querySelectorAll('#timeSlots button')
                    .forEach(b=>b.classList.remove('slot-selected'));

                // add new selection
                this.classList.add('slot-selected');

                // store datetime
                const selectedDate = document.getElementById('sessionDate').value;
                const datetime = selectedDate + ' ' + slot.start + ':00';

                document.getElementById('scheduledAt').value = datetime;
            }

            slotBox.appendChild(btn);
        });

    });
</script>

<style>
    .slot-selected{
        background: linear-gradient(135deg,#ec4899,#db2777);
        color: white !important;
        border-color: transparent !important;
        box-shadow:
            0 6px 16px rgba(236,72,153,.35),
            inset 0 1px 0 rgba(255,255,255,.25);
        transform: translateY(-1px) scale(1.03);
    }

    #timeSlots button{
        transition: all .2s ease;
    }
    #timeSlots button:active{
        transform: scale(.96);
    }
</style>

