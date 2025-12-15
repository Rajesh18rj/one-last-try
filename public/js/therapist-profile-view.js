document.addEventListener("DOMContentLoaded", () => {

    /* =====================================================
       BIO SECTION
    ===================================================== */
    const bioText = document.getElementById('bioText');
    const bioToggleContainer = document.getElementById('bioToggleContainer');
    const toggleBio = document.getElementById('toggleBio');
    const toggleText = document.getElementById('toggleText');
    const toggleIcon = document.getElementById('toggleIcon');
    const bioGradient = document.getElementById('bioGradient');

    if (bioText) {
        const fullHeight = bioText.scrollHeight;
        const maxMobile = 160;
        const maxDesktop = 128;
        const maxHeight = window.innerWidth >= 1024 ? maxDesktop : maxMobile;

        if (fullHeight > maxHeight) {
            bioText.style.maxHeight = maxHeight + "px";
            bioToggleContainer.style.opacity = "1";
            bioGradient.style.opacity = "1";
        }

        toggleBio.addEventListener("click", () => {
            const isOpen = bioText.style.maxHeight === fullHeight + "px";

            if (isOpen) {
                bioText.style.maxHeight = maxHeight + "px";
                toggleText.textContent = "Read More";
                toggleIcon.className = "fa-solid fa-chevron-down ml-2";
                bioGradient.style.opacity = "1";
            } else {
                bioText.style.maxHeight = fullHeight + "px";
                toggleText.textContent = "Read Less";
                toggleIcon.className = "fa-solid fa-chevron-up ml-2";
                bioGradient.style.opacity = "0";
            }
        });
    }

    /* =====================================================
       BOOKING SYSTEM — FINAL FIXED VERSION
    ===================================================== */

    const timeSlots = window.timeSlotsData || {}; // Full JSON with start/end

    let selectedDate = null;
    let selectedSlot = null;
    let selectedMode = "online";

    /* ------------------ 12-HOUR FORMAT FIX ------------------ */
    function to12Hour(time) {
        const [h, m] = time.split(":");
        const hour = parseInt(h, 10);
        const suffix = hour >= 12 ? "PM" : "AM";
        const hour12 = (hour % 12) || 12;
        return `${hour12}:${m} ${suffix}`;
    }

    /* ---------------- Mode Selection ---------------- */
    document.querySelectorAll("[data-mode]").forEach(btn => {
        btn.addEventListener("click", () => {
            if (btn.disabled) return;

            document.querySelectorAll("[data-mode]").forEach(b =>
                b.classList.remove(
                    "bg-gradient-to-r", "from-[#F79C23]", "to-[#FF9F40]", "text-white"
                )
            );

            btn.classList.add(
                "bg-gradient-to-r", "from-[#F79C23]", "to-[#FF9F40]", "text-white"
            );

            selectedMode = btn.dataset.mode;
            updateBookingButton();

            //  SHOW ADDRESS FIELDS IF IN-PERSON
            const addressSection = document.getElementById("addressFields");
            if (selectedMode === "in_person") {
                addressSection.classList.remove("hidden");
            } else {
                addressSection.classList.add("hidden");
            }
        });
    });

    // ✅ Set default selected mode
    // Auto-select based on availability
        const onlineBtn = document.querySelector('[data-mode="online"]');
        const inPersonBtn = document.querySelector('[data-mode="in_person"]');

    // CASE 1: Online is available -> select Online
        if (onlineBtn && !onlineBtn.hidden && !onlineBtn.disabled) {
            onlineBtn.click();
        }
    // CASE 2: Only In-Person available -> select In-Person
        else if (inPersonBtn && !inPersonBtn.hidden && !inPersonBtn.disabled) {
            inPersonBtn.click();
        }


    /* ---------------- Date Selection ---------------- */
    document.querySelectorAll(".date-btn").forEach(btn => {
        btn.addEventListener("click", () => {

            document.querySelectorAll(".date-btn").forEach(b =>
                b.classList.remove(
                    "bg-gradient-to-br", "from-[#F79C23]", "to-[#FF9F40]", "text-white"
                )
            );

            btn.classList.add(
                "bg-gradient-to-br", "from-[#F79C23]", "to-[#FF9F40]", "text-white"
            );

            selectedDate = btn.dataset.date;

            loadTimeSlotsForDate(selectedDate);
            updateBookingButton();
        });
    });

    /* =====================================================
       LOAD TIME SLOTS (Hide past slots for TODAY)
    ===================================================== */
    function loadTimeSlotsForDate(selectedDate) {
        const grid = document.getElementById("timeSlotsGrid");
        grid.innerHTML = "";

        const now = new Date();
        const todayStr = now.toISOString().slice(0, 10);
        const isToday = selectedDate === todayStr;

        const dayName = new Date(selectedDate).toLocaleDateString('en-US', { weekday: 'long' });
        const slots = timeSlots[dayName] || [];

        slots.forEach(slot => {

            const slotStart = slot.start;
            let show = true;

            if (isToday) {
                const currentMin = now.getHours() * 60 + now.getMinutes();
                const slotMin = parseInt(slotStart.split(":")[0]) * 60 + parseInt(slotStart.split(":")[1]);
                if (slotMin <= currentMin) show = false;
            }

            if (show) {
                const formattedStart = to12Hour(slot.start);

                // ✔ Show only START TIME
                const fullLabel = formattedStart;

                const btn = document.createElement("button");
                btn.dataset.slot = fullLabel;
                btn.className =
                    "slot-btn px-2 py-2 rounded-xl bg-gradient-to-r from-[#FFF4DD] to-[#FFFBF0] " +
                    "border border-[#FFCE7A] text-sm font-bold text-[#4A3B26] hover:bg-[#F79C23]/20 transition";
                btn.textContent = fullLabel;

                btn.addEventListener("click", () => {
                    // Remove active state from all buttons
                    document.querySelectorAll(".slot-btn").forEach(b => {
                        b.classList.remove(
                            "ring-2",
                            "ring-[#F79C23]",
                            "bg-[#F79C23]/20",
                            "text-white",
                            "bg-gradient-to-r",
                            "from-[#F79C23]",
                            "to-[#FF9F40]"
                        );

                        // Restore original style
                        b.classList.add(
                            "bg-gradient-to-r",
                            "from-[#FFF4DD]",
                            "to-[#FFFBF0]",
                            "text-[#4A3B26]"
                        );
                    });

                    // Apply highlight to selected
                    btn.classList.remove("from-[#FFF4DD]", "to-[#FFFBF0]", "text-[#4A3B26]");
                    btn.classList.add(
                        "ring-2",
                        "ring-[#F79C23]",
                        "bg-[#F79C23]/20",
                        "text-white",
                        "bg-gradient-to-r",
                        "from-[#F79C23]",
                        "to-[#FF9F40]"
                    );

                    selectedSlot = fullLabel;
                    updateBookingButton();
                });


                grid.appendChild(btn);
            }
        });

        if (!grid.innerHTML.trim()) {
            grid.innerHTML = `<p class="text-center text-sm text-[#A8916C] py-3">No available slots for this time</p>`;
        }
    }

    /* ---------------- Booking Button Update ---------------- */
    function updateBookingButton() {
        const btn = document.getElementById("bookButton");
        const txt = document.getElementById("bookButtonText");
        const info = document.getElementById("selectedInfo");
        const details = document.getElementById("selectedDetails");

        if (selectedDate && selectedSlot) {
            btn.disabled = false;
            txt.textContent = "Book Appointment";

            info.classList.remove("hidden");
            details.textContent =
                `${formatDate(selectedDate)} at ${selectedSlot} (${selectedMode})`;

        } else {
            btn.disabled = true;
            txt.textContent = "Select Date & Time First";
            info.classList.add("hidden");
        }
    }

    function formatDate(d) {
        return new Date(d).toLocaleDateString("en-GB", {
            weekday: "short",
            month: "short",
            day: "numeric"
        });
    }

    /* ---------------- Booking Action ---------------- */
    document.getElementById("bookButton").addEventListener("click", () => {

        if (!selectedDate || !selectedSlot) return;

        const therapistSlug = document.getElementById("therapistSlug").value;

        // Store booking data in session BEFORE redirecting
        sessionStorage.setItem('booking_date', selectedDate);
        sessionStorage.setItem('booking_slot', selectedSlot);
        sessionStorage.setItem('booking_mode', selectedMode);

        window.location.href = `/booking/${therapistSlug}`;
    });



});
