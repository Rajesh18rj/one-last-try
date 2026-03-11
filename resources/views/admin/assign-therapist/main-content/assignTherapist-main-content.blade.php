<div class="p-6 w-full">

    <!-- ================= HEADER ================= -->
    <div class="flex items-center justify-between mb-6">

        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-pink-100 text-pink-600 flex items-center justify-center shadow-sm">
                <i class="fa-solid fa-people-arrows text-lg"></i>
            </div>

            <div>
                <h1 class="text-2xl font-bold text-gray-800 leading-none">
                    Assign Therapist to Customer
                </h1>
                <div class="w-40 h-1 bg-pink-500 rounded-full mt-2"></div>
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
                        <div class="font-semibold">{{ $assign->therapist->name }}</div>
                        <div class="text-xs text-gray-500">{{ $assign->therapist->email }}</div>
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

                    <td class="px-6 py-4 text-center">
                        <div class="flex items-center justify-center gap-2">

                        <button type="button"
                                onclick='openViewModal(@json($assign))'
                                class="text-blue-600 hover:text-blue-800 mr-2">
                            <i class="fa-solid fa-eye"></i>
                        </button>

                        <button type="button"
                                onclick='openEditModal(@json($assign))'
                                class="text-amber-600 hover:text-amber-800 mr-2">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>

                        <form method="POST"
                              action="{{ route('admin.assign.therapist.delete',$assign->id) }}"
                              class="delete-form">
                            @csrf
                            @method('DELETE')

                            <button type="button"
                                    class="delete-btn text-red-600 hover:text-red-800">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                        </div>
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


    @include('admin.assign-therapist.edit')

    @include('admin.assign-therapist.view')

</div>


<script>
    let therapistSlots = {};
    let therapistDays = [];

    function openAssignModal(){
        document.getElementById('assignModal').classList.remove('hidden');

        // today's date in YYYY-MM-DD (local time safe)
        const today = new Date();
        const offset = today.getTimezoneOffset();
        const local = new Date(today.getTime() - (offset*60*1000));
        const todayStr = local.toISOString().split('T')[0];

        const dateInput = document.getElementById('sessionDate');

        // prevent selecting past days
        dateInput.min = todayStr;
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

    function isPastSlot(selectedDate, slotStart){

        const now = new Date();

        // selected date object
        const [y,m,d] = selectedDate.split('-');
        const [hh,mm] = slotStart.split(':');

        const slotDateTime = new Date(y, m-1, d, hh, mm, 0);

        return slotDateTime <= now;
    }

    document.getElementById('sessionDate').addEventListener('change', function(){

        const therapist = document.getElementById('therapistSelect').value;
        const slotBox = document.getElementById('timeSlots');

        // reset selected datetime when date changes
        document.getElementById('scheduledAt').value = '';

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

            const selectedDate = document.getElementById('sessionDate').value;

            // 🚫 skip past hour if today
            if(isPastSlot(selectedDate, slot.start)){
                return; // don't show old slot
            }

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

        // If all slots filtered (all already passed)
        if(slotBox.innerHTML.trim() === ''){
            slotBox.innerHTML = `
        <div class="col-span-full bg-yellow-50 border border-yellow-200 text-yellow-700 text-sm px-4 py-3 rounded-xl text-center">
            No available slots remaining for today
        </div>
    `;
        }

    });

    // delete confirmation
    document.querySelectorAll('.delete-btn').forEach(button => {

        button.addEventListener('click', function () {

            const form = this.closest('.delete-form');

            Swal.fire({
                title: 'Delete Assignment?',
                text: "This therapist session will be permanently removed!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Yes, delete it',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {
                    form.submit();
                }

            });

        });

    });
</script>

<script>
    const customerInput = document.getElementById('customerSearch');
    const customerResults = document.getElementById('customerResults');
    const customerId = document.getElementById('customerId');

    let customerTimer;

    customerInput.addEventListener('input', function(){

        clearTimeout(customerTimer);

        const query = this.value;

        if(query.length < 2){
            customerResults.classList.add('hidden');
            return;
        }

        customerTimer = setTimeout(()=>{

            fetch(`/admin/search/customers?q=${query}`)
                .then(res=>res.json())
                .then(data=>{

                    customerResults.innerHTML='';
                    customerResults.classList.remove('hidden');

                    data.forEach(c=>{
                        const item=document.createElement('div');
                        item.className="p-3 hover:bg-pink-50 cursor-pointer border-b";
                        item.innerHTML=`<div class="font-medium">${c.name}</div>
                                <div class="text-xs text-gray-500">${c.email}</div>`;

                        item.onclick=()=>{
                            customerInput.value=c.name + ' ('+c.email+')';
                            customerId.value=c.id;
                            customerResults.classList.add('hidden');
                        }

                        customerResults.appendChild(item);
                    });
                });

        },300); // debounce
    });
    customerInput.addEventListener('input', ()=>{
        customerId.value = '';
    });

    const therapistInput = document.getElementById('therapistSearch');
    const therapistResults = document.getElementById('therapistResults');
    const therapistHidden = document.getElementById('therapistSelect');

    let therapistTimer;

    therapistInput.addEventListener('input', function(){

        clearTimeout(therapistTimer);

        const query=this.value;

        if(query.length < 2){
            therapistResults.classList.add('hidden');
            return;
        }

        therapistTimer=setTimeout(()=>{

            fetch(`/admin/search/therapists?q=${query}`)
                .then(res=>res.json())
                .then(data=>{

                    therapistResults.innerHTML='';
                    therapistResults.classList.remove('hidden');

                    data.forEach(t=>{
                        const item=document.createElement('div');
                        item.className="p-3 hover:bg-indigo-50 cursor-pointer border-b";
                        item.innerHTML = `
                                <div class="font-medium">${t.name}</div>
                                <div class="text-xs text-gray-500">${t.email ?? ''}</div>
                            `;
                               item.onclick=()=>{
                                   therapistInput.value = t.name + (t.email ? ` (${t.email})` : '');                            therapistHidden.value=t.id;
                            therapistResults.classList.add('hidden');

                            // 🔥 THIS triggers your existing availability code
                            therapistHidden.dispatchEvent(new Event('change'));
                        }

                        therapistResults.appendChild(item);
                    });
                });

        },300);
    });
    therapistInput.addEventListener('input', ()=>{
        therapistHidden.value = '';
    });


    // --- Edit modal ---

    function formatScheduled(datetime){

        if(!datetime) return '-';

        // If Laravel sends ISO format like 2026-03-02T10:00:00.000000Z
        if(datetime.includes('T')){
            datetime = datetime.replace('T',' ').split('.')[0];
        }

        const parts = datetime.split(' ');
        if(parts.length < 2) return datetime;

        const [datePart, timePart] = parts;

        const [year, month, day] = datePart.split('-');
        const [hourStr, minute] = timePart.split(':');

        let hour = parseInt(hourStr);
        const ampm = hour >= 12 ? 'PM' : 'AM';

        hour = hour % 12;
        if(hour === 0) hour = 12;

        const months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];

        return `${day} ${months[month-1]} ${year} • ${hour.toString().padStart(2,'0')}:${minute} ${ampm}`;
    }

    function openEditModal(data){

        document.getElementById('editModal').classList.remove('hidden');

        document.getElementById('editForm').action =
            `/admin/assign-therapist/${data.id}`;

        document.getElementById('editCustomer').value =
            data.customer.name + ' ('+data.customer.email+')';

        document.getElementById('editTherapist').value =
            data.therapist.name;

        document.getElementById('editScheduled').value =
            formatScheduled(data.scheduled_at);

        document.getElementById('editFee').value = data.fee ?? '';
        document.getElementById('editStatus').value = data.status;
        document.getElementById('editMeeting').value = data.meeting_link ?? '';
    }

    document.getElementById('editModal').addEventListener('click', function(e){
        if(e.target === this){
            closeEditModal();
        }
    });

    function closeEditModal(){
        document.getElementById('editModal').classList.add('hidden');
    }

    // --- View Modal ---

    function openViewModal(data){

        document.getElementById('viewModal').classList.remove('hidden');

        // Customer
        document.getElementById('viewCustomer').textContent = data.customer.name;
        document.getElementById('viewCustomerEmail').textContent = data.customer.email;

        // Therapist
        document.getElementById('viewTherapist').textContent = data.therapist.name;
        document.getElementById('viewTherapistEmail').textContent = data.therapist.email;


        // Scheduled
        document.getElementById('viewScheduled').textContent =
            formatScheduled(data.scheduled_at);

        // Fee
        document.getElementById('viewFee').textContent =
            data.fee ? '₹ ' + data.fee : '-';

        // Status badge
        const statusBox = document.getElementById('viewStatus');

        let color='bg-gray-100 text-gray-700';
        if(data.status==='completed') color='bg-green-100 text-green-700';
        else if(data.status==='pending') color='bg-yellow-100 text-yellow-700';
        else if(data.status==='cancelled') color='bg-red-100 text-red-700';

        const status = data.status.replace('_',' ');

        statusBox.innerHTML =
            `<span class="px-3 py-1 rounded-full text-xs font-semibold ${color}">
            ${status.charAt(0).toUpperCase()+status.slice(1)}
        </span>`;

        // Meeting link
        const meeting = document.getElementById('viewMeeting');
        if(data.meeting_link){
            meeting.href = data.meeting_link;
            meeting.textContent = data.meeting_link;
        }else{
            meeting.textContent = 'No meeting link provided';
            meeting.removeAttribute('href');
        }

        // ADD THIS PART ↓↓↓
        setFeedback(
            'viewTherapistFeedback',
            data.therapist_notes,
            'Therapist has not added notes'
        );

        setFeedback(
            'viewCustomerFeedback',
            data.customer_notes,
            'Customer has not added notes'
        );

        setFeedback(
            'viewAdminFeedback',
            data.feedback,
            'No internal feedback added'
        );
    }

    function closeViewModal(){
        document.getElementById('viewModal').classList.add('hidden');
    }


</script>


{{-- Feedback Section --}}
<script>
    function setFeedback(id,value,emptyText = 'No feedback added')
    {
        const el = document.getElementById(id);

        if(!el) return;

        if(value && value !== null && value !== '')
        {
            el.innerText = value;
        }
        else
        {
            el.innerHTML =
                `<span class="text-gray-400 italic">${emptyText}</span>`;
        }
    }


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

<style>
    .clamp-6{
        display: -webkit-box;
        -webkit-line-clamp: 6;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .expanded{
        -webkit-line-clamp: unset;
    }
</style>

