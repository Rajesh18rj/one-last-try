<footer class="bg-[#fae9c0] text-[#385333] pt-12 pb-6">
    <div class="max-w-6xl mx-auto px-4">
        <!-- Top part -->
        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-4">
            <!-- Brand / Intro -->
            <div>
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8 w-auto">
                    <span class="text-xl font-semibold">One Last Try</span>
                </div>
                <p class="mt-4 text-sm leading-relaxed">
                    India’s trusted platform for understanding your mental wellbeing.                </p>
                <div class="mt-4 flex space-x-4 text-md text-[#385333]">
                    <a href="https://facebook.com" aria-label="Facebook"
                       class="hover:text-[#f7921e] transition-colors">
                        <i class="fab fa-facebook"></i>
                    </a>

                    <a href="https://x.com" aria-label="X (Twitter)"
                       class="hover:text-[#f7921e] transition-colors">
                        <i class="fab fa-x-twitter"></i>
                    </a>

                    <a href="https://instagram.com" aria-label="Instagram"
                       class="hover:text-[#f7921e] transition-colors">
                        <i class="fab fa-instagram"></i>
                    </a>

                    <a href="https://linkedin.com" aria-label="LinkedIn"
                       class="hover:text-[#f7921e] transition-colors">
                        <i class="fab fa-linkedin-in"></i>
                    </a>

                    <a href="https://youtube.com" aria-label="YouTube"
                       class="hover:text-[#f7921e] transition-colors">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>

            </div>

            <!-- Useful links -->
            <div>
                <h3 class="text-sm font-semibold tracking-wide uppercase mb-4">Useful Links</h3>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="/" class="flex items-center gap-2 hover:text-[#f7921e]">
                            <i class="fa-solid fa-chevron-right text-[10px]"></i>
                            <span>Home</span>
                        </a>
                    </li>

{{--                    <li>--}}
{{--                        <a href="/specialties" class="flex items-center gap-2 hover:text-[#f7921e]">--}}
{{--                            <i class="fa-solid fa-chevron-right text-[10px]"></i>--}}
{{--                            <span>Specialties</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li>--}}
{{--                        <a href="/therapists" class="flex items-center gap-2 hover:text-[#f7921e]">--}}
{{--                            <i class="fa-solid fa-chevron-right text-[10px]"></i>--}}
{{--                            <span>Therapists</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

                    <li>
                        <a href="{{ route('assessments.index') }}" class="flex items-center gap-2 hover:text-[#f7921e]">
                            <i class="fa-solid fa-chevron-right text-[10px]"></i>
                            <span>Assessment</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="flex items-center gap-2 hover:text-[#f7921e]">
                            <i class="fa-solid fa-chevron-right text-[10px]"></i>
                            <span>Programs</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 hover:text-[#f7921e]">
                            <i class="fa-solid fa-chevron-right text-[10px]"></i>
                            <span>About</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 hover:text-[#f7921e]">
                            <i class="fa-solid fa-chevron-right text-[10px]"></i>
                            <span>Contact</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('therapist.register') }}" class="flex items-center gap-2 hover:text-[#f7921e]">
                            <i class="fa-solid fa-chevron-right text-[10px]"></i>
                            <span>Join as Therapist</span>
                        </a>
                    </li>
                </ul>

            </div>

            <!-- Terms -->
            <div>
                <h3 class="text-sm font-semibold tracking-wide uppercase mb-4">Terms & Policies</h3>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="#" class="flex items-center gap-2 hover:text-[#f7921e]">
                            <i class="fa-solid fa-chevron-right text-[10px]"></i>
                            <span>Privacy Policy</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 hover:text-[#f7921e]">
                            <i class="fa-solid fa-chevron-right text-[10px]"></i>
                            <span>Terms and Conditions</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 hover:text-[#f7921e]">
                            <i class="fa-solid fa-chevron-right text-[10px]"></i>
                            <span>Cancellation and Refunds Policy</span>
                        </a>
                    </li>
                </ul>

            </div>

            <!-- Newsletter & Contact -->
            <div class="space-y-4">

                <h3 class="text-sm font-semibold tracking-wide uppercase mb-4">Contact</h3>


                <div class="pt-2 space-y-3 text-sm">
                    <div class="flex items-start space-x-3">
                        <span class="mt-0 text-base text-[#385333]">
                            <i class="fa-solid fa-envelope"></i>
                        </span>
                        <a href="mailto:reachout@onelasttry.in" class="hover:text-[#f7921e]">
                            reachout@onelasttry.in
                        </a>
                    </div>

                    <div class="flex items-start space-x-3">
                        <span class="mt-0 text-base text-[#385333]">
                            <i class="fa-solid fa-phone"></i>
                        </span>
                        <a href="tel:+919876543210" class="hover:text-[#f7921e]">
                            +91 9876543210
                        </a>
                    </div>

                    <div class="flex items-start space-x-3">
                        <span class="mt-0 text-base text-[#385333]">
                            <i class="fa-solid fa-location-dot"></i>
                        </span>
                        <p>
                            1-1--77/1, KNF Road, Amalapuram,<br>
                            East Godavari District, Coimbatore – 533201.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
