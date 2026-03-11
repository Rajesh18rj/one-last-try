<div class="container">

    <form method="POST" action="{{ route('therapist.profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- HEADER -->
        <div class="profile-header">

            <div class="profile-image-wrapper">

                <img id="profilePreview"
                     src="{{ $profile->profile_image ? asset('storage/'.$profile->profile_image) : '/images/profile_placeholder.jpg' }}">

                <label class="image-edit">
                    <i class="fa-solid fa-camera"></i>
                    <input type="file" id="profileImageInput" name="profile_image" hidden>
                </label>

            </div>

            <div class="profile-info">

                <h2>{{ $user->name }}</h2>
                <p class="text-gray">{{ $profile->professional_title ?? 'Therapist' }}</p>

            </div>

        </div>


        <!-- TABS -->
        <div class="tabs">

            <button type="button" class="tab active" data-tab="profile">Profile</button>
            <button type="button" class="tab" data-tab="session">Sessions</button>
            <button type="button" class="tab" data-tab="documents">Documents</button>
            <button type="button" class="tab" data-tab="availability">Availability</button>

        </div>


        <!-- PROFILE TAB -->
        <div class="tab-content active" id="profile">

            <div class="card">

                <h4 class="card-title">Basic Information</h4>

                <div class="grid">

                    <div>
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="input">
                    </div>

                    <div>
                        <label>Professional Title</label>
                        <input type="text" name="professional_title" value="{{ $profile->professional_title }}" class="input">
                    </div>

                    <div>
                        <label>Gender</label>
                        <select name="gender" class="input">
                            <option value="">Select</option>
                            <option value="male" {{ $profile->gender=='male'?'selected':'' }}>Male</option>
                            <option value="female" {{ $profile->gender=='female'?'selected':'' }}>Female</option>
                            <option value="other" {{ $profile->gender=='other'?'selected':'' }}>Other</option>
                        </select>
                    </div>

                    <div>
                        <label>Experience (Years)</label>
                        <input type="number" name="experience_years" value="{{ $profile->experience_years }}" class="input">
                    </div>

                    <div>
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="input">
                    </div>

                    <div>
                        <label>Phone</label>
                        <input type="text" name="phone" value="{{ $user->phone }}" class="input">
                    </div>

                    <div>
                        <label>City</label>
                        <input type="text" name="city" value="{{ $profile->city }}" class="input">
                    </div>

                    <div>
                        <label>State</label>
                        <input type="text" name="state" value="{{ $profile->state }}" class="input">
                    </div>

                </div>

            </div>


            <div class="card">

                <h4 class="card-title">About Therapist</h4>

                <textarea name="bio" rows="4" class="input">{{ $profile->bio }}</textarea>

            </div>


            <div class="card">

                <h4 class="card-title">Specializations</h4>

                <div class="chip-container">

                    @foreach(['Anxiety','Depression','Stress','Relationship','Trauma'] as $spec)

                        <label class="chip">

                            <input type="checkbox"
                                   name="specializations[]"
                                   value="{{ $spec }}"
                                {{ in_array($spec,$profile->specializations ?? []) ? 'checked':'' }}>

                            {{ $spec }}

                        </label>

                    @endforeach

                </div>

            </div>

        </div>



        <!-- SESSION TAB -->
        <div class="tab-content" id="session">

            <div class="card">

                <h4 class="card-title">Session Settings</h4>

                <div class="grid">

                    <div>
                        <label>Session Fee</label>
                        <input type="number" name="session_fee" value="{{ $profile->session_fee }}" class="input">
                    </div>

                    <div>
                        <label>Session Mode</label>

                        <select name="session_mode" class="input">

                            <option value="online" {{ $profile->session_mode=='online'?'selected':'' }}>Online</option>
                            <option value="in_person" {{ $profile->session_mode=='in_person'?'selected':'' }}>In Person</option>
                            <option value="both" {{ $profile->session_mode=='both'?'selected':'' }}>Both</option>

                        </select>

                    </div>

                </div>

            </div>

        </div>



        <!-- DOCUMENTS TAB -->
        <div class="tab-content" id="documents">

            <div class="card">

                <div class="doc-header">
                    <div>
                        <h4 class="card-title">Qualification Documents</h4>
                        <p class="doc-subtitle text-sm mb-2">Upload certificates or proof of qualification</p>
                    </div>
                </div>


                <!-- EXISTING DOCUMENTS -->
                <div class="doc-grid">

                    @if($profile->qualification_documents)

                        @foreach($profile->qualification_documents as $index => $doc)

                            <a href="{{ asset('storage/'.$doc) }}"
                               target="_blank"
                               class="doc-card">

                                <div class="doc-icon">
                                    <i class="fa-solid fa-file-lines"></i>
                                </div>

                                <div class="doc-info">

                                    <p class="doc-name">
                                        Document {{ $index + 1 }}
                                    </p>

                                    <span class="doc-view">
                                        {{ strtoupper(pathinfo($doc, PATHINFO_EXTENSION)) }}
                                    </span>

                                </div>

                            </a>

                        @endforeach
                    @else

                        <div class="doc-empty">
                            <i class="fa-regular fa-folder-open"></i>
                            <p>No documents uploaded yet</p>
                        </div>

                    @endif

                </div>


                <!-- UPLOAD AREA -->
                <label class="upload-box">

                    <i class="fa-solid fa-cloud-arrow-up upload-icon"></i>

                    <p class="upload-text">Click to upload documents</p>

                    <span class="upload-sub">PDF, JPG, PNG allowed</span>

                    <input
                        type="file"
                        id="docUpload"
                        name="qualification_documents[]"
                        multiple
                        hidden>

                </label>

                <div id="uploadPreview" class="upload-preview"></div>

            </div>

        </div>



        <!-- AVAILABILITY TAB -->
        <div class="tab-content" id="availability">

            <div class="card">

                <h4 class="card-title">Available Time Slots</h4>
                <p class="text-gray mb-4">Add the times when you are available for sessions.</p>

                @php
                    $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
                @endphp

                <div class="availability-grid">

                    @foreach($days as $day)

                        <div class="day-card">

                            <div class="day-header">
                                <span>{{ $day }}</span>

                                <button type="button"
                                        class="add-slot-btn"
                                        onclick="addSlot('{{ $day }}')">
                                    + Add Slot
                                </button>
                            </div>

                            <div class="slots-container" id="slots-{{ $day }}">

                                @php
                                    $slots = $profile->available_time_slots[$day] ?? [];
                                @endphp

                                @if(count($slots))

                                    @foreach($slots as $index => $slot)

                                        <div class="time-row">

                                            <input type="time"
                                                   class="time-input"
                                                   name="available_time_slots[{{ $day }}][{{ $index }}][start]"
                                                   value="{{ $slot['start'] }}">

                                            <span class="time-separator">to</span>

                                            <input type="time"
                                                   class="time-input"
                                                   name="available_time_slots[{{ $day }}][{{ $index }}][end]"
                                                   value="{{ $slot['end'] }}">

                                            <button type="button"
                                                    class="remove-slot"
                                                    onclick="this.parentElement.remove()">
                                                ✕
                                            </button>

                                        </div>

                                    @endforeach

                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>


        <div class="save-area">

            <button class="save-btn">
                Save Profile
            </button>

        </div>

    </form>

</div>



<style>

    /* PAGE */

    body{
        background:#f5f7fb;
        font-family: Inter, system-ui, -apple-system, sans-serif;
        color:#1f2937;
    }

    .container{
        max-width:1150px;
        margin:auto;
        padding:40px 28px;
    }


    /* PROFILE HEADER */

    .profile-header{
        display:flex;
        align-items:center;
        gap:22px;
        margin-bottom:30px;
        padding:22px;
        background:white;
        border-radius:16px;
        border:1px solid #e6eaf0;
        box-shadow:0 8px 30px rgba(0,0,0,0.05);
    }

    .profile-info h2{
        font-size:24px;
        font-weight:700;
        letter-spacing:-0.3px;
    }

    .text-gray{
        color:#6b7280;
        font-size:14px;
        margin-top:4px;
    }


    /* PROFILE IMAGE */

    .profile-image-wrapper{
        position:relative;
    }

    .profile-image-wrapper img{
        width:120px;
        height:120px;
        border-radius:18px;
        object-fit:cover;
        box-shadow:0 10px 25px rgba(0,0,0,0.12);
        border:4px solid white;
    }

    .image-edit{
        position:absolute;
        bottom:8px;
        right:8px;
        background:#6366f1;
        color:white;
        width:34px;
        height:34px;
        border-radius:10px;
        display:flex;
        align-items:center;
        justify-content:center;
        cursor:pointer;
        transition:0.2s;
    }

    .image-edit:hover{
        transform:scale(1.05);
        background:#4f46e5;
    }

    /* HEADER */

    /* DOCUMENT GRID */

    .doc-grid{
        display:grid;
        grid-template-columns:repeat(auto-fill,minmax(240px,1fr));
        gap:16px;
        margin-bottom:20px;
    }


    /* DOCUMENT CARD */

    .doc-card{
        display:flex;
        align-items:center;
        gap:12px;
        padding:14px;
        border-radius:12px;
        border:1px solid #e5e7eb;
        background:white;
        transition:0.25s;
        min-height:70px;
    }

    .doc-card:hover{
        border-color:#6366f1;
        box-shadow:0 8px 18px rgba(0,0,0,0.08);
        transform:translateY(-2px);
    }


    /* ICON */

    .doc-icon{
        width:42px;
        height:42px;
        border-radius:10px;
        background:#eef2ff;
        display:flex;
        align-items:center;
        justify-content:center;
        color:#6366f1;
        font-size:18px;
        flex-shrink:0;
    }


    /* FILE TEXT AREA */

    .doc-info{
        flex:1;
        overflow:hidden;
    }


    /* FILE NAME */

    .doc-name{
        font-size:14px;
        font-weight:600;
        color:#111827;

        word-break: break-all;
        white-space: normal;
        line-height:1.3;
    }


    /* VIEW LINK */

    .doc-view{
        font-size:12px;
        color:#6366f1;
        display:block;
        margin-top:3px;
    }


    /* EMPTY */

    .doc-empty{
        text-align:center;
        padding:30px;
        color:#9ca3af;
        grid-column:1/-1;
    }

    .doc-empty i{
        font-size:26px;
        margin-bottom:6px;
    }


    /* UPLOAD BOX */

    .upload-box{
        border:2px dashed #d1d5db;
        border-radius:14px;
        padding:26px;
        text-align:center;
        cursor:pointer;
        transition:0.25s;
        display:block;
    }

    .upload-box i{
        font-size:24px;
        color:#6366f1;
        margin-bottom:8px;
    }

    .upload-box p{
        font-weight:600;
        font-size:14px;
    }

    .upload-box span{
        font-size:12px;
        color:#6b7280;
    }

    .upload-box:hover{
        border-color:#6366f1;
        background:#f5f7ff;
    }


    /* TABS */

    .tabs{
        display:flex;
        gap:10px;
        margin-bottom:25px;
        padding:6px;
        background:#eef2ff;
        border-radius:12px;
        width:fit-content;
    }

    .tab{
        padding:9px 18px;
        border-radius:8px;
        border:none;
        background:transparent;
        cursor:pointer;
        font-size:14px;
        font-weight:500;
        color:#4b5563;
        transition:0.25s;
    }

    .tab:hover{
        background:#e0e7ff;
    }

    .tab.active{
        background:white;
        color:#4f46e5;
        font-weight:600;
        box-shadow:0 3px 10px rgba(0,0,0,0.08);
    }


    /* TAB CONTENT */

    .tab-content{
        display:none;
        animation:fade .3s ease;
    }

    .tab-content.active{
        display:block;
    }

    @keyframes fade{
        from{opacity:0;transform:translateY(5px)}
        to{opacity:1;transform:translateY(0)}
    }


    /* CARDS */

    .card{
        background:white;
        padding:26px;
        border-radius:16px;
        border:1px solid #e6eaf0;
        margin-bottom:20px;
        box-shadow:0 6px 22px rgba(0,0,0,0.04);
        transition:0.25s;
    }

    .card:hover{
        box-shadow:0 10px 30px rgba(0,0,0,0.06);
    }

    .card-title{
        font-weight:700;
        font-size:16px;
        margin-bottom:18px;
        color:#111827;
    }


    /* GRID */

    .grid{
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
        gap:16px;
    }


    /* LABEL */

    label{
        font-size:12px;
        font-weight:600;
        color:#6b7280;
        display:block;
        margin-bottom:4px;
    }


    /* INPUT */

    .input{
        width:100%;
        border:1px solid #e5e7eb;
        padding:10px 12px;
        border-radius:10px;
        font-size:14px;
        transition:0.2s;
        background:white;
    }

    .input:focus{
        outline:none;
        border-color:#6366f1;
        box-shadow:0 0 0 3px rgba(99,102,241,0.15);
    }


    /* CHIP SELECT */

    .chip-container{
        display:flex;
        flex-wrap:wrap;
        gap:10px;
    }

    .chip{
        display:flex;
        align-items:center;
        gap:6px;
        background:#f1f5f9;
        padding:7px 14px;
        border-radius:20px;
        font-size:13px;
        cursor:pointer;
        border:1px solid transparent;
        transition:0.2s;
    }

    .chip:hover{
        background:#e0e7ff;
        border-color:#c7d2fe;
    }

    .chip input{
        accent-color:#6366f1;
    }

    /* AVAILABILITY GRID */

    .availability-grid{
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
        gap:18px;
    }

    .day-card{
        border:1px solid #e5e7eb;
        border-radius:14px;
        padding:16px;
        background:#fafafa;
    }

    .day-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        font-weight:600;
        margin-bottom:10px;
    }

    .add-slot-btn{
        background:#6366f1;
        color:white;
        border:none;
        padding:5px 10px;
        font-size:12px;
        border-radius:6px;
        cursor:pointer;
    }

    .add-slot-btn:hover{
        background:#4f46e5;
    }

    .time-row{
        display:flex;
        align-items:center;
        gap:8px;
        margin-bottom:8px;
    }

    .time-input{
        border:1px solid #e5e7eb;
        padding:6px 8px;
        border-radius:6px;
        font-size:13px;
    }

    .time-separator{
        font-size:12px;
        color:#6b7280;
    }

    .remove-slot{
        background:#ef4444;
        color:white;
        border:none;
        border-radius:6px;
        padding:4px 8px;
        cursor:pointer;
        font-size:12px;
    }


    /* DOCUMENT GRID */

    .doc-grid{
        display:grid;
        grid-template-columns:repeat(auto-fill,minmax(150px,1fr));
        gap:14px;
    }

    .doc-card{
        border:1px solid #e5e7eb;
        padding:16px;
        border-radius:12px;
        text-align:center;
        background:white;
        transition:0.25s;
        cursor:pointer;
    }

    .doc-card:hover{
        border-color:#6366f1;
        transform:translateY(-2px);
        box-shadow:0 8px 20px rgba(0,0,0,0.08);
    }

    .doc-icon{
        font-size:22px;
        margin-bottom:6px;
        color:#6366f1;
    }


    /* SAVE BUTTON */

    .save-area{
        margin-top:26px;
        display:flex;
        justify-content:flex-end;
    }

    .save-btn{
        background:#10b981;
        color:white;
        border:none;
        padding:12px 28px;
        border-radius:10px;
        font-weight:600;
        font-size:14px;
        cursor:pointer;
        transition:0.25s;
    }

    .save-btn:hover{
        background:#059669;
        transform:translateY(-1px);
        box-shadow:0 6px 20px rgba(16,185,129,0.3);
    }


    /* MOBILE */

    @media(max-width:768px){

        .container{
            padding:24px 16px;
        }

        .profile-header{
            flex-direction:column;
            align-items:flex-start;
        }

        .tabs{
            width:100%;
            overflow:auto;
        }

    }

</style>



<script>

    document.getElementById('profileImageInput')
        .addEventListener('change',function(e){

            const file = e.target.files[0];
            if(!file) return;

            document.getElementById('profilePreview').src =
                URL.createObjectURL(file);

        });


    document.querySelectorAll(".tab").forEach(tab=>{

        tab.addEventListener("click",()=>{

            document.querySelectorAll(".tab").forEach(t=>t.classList.remove("active"))
            document.querySelectorAll(".tab-content").forEach(c=>c.classList.remove("active"))

            tab.classList.add("active")

            document.getElementById(tab.dataset.tab).classList.add("active")

        })

    })

    document.getElementById('docUpload').addEventListener('change', function(e){

        const preview = document.getElementById('uploadPreview');
        preview.innerHTML = '';

        const files = e.target.files;

        if(files.length === 0) return;

        for(let file of files){

            const item = document.createElement('div');
            item.classList.add('upload-file');

            item.innerHTML = `
            <i class="fa-solid fa-file"></i>
            <span>${file.name}</span>
        `;

            preview.appendChild(item);
        }

    });

    function addSlot(day)
    {
        const container = document.getElementById('slots-' + day);

        const index = container.children.length;

        const row = document.createElement('div');

        row.classList.add('time-row');

        row.innerHTML = `
        <input type="time"
               class="time-input"
               name="available_time_slots[${day}][${index}][start]">

        <span class="time-separator">to</span>

        <input type="time"
               class="time-input"
               name="available_time_slots[${day}][${index}][end]">

        <button type="button"
                class="remove-slot"
                onclick="this.parentElement.remove()">✕</button>
    `;

        container.appendChild(row);
    }

</script>
