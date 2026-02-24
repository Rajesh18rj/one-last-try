<div class="p-6 w-full">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-xl
                bg-orange-100 text-orange-600
                flex items-center justify-center">
                <i class="fa-solid fa-users"></i>
            </div>

            <div>
                <h1 class="text-2xl font-bold text-gray-800">Customers</h1>
                <div class="w-12 h-1 mt-1 bg-orange-500 rounded-full"></div>
            </div>
        </div>
        <span class="text-sm text-gray-500">
            Total: {{ $customers->total() }}
        </span>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow overflow-x-auto">
        <table class="w-full min-w-[900px] text-sm">
            <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-4 text-left">Customer</th>
                <th class="px-6 py-4 text-left">Email</th>
                <th class="px-6 py-4 text-left">Role</th>
                <th class="px-6 py-4 text-right">Actions</th>
            </tr>
            </thead>

            <tbody>
            @forelse($customers as $customer)
                @php
                    $isSelf = auth()->id() === $customer->id;
                    $roleStyles = [
                        'customer'  => 'bg-blue-100 text-blue-700',
                        'trainee'   => 'bg-yellow-100 text-yellow-700',
                        'therapist' => 'bg-green-100 text-green-700',
                        'admin'     => 'bg-red-100 text-red-700',
                    ];
                @endphp

                <tr class="border-t hover:bg-gray-50 transition">

                    <!-- Customer -->
                    <td class="px-6 py-4 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-orange-100
                                    flex items-center justify-center
                                    text-orange-600 font-bold">
                            {{ strtoupper(substr($customer->name, 0, 1)) }}
                        </div>
                        <span class="font-medium">{{ $customer->name }}</span>
                    </td>

                    <!-- Email -->
                    <td class="px-6 py-4 text-gray-600">
                        {{ $customer->email }}
                    </td>

                    <!-- Role -->
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                                     {{ $roleStyles[$customer->role] ?? 'bg-gray-100 text-gray-600' }}">
                            {{ ucfirst($customer->role) }}
                        </span>
                    </td>

                    <!-- Actions -->
                    <td class="px-6 py-4 text-right space-x-4">

                        <!-- VIEW -->
                        <button
                            class="view-btn text-blue-500 hover:text-blue-700"
                            data-name="{{ $customer->name }}"
                            data-email="{{ $customer->email }}"
                            data-role="{{ $customer->role }}">
                            <i class="fa-solid fa-eye"></i>
                        </button>

                        <!-- EDIT ROLE -->
                        <button
                            class="edit-btn
                                   {{ $isSelf ? 'text-gray-300 cursor-not-allowed' : 'text-orange-500 hover:text-orange-700' }}"
                            {{ $isSelf ? 'disabled' : '' }}
                            data-id="{{ $customer->id }}"
                            data-role="{{ $customer->role }}"
                            title="{{ $isSelf ? 'You cannot change your own role' : 'Change role' }}">
                            <i class="fa-solid fa-user-gear"></i>
                        </button>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                        No customers found
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $customers->links() }}
    </div>
</div>

<!-- ================= VIEW MODAL ================= -->
    @include('admin.customers.view')

<!-- ================= EDIT ROLE MODAL ================= -->
    @include('admin.customers.edit')


<!-- ================= JAVASCRIPT ================= -->
<script>
    /* ===== VIEW MODAL ===== */
    const viewModal = document.getElementById('viewModal');

    document.querySelectorAll('.view-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('viewName').textContent = btn.dataset.name;
            document.getElementById('viewEmail').textContent = btn.dataset.email;
            document.getElementById('viewRole').textContent = btn.dataset.role;

            viewModal.classList.remove('hidden');
            viewModal.classList.add('flex');
        });
    });

    function closeViewModal() {
        viewModal.classList.add('hidden');
        viewModal.classList.remove('flex');
    }

    /* ===== EDIT ROLE MODAL ===== */
    const editModal = document.getElementById('editModal');
    const editForm  = document.getElementById('editForm');
    const editRole  = document.getElementById('editRole');
    const loggedInUserId = {{ auth()->id() }};

    document.querySelectorAll('.edit-btn').forEach(btn => {
        btn.addEventListener('click', () => {

            if (btn.hasAttribute('disabled')) return;

            if (parseInt(btn.dataset.id) === loggedInUserId) {
                alert('You cannot change your own role.');
                return;
            }

            editRole.value = btn.dataset.role;
            editForm.action = `/admin/customers/${btn.dataset.id}`;

            editModal.classList.remove('hidden');
            editModal.classList.add('flex');
        });
    });

    function closeEditModal() {
        editModal.classList.add('hidden');
        editModal.classList.remove('flex');
    }

    document.querySelectorAll('.view-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('viewName').textContent = btn.dataset.name;
            document.getElementById('viewEmail').textContent = btn.dataset.email;
            document.getElementById('viewRole').textContent = btn.dataset.role;

            document.getElementById('viewAvatar').textContent =
                btn.dataset.name.charAt(0).toUpperCase();

            viewModal.classList.remove('hidden');
            viewModal.classList.add('flex');
        });
    });

    {{--COnfirmation Modal--}}

    const confirmModal = document.getElementById('confirmModal');
    const confirmRole  = document.getElementById('confirmRole');

    function openConfirmModal() {
        confirmRole.textContent =
            editRole.options[editRole.selectedIndex].text;

        confirmModal.classList.remove('hidden');
        confirmModal.classList.add('flex');
    }

    function closeConfirmModal() {
        confirmModal.classList.add('hidden');
        confirmModal.classList.remove('flex');
    }

    function submitRoleChange() {
        editForm.submit();
    }

    function closeEditModal() {
        editModal.classList.add('hidden');
        editModal.classList.remove('flex');
    }

</script>
