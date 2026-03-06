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
                    <th class="px-6 py-3">Status</th>
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

                        <td class="px-6 py-4">
                            {{ ucfirst($session->status) }}
                        </td>

                        <td class="px-6 py-4">
                            @if($session->meeting_link)
                                <a href="{{ $session->meeting_link }}" target="_blank"
                                   class="text-blue-600 font-medium">
                                    Join
                                </a>
                            @else
                                -
                            @endif
                        </td>

                        <!-- ACTIONS -->
                        <td class="px-6 py-4 flex items-center gap-3">

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
                                class="w-9 h-9 flex items-center justify-center rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100">

                                <i class="fa-solid fa-eye"></i>

                            </button>

                            <!-- EDIT NOTES BUTTON -->
                            <button
                                onclick="openNotesModal('{{ $session->id }}', `{{ $session->therapist_notes }}`)"
                                class="w-9 h-9 flex items-center justify-center rounded-lg bg-indigo-50 text-indigo-600 hover:bg-indigo-100">

                                <i class="fa-solid fa-pen"></i>

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

    function openNotesModal(sessionId, notes){

        const modal = document.getElementById('notesModal');
        const textarea = document.getElementById('therapistNotes');
        const form = document.getElementById('notesForm');

        textarea.value = notes ?? '';

        form.action = `/therapist/sessions/${sessionId}`;

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
                ? `<a href="${session.meeting}" target="_blank" class="text-blue-600">Join Meeting</a>`
                : '-';

        document.getElementById('viewNotes').innerText =
            session.notes ?? 'No notes added yet';

        document.getElementById('viewSessionModal').classList.remove('hidden');

    }

    function closeViewModal(){
        document.getElementById('viewSessionModal').classList.add('hidden');
    }

</script>
