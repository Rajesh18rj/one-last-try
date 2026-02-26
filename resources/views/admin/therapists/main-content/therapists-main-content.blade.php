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
    @include("admin.therapists.view-modal")

<!-- ================= EDIT MODAL ================= -->
<div id="editModal"
     class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden items-center justify-center z-50 p-4">

    <div class="relative w-full max-w-md">

        <!-- Glow -->
        <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-orange-400/20 via-transparent to-emerald-400/20 blur-2xl opacity-70"></div>

        <div class="relative bg-white/95 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/40 overflow-hidden">

            <!-- Header -->
            <div class="flex items-center justify-between px-6 py-5 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-green-100 text-green-500 flex items-center justify-center">
                        <i class="fa-solid fa-user-gear"></i>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold text-gray-800">Edit Therapist</h2>
                        <p class="text-xs text-gray-500">Update approval and subscription details</p>
                    </div>
                </div>

                <button type="button"
                        onclick="closeEditModal()"
                        class="w-9 h-9 rounded-full flex items-center justify-center bg-gray-100 hover:bg-red-100 text-gray-500 hover:text-red-500 transition">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <form id="editForm" method="POST" class="px-6 py-6">
                @csrf
                @method('PUT')

                <!-- Approval Status -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Approval Status
                    </label>

                    <div class="relative">

                        <!-- Left Icon -->
                        <div class="absolute left-3 top-1/2 -translate-y-1/2 text-orange-500">
                        </div>

                        <select name="approval_status"
                                id="editStatus"
                                class="w-full appearance-none rounded-xl border border-gray-200 bg-white  pr-10 py-3 text-sm shadow-sm focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition">
                            <option value="pending">Pending Review</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                        </select>

                        <!-- Dropdown Arrow -->
                        <div class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-gray-400">
                        </div>
                    </div>
                </div>

                <!-- Subscription Plan -->
                <div class="mb-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Subscription Plan
                    </label>

                    <div class="relative">

                        <!-- Left Icon -->
                        <div class="absolute left-3 top-1/2 -translate-y-1/2 text-emerald-500">
                        </div>

                        <select name="plan_type"
                                id="editPlan"
                                class="w-full appearance-none rounded-xl border border-gray-200 bg-white pr-10 py-3 text-sm shadow-sm focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition">
                            <option value="trial">Trial Plan</option>
                            <option value="paid">Paid Plan</option>
                        </select>

                        <div class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-gray-400">
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end mt-8 gap-3 border-t border-gray-100 pt-5">

                    <button type="button"
                            onclick="closeEditModal()"
                            class="px-5 py-2.5 rounded-xl bg-gray-700 hover:bg-gray-800 text-gray-100 text-sm font-medium transition">
                        Cancel
                    </button>

                    <button type="submit"
                            class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-green-500 text-white text-sm font-semibold shadow-lg hover:shadow-emerald-500/40 hover:scale-[1.03] transition">
                        <i class="fa-solid fa-floppy-disk mr-2"></i>
                        Save Changes
                    </button>

                </div>
            </form>

        </div>
    </div>
</div>
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
