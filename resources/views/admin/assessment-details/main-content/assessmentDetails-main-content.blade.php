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
                <tr
                    data-assessment-id="{{ $assessment->id }}"
                    class="border-t hover:bg-gray-50">

                    <td class="px-6 py-4 font-medium">
                        {{ $assessment->customer->name ?? 'User Deleted' }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $assessment->overall_score }}
                    </td>

                    <td class="px-6 py-4">
                        @php
                            $level = $assessment->overall_level;

                            $levelClasses = [
                                'Excellent' => 'bg-emerald-100 text-emerald-700 border border-emerald-200',
                                'Good' => 'bg-blue-100 text-blue-700 border border-blue-200',
                                'Moderate' => 'bg-amber-100 text-amber-700 border border-amber-200',
                                'Needs Attention' => 'bg-red-100 text-red-700 border border-red-200',
                            ];
                        @endphp

                        <span class="px-3 py-1.5 rounded-full text-xs font-semibold inline-flex items-center gap-1
                            {{ $levelClasses[$level] ?? 'bg-gray-100 text-gray-700 border' }}">

                            <!-- small dot indicator -->
                            <span class="w-2 h-2 rounded-full
                                @if($level=='Excellent') bg-emerald-500
                                @elseif($level=='Good') bg-blue-500
                                @elseif($level=='Moderate') bg-amber-500
                                @elseif($level=='Needs Attention') bg-red-500
                                @else bg-gray-400
                                @endif">
                            </span>

                            {{ $level }}
                        </span>
                    </td>

                    <td class="px-6 py-4">
                        {{ $assessment->taken_at?->format('d M Y') }}
                    </td>

                    <td class="px-6 py-4 ">
                        <span class="px-3 py-1 rounded-full text-xs
                        {{ $assessment->status == 'completed'
                            ? 'bg-green-100 text-green-700'
                            : 'bg-yellow-100 text-yellow-700' }}">
                            {{ ucfirst($assessment->status) }}
                        </span>
                    </td>

                    <td class="px-6 py-4 review-status">
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
                                data-modal-open="viewModal"

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
                                data-modal-open="reviewModal"

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

    <!-- View Modal -->
    @include('admin.assessment-details.view')

    <!-- Review Modal -->
    @include('admin.assessment-details.review')

<script>

    document.addEventListener('DOMContentLoaded', function(){

        /* ================= VIEW MODAL DATA ================= */

        document.addEventListener('click', function(e){

            const btn = e.target.closest('.view-btn');
            if(!btn) return;

            /* USER INFO */

            const name  = btn.dataset.name || '-';
            const email = btn.dataset.email || '-';
            const phone = btn.dataset.phone || '-';

            document.getElementById('viewCustomerName').textContent = name;
            document.getElementById('viewCustomerEmail').textContent = email;
            document.getElementById('viewCustomerPhone').textContent = phone;

            document.getElementById('viewAvatar').textContent =
                name !== '-' ? name.charAt(0).toUpperCase() : '?';

            document.getElementById('viewCustomer').textContent = name;

            /* OVERALL SCORE */

            const score = btn.dataset.score;
            const level = btn.dataset.level;

            document.getElementById('viewScore').textContent =
                score + "%";

            const levelEl =
                document.getElementById('viewLevelBadge');

            const levelStyles = {

                "Excellent":
                    "bg-green-100 text-green-700",

                "Good":
                    "bg-blue-100 text-blue-700",

                "Moderate":
                    "bg-yellow-100 text-yellow-700",

                "Needs Attention":
                    "bg-red-100 text-red-700"

            };

            levelEl.textContent = level;

            levelEl.className =
                "px-6 py-3 rounded-2xl text-sm font-semibold " +
                (levelStyles[level] ||
                    "bg-gray-100 text-gray-700");


            /* TOPIC ANALYSIS */

            const topics =
                JSON.parse(btn.dataset.topics || "{}");

            const topicsContainer =
                document.getElementById('topicsContainer');

            if(topicsContainer){

                topicsContainer.innerHTML = '';

                Object.keys(topics).forEach(topic => {

                    if(topic === 'ikigai') return;

                    const data = topics[topic];

                    let barClass='';
                    let textClass='';

                    if(data.percentage >= 80){

                        barClass='bg-green-500';
                        textClass='text-green-600';

                    }
                    else if(data.percentage >= 60){

                        barClass='bg-blue-500';
                        textClass='text-blue-600';

                    }
                    else if(data.percentage >= 40){

                        barClass='bg-yellow-500';
                        textClass='text-yellow-600';

                    }
                    else{

                        barClass='bg-red-500';
                        textClass='text-red-600';

                    }

                    const prettyTitle =
                        topic.replaceAll('_',' ')
                            .replace(/\b\w/g,
                                l=>l.toUpperCase());

                    topicsContainer.innerHTML += `

                <div class="bg-white border rounded-2xl p-4 shadow-sm">

                    <div class="flex justify-between mb-2">

                        <h4 class="font-semibold">
                        ${prettyTitle}
                        </h4>

                        <span class="${textClass} font-semibold">
                        ${data.percentage}%
                        </span>

                    </div>

                    <div class="w-full bg-gray-200 h-2 rounded-full overflow-hidden">

                        <div class="h-2 ${barClass} rounded-full"
                        style="width:${data.percentage}%">
                        </div>

                    </div>

                    <p class="text-xs text-gray-500 mt-2">

                        Level: ${data.level}

                    </p>

                </div>

                `;

                });

            }

            /* IKIGAI */

            const answers =
                JSON.parse(btn.dataset.answers || "{}");

            const ikigai =
                answers.ikigai || {};

            document.getElementById('ikigaiLove')
                .textContent = ikigai.love || '-';

            document.getElementById('ikigaiSkill')
                .textContent = ikigai.skill || '-';

            document.getElementById('ikigaiNeed')
                .textContent = ikigai.need || '-';

            document.getElementById('ikigaiPaid')
                .textContent = ikigai.paid || '-';

        });



        /* ================= REVIEW MODAL DATA ================= */

        document.addEventListener('click', function(e){

            const btn =
                e.target.closest('.edit-review');

            if(!btn) return;

            const id =
                btn.dataset.id;

            const reviewed =
                btn.dataset.reviewed;

            document.getElementById(
                'reviewAssessmentId'
            ).value = id;

            document.querySelectorAll(
                'input[name="is_reviewed"]'
            ).forEach(r=>{

                r.checked =
                    r.value === reviewed;

            });

        });

        /* ================= SAVE REVIEW ================= */

        const reviewForm =
            document.getElementById('reviewForm');

        if(reviewForm){

            reviewForm.addEventListener(
                'submit',

                function(e){

                    e.preventDefault();

                    const submitBtn =
                        reviewForm.querySelector(
                            'button[type="submit"]'
                        );

                    submitBtn.disabled = true;

                    submitBtn.innerText = "Saving...";

                    document.body.style.cursor='wait';

                    const id =
                        document.getElementById(
                            'reviewAssessmentId'
                        ).value;

                    const selected =
                        document.querySelector(
                            'input[name="is_reviewed"]:checked'
                        );

                    if(!selected) return;

                    const value =
                        selected.value;

                    fetch(
                        `/admin/assessments/${id}/update-review`,

                        {

                            method:'POST',

                            headers:{

                                'Content-Type':
                                    'application/json',

                                'X-CSRF-TOKEN':
                                    '{{ csrf_token() }}'

                            },

                            body:JSON.stringify({

                                is_reviewed:value

                            })

                        })

                        .then(res=>res.json())

                        .then(data=>{

                            if(data.success){

                                submitBtn.disabled=false;

                                submitBtn.innerText="Save Changes";

                                document.body.style.cursor='default';

                                ModalManager.close('reviewModal');

                                /* LIVE UPDATE TABLE */

                                const row =
                                    document.querySelector(
                                        `tr[data-assessment-id="${id}"]`
                                    );

                                const statusCell =
                                    row.querySelector('.review-status');

                                if(value === 'reviewed'){

                                    statusCell.innerHTML = `
<span class="px-3 py-1 rounded-full text-xs bg-emerald-100 text-emerald-700 font-semibold">
<i class="fa-solid fa-check mr-1"></i>
Reviewed
</span>
`;

                                }else{

                                    statusCell.innerHTML = `
<span class="px-3 py-1 rounded-full text-xs bg-amber-100 text-amber-700 font-semibold">
<i class="fa-solid fa-hourglass-half mr-1"></i>
Not Yet
</span>
`;

                                }

                                /* UPDATE BUTTON DATA */

                                const editBtn =
                                    row.querySelector('.edit-review');

                                editBtn.dataset.reviewed = value;


                                /* SUCCESS MESSAGE */

                                if(typeof Toast !== 'undefined'){

                                    Toast.fire({

                                        icon:'success',

                                        title:data.message

                                    });

                                }else{

                                    Swal.fire({

                                        icon:'success',

                                        title:data.message,

                                        timer:1500,

                                        showConfirmButton:false

                                    });

                                }

                            }
                        })
                });
        }

    });


</script>
