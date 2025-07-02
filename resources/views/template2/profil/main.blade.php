@extends('components.head')

@section('style2')
<style>
    .page-wrapper {
        display: flex;
        min-height: 100vh;
    }

    @media (min-width: 1440px) {
        .body-wrapper {
            margin-left: 360px !important;
        }

    }

    .body-wrapper {
        flex: 1;
        margin-left: 320px;
        padding: 20px;
        transition: all .35s ease-in-out;
    }

    #sidebar.collapsed~.body-wrapper {
        margin-left: 60px !important;
    }

    /* Responsiveness */
    @media (max-width: 360px) {
        .body-wrapper {
            /* max-width: 360px; */
            margin-left: 0 !important;
            padding: 0px;
        }
    }

    @media (min-width: 320px) and (max-width: 1024px) {
        .body-wrapper {
            padding-top: 50px !important;
        }
    }
</style>

<!--  Body Wrapper -->
<div class="page-wrapper overflow-hidden" id="main-wrapper">
    @include('profil.sidebar')

    <!--  Main wrapper -->
    <div class="body-wrapper">
        @yield('content')
    </div>
</div>
@endsection
