document.addEventListener('DOMContentLoaded', () => {
    const mainTabs = document.querySelectorAll('.main-tab');
    const mainPanels = document.querySelectorAll('.main-panel');
    const sectionTabs = document.querySelectorAll('.section-tab');
    const sectionPanels = document.querySelectorAll('.section-panel');
    const TOTAL_SECTIONS = sectionPanels.length;
    const stepPill = document.getElementById('step-pill');
    const stepLabelEl = stepPill?.querySelector('.step-label');
    const sectionsCompletedEl = document.getElementById('sections-completed');
    const completionStatusEl = document.getElementById('completion-status');

    const mainStepLabels = {
        1: 'Step 1 of 3 · Overview',
        2: 'Step 2 of 3 · Sections',
        3: 'Step 3 of 3 · Submit',
    };

    document
        .querySelector('#section-ikigai .section-submit')
        ?.classList.remove('hidden');


    function setMainTab(targetId) {
        mainTabs.forEach(t => t.classList.remove('bg-white','text-amber-900','shadow-sm'));
        mainPanels.forEach(panel => panel.classList.add('hidden'));

        const tab = [...mainTabs].find(t => t.getAttribute('data-tab-target') === targetId);
        const panel = document.querySelector(targetId);
        if (tab && panel) {
            tab.classList.add('bg-white','text-amber-900','shadow-sm');
            panel.classList.remove('hidden');

            const stepIndex = tab.getAttribute('data-step-index');
            if (stepLabelEl && mainStepLabels[stepIndex]) {
                stepLabelEl.textContent = mainStepLabels[stepIndex];
            }
            const badge = stepPill?.querySelector('span.inline-flex');
            if (badge && stepIndex) badge.textContent = stepIndex;
        }
    }

    // main tabs click
    mainTabs.forEach(btn => {
        btn.addEventListener('click', () => {
            const target = btn.getAttribute('data-tab-target');
            setMainTab(target);
            if (target === '#tab-questions') {
                document.querySelector('.section-tabs-wrapper')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // Start button handler
    document.getElementById('start-assessment-btn')?.addEventListener('click', () => {
        setMainTab('#tab-questions');
        document.querySelector('.section-tabs-wrapper')?.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    });

    // section tabs click
    function setSectionTab(targetId) {
        sectionTabs.forEach(t => t.classList.remove('!bg-amber-100/90','!border-amber-400','!text-amber-900','shadow-md'));
        sectionPanels.forEach(panel => panel.classList.add('hidden'));

        const tab = [...sectionTabs].find(t => t.getAttribute('data-section-target') === targetId);
        const panel = document.querySelector(targetId);
        if (tab && panel) {
            tab.classList.add('!bg-amber-100/90','!border-amber-400','!text-amber-900','shadow-md');
            panel.classList.remove('hidden');
            panel.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    sectionTabs.forEach(btn => {
        btn.addEventListener('click', () => {
            const target = btn.getAttribute('data-section-target');

            // ✅ Ikigai is always accessible
            if (target === '#section-ikigai') {
                setSectionTab(target);
                return;
            }

            if (btn.classList.contains('section-locked')) return;

            setSectionTab(target);
        });
    });


    // auto move to next section when all questions answered
    const questionInputs = document.querySelectorAll('.question-input');

    function updateCompletion() {
        let completed = 0;
        sectionPanels.forEach(panel => {
            const total = parseInt(panel.getAttribute('data-question-count') || '0', 10);
            const sectionKey = panel.getAttribute('data-section-key');
            const answered = document.querySelectorAll(
                `.question-input[data-section="${sectionKey}"]:checked`
            ).length;

            const tabBtn = [...sectionTabs].find(t => t.getAttribute('data-section-target') === ('#' + panel.id));
            const badge = tabBtn?.querySelector('.section-badge');

            if (answered >= total && total > 0) {
                completed++;
                if (badge) badge.classList.remove('hidden');
            } else {
                if (badge) badge.classList.add('hidden');
            }
        });

        if (sectionsCompletedEl) {
            sectionsCompletedEl.textContent = `${completed} / ${TOTAL_SECTIONS}`;
        }
        if (completionStatusEl) {
            completionStatusEl.textContent = completed === TOTAL_SECTIONS ? 'Ready to submit' : 'In progress';
        }
    }

    // Question Change Handler (Auto-Next Logic)
    questionInputs.forEach(input => {
        input.addEventListener('change', () => {
            const sectionKey = input.getAttribute('data-section');
            const panel = document.querySelector(
                `.section-panel[data-section-key="${sectionKey}"]`
            );
            if (!panel) return;

            const total = parseInt(panel.getAttribute('data-question-count'), 10);
            const answered = panel.querySelectorAll(
                `.question-input[data-section="${sectionKey}"]:checked`
            ).length;

            // Always hide first (important)
            // 🔒 Hide submit by default
            panel.querySelector('.section-submit')?.classList.add('hidden');

            // ✅ Show submit when all answered
            if (answered === total) {

                // ✅ Ikigai: always allow submit
                if (sectionKey === 'ikigai') {
                    panel.querySelector('.section-submit')?.classList.remove('hidden');
                    return;
                }


                // other sections
                panel.querySelector('.section-submit')?.classList.remove('hidden');
            }



            updateCompletion();

            // Show ONLY when all answered

        });
    });

    // initial state
    setMainTab('#tab-overview');


    function calculateSectionResult(sectionKey){

        const inputs = document.querySelectorAll(
            `.question-input[data-section="${sectionKey}"]:checked`
        );

        let total = 0;
        const max = inputs.length * 4;

        inputs.forEach(i=>{
            total += parseInt(i.value || 0);
        });

        const percent = max === 0 ? 0 : Math.round((total/max)*100);

        let level;

        if(percent >= 80){
            level="high";
        }
        else if(percent >=50){
            level="medium";
        }
        else{
            level="low";
        }

        const feedback = window.sectionFeedback[sectionKey]?.[level];

        return{

            title:feedback?.title || "Assessment Result",

            summary:feedback?.summary || "",

            score:percent,

            strengths:feedback?.strengths || [],

            risks:feedback?.risks || [],

            recommendations:feedback?.recommendations || [],

            habits:feedback?.habits || [],

            icon:
                percent>=80 ?
                    "fa-crown"
                    :
                    percent>=50 ?
                        "fa-thumbs-up"
                        :
                        "fa-triangle-exclamation",

            gradient:
                percent>=80 ?
                    "from-emerald-400 via-teal-400 to-cyan-400"
                    :
                    percent>=50 ?
                        "from-sky-400 via-blue-400 to-indigo-400"
                        :
                        "from-orange-400 via-rose-400 to-pink-400"

        };

    }
    // Submit button → OPEN POPUP
    let activePanel = null;

    document.addEventListener('click', (e) => {
        const btn = e.target.closest('.submit-section-btn');
        if (!btn) return;

        activePanel = btn.closest('.section-panel');
        const sectionKey = activePanel.getAttribute('data-section-key');

        // 🔒 LOCK CURRENT & PREVIOUS SECTIONS
        const panels = [...document.querySelectorAll('.section-panel')];
        const tabs   = [...document.querySelectorAll('.section-tab')];

        // const TOTAL_SECTIONS = sectionPanels.length;

        const currentIndex = panels.indexOf(activePanel);

        panels.forEach((panel, index) => {
            if (index <= currentIndex) {
                panel.classList.add('section-locked');

                const tab = tabs[index];
                tab?.classList.add('section-locked');

                // 🔒 SHOW LOCK ICON
                const lockIcon = tab?.querySelector('.lock-icon');
                lockIcon?.classList.remove('hidden');
            }
        });


// 👉 Ikigai validation + skip modal
        if (sectionKey === 'ikigai') {

            const inputs = activePanel.querySelectorAll(
                'input[name^="answers[ikigai]"]'
            );

            let valid = true;
            let firstEmpty = null;
            let missing = [];

            inputs.forEach(input => {

                if(input.value.trim()===""){

                    valid=false;

                    input.classList.add(
                        '!ring-2',
                        '!ring-red-400'
                    );

                    const label = input.closest('.ikigai-circle')
                        ?.querySelector('p')
                        ?.innerText || "Field";

                    missing.push(label);

                    if(!firstEmpty){
                        firstEmpty=input;
                    }

                }
                else{

                    input.classList.remove(
                        '!ring-2',
                        '!ring-red-400'
                    );

                }

            });


            if(!valid){

                Swal.fire({

                    icon:'error',

                    title:'Incomplete Ikigai',

                    html:`
<div style="text-align:left">

<p style="margin-bottom:8px">
Please complete:
</p>

<ul style="margin-left:15px">

${missing.map(m=>`<li>• ${m}</li>`).join("")}

</ul>

</div>
`,

                    confirmButtonColor:'#f97316'

                });

                firstEmpty?.focus();

                return;

            }


            /* Continue normally */

            const panels = [...document.querySelectorAll('.section-panel')];
            const index = panels.indexOf(activePanel);

            if (index === panels.length - 1) {

                setMainTab('#tab-submit');

            } else {

                setMainTab('#tab-questions');

                setSectionTab('#' + panels[index + 1].id);

            }

            return;

        }


        const result = calculateSectionResult(sectionKey);

        const modal = document.getElementById('sectionResultModal');

        const sectionTitles = {

            emotional_intelligence:"Emotional Intelligence Assessment",

            personality:"Personality Assessment",

            slumber_score:"Sleep Quality Assessment",

            emotional_eating:"Emotional Eating Assessment",

            entrepreneur_employee:"Work Style Assessment",

            swot:"Self Awareness Assessment",

            interpersonal_skills:"Interpersonal Skills Assessment",

            emotional_stability:"Emotional Stability Assessment",

            relationship_health:"Relationship Health Assessment",

        };

        modal.querySelector('.modal-score').innerHTML = `

        <div class="flex items-center justify-between mb-5">

            <div class="flex items-center gap-4">

                <div>

                    <div class="text-xs text-gray-500 font-medium tracking-wide">
                        ASSESSMENT RESULT
                    </div>

                    <div class="text-2xl font-semibold text-gray-800">
                        ${sectionTitles[sectionKey]}
                    </div>

                </div>

            </div>

            <div class="text-right">

                <div class="text-xs text-gray-500 font-medium">
                    Score
                </div>

                <div class="text-3xl font-bold text-gray-800">
                    ${result.score}%
                </div>

            </div>

        </div>

        <div class="w-full bg-gray-200 rounded-full h-2">

            <div class="h-2 rounded-full bg-gradient-to-r ${result.gradient}
            transition-all duration-700"
            style="width:${result.score}%"></div>

        </div>

`;


        modal.querySelector('.modal-message').innerHTML =
            `


        <div class="bg-white/60 backdrop-blur rounded-xl p-4 border border-amber-100">

        <p class="text-gray-600 leading-relaxed">
        ${result.summary}
        </p>

        </div>


        <div class="grid grid-cols-2 gap-4">

        <div class="bg-emerald-50 rounded-xl p-4 border border-emerald-100">

        <div class="font-semibold text-emerald-600 mb-2 flex items-center gap-2">

        <i class="fa-solid fa-circle-check"></i>

        Strengths

        </div>

        <ul class="space-y-1 text-sm text-gray-700">

        ${result.strengths.map(s=>`
        <li class="flex gap-2">
        <span class="text-emerald-500">•</span>
        ${s}
        </li>
        `).join("")}

        </ul>

        </div>


        <div class="bg-orange-50 rounded-xl p-4 border border-orange-100">

        <div class="font-semibold text-orange-600 mb-2 flex items-center gap-2">

        <i class="fa-solid fa-chart-line"></i>

        Growth Areas

        </div>

        <ul class="space-y-1 text-sm text-gray-700">

        ${result.risks.map(r=>`
        <li class="flex gap-2">
        <span class="text-orange-500">•</span>
        ${r}
        </li>
        `).join("")}

        </ul>

        </div>


        <div class="bg-sky-50 rounded-xl p-4 border border-sky-100">

        <div class="font-semibold text-sky-600 mb-2 flex items-center gap-2">

        <i class="fa-solid fa-lightbulb"></i>

        Recommendations

        </div>

        <ul class="space-y-1 text-sm text-gray-700">

        ${result.recommendations.map(r=>`
        <li class="flex gap-2">
        <span class="text-sky-500">•</span>
        ${r}
        </li>
        `).join("")}

        </ul>

        </div>


        <div class="bg-purple-50 rounded-xl p-4 border border-purple-100">

        <div class="font-semibold text-purple-600 mb-2 flex items-center gap-2">

        <i class="fa-solid fa-seedling"></i>

        Helpful Habits

        </div>

        <ul class="space-y-1 text-sm text-gray-700">

        ${result.habits.map(h=>`
        <li class="flex gap-2">
        <span class="text-purple-500">•</span>
        ${h}
        </li>
        `).join("")}

        </ul>

        </div>

        </div>

</div>
`;

        const icon = modal.querySelector('.result-icon');
        icon.className = `result-icon fa-solid ${result.icon}`;

        const badge = modal.querySelector('.icon-badge');
        badge.className = `icon-badge w-16 h-16 rounded-3xl
                            flex items-center justify-center
                            bg-gradient-to-br ${result.gradient}`;

        modal.classList.remove('hidden');
        modal.classList.add('flex');

    });


    const closeBtn = document.getElementById('closeResultModal');
    const nextBtn  = document.getElementById('modalNextSection');

    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            const modal = document.getElementById('sectionResultModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            if (!activePanel) return;

            const modal = document.getElementById('sectionResultModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');

            const panels = [...document.querySelectorAll('.section-panel')];
            const index = panels.indexOf(activePanel);

            if (index === panels.length - 1) {
                setMainTab('#tab-submit');
            } else {
                setMainTab('#tab-questions');
                setSectionTab('#' + panels[index + 1].id);
            }
        });
    }

    document.addEventListener('keydown', (e) => {
        if (e.target.closest('.section-locked')) {
            e.preventDefault();
        }
    });


});
