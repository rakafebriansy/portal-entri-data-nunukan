@extends('layouts.app')

@section('view')
    <div class="w-full h-screen relative">
        <img src="{{ asset('images/petani.webp') }}" alt="Petani" class="w-screen h-screen absolute z[-1]">
        <div class="w-full h-full absolute bg-[#3B7BDB]/60"></div>
        <div class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 w-[50%] flex flex-col gap-20">
            <div class="flex flex-col justify-center w-full items-center gap-4">
                <img src="{{ asset('images/logo_penta.png') }}" alt="Logo" class=" w-32">
                <h1 class="text-white text-lg">Portal Entri Data Nunukan: Statistik Produksi dan PDRB </h1>
            </div>
            <div class="flex justify-center gap-24">
                <a href="{{ '/dashboard' }}"
                    class="flex flex-col cursor-pointer w-60 bg-white items-center gap-6 py-6 px-10 border-2 border-[#3B7BDB] rounded-xl">
                    <svg width="168" height="136" viewBox="0 0 168 136" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M34.692 84.7999H33.6C29.9499 84.8162 26.4044 86.0209 23.4998 88.2317C20.5953 90.4424 18.4899 93.539 17.502 97.053C16.5141 100.567 16.6975 104.307 18.0245 107.707C19.3516 111.108 21.75 113.983 24.8569 115.899C27.9638 117.815 31.6102 118.667 35.2444 118.326C38.8786 117.985 42.3029 116.47 44.9992 114.01C47.6955 111.549 49.5171 108.278 50.1884 104.69C50.8598 101.102 50.3443 97.3928 48.72 94.1239L66.024 67.9999C67.8639 68.1047 69.7086 67.9061 71.484 67.4119L84.504 80.4319C83.7924 83.0588 83.7296 85.8192 84.321 88.4758C84.9124 91.1323 86.1404 93.6053 87.8993 95.6822C89.6581 97.759 91.8952 99.3775 94.4181 100.398C96.941 101.419 99.6741 101.812 102.382 101.542C105.09 101.273 107.693 100.35 109.965 98.852C112.237 97.3542 114.112 95.3268 115.427 92.9442C116.742 90.5616 117.459 87.8951 117.516 85.1741C117.572 82.4531 116.967 79.7592 115.752 77.3239L133.308 51.1999H134.4C138.05 51.1836 141.596 49.979 144.5 47.7682C147.405 45.5574 149.51 42.4608 150.498 38.9469C151.486 35.4329 151.302 31.6929 149.975 28.2924C148.648 24.892 146.25 22.0164 143.143 20.1004C140.036 18.1845 136.39 17.3326 132.756 17.6736C129.121 18.0145 125.697 19.5299 123.001 21.9903C120.305 24.4507 118.483 27.7223 117.812 31.3102C117.14 34.8981 117.656 38.6071 119.28 41.8759L101.976 67.9999C100.136 67.8951 98.2914 68.0938 96.516 68.5879L83.412 55.5679C84.1236 52.9411 84.1864 50.1806 83.595 47.5241C83.0036 44.8676 81.7756 42.3945 80.0167 40.3177C78.2579 38.2408 76.0208 36.6224 73.4979 35.6016C70.975 34.5807 68.2419 34.1881 65.5337 34.4575C62.8255 34.7269 60.2233 35.6501 57.951 37.1479C55.6786 38.6456 53.8041 40.673 52.4888 43.0557C51.1735 45.4383 50.4567 48.1048 50.4001 50.8257C50.3436 53.5467 50.9489 56.2407 52.164 58.6759L34.692 84.7999ZM0 17.5999C0 8.35993 7.56 0.799927 16.8 0.799927H151.2C155.656 0.799927 159.929 2.56992 163.079 5.72053C166.23 8.87114 168 13.1443 168 17.5999V118.4C168 122.856 166.23 127.129 163.079 130.279C159.929 133.43 155.656 135.2 151.2 135.2H16.8C12.3444 135.2 8.07122 133.43 4.92061 130.279C1.77 127.129 0 122.856 0 118.4V17.5999Z"
                            fill="#3B7BDB" />
                    </svg>
                    <h2 class="font-bold text-xl text-black">Dashboard</h2>
                </a>
                <a href="{{ '/entri-data' }}"
                    class="flex cursor-pointer flex-col w-60 bg-white items-center gap-6 py-6 px-10 border-2 border-[#3B7BDB] rounded-xl">
                    <svg width="127" height="127" viewBox="0 0 127 127" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_8_35)">
                            <mask id="mask0_8_35" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0"
                                width="127" height="127">
                                <path
                                    d="M120.583 26.3958V103.458C120.583 112.917 95.0272 120.583 63.5001 120.583C31.973 120.583 6.41675 112.917 6.41675 103.458V26.3958"
                                    stroke="white" stroke-width="11.4167" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M120.583 77.7708C120.583 87.2295 95.0272 94.8958 63.5001 94.8958C31.973 94.8958 6.41675 87.2295 6.41675 77.7708M120.583 52.0833C120.583 61.542 95.0272 69.2083 63.5001 69.2083C31.973 69.2083 6.41675 61.542 6.41675 52.0833"
                                    stroke="white" stroke-width="11.4167" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M63.5001 40.6667C95.0263 40.6667 120.583 32.9996 120.583 23.5417C120.583 14.0838 95.0263 6.41669 63.5001 6.41669C31.9738 6.41669 6.41675 14.0838 6.41675 23.5417C6.41675 32.9996 31.9738 40.6667 63.5001 40.6667Z"
                                    fill="#555555" stroke="white" stroke-width="11.4167" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </mask>
                            <g mask="url(#mask0_8_35)">
                                <path d="M-5 -5.00006H132V132H-5V-5.00006Z" fill="#3B7BDB" />
                            </g>
                        </g>
                        <defs>
                            <clipPath id="clip0_8_35">
                                <rect width="127" height="127" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <h2 class="font-bold text-xl text-black">Entry Data</h2>
                </a>
            </div>
        </div>
    </div>
    <footer class="z-20 flex flex-col items-center text-white bg-[#204E94] ">
        <div class="p-10 flex gap-12 ">
            <div class="flex flex-col gap-4 w-[30%]">
                <img src="{{ asset('images/logo_penta.png') }}" alt="Logo" class=" w-24">
                <p><span class="font-bold">PENTA</span> hadir untuk menjawab kebutuhan akan akses data yang cepat, akurat,
                    dan
                    mudah dipahami. Dari informasi Produksi hingga PDRB, kami menyajikannya secara interaktif agar lebih
                    dari
                    sekadar laporan</p>
            </div>
            <div class="flex flex-col gap-2">
                <p class="text-lg font-semibold">Entri Data</p>
                <p class=" text-nowrap">Statistik Produksi</p>
                <p>PDRB</p>
            </div>
            <div class="flex flex-col gap-2">
                <p class="text-lg font-semibold">Kontak</p>
                <p class="gap-2 flex items-center">
                    <svg width="24" height="26" viewBox="0 0 24 26" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M2.01562 11.6133C2.01562 6.22878 6.38062 1.86328 11.7656 1.86328C17.1506 1.86328 21.5156 6.22928 21.5156 11.6138C21.5156 15.1078 19.7126 18.0468 17.7526 20.2153C15.7866 22.3913 13.5896 23.8733 12.6341 24.4683C12.374 24.632 12.073 24.7189 11.7656 24.7189C11.4583 24.7189 11.1572 24.632 10.8971 24.4683C9.94213 23.8733 7.74463 22.3913 5.77863 20.2153C3.81862 18.0463 2.01562 15.1073 2.01562 11.6133Z"
                            fill="#8FBFFA" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M11.5156 15.7705C12.5765 15.7705 13.5939 15.3491 14.3441 14.5989C15.0942 13.8488 15.5156 12.8314 15.5156 11.7705C15.5156 10.7096 15.0942 9.69223 14.3441 8.94208C13.5939 8.19194 12.5765 7.77051 11.5156 7.77051C10.4548 7.77051 9.43734 8.19194 8.6872 8.94208C7.93705 9.69223 7.51563 10.7096 7.51562 11.7705C7.51563 12.8314 7.93705 13.8488 8.6872 14.5989C9.43734 15.3491 10.4548 15.7705 11.5156 15.7705Z"
                            fill="#2859C5" />
                    </svg>
                    <span class="text-lg">Alamat:</span>
                </p>
                <p>Nunukan Sel., Kabupaten Nunukan, Kalimantan Utara 77482</p>
                <p class="gap-2 flex items-center">
                    <svg width="22" height="23" viewBox="0 0 22 23" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M21.4164 11.7152C21.4164 6.05111 16.685 1.31034 11.0099 1.31348C5.3411 1.31662 0.614459 6.04797 0.614459 11.7152C0.614459 13.62 1.14208 15.5028 2.13452 17.1312L0.661569 21.0539C0.612707 21.1838 0.599171 21.3244 0.62234 21.4613C0.645509 21.5981 0.704555 21.7264 0.793459 21.833C0.882363 21.9397 0.997946 22.0208 1.12843 22.0682C1.25891 22.1156 1.39963 22.1276 1.53623 22.1028L6.68686 21.1716C8.04387 21.7905 9.51846 22.1092 11.0099 22.106C16.685 22.1091 21.4164 17.3841 21.4164 11.7152Z"
                            fill="#8FBFFA" />
                        <path
                            d="M11.5672 16.9149C13.2804 18.0141 15.0721 17.0688 16.2294 16.1329C16.8623 15.6209 16.8419 14.6882 16.286 14.0946L15.2747 13.0189C14.9716 12.6955 14.4518 12.6939 14.042 12.8619C13.552 13.0582 12.9742 13.1179 12.5266 12.9813C11.0411 12.529 10.4177 11.7564 9.91363 10.9697C9.51163 10.3431 9.70321 9.50301 10.0283 8.87645C10.234 8.47916 10.223 7.95468 9.89165 7.65161L8.80499 6.66074C8.28836 6.18965 7.50635 6.10799 7.03054 6.62148C5.84181 7.90443 5.04567 10.0134 5.89049 11.3293C7.33361 13.5748 9.32163 15.4718 11.5672 16.9149Z"
                            fill="#2859C5" />
                    </svg>
                    <span class="text-lg">WhatsApp:</span>
                </p>
                <p>+62851-1700-6504</p>
            </div>
            <div class="">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.6518208351936!2d117.69674297455455!3d4.091090195882671!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3215bb0e61b7f55f%3A0x6911c4a88241a219!2sBadan%20Pusat%20Statistik%20Kabupaten%20Nunukan!5e0!3m2!1sen!2sid!4v1751676296430!5m2!1sen!2sid"
                    width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="w-full px-10">
            <hr class="w-full">
        </div>
        <div class="flex justify-center items-center p-7">
            Copyright 2025 BPS Kabupaten Nunukan, Afriani dan Bagus, All rights reserved
        </div>
    </footer>
@endsection
