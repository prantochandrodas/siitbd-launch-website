@extends('layouts.backend')

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <!--begin::Row-->
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10 mt-4">

                {{-- <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 mb-md-5 mb-xl-10">
                    <!--begin::Card widget-->
                    <a href="{{ route('quality-declared-seed.show') }}"
                        class="card card-flush h-100 bgi-no-repeat bgi-size-contain bgi-position-x-end"
                        style="min-height: 200px; background-color: #2d5a2f;background-image:url('assets/media/patterns/vector-1.png')">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span
                                    class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">{{ optional($qualitySeedRequsition)->count() ?? 0 }}</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span class="text-white opacity-75 pt-1 fw-semibold fs-6">মান ঘোষিত বীজের মোট আবেদন</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-0">
                            <!--begin::Progress-->
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="25px" height="25px"
                                viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#ffffff"
                                    stroke="none">
                                    <path d="M2491 5103 c-55 -28 -71 -64 -71 -169 l0 -91 -142 -11 c-527 -44
                                    -1012 -273 -1422 -672 -396 -386 -643 -869 -722 -1415 -15 -110 -31 -455 -20
                                    -455 3 0 38 24 77 53 94 72 153 100 220 105 74 5 94 -2 341 -119 114 -55 209
                                    -99 210 -99 2 0 2 67 0 149 -5 175 12 294 65 471 39 130 138 341 209 445 264
                                    389 644 617 1142 689 41 6 42 5 42 -21 0 -82 110 -149 183 -112 12 6 206 129
                                    431 273 386 246 410 263 428 303 22 51 17 97 -15 136 -18 21 -685 454 -822
                                    534 -47 27 -87 29 -134 6z"></path>
                                    <path d="M3685 4472 c0 -94 -31 -169 -97 -234 -24 -24 -146 -108 -271 -187
                                    -125 -79 -230 -148 -232 -152 -3 -4 12 -13 32 -19 67 -22 226 -109 308 -170
                                    347 -258 572 -604 651 -1005 25 -125 26 -422 1 -555 -14 -76 -64 -277 -72
                                    -287 -1 -2 -26 3 -57 9 -66 14 -104 2 -143 -44 -46 -55 -45 -60 96 -558 72
                                    -256 138 -478 146 -493 32 -62 119 -85 181 -47 35 22 637 534 714 608 106 102
                                    82 206 -57 252 -36 12 -65 24 -65 27 0 3 11 42 25 87 147 488 133 1033 -40
                                    1537 -81 232 -252 532 -414 723 -175 206 -442 432 -661 559 l-45 26 0 -77z"></path>
                                    <path d="M352 2224 c-18 -10 -42 -34 -52 -54 -17 -34 -19 -76 -26 -537 -7
                                    -469 -6 -502 11 -530 38 -65 116 -83 192 -45 l41 21 37 -57 c366 -553 962
                                    -910 1675 -1004 125 -16 500 -16 615 0 363 51 697 166 950 327 80 51 235 167
                                    235 175 0 4 -14 13 -31 20 -47 20 -127 103 -150 157 -11 26 -57 176 -101 333
                                    -44 157 -82 287 -84 289 -2 2 -37 -24 -78 -57 -475 -393 -1003 -519 -1496
                                    -356 -204 68 -400 179 -578 328 -95 80 -218 208 -253 263 l-19 30 64 41 c74
                                    48 91 80 87 160 -3 54 -53 85 -496 298 -273 131 -445 208 -470 211 -25 2 -52
                                    -3 -73 -13z"></path>
                                </g>
                            </svg>
                            <!--end::Progress-->
                        </div>
                        <!--end::Card body-->
                    </a>
                    <!--end::Card widget-->
                </div> --}}

            </div>


        </div>
        <!--end::Content container-->
    </div>
@endsection
