@include('components.navbar')

<style>
    /* Style untuk memastikan konten tidak tertutupi */
    .page-wrapper {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    /* Main content style */
    .body-wrapper {
        flex: 1;
    }

    #backToTop {
        position: fixed;
        right: 0;
        bottom: 0;
        display: none;
        padding: 12px 16px;
        justify-content: space-between;
        align-items: center;
        column-gap: 8px;
        border-radius: 4px;
        background-color: white;
        border-width: 0;
        z-index: 999;
        margin: 0 40px 40px 0;
        filter: drop-shadow(-1px 2px 5px rgba(0, 0, 0, 0.1)) drop-shadow(-3px 10px 10px rgba(0, 0, 0, 0.09)) drop-shadow(-6px 22px 13px rgba(0, 0, 0, 0.05)) drop-shadow(-11px 38px 16px rgba(0, 0, 0, 0.01)) drop-shadow(-17px 60px 17px rgba(0, 0, 0, 0));
    }

    #backToTop span {
        font-size: 14px;
        line-height: 19.6px;
        font-weight: 500;
        color: #080E1E;
    }

    .scrolled {
        display: flex !important;
    }

    @media only screen and (max-width:640px) {
        #backToTop span {
            font-size: 12px;
            line-height: 16.8px;
        }
    }
</style>

<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper">

    <!--  Main wrapper -->
    <div class="body-wrapper">
        @include(config('app.template') . '.landingpage.content1')
        {{-- @include(config('app.template') . '.landingpage.content2')
        @include(config('app.template') . '.landingpage.content3') --}}
    </div>

    <button id="backToTop">
        <span>Back to Top</span>
        <img src="{{ asset('/image/icon/icon-arrow-up.svg') }}" alt="arrow-up">
    </button>

</div>

<script>
    console.log("follow instagram @fadhilkholaf")

    window.addEventListener("scroll", () => {
        if (window.scrollY >= 80) {
            document.getElementById("backToTop").classList.add("scrolled")
        } else {
            document.getElementById("backToTop").classList.remove("scrolled")
        }
    })

    document.getElementById("backToTop").addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            left: 0,
            behavior: "smooth",
        });
    })
</script>

@include('components.footer')
