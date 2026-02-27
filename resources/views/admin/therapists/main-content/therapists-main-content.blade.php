<div class="p-6 w-full">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-xl
                bg-green-100 text-green-600
                flex items-center justify-center">
                <i class="fa-solid fa-user-doctor"></i>
            </div>

            <div>
                <h1 class="text-2xl font-bold text-gray-800">Therapists</h1>
                <div class="w-12 h-1 mt-1 bg-green-500 rounded-full"></div>
            </div>
        </div>

        <span class="text-sm text-gray-500">
            Total: {{ $therapists->total() }}
        </span>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow overflow-x-auto">
        <table class="w-full min-w-[1100px] text-sm">
            <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-4 text-left">Therapist Name</th>
                <th class="px-6 py-4 text-left">Title</th>
                <th class="px-6 py-4 text-left">Experience</th>
                <th class="px-6 py-4 text-left">Gender</th>
                <th class="px-6 py-4 text-left">Location</th>
                <th class="px-6 py-4 text-left">Status</th>
                <th class="px-6 py-4 text-right">Actions</th>
            </tr>
            </thead>

            <tbody>
            @forelse($therapists as $therapist)

                @php
                    $statusStyles = [
                        'pending'  => 'bg-yellow-100 text-yellow-700',
                        'approved' => 'bg-green-100 text-green-700',
                        'rejected' => 'bg-red-100 text-red-700',
                    ];
                @endphp

                <tr class="border-t hover:bg-gray-50 transition">

                    <!-- Therapist -->
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">

                            {{-- Profile Image --}}
                            <div class="w-11 h-11 rounded-full overflow-hidden ring-2 ring-white shadow">

                                @if($therapist->profile_image)
                                    <img
                                        src="{{ asset('storage/'.$therapist->profile_image) }}"
                                        loading="lazy"
                                        alt="{{ $therapist->user->name }}"
                                        class="w-full h-full object-cover">
                                @else
                                    {{-- Fallback Avatar --}}
                                    <div class="w-full h-full bg-emerald-100 text-emerald-600 font-bold flex items-center justify-center">
                                        {{ strtoupper(substr($therapist->user->name, 0, 1)) }}
                                    </div>
                                @endif

                            </div>

                            {{-- Name + Email --}}
                            <div class="min-w-0">
                                <div class="font-semibold text-gray-800 leading-tight">
                                    {{ $therapist->user->name }}
                                </div>
                                <div class="text-xs text-gray-500 truncate max-w-[200px]">
                                    {{ $therapist->user->email }}
                                </div>
                            </div>

                        </div>
                    </td>

                    <!-- Title -->
                    <td class="px-6 py-4">
                        {{ $therapist->professional_title ?? '-' }}
                    </td>

                    <!-- Experience -->
                    <td class="px-6 py-4">
                        {{ $therapist->experience_years ?? 0 }} yrs
                    </td>

                    <!-- Fee -->
                    <td class="px-6 py-4">
                        {{ $therapist->gender }}
                    </td>

                    <!-- Location -->
                    <td class="px-6 py-4">
                        {{ $therapist->city ?? '-' }}, {{ $therapist->state ?? '-' }}
                    </td>

                    <!-- Status -->
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                            {{ $statusStyles[$therapist->approval_status] ?? 'bg-gray-100 text-gray-600' }}">
                            {{ ucfirst($therapist->approval_status) }}
                        </span>
                    </td>

                    <!-- Actions -->
                    <td class="px-6 py-4 text-right space-x-3">

                        <!-- VIEW -->
                        <button
                            class="view-btn text-blue-500 hover:text-blue-700"
                            data-id="{{ $therapist->id }}">
                            <i class="fa-solid fa-eye"></i>
                        </button>

                        <!-- EDIT -->
                        <button
                            class="edit-btn text-amber-500 hover:text-amber-700"
                            data-id="{{ $therapist->id }}"
                            data-status="{{ $therapist->approval_status }}"
                            data-plan="{{ $therapist->plan_type }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="7"
                        class="px-6 py-10 text-center text-gray-500">
                        No therapists found
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $therapists->links() }}
    </div>
</div>


<!-- ================= VIEW MODAL ================= -->
    @include("admin.therapists.view")

<!-- ================= EDIT MODAL ================= -->
    @include('admin.therapists.edit')

<!-- ================= JAVASCRIPT ================= -->
<script>

    /* EDIT MODAL */
    const editModal = document.getElementById('editModal');
    const editForm  = document.getElementById('editForm');
    const editStatus = document.getElementById('editStatus');
    const editPlan   = document.getElementById('editPlan');

    document.querySelectorAll('.edit-btn').forEach(btn => {
        btn.addEventListener('click', () => {

            const id = btn.dataset.id;
            const status = btn.dataset.status;
            const plan = btn.dataset.plan;

            editForm.action = `/admin/therapists/${id}`;

            editStatus.value = status;
            editPlan.value = plan ?? 'free';

            editModal.classList.remove('hidden');
            editModal.classList.add('flex');
        });
    });

    function closeEditModal() {
        editModal.classList.add('hidden');
        editModal.classList.remove('flex');
    }

</script>
