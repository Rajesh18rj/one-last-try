@extends('layouts.admin-layout')

@section('content')
    <div class="min-h-screen bg-[#FFF8ED]">

        <!-- ================= MOBILE HEADER ================= -->
        <header class="lg:hidden flex items-center justify-between px-4 h-20
                   bg-[#FFF3D6] border-b border-[#FFE2A8]">

            <!-- Logo -->
            <img src="{{ asset('images/logo.png') }}"
                 alt="Logo"
                 class="h-14 object-contain">

            <!-- Menu Button -->
            <button onclick="openMobileMenu()"
                    class="w-10 h-10 rounded-xl bg-[#F79C23]
                       flex items-center justify-center
                       text-white shadow">
                <i class="fa-solid fa-bars"></i>
            </button>
        </header>

        <!-- ================= MOBILE MENU ================= -->
            @include('admin.admin-dashboard.partials.mobile-menu')

        <!-- ================= DESKTOP LAYOUT ================= -->
        <div class="flex min-h-screen">

            <!-- Sidebar (Desktop only) -->
            <aside class="hidden lg:flex">
                @include('admin.admin-dashboard.partials.sidebar')
            </aside>

            <!-- Main Content -->
                @include('admin.admin-dashboard.main-content.dashboard-main-content')

        </div>
    </div>

@endsection
