<div class="p-6 w-full">

    <!-- ================= HEADER ================= -->
    <div class="flex items-center justify-between mb-6">

        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-pink-100 text-pink-600 flex items-center justify-center shadow-sm">
                <i class="fa-solid fa-calendar-check text-lg"></i>
            </div>

            <div>
                <h1 class="text-2xl font-bold text-gray-800 leading-none">
                    My Scheduled Sessions
                </h1>
                <div class="w-24 h-1 bg-pink-500 rounded-full mt-2"></div>
            </div>
        </div>
    </div>

    <div class="p-6">

        <h2 class="text-2xl font-bold mb-6">
            <i class="fa-solid fa-comments text-pink-500 mr-2"></i>
            My Sessions
        </h2>

        <div class="bg-white rounded-2xl shadow border overflow-hidden">

            <div class="overflow-x-auto">

                <table class="min-w-[650px] w-full text-sm">

                <thead class="bg-gray-50">
                <tr class="text-left">

                    <th class="px-6 py-3">Therapist / Mentor</th>
                    <th class="px-6 py-3">Date</th>
                    <th class="px-6 py-3">Duration</th>
                    <th class="px-6 py-3">Meeting</th>
                    <th class="px-10 py-3">View</th>

                </tr>
                </thead>

                <tbody>

                @foreach($sessions as $session)

                    <tr class="border-t">

                        <!-- Therapist -->
                        <td class="px-6 py-4">
                            {{ $session->therapist->name ?? '-' }}
                        </td>

                        <!-- Date -->
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($session->scheduled_at)->format('d M Y H:i') }}
                        </td>

                        <!-- Duration -->
                        <td class="px-6 py-4">
                            {{ $session->duration_minutes }} mins
                        </td>


                        <!-- Meeting -->
                        <td class="px-6 py-4">

                            @if($session->meeting_link)

                                <a href="{{ $session->meeting_link }}"
                                   target="_blank"
                                   class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold text-orange-600 bg-orange-50 border border-orange-200 rounded-lg hover:bg-orange-100 transition">

                                    <i class="fa-solid fa-video text-xs"></i>
                                    Join

                                </a>

                            @else

                                <span class="text-gray-400">—</span>

                            @endif

                        </td>

                        <!-- View -->
                        <td class="px-6 py-4">

                            <div class="flex items-center gap-1">

                                <!-- View -->
                                <button
                                    class="w-9 h-9 flex items-center justify-center rounded-lg text-blue-600 hover:text-blue-800 hover:bg-blue-50 transition viewBtn"

                                data-id="{{ $session->id }}"
                                data-therapist="{{ $session->therapist->name ?? '-' }}"
                                data-date="{{ $session->scheduled_at?->format('d M Y H:i') }}"
                                data-duration="{{ $session->duration_minutes }}"
                                data-fee="{{ $session->fee }}"
                                data-status="{{ $session->status }}"
                                data-meeting="{{ $session->meeting_link }}"
                                data-cnotes="{{ $session->customer_notes }}" >

                                <i class="fa-solid fa-eye"></i>
                                </button>

                                <!-- Edit Notes -->
                                <button
                                    class="w-9 h-9 flex items-center justify-center rounded-lg text-orange-600 hover:text-orange-800 hover:bg-orange-50 transition editNotesBtn"

                                    data-id="{{ $session->id }}"
                                    data-notes="{{ e($session->customer_notes) }}"                                >

                                    <i class="fa-solid fa-comment-dots"></i>

                                </button>

                            </div>

                        </td>
                    </tr>

                @endforeach

                </tbody>

            </table>

            </div>

        </div>

    </div>

    @include('customer.your-sessions.view')
    @include('customer.your-sessions.edit')

</div>

<style>

    ::-webkit-scrollbar{
        width:6px;
    }

    ::-webkit-scrollbar-thumb{
        background:#FFA500;
        border-radius:10px;
    }

    .overflow-x-auto{
        -webkit-overflow-scrolling:touch;
        scrollbar-width:thin;
    }

    .modern-card{
        background:white;
        padding:10px;
        border-radius:16px;
        border:1px solid #f1f5f9;
        transition:.25s;
        box-shadow:0 4px 14px rgba(0,0,0,0.04);
    }

    .modern-card:hover{
        transform:translateY(-3px);
        box-shadow:0 10px 30px rgba(0,0,0,0.08);
        border-color:#fde68a;
    }

    .modern-label{
        font-size:13px;
        color:#64748b;
        display:flex;
        align-items:center;
        gap:8px;
        margin-bottom:6px;
        font-weight:500;
    }

    .modern-value{
        font-size:16px;
        font-weight:600;
        color:#0f172a;
    }

    .modern-notes{
        background:linear-gradient(180deg,#ffffff,#fafafa);
        border-radius:18px;
        padding:20px;
        border:1px solid #f1f5f9;
    }

    .modern-notes-body{
        background:white;
        padding:16px;
        border-radius:12px;
        border:1px solid #f1f5f9;
        color:#475569;
        line-height:1.6;
    }

    .animate-fadeUp{
        animation:fadeUp .35s ease;
    }

    @keyframes fadeUp{

        from{
            opacity:0;
            transform:translateY(20px);
        }

        to{
            opacity:1;
            transform:translateY(0px);
        }

    }

    .status-badge{
        display:inline-block;
        padding:6px 14px;
        border-radius:30px;
        font-size:13px;
        font-weight:600;
    }

    .status-badge.booked{
        background:#ecfdf5;
        color:#059669;
    }

    .status-badge.completed{
        background:#eff6ff;
        color:#2563eb;
    }

    .status-badge.cancelled{
        background:#fef2f2;
        color:#dc2626;
    }
</style>

<script>

    document.addEventListener('DOMContentLoaded', function(){

        /* ================= VIEW MODAL ================= */

        window.openViewModal = function(session){

            document.getElementById('viewTherapist').innerText =
                session.therapist;

            document.getElementById('viewDate').innerText =
                session.date;

            document.getElementById('viewDuration').innerText =
                session.duration + ' minutes';

            document.getElementById('viewFee').innerText =
                session.fee ? '₹ ' + session.fee : '-';


            /* STATUS */

            let statusColor='bg-gray-100 text-gray-700';

            if(session.status=='completed')
                statusColor='bg-green-100 text-green-700';

            if(session.status=='booked')
                statusColor='bg-blue-100 text-blue-700';

            if(session.status=='pending')
                statusColor='bg-yellow-100 text-yellow-700';

            if(session.status=='cancelled')
                statusColor='bg-red-100 text-red-700';

            if(session.status=='rescheduled')
                statusColor='bg-purple-100 text-purple-700';

            if(session.status=='no_show')
                statusColor='bg-orange-100 text-orange-700';


            document.getElementById('viewStatus').innerHTML =
                `<span class="px-3 py-1 rounded-full text-xs font-semibold capitalize ${statusColor}">
                ${session.status.replace('_',' ')}
                </span>`;


            /* MEETING */

            document.getElementById('viewMeeting').innerHTML =
                session.meeting
                    ? `<a href="${session.meeting}" target="_blank"
                            class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold text-orange-600 bg-orange-50 border border-orange-200 rounded-lg hover:bg-orange-100 transition">

                            <i class="fa-solid fa-video text-xs"></i>
                            Join Meeting

                            </a>`
                    : '<span class="text-gray-400">—</span>';


            /* NOTES */

            document.getElementById('viewCustomerNotes').innerHTML =
                session.cnotes ? session.cnotes : 'No feedback available';

            document.getElementById('viewSessionModal')
                .classList.remove('hidden');

        }


        /* CLOSE VIEW */

        window.closeViewModal = function(){

            document.getElementById('viewSessionModal')
                .classList.add('hidden');

        }


        /* CLOSE VIEW OUTSIDE */

        let viewModal =
            document.getElementById('viewSessionModal');

        if(viewModal){

            viewModal.addEventListener('click',function(e){

                if(e.target===this){

                    closeViewModal();

                }

            });

        }


        /* LOAD VIEW DATA */

        document.querySelectorAll('.viewBtn').forEach(btn => {

            btn.addEventListener('click', function(){

                const session = {

                    therapist:this.dataset.therapist,
                    date:this.dataset.date,
                    duration:this.dataset.duration,
                    fee:this.dataset.fee,
                    status:this.dataset.status,
                    meeting:this.dataset.meeting,
                    cnotes:this.dataset.cnotes,

                };

                openViewModal(session);

            });

        });


        /* ================= EDIT NOTES ================= */

        document.querySelectorAll('.editNotesBtn').forEach(btn => {

            btn.addEventListener('click', function(){

                document.getElementById('sessionId').value =
                    this.dataset.id;

                document.getElementById('editNotesText').value =
                    this.dataset.notes ?? '';

                document.getElementById('editNotesModal')
                    .classList.remove('hidden');

            });

        });


        /* CLOSE EDIT */

        window.closeEditNotes = function(){

            document.getElementById('editNotesModal')
                .classList.add('hidden');

        }


        /* CLOSE EDIT OUTSIDE */

        let editModal =
            document.getElementById('editNotesModal');

        if(editModal){

            editModal.addEventListener('click',function(e){

                if(e.target===this){

                    closeEditNotes();

                }

            });

        }


        /* SAVE NOTES */

        let form =
            document.getElementById('notesForm');

        if(form){

            form.addEventListener('submit',function(e){

                e.preventDefault();

                let id =
                    document.getElementById('sessionId').value;

                let notes =
                    document.getElementById('editNotesText').value;

                let token =
                    document.querySelector('meta[name="csrf-token"]').content;


                /* Laravel safe update */

                fetch(`/customer/sessions/${id}/notes`,{

                    method:'POST',

                    headers:{
                        'Content-Type':'application/json',
                        'X-CSRF-TOKEN':token,
                        'X-Requested-With':'XMLHttpRequest'
                    },

                    body:JSON.stringify({

                        notes:notes,
                        _method:'PUT'

                    })

                })

                    .then(response => response.json())

                    .then(data => {

                        closeEditNotes();


                        /* UPDATE DATASET */

                        document.querySelectorAll('.editNotesBtn')
                            .forEach(btn => {

                                if(btn.dataset.id == id){

                                    btn.dataset.notes = notes;

                                }

                            });


                        /* UPDATE VIEW MODAL NOTES LIVE */

                        document.querySelectorAll('.viewBtn')
                            .forEach(btn => {

                                if(btn.dataset.id == id){

                                    btn.dataset.cnotes = notes;

                                }

                            });


                        Swal.fire({

                            icon:'success',
                            title:'Success',
                            text:data.message,
                            timer:2000,
                            showConfirmButton:false

                        });
                    })

                    .catch(error => {

                        console.error(error);

                    });

            });

        }

    });

</script>
