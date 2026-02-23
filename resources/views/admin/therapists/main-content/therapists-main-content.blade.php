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
                    <td class="px-6 py-4 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-green-100
                                    flex items-center justify-center
                                    text-green-600 font-bold">
                            {{ strtoupper(substr($therapist->user->name, 0, 1)) }}
                        </div>

                        <div>
                            <div class="font-medium">
                                {{ $therapist->user->name }}
                            </div>
                            <div class="text-xs text-gray-500">
                                {{ $therapist->user->email }}
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
                            class="edit-btn text-purple-500 hover:text-purple-700"
                            data-id="{{ $therapist->id }}"
                            data-status="{{ $therapist->approval_status }}"
                            data-plan="{{ $therapist->plan_type }}">
                            <i class="fa-solid fa-pen"></i>
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
     class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-2xl shadow-lg w-full max-w-md p-6">

        <h2 class="text-lg font-bold mb-4">Edit Therapist</h2>

        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <!-- Approval Status -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">
                    Approval Status
                </label>

                <select name="approval_status"
                        id="editStatus"
                        class="w-full border rounded-lg p-2 text-sm">
                    <option value="pending">Pending</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>

            <!-- Subscription Plan -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">
                    Subscription Plan
                </label>

                <select name="plan_type"
                        id="editPlan"
                        class="w-full border rounded-lg p-2 text-sm">
                    <option value="trial">Trial</option>
                    <option value="paid">Paid</option>
                </select>
            </div>

            <div class="flex justify-end mt-4 gap-3">
                <button type="button"
                        onclick="closeEditModal()"
                        class="px-4 py-2 bg-gray-200 rounded-lg text-sm">
                    Cancel
                </button>

                <button type="submit"
                        class="px-4 py-2 bg-green-500 text-white rounded-lg text-sm">
                    Save Changes
                </button>
            </div>

        </form>

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
