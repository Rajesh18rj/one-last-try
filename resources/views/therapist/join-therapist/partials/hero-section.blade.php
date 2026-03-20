<section class="w-full min-h-auto bg-[#fbeac2] flex items-center lg:py-8 py-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 grid grid-cols-1 lg:grid-cols-2 gap-6 items-center">

        <!-- Left Content -->
        <div class="space-y-4 lg:space-y-6 lg:pl-10 mt-24 flex flex-col items-center lg:items-start text-center lg:text-left">

            <!-- Heading Group-->
            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold tracking-tight text-[#2a2f28] whitespace-nowrap">
                Join as Therapist
            </h1>


            <!-- Subtitle -->
            <p class="text-xs sm:text-sm md:text-base lg:text-2xl text-gray-500 pb-10">
                Submit your details to get listed. Your profile will go live after approval.
            </p>

            <!-- How it works -->
            <button id="howItWorksBtn"
                    class="group inline-flex items-center gap-2
px-5 py-2.5
rounded-full
bg-white/80 backdrop-blur
border border-[#e7dcc8]
text-[#2a2f28]
font-semibold
text-sm md:text-[15px]
shadow-sm

hover:bg-white
hover:shadow-md
hover:border-[#d6c7aa]

transition duration-300">

                <i class="fa-solid fa-circle-question
text-[#f59e0b]
group-hover:scale-110
transition"></i>

                How it works ?

                <span class="text-[#f59e0b] group-hover:translate-x-1 transition">
→
</span>

            </button>

        </div>

        <!-- Right Image -->
        <div class="relative flex justify-center lg:justify-end mt-0 lg:mt-0">
            <img src="{{ asset('images/therapist.png') }}"
                 alt="Therapist Illustration"
                 class="w-auto object-contain mt-8 lg:mt-0
            translate-x-0 lg:translate-x-24 2xl:translate-x-32
            translate-y-0 lg:translate-y-8">

        </div>

    </div>
</section>

<script>

    document.getElementById('howItWorksBtn').addEventListener('click', function () {

        Swal.fire({

            width:700,
            padding:'24px',
            background:'#f6f8fc',
            showCloseButton:true,
            confirmButtonText:'Understood',
            confirmButtonColor:'#4f46e5',

            customClass:{
                popup:'rounded-2xl',
                confirmButton:'rounded-xl'
            },

            html:`

<div style="
font-family:'Nunito','Segoe UI',system-ui;
text-align:left">

<!-- HEADER -->

<div style="
text-align:center;
margin-bottom:22px">

<div style="
font-size:23px;
font-weight:700;
color:#0f172a;
letter-spacing:.3px">

Therapist Onboarding Journey

</div>

<div style="
font-size:14px;
color:#64748b;
margin-top:6px">

Simple 5 step verification process

</div>

</div>



<div style="
position:relative;
padding-left:60px">

<!-- TIMELINE -->

<div style="
position:absolute;
left:26px;
top:8px;
bottom:8px;
width:2px;
background:#e2e8f0">
</div>



<!-- STEP -->

<div style="
position:relative;
background:white;
padding:14px 16px;
border-radius:12px;
margin-bottom:12px;
border:1px solid #e6ebf2;
box-shadow:0 4px 12px rgba(15,23,42,.04)">

<div style="
position:absolute;
left:-60px;
top:12px;
width:38px;
height:38px;
border-radius:50%;
background:white;
border:2px solid #6366f1;
display:flex;
align-items:center;
justify-content:center;
color:#6366f1;
font-size:15px">

<i class="fa-solid fa-user-plus"></i>

</div>

<div style="
font-size:12px;
font-weight:600;
color:#6366f1">

STEP 1

</div>

<div style="
font-weight:600;
font-size:15px;
color:#0f172a">

Registration

</div>

<div style="
font-size:13px;
color:#64748b;
line-height:1.6;
margin-top:3px">

Provide your personal details, therapy specialization,
experience information and qualification documents.

</div>

</div>



<!-- STEP -->

<div style="
position:relative;
background:white;
padding:14px 16px;
border-radius:12px;
margin-bottom:12px;
border:1px solid #e6ebf2;
box-shadow:0 4px 12px rgba(15,23,42,.04)">

<div style="
position:absolute;
left:-60px;
top:12px;
width:38px;
height:38px;
border-radius:50%;
background:white;
border:2px solid #10b981;
display:flex;
align-items:center;
justify-content:center;
color:#10b981">

<i class="fa-solid fa-file-shield"></i>

</div>

<div style="
font-size:12px;
font-weight:600;
color:#10b981">

STEP 2

</div>

<div style="font-weight:600;font-size:15px">
Document Verification
</div>

<div style="
font-size:13px;
color:#64748b;
line-height:1.6;
margin-top:3px">

Our verification team reviews your certificates,
licenses and experience credentials.

</div>

</div>



<!-- STEP -->

<div style="
position:relative;
background:white;
padding:14px 16px;
border-radius:12px;
margin-bottom:12px;
border:1px solid #e6ebf2;
box-shadow:0 4px 12px rgba(15,23,42,.04)">

<div style="
position:absolute;
left:-60px;
top:12px;
width:38px;
height:38px;
border-radius:50%;
background:white;
border:2px solid #f59e0b;
display:flex;
align-items:center;
justify-content:center;
color:#f59e0b">

<i class="fa-solid fa-chart-line"></i>

</div>

<div style="
font-size:12px;
font-weight:600;
color:#f59e0b">

STEP 3

</div>

<div style="font-weight:600;font-size:15px">
Profile Evaluation
</div>

<div style="
font-size:13px;
color:#64748b;
line-height:1.6;
margin-top:3px">

Your therapy expertise and specialization
are evaluated to maintain service standards.

</div>

</div>



<!-- STEP -->

<div style="
position:relative;
background:white;
padding:14px 16px;
border-radius:12px;
margin-bottom:12px;
border:1px solid #e6ebf2;
box-shadow:0 4px 12px rgba(15,23,42,.04)">

<div style="
position:absolute;
left:-60px;
top:12px;
width:38px;
height:38px;
border-radius:50%;
background:white;
border:2px solid #22c55e;
display:flex;
align-items:center;
justify-content:center;
color:#22c55e">

<i class="fa-solid fa-circle-check"></i>

</div>

<div style="
font-size:12px;
font-weight:600;
color:#22c55e">

STEP 4

</div>

<div style="font-weight:600;font-size:15px">
Approval & Activation
</div>

<div style="
font-size:13px;
color:#64748b;
line-height:1.6;
margin-top:3px">

Once approved your profile becomes active
and ready for client consultations.

</div>

</div>



<!-- STEP -->

<div style="
position:relative;
background:white;
padding:14px 16px;
border-radius:12px;
border:1px solid #e6ebf2;
box-shadow:0 4px 12px rgba(15,23,42,.04)">

<div style="
position:absolute;
left:-60px;
top:12px;
width:38px;
height:38px;
border-radius:50%;
background:white;
border:2px solid #f97316;
display:flex;
align-items:center;
justify-content:center;
color:#f97316">

<i class="fa-solid fa-handshake"></i>

</div>

<div style="
font-size:12px;
font-weight:600;
color:#f97316">

STEP 5

</div>

<div style="font-weight:600;font-size:15px">
Client Assignment
</div>

<div style="
font-size:13px;
color:#64748b;
line-height:1.6;
margin-top:3px">

Clients are matched based on your therapy
specialization, availability and expertise.

</div>

</div>



</div>



<!-- SECURITY -->

<div style="
margin-top:18px;
background:white;
padding:13px;
border-radius:10px;
font-size:13px;
color:#475569;
border:1px solid #e2e8f0;
text-align:center">

<i class="fa-solid fa-shield-halved"
style="color:#4f46e5;margin-right:6px"></i>

Your documents are securely stored and protected with strict privacy controls.

</div>



</div>

`

        });

    });

</script>
