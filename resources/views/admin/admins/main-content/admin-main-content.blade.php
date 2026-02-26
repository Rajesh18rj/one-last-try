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

<div id="adminViewModal"
     class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden items-center justify-center z-50 p-6">

    <div class="w-full max-w-md
                bg-[#F4F5F7]
                rounded-[30px]
                shadow-[0_30px_80px_rgba(0,0,0,0.25)]
                overflow-hidden">

        <!-- Header -->
        <div class="flex items-center justify-between px-7 pt-7">

            <div class="flex items-center gap-4">

                <!-- Icon -->
                <div class="w-12 h-12 rounded-2xl
                            bg-red-100 text-red-600
                            flex items-center justify-center">
                    <i class="fa-solid fa-user-shield"></i>
                </div>

                <div>
                    <h2 class="text-lg font-semibold text-gray-800">
                        Admin Details
                    </h2>

                    <!-- small accent line -->
                    <div class="w-16 h-1 bg-red-400 rounded-full mt-2"></div>

                    <p class="text-xs text-gray-500 mt-2">
                        System administrator profile
                    </p>
                </div>

            </div>

            <!-- Close -->
            <button onclick="closeAdminViewModal()"
                    class="text-gray-400 hover:text-gray-600 text-xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>


        <!-- Body -->
        <div class="px-7 py-7 space-y-5">

            <!-- Name Card -->
            <div class="bg-white rounded-2xl p-5 shadow-sm flex items-center gap-4">

                <div id="adminViewAvatar"
                     class="w-16 h-16 rounded-2xl
                            bg-red-100 text-red-600
                            flex items-center justify-center
                            text-2xl font-bold">
                    A
                </div>

                <div>
                    <p class="text-sm text-gray-500">Full Name</p>
                    <p id="adminViewName"
                       class="font-semibold text-gray-800 text-base"></p>
                </div>

            </div>

            <!-- Email -->
            <div class="bg-white rounded-2xl p-5 shadow-sm">
                <p class="text-sm text-gray-500 mb-1">Email Address</p>
                <p id="adminViewEmail"
                   class="font-medium text-gray-800 text-sm break-all"></p>
            </div>

            <!-- Role -->
            <div class="bg-white rounded-2xl p-5 shadow-sm flex items-center justify-between">
                <p class="text-sm text-gray-500">Role</p>
                <span id="adminViewRole"
                      class="px-3 py-1 rounded-full text-xs font-semibold
                             bg-red-100 text-red-600">
                </span>
            </div>

        </div>

        <!-- Footer -->
        <div class="px-7 pb-7 flex justify-end">

            <!-- Dark gray cancel -->
            <button onclick="closeAdminViewModal()"
                    class="px-6 py-2.5 rounded-xl
                           bg-gray-800 text-white
                           font-medium hover:bg-gray-900 transition">
                Close
            </button>

        </div>

    </div>
</div>

{{-- ================= EDIT MODAL ================= --}}

<div id="adminEditModal"
     class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden items-center justify-center z-50 p-6">

    <div class="w-full max-w-md
                bg-[#F4F5F7]
                rounded-[30px]
                shadow-[0_30px_80px_rgba(0,0,0,0.25)]
                overflow-hidden">

        <!-- Header -->
        <div class="flex items-center justify-between px-7 pt-7">

            <div class="flex items-center gap-4">

                <!-- Icon -->
                <div class="w-12 h-12 rounded-2xl
                            bg-red-100 text-red-600
                            flex items-center justify-center">
                    <i class="fa-solid fa-user-gear"></i>
                </div>

                <div>
                    <h2 class="text-lg font-semibold text-gray-800">
                        Change Admin Role
                    </h2>

                    <!-- Accent line -->
                    <div class="w-16 h-1 bg-red-400 rounded-full mt-2"></div>

                    <p class="text-xs text-gray-500 mt-2">
                        Update administrator permissions
                    </p>
                </div>

            </div>

            <!-- Close -->
            <button onclick="closeAdminEditModal()"
                    class="text-gray-400 hover:text-gray-600 text-xl">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="px-7 py-7">

            <form id="adminEditForm" method="POST">
                @csrf
                @method('PUT')

                <!-- Floating Input Card -->
                <div class="bg-white rounded-2xl p-5 shadow-sm">

                    <label class="text-sm font-semibold text-gray-600">
                        Select Role
                    </label>

                    <select id="adminEditRole"
                            name="role"
                            class="w-full mt-3 px-4 py-3 rounded-xl
                                   border border-gray-200
                                   bg-gray-50
                                   focus:outline-none
                                   focus:ring-2 focus:ring-red-400
                                   focus:bg-white
                                   transition">

                        <option value="admin">Admin</option>
                        <option value="customer">Customer</option>

                    </select>

                </div>

                <!-- Buttons -->
                <div class="mt-8 flex justify-end gap-4">

                    <!-- Dark Gray Cancel -->
                    <button type="button"
                            onclick="closeAdminEditModal()"
                            class="px-6 py-2.5 rounded-xl
                                   bg-gray-800 text-white
                                   font-medium hover:bg-gray-900 transition">
                        Cancel
                    </button>

                    <!-- Red Primary -->
                    <button type="submit"
                            class="px-6 py-2.5 rounded-xl
                                   bg-red-500 text-white font-semibold
                                   hover:bg-red-600 transition shadow-sm">
                        Update Role
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
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
