<!-- Mobile Filter Toggle -->
<button id="filterToggle" class="lg:hidden flex items-center gap-2 p-3 bg-[#F79C23] text-white rounded-full shadow mb-4 text-sm font-semibold">
    <i class="fas fa-filter"></i> Filters
</button>


<div id="filterContainer"
     class="flex flex-wrap items-center gap-12  mb-10 bg-[#FFF1D6] p-4 rounded-3xl transition-all lg:flex">

    {{-- Specialties --}}
    <select id="filter-specialization" class="filter-select">
        <option value="">Specialties</option>
        @php $uniqueSpecs = []; @endphp
        @foreach($therapists as $t)
            @foreach(json_decode($t->specializations) as $spec)
                @if(!in_array($spec, $uniqueSpecs))
                    @php $uniqueSpecs[] = $spec; @endphp
                    <option value="{{ $spec }}">{{ $spec }}</option>
                @endif
            @endforeach
        @endforeach
    </select>

    {{-- Language --}}
    <select id="filter-language" class="filter-select">
        <option value="">Language</option>
        @php $uniqueLang = []; @endphp
        @foreach($therapists as $t)
            @foreach(json_decode($t->languages) as $lang)
                @if(!in_array($lang, $uniqueLang))
                    @php $uniqueLang[] = $lang; @endphp
                    <option value="{{ $lang }}">{{ $lang }}</option>
                @endif
            @endforeach
        @endforeach
    </select>

    {{-- Gender --}}
    <select id="filter-gender" class="filter-select">
        <option value="">Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select>

    {{-- Session Mode --}}
    <select id="filter-mode" class="filter-select">
        <option value="">Session Mode</option>
        <option value="online">Online</option>
        <option value="in_person">In-Person</option>
        <option value="both">In-Person/Online</option>
    </select>

    {{-- Reset --}}
    <button id="resetFilters"
            class="ml-auto px-6 py-2 bg-[#F79C23] text-gray-50 font-semibold rounded-full shadow hover:shadow-md">
        Reset
    </button>

</div>

<style>
    .filter-select {
        border: 1px solid #F79C23;
        background-color: #FFF7E8;
        color: #5A3A10;
        padding: 10px 40px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all .2s;
    }

    .filter-select:hover {
        background-color: #FFE9C2;
    }

    #filterContainer {
        display: none; /* hidden only on mobile */
    }

    @media (min-width: 1024px) {
        #filterContainer {
            display: flex !important;
        }
    }

</style>

<script>
    document.addEventListener("DOMContentLoaded", () => {

        const cards = document.querySelectorAll(".therapist-card");

        const filters = {
            specialization: document.getElementById("filter-specialization"),
            language: document.getElementById("filter-language"),
            gender: document.getElementById("filter-gender"),
            mode: document.getElementById("filter-mode")
        };

        function applyFilters() {
            const specialization = filters.specialization.value.toLowerCase();
            const language = filters.language.value.toLowerCase();
            const gender = filters.gender.value.toLowerCase();
            const mode = filters.mode.value.toLowerCase();

            cards.forEach(card => {
                const match =
                    (!specialization || card.dataset.specializations.toLowerCase().includes(specialization)) &&
                    (!language || card.dataset.language.toLowerCase().includes(language)) &&
                    (!gender || card.dataset.gender.toLowerCase() === gender) &&
                    (!mode || card.dataset.mode.toLowerCase().includes(mode))

                card.style.display = match ? "block" : "none";
            });
        }

        Object.values(filters).forEach(select =>
            select.addEventListener("change", applyFilters)
        );

        document.getElementById("resetFilters").addEventListener("click", () => {
            Object.values(filters).forEach(select => select.value = "");
            cards.forEach(card => card.style.display = "block");
        });

        const filterToggle = document.getElementById("filterToggle");
        const filterContainer = document.getElementById("filterContainer");

        filterToggle.addEventListener("click", () => {
            filterContainer.style.display =
                filterContainer.style.display === "block" ? "none" : "block";
        });

    });
</script>

