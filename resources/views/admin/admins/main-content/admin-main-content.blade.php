{{-- ================= ADMIN LIST PAGE ================= --}}

<div class="p-6 w-full">

    {{-- HEADER --}}
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-red-100 text-red-600 flex items-center justify-center">
                <i class="fa-solid fa-user-shield"></i>
            </div>

            <div>
                <h1 class="text-2xl font-bold text-gray-800">Admins</h1>
                <div class="w-12 h-1 mt-1 bg-red-500 rounded-full"></div>
            </div>
        </div>

        <span class="text-sm text-gray-500">
        Total: {{ $admins->total() }}
    </span>
    </div>


    {{-- TABLE --}}
    <div class="bg-white rounded-2xl shadow overflow-x-auto">
        <table class="w-full min-w-[900px] text-sm">
            <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-4 text-left">Admin</th>
                <th class="px-6 py-4 text-left">Email</th>
                <th class="px-6 py-4 text-left">Role</th>
                <th class="px-6 py-4 text-right">Actions</th>
            </tr>
            </thead>

            <tbody>
            @forelse($admins as $admin)
                @php
                    $isSelf = auth()->id() === $admin->id;
                    $roleStyles = [
                        'customer'  => 'bg-blue-100 text-blue-700',
                        'trainee'   => 'bg-yellow-100 text-yellow-700',
                        'therapist' => 'bg-green-100 text-green-700',
                        'admin'     => 'bg-red-100 text-red-700',
                    ];
                @endphp

                <tr class="border-t hover:bg-gray-50 transition">

                    {{-- NAME --}}
                    <td class="px-6 py-4 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center text-red-600 font-bold">
                            {{ strtoupper(substr($admin->name, 0, 1)) }}
                        </div>
                        <span class="font-medium">{{ $admin->name }}</span>
                    </td>

                    {{-- EMAIL --}}
                    <td class="px-6 py-4 text-gray-600">
                        {{ $admin->email }}
                    </td>

                    {{-- ROLE --}}
                    <td class="px-6 py-4">
                    <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $roleStyles[$admin->role] ?? 'bg-gray-100 text-gray-600' }}">
                        {{ ucfirst($admin->role) }}
                    </span>
                    </td>

                    {{-- ACTIONS --}}
                    <td class="px-6 py-4 text-right space-x-4">

                        {{-- VIEW --}}
                        <button
                            class="admin-view-btn text-blue-500 hover:text-blue-700"
                            data-name="{{ $admin->name }}"
                            data-email="{{ $admin->email }}"
                            data-role="{{ $admin->role }}">
                            <i class="fa-solid fa-eye"></i>
                        </button>

                        {{-- EDIT --}}
                        <button
                            class="admin-edit-btn {{ $isSelf ? 'text-gray-300 cursor-not-allowed' : 'text-orange-500 hover:text-orange-700' }}"
                            {{ $isSelf ? 'disabled' : '' }}
                            data-id="{{ $admin->id }}"
                            data-role="{{ $admin->role }}">
                            <i class="fa-solid fa-user-gear"></i>
                        </button>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                        No admins found
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    {{-- PAGINATION --}}
    <div class="mt-6">
        {{ $admins->links() }}
    </div>


</div>

{{-- ================= VIEW MODAL ================= --}}
    @include('admin.admins.view')


{{-- ================= EDIT MODAL ================= --}}
    @include('admin.admins.edit')


{{-- ================= JAVASCRIPT ================= --}}

<script>

    const adminViewModal = document.getElementById('adminViewModal');
    const adminEditModal = document.getElementById('adminEditModal');
    const adminEditForm  = document.getElementById('adminEditForm');
    const adminEditRole  = document.getElementById('adminEditRole');

    /* VIEW */
    document.querySelectorAll('.admin-view-btn').forEach(btn => {
        btn.addEventListener('click', () => {

            document.getElementById('adminViewName').textContent = btn.dataset.name;
            document.getElementById('adminViewEmail').textContent = btn.dataset.email;
            document.getElementById('adminViewRole').textContent = btn.dataset.role;

            document.getElementById('adminViewAvatar').textContent =
                btn.dataset.name.charAt(0).toUpperCase();

            adminViewModal.classList.remove('hidden');
            adminViewModal.classList.add('flex');
        });
    });

    function closeAdminViewModal(){
        adminViewModal.classList.add('hidden');
        adminViewModal.classList.remove('flex');
    }

    /* EDIT */
    document.querySelectorAll('.admin-edit-btn').forEach(btn => {
        btn.addEventListener('click', () => {

            if(btn.hasAttribute('disabled')) return;

            adminEditRole.value = btn.dataset.role;
            adminEditForm.action = `/admin/admins/${btn.dataset.id}`;

            adminEditModal.classList.remove('hidden');
            adminEditModal.classList.add('flex');
        });
    });

    function closeAdminEditModal(){
        adminEditModal.classList.add('hidden');
        adminEditModal.classList.remove('flex');
    }

</script>
