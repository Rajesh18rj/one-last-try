<div class="p-6 w-full">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">

        <div class="flex items-center gap-4">

            <!-- Icon Badge -->
            <div class="w-12 h-12 rounded-2xl
            bg-indigo-100 text-indigo-600
            flex items-center justify-center shadow-sm">
                <i class="fa-solid fa-list-check text-lg"></i>
            </div>

            <!-- Title -->
            <div>
                <h1 class="text-2xl font-bold text-gray-800 leading-none">
                    Assessments
                </h1>

                <!-- Underline indicator -->
                <div class="w-20 h-1 bg-indigo-500 rounded-full mt-2"></div>
            </div>
        </div>

        <!-- Total -->
        <span class="text-sm text-gray-500 font-medium">
        Total: {{ $assessments->total() }}
    </span>

    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow overflow-x-auto">
        <table class="w-full min-w-[900px] text-sm">
            <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-4 text-left">Customer</th>
                <th class="px-6 py-4 text-left">Score</th>
                <th class="px-6 py-4 text-left">Level</th>
                <th class="px-6 py-4 text-left">Date</th>
                <th class="px-6 py-4 text-left">Status</th>
                <th class="px-6 py-4 text-left">Is Reviewed</th>
                <th class="px-6 py-4 text-center">Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach($assessments as $assessment)
                <tr class="border-t hover:bg-gray-50">

                    <td class="px-6 py-4 font-medium">
                        {{ $assessment->customer->name ?? 'User Deleted' }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $assessment->overall_score }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $assessment->overall_level }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $assessment->taken_at?->format('d M Y') }}
                    </td>

                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs
                        {{ $assessment->status == 'completed'
                            ? 'bg-green-100 text-green-700'
                            : 'bg-yellow-100 text-yellow-700' }}">
                            {{ ucfirst($assessment->status) }}
                        </span>
                    </td>

                    <td class="px-6 py-4">
                        @if($assessment->is_reviewed === 'reviewed')
                            <span class="px-3 py-1 rounded-full text-xs bg-emerald-100 text-emerald-700 font-semibold">
                                <i class="fa-solid fa-check mr-1"></i> Reviewed
                            </span>
                        @else
                            <span class="px-3 py-1 rounded-full text-xs bg-amber-100 text-amber-700 font-semibold">
                                <i class="fa-solid fa-hourglass-half mr-1"></i> Not Yet
                            </span>
                        @endif
                    </td>

                    <!-- VIEW BUTTON -->
                    <td class="px-6 py-4 text-center">
                        <div class="flex items-center justify-center gap-4">

                            <!-- View -->
                            <button
                                class="view-btn text-blue-500 hover:text-blue-700"
                                data-name="{{ $assessment->customer?->name }}"
                                data-email="{{ $assessment->customer?->email }}"
                                data-phone="{{ $assessment->customer?->phone }}"
                                data-score="{{ $assessment->overall_score }}"
                                data-level="{{ $assessment->overall_level }}"
                                data-answers='@json($assessment->answers)'
                                data-topics='@json($assessment->topic_scores)'>
                                <i class="fa-solid fa-eye"></i>
                            </button>

                            <!-- Edit Review -->
                            <button
                                class="edit-review text-amber-500 hover:text-amber-700"
                                data-id="{{ $assessment->id }}"
                                data-reviewed="{{ $assessment->is_reviewed }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>

                        </div>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $assessments->links() }}
    </div>
</div>

    @include('admin.assessment-details.view')

<div id="reviewModal"
     class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

    <div class="bg-white rounded-2xl w-full max-w-md p-6 shadow-2xl">

        <h2 class="text-xl font-semibold mb-6">Edit Review Status</h2>

        <form id="reviewForm">

            <input type="hidden" id="reviewAssessmentId">

            <div class="space-y-4">

                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="radio" name="is_reviewed" value="not_yet" class="accent-amber-500">
                    <span class="font-medium">Not Yet Reviewed</span>
                </label>

                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="radio" name="is_reviewed" value="reviewed" class="accent-emerald-500">
                    <span class="font-medium">Reviewed</span>
                </label>

            </div>

            <div class="flex justify-end gap-3 mt-8">
                <button type="button"
                        onclick="closeReviewModal()"
                        class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300">
                    Cancel
                </button>

                <button type="submit"
                        class="px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">
                    Save
                </button>
            </div>

        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){

        const modal = document.getElementById('viewModal');
        const topicsContainer = document.getElementById('topicsContainer');

        document.addEventListener('click', function(e){

            const btn = e.target.closest('.view-btn');
            if(!btn) return;

            /* ================= USER INFO ================= */

            const name  = btn.dataset.name || '-';
            const email = btn.dataset.email || '-';
            const phone = btn.dataset.phone || '-';

            document.getElementById('viewCustomerName').textContent = name;
            document.getElementById('viewCustomerEmail').textContent = email;
            document.getElementById('viewCustomerPhone').textContent = phone;

            // avatar
            document.getElementById('viewAvatar').textContent =
                name !== '-' ? name.charAt(0).toUpperCase() : '?';

            // header subtitle
            document.getElementById('viewCustomer').textContent = name;

            /* ================= OVERALL SCORE ================= */

            const score = btn.dataset.score;
            const level = btn.dataset.level;

            document.getElementById('viewScore').textContent = score + "%";

            const levelEl = document.getElementById('viewLevelBadge');

            const levelStyles = {
                "Excellent": "bg-green-100 text-green-700",
                "Good": "bg-blue-100 text-blue-700",
                "Moderate": "bg-yellow-100 text-yellow-700",
                "Needs Attention": "bg-red-100 text-red-700"
            };

            levelEl.textContent = level;
            levelEl.className =
                "px-6 py-3 rounded-2xl text-sm font-semibold " +
                (levelStyles[level] || "bg-gray-100 text-gray-700");

            /* ================= TOPIC ANALYSIS ================= */

            const topics = JSON.parse(btn.dataset.topics || "{}");
            topicsContainer.innerHTML = '';

            Object.keys(topics).forEach(topic => {

                // Skip Ikigai (not a score test)
                if(topic === 'ikigai') return;

                const data = topics[topic];

                let barClass = '';
                let textClass = '';

                if (data.percentage >= 80) {
                    barClass  = 'bg-green-500';
                    textClass = 'text-green-600';
                }
                else if (data.percentage >= 60) {
                    barClass  = 'bg-blue-500';
                    textClass = 'text-blue-600';
                }
                else if (data.percentage >= 40) {
                    barClass  = 'bg-yellow-500';
                    textClass = 'text-yellow-600';
                }
                else {
                    barClass  = 'bg-red-500';
                    textClass = 'text-red-600';
                }

                const prettyTitle = topic
                    .replaceAll('_',' ')
                    .replace(/\b\w/g, l => l.toUpperCase());

                topicsContainer.innerHTML += `
                <div class="bg-white border rounded-2xl p-4 shadow-sm">

                    <div class="flex justify-between mb-2">
                        <h4 class="font-semibold">${prettyTitle}</h4>
                        <span class="${textClass} font-semibold">${data.percentage}%</span>
                    </div>

                    <div class="w-full bg-gray-200 h-2 rounded-full overflow-hidden">
                        <div class="h-2 ${barClass} rounded-full"
                            style="width:${data.percentage}%"></div>
                    </div>

                    <p class="text-xs text-gray-500 mt-2">
                        Level: ${data.level}
                    </p>
                </div>
            `;
            });

            /* ================= IKIGAI ================= */

            const answers = JSON.parse(btn.dataset.answers || "{}");
            const ikigai = answers.ikigai || {};

            document.getElementById('ikigaiLove').textContent  = ikigai.love  || '-';
            document.getElementById('ikigaiSkill').textContent = ikigai.skill || '-';
            document.getElementById('ikigaiNeed').textContent  = ikigai.need  || '-';
            document.getElementById('ikigaiPaid').textContent  = ikigai.paid  || '-';

            /* ================= OPEN MODAL ================= */

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });

        window.closeViewModal = function(){
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        };

    });
</script>

<script>
    const reviewModal = document.getElementById('reviewModal');

    document.addEventListener('click', function(e){

        const btn = e.target.closest('.edit-review');
        if(!btn) return;

        const id = btn.dataset.id;
        const reviewed = btn.dataset.reviewed;

        document.getElementById('reviewAssessmentId').value = id;

        // preselect radio
        document.querySelectorAll('input[name="is_reviewed"]').forEach(r => {
            r.checked = r.value === reviewed;
        });

        reviewModal.classList.remove('hidden');
        reviewModal.classList.add('flex');
    });

    function closeReviewModal(){
        reviewModal.classList.add('hidden');
        reviewModal.classList.remove('flex');
    }

    /* SAVE */
    document.getElementById('reviewForm').addEventListener('submit', function(e){
        e.preventDefault();

        const id = document.getElementById('reviewAssessmentId').value;
        const value = document.querySelector('input[name="is_reviewed"]:checked').value;

        fetch(`/admin/assessments/${id}/update-review`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ is_reviewed: value })
        })
            .then(res => res.json())
            .then(data => {
                if(data.success){
                    location.reload(); // simple + safe
                }
            });
    });
</script>
