<div class="p-6 w-full">

    <!-- ================= HEADER ================= -->
    <div class="flex items-center justify-between mb-6">

        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center shadow-sm">
                <i class="fa-solid fa-calendar-check text-lg"></i>
            </div>

            <div>
                <h1 class="text-2xl font-bold text-gray-800 leading-none">
                    My Scheduled Sessions
                </h1>
                <div class="w-24 h-1 bg-orange-500 rounded-full mt-2"></div>
            </div>
        </div>
    </div>

    <div class="p-6">

        <h2 class="text-2xl font-bold mb-6">
            <i class="fa-solid fa-comments text-orange-500 mr-2"></i>
            My Sessions
        </h2>

        <div class="bg-white rounded-2xl shadow border overflow-hidden">

            <table class="w-full text-sm">

                <thead class="bg-gray-50">
                <tr class="text-left">

                    <th class="px-6 py-3">Therapist / Mentor</th>
                    <th class="px-6 py-3">Date</th>
                    <th class="px-6 py-3">Duration</th>
                    <th class="px-6 py-3">Session Type</th>
                    <th class="px-6 py-3">Session Status</th>
                    <th class="px-6 py-3">Meeting</th>
                    <th class="px-6 py-3">View</th>

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

                        <!-- Type -->
                        <td class="px-6 py-4">
                            {{ ucfirst($session->session_type ?? 'Therapy') }}
                        </td>

                        <!-- Status -->
                        <td class="px-6 py-4">

                            @if($session->session_status == 'completed')

                                <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded-lg">
                                    Completed
                                </span>

                            @else

                                <span class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded-lg">
                                    Upcoming
                                </span>

                            @endif

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

                            <button
                                class="w-9 h-9 flex items-center justify-center rounded-lg text-blue-600 hover:text-blue-800 viewBtn"

                                data-therapist="{{ $session->therapist->name ?? '-' }}"
                                data-date="{{ \Carbon\Carbon::parse($session->scheduled_at)->format('d M Y H:i') }}"
                                data-duration="{{ $session->duration_minutes }}"
                                data-type="{{ $session->session_type }}"
                                data-status="{{ $session->session_status }}"
                                data-meeting="{{ $session->meeting_link }}"
                                data-notes="{{ $session->therapist_notes }}"

                            >

                                <i class="fa-solid fa-eye"></i>

                            </button>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

<script>
    function openViewModal(session){

        document.getElementById('viewTherapist').innerText = session.therapist;
        document.getElementById('viewDate').innerText = session.date;
        document.getElementById('viewDuration').innerText = session.duration + ' minutes';
        document.getElementById('viewType').innerText = session.type;

        document.getElementById('viewMeeting').innerHTML =
            session.meeting
                ? `<a href="${session.meeting}" target="_blank"
      class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold text-orange-600 bg-orange-50 border border-orange-200 rounded-lg hover:bg-orange-100 transition">
    <i class="fa-solid fa-video text-xs"></i>
    Join Meeting
</a>`
                : '<span class="text-gray-400">—</span>';

        document.getElementById('viewNotes').innerHTML =
            session.notes ? session.notes.replace(/\n/g,'<br>') : 'No feedback yet';

        document.getElementById('viewSessionModal').classList.remove('hidden');

    }

</script>


