@extends('layouts.guest-new')

@section('content')

    <!-- Hero Section -->
    @include('therapist.therapists.partials.hero-section')


    <!-- Card Section -->
    @include('therapist.therapists.partials.card-details')

    <!-- Pagination -->
    <div class="-mt-14 mb-16 flex justify-center">
        {{ $therapists->links('components.pagination-new') }}
    </div>


@endsection
