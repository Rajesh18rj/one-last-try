<div class="p-6 w-full">

    <!-- ================= HEADER ================= -->
    <div class="flex items-center justify-between mb-6">

        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-pink-100 text-pink-600 flex items-center justify-center shadow-sm">
                <i class="fa-solid fa-calendar-check text-lg"></i>
            </div>

            <div>
                <h1 class="text-2xl font-bold text-gray-800 leading-none">
                    Assigned Sessions
                </h1>
                <div class="w-24 h-1 bg-pink-500 rounded-full mt-2"></div>
            </div>
        </div>

        <!-- TOTAL -->
{{--        <span class="text-sm text-gray-500 font-medium">--}}
{{--            Total: {{ $assignments->total() }}--}}
{{--        </span>--}}
    </div>

    <div class="p-6">

        <h2 class="text-2xl font-bold mb-6">
            <i class="fa-solid fa-comments text-pink-500 mr-2"></i>
            My Sessions
        </h2>

        <div class="bg-white rounded-2xl shadow border overflow-hidden">

            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                <tr class="text-left">
                    <th class="px-6 py-3">Customer</th>
                    <th class="px-6 py-3">Date</th>
                    <th class="px-6 py-3">Duration</th>
                    <th class="px-6 py-3">Fee</th>
                    <th class="px-6 py-3">Booking Status</th>
                    <th class="px-6 py-3">Your Session Status</th> <!-- NEW -->
                    <th class="px-6 py-3">Meeting</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
                </thead>

                <tbody>

                @foreach($sessions as $session)
                    <tr class="border-t">
                        <td class="px-6 py-4">
                            {{ $session->customer->name ?? '-' }}
                        </td>

                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($session->scheduled_at)->format('d M Y H:i') }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $session->duration_minutes }} mins
                        </td>

                        <td class="px-6 py-4">
                            ₹{{ $session->fee }}
                        </td>

                        <td class="px-6 py-4 text-center">
                            {{ ucfirst($session->status) }}
                        </td>

                        <!-- SESSION STATUS-->
                        <td class="px-6 py-4 text-center">

                            @if($session->session_status == 'completed')
                                <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded-lg">
                                    Completed
                                </span>
                                        @else
                                            <span class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded-lg">
                                    Not Completed
                                </span>
                            @endif

                        </td>

                        <td class="px-6 py-4">
                            @if($session->meeting_link)
                                <a href="{{ $session->meeting_link }}" target="_blank"
                                   class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold text-pink-600 bg-pink-50 border border-pink-200 rounded-lg hover:bg-pink-100 transition">
                                    <i class="fa-solid fa-video text-xs"></i>
                                    Join
                                </a>
                            @else
                                <span class="text-gray-400">—</span>
                            @endif
                        </td>

                        <!-- ACTIONS -->
                        <td class="px-4 py-4 flex items-center">

                            <!-- VIEW BUTTON -->
                            <button
                                onclick="openViewModal({
                                    customer: '{{ $session->customer->name ?? '-' }}',
                                    date: '{{ \Carbon\Carbon::parse($session->scheduled_at)->format('d M Y H:i') }}',
                                    duration: '{{ $session->duration_minutes }}',
                                    fee: '{{ $session->fee }}',
                                    status: '{{ $session->status }}',
                                    meeting: '{{ $session->meeting_link }}',
                                    notes: `{{ $session->therapist_notes }}`
                                })"
                                class="w-9 h-9 flex items-center justify-center rounded-lg text-blue-600 hover:text-blue-800">

                                <i class="fa-solid fa-eye"></i>

                            </button>

                            <!-- EDIT NOTES BUTTON -->
                            <button
                                onclick="openNotesModal(
                                        '{{ $session->id }}',
                                        `{{ $session->therapist_notes }}`,
                                        '{{ $session->session_status }}'
                                    )"
                                class="w-9 h-9 flex items-center justify-center rounded-lg text-amber-600 hover:text-amber-800">

                                <i class="fa-solid fa-pen-to-square"></i>

                            </button>

                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>

        </div>

    </div>

    @include('therapist.assigned-sessions.edit')

    @include('therapist.assigned-sessions.view')


</div>

<script>

    function openNotesModal(sessionId, notes, sessionStatus){

        const modal = document.getElementById('notesModal');
        const textarea = document.getElementById('therapistNotes');
        const statusSelect = document.getElementById('sessionStatus');
        const form = document.getElementById('notesForm');

        // Set therapist notes
        textarea.value = notes ?? '';

        // Set session status
        statusSelect.value = sessionStatus ?? 'not_completed';

        // Set form action
        form.action = `/therapist/sessions/${sessionId}`;

        // Show modal
        modal.classList.remove('hidden');

    }

    function closeNotesModal(){
        document.getElementById('notesModal').classList.add('hidden');
    }

</script>

<script>

    function openViewModal(session){

        document.getElementById('viewCustomer').innerText = session.customer;
        document.getElementById('viewDate').innerText = session.date;
        document.getElementById('viewDuration').innerText = session.duration + ' minutes';
        document.getElementById('viewFee').innerText = '₹' + session.fee;
        document.getElementById('viewStatus').innerText = session.status;

        document.getElementById('viewMeeting').innerHTML =
            session.meeting
                ? `<a href="${session.meeting}" target="_blank"
            class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold text-pink-600 bg-pink-50 border border-pink-200 rounded-lg hover:bg-pink-100 transition">
            <i class="fa-solid fa-video text-xs"></i>
            Join Meeting
          </a>`
                : '<span class="text-gray-400">—</span>';

        document.getElementById('viewSessionStatus').innerHTML =
            session.session_status === 'completed'
                ? '<span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded-lg">Completed</span>'
                : '<span class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded-lg">Not Completed</span>';

        document.getElementById('viewNotes').innerText =
            session.notes ?? 'No notes added yet';

        document.getElementById('viewSessionModal').classList.remove('hidden');

    }

    function closeViewModal(){
        document.getElementById('viewSessionModal').classList.add('hidden');
    }

</script>
