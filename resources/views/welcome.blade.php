 <div>
     <header>
         <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
             <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                 <a href="/" class="flex items-center">
                     <img src="favicon.ico" class="mr-3 h-6 sm:h-9" alt="MDC Logo" />
                     <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">MDC</span>
                 </a>
                 <theme-toggle />
                 <div class="flex items-center lg:order-2">
                     @if (Route::has('login'))
                         @auth
                             <Link href="{{ route('dashboard') }}"
                                 class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                             Dashboard</Link>
                         @else
                             <Link href="{{ route('login') }}"
                                 class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                             Log in</Link>
                             @if (Route::has('register'))
                                 <Link href="{{ route('register') }}"
                                     class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                 Get started</Link>
                             @endif
                         @endauth
                     @endif
                     <details class="dropdown dropdown-bottom dropdown-end">
                         <summary class="m-1 btn lg:hidden">
                             <span class="sr-only">Open main menu</span>
                             <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd"
                                     d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                     clip-rule="evenodd"></path>
                             </svg>
                             <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd"
                                     d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                     clip-rule="evenodd"></path>
                             </svg>
                         </summary>

                         <ul class="p-2 shadow menu dropdown-content z-[1] bg-base-100 rounded-box w-52">
                            <li>
                                <a href="#home"
                                    class="block py-2 pr-4 pl-3 text-white rounded bg-blue-700 lg:bg-transparent lg:text-blue-700 lg:p-0 dark:text-white"
                                    aria-current="page">Home</a>
                            </li>
                            <li>
                                <a href="#about"
                                    class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">About</a>
                            </li>
                            <li>
                                <a href="#contact"
                                    class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                            </li>
                         </ul>
                     </details>
                 </div>
                 <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1"
                     id="mobile-menu-2">
                     <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                         <li>
                             <a href="#home"
                                 class="block py-2 pr-4 pl-3 text-white rounded bg-blue-700 lg:bg-transparent lg:text-blue-700 lg:p-0 dark:text-white"
                                 aria-current="page">Home</a>
                         </li>
                         <li>
                             <a href="#about"
                                 class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">About</a>
                         </li>
                         <li>
                             <a href="#contact"
                                 class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                         </li>
                     </ul>
                 </div>
             </div>
         </nav>
     </header>

     <section class="bg-white dark:bg-gray-900" id="home">
         <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
             <div class="mr-auto place-self-center lg:col-span-7">
                 <h1
                     class="max-w-2xl mb-4 text-4xl font-extrabold leading-none md:text-5xl xl:text-6xl dark:text-white">
                     Restaurant </h1>
                 <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                     Selamat datang di portfolio kami untuk RestoPos, solusi kasir restoran yang inovatif dan efisien
                     untuk bisnis kuliner Anda. Di sini, kami akan memberikan gambaran singkat tentang fitur-fitur utama
                     dan keunggulan RestoPos yang kami banggakan.</p>
                 <Link href="{{ url('/register') }}"
                     class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                 Get started
                 <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd"
                         d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                         clip-rule="evenodd"></path>
                 </svg>
                 </Link>
                 {{-- <a href="#"
                     class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                     nope
                 </a> --}}
             </div>
             <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                 <img src="{{ asset('assets/store.png') }}" alt="mockup">
             </div>
         </div>
     </section>

     <section class="bg-white dark:bg-gray-900" id="software">
         <div class="py-8 lg:py-16 mx-auto max-w-screen-xl px-4">
             <h2
                 class="mb-8 lg:mb-16 text-3xl font-extrabold tracking-tight leading-tight text-center text-gray-900 dark:text-white md:text-4xl">
                 Framework And Library</h2>
             <div
                 class="grid grid-cols-2 gap-8 text-gray-500 sm:gap-32 md:grid-cols-3 l g:grid-cols-3 dark:text-gray-400">
                 <a href="splade.dev" class="flex justify-center items-center">
                     <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="223.7 321.27 576.61 77.37">
                         <path
                             d="M223.7 345.48c0 12.528 10.152 22.788 22.68 22.788h48.168c4.104 0 7.452 3.348 7.452 7.452s-3.348 7.452-7.452 7.452H227.48c-1.188 0-2.268.972-2.268 2.268v10.692c0 1.188 1.08 2.268 2.268 2.268h67.068c12.528 0 22.68-10.152 22.68-22.68s-10.152-22.788-22.68-22.788H246.38c-4.104 0-7.452-3.348-7.452-7.452s3.348-7.452 7.452-7.452h67.176c1.188 0 2.268-.972 2.268-2.268v-10.692c0-1.296-1.08-2.268-2.268-2.268H246.38c-12.528 0-22.68 10.152-22.68 22.68z"
                             style="font-variant-ligatures:normal;fill:#632bd1;stroke-width:0;stroke-miterlimit:2"
                             transform="translate(0 -.821)" />
                         <path
                             d="M398.73 322.8h-65.556c-1.188 0-2.268.972-2.268 2.268v10.692c0 1.296 1.08 2.268 2.268 2.268h65.556c4.104 0 7.452 3.348 7.452 7.452s-3.348 7.452-7.452 7.452h-65.556c-1.188 0-2.268 1.08-2.268 2.268v40.932c0 1.188 1.08 2.268 2.268 2.268h10.692c1.296 0 2.268-1.08 2.268-2.268v-27.864h52.596c12.528 0 22.788-10.26 22.788-22.788s-10.26-22.68-22.788-22.68z"
                             style="font-variant-ligatures:normal;fill:#8032c1;stroke-width:0;stroke-miterlimit:2"
                             transform="translate(0 -.821)" />
                         <path
                             d="M511.41 383.17h-52.812c-5.832 0-10.692-4.86-10.692-10.692v-47.412c0-1.188-.972-2.268-2.268-2.268h-10.692c-1.188 0-2.268 1.08-2.268 2.268v47.412c0 14.256 11.664 25.92 25.92 25.92h52.812c1.296 0 2.268-.972 2.268-2.268v-10.692c0-1.296-.972-2.268-2.268-2.268z"
                             style="font-variant-ligatures:normal;fill:#9d39b2;stroke-width:0;stroke-miterlimit:2"
                             transform="translate(0 -.821)" />
                         <path
                             d="M666.41 322.8h-58.428c-1.188 0-2.268 1.08-2.268 2.268v10.692c0 1.296 1.08 2.268 2.268 2.268h58.428c8.208 0 14.796 6.696 14.796 14.904v15.336c0 8.208-6.588 14.904-14.796 14.904h-45.468v-27.54c0-1.296-.972-2.268-2.268-2.268h-10.692c-1.188 0-2.268.972-2.268 2.268v40.5c0 1.188 1.08 2.268 2.268 2.268h58.428c16.632 0 30.132-13.5 30.132-30.132v-15.336c0-16.632-13.5-30.132-30.132-30.132z"
                             style="font-variant-ligatures:normal;fill:#d64893;stroke-width:0;stroke-miterlimit:2"
                             transform="translate(0 -.821)" />
                         <path
                             d="M797.93 322.8h-86.184c-1.188 0-2.268.972-2.268 2.268v10.692c0 1.296 1.08 2.268 2.268 2.268h86.184c1.296 0 2.376-.972 2.376-2.268v-10.692c0-1.296-1.08-2.268-2.376-2.268zm0 60.372h-73.224v-14.904h57.996c1.296 0 2.268-1.08 2.268-2.376v-10.584c0-1.296-.972-2.376-2.268-2.376h-70.956c-1.188 0-2.268 1.08-2.268 2.376v40.824c0 1.188 1.08 2.268 2.268 2.268h86.184c1.296 0 2.376-1.08 2.376-2.268V385.44c0-1.296-1.08-2.268-2.376-2.268z"
                             style="font-variant-ligatures:normal;fill:#f34f83;stroke-width:0;stroke-miterlimit:2"
                             transform="translate(0 -.821)" />
                         <path style="fill:#b940a2;stroke-width:.46399999"
                             d="M556.66 322.09c-.007 0-2.837 5.648-6.288 12.551a8640.808 8640.808 0 0 0-6.276 12.564c0 .007 5.654.013 12.564.013s12.564-.006 12.564-.013c0-.007-2.824-5.66-6.275-12.564a4042.98 4042.98 0 0 0-6.288-12.551zm0 27.062h-13.544l-6.772 13.544-6.772 13.544h54.176l-6.774-13.544-6.77-13.544zm0 29.023h-28.056l-5.32 10.639-5.322 10.644h77.395l-5.322-10.644-5.322-10.639z"
                             transform="translate(0 -.821)" />
                     </svg>
                 </a>
                 <a href="https://laravel.com/" class="flex justify-center items-center">
                     <img src="{{ asset('assets/laravel.png') }}" alt="Laravel">
                 </a>
                 <a href="https://vuejs.org/" class="flex justify-center items-center">
                     <img src="{{ asset('assets/vue.png') }}" alt="vue">
                 </a>
             </div>
         </div>
     </section>

     <section class="bg-gray-50 dark:bg-gray-800" id="about">
         <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
             <div class="max-w-screen-md mb-8 lg:mb-16">
                 <h2 class="mb-4 text-4xl font-extrabold text-gray-900 dark:text-white">Tentang RestoPos</h2>
                 <p class="text-gray-500 sm:text-xl dark:text-gray-400">RestoPos adalah sistem kasir restoran yang
                     dirancang khusus untuk memenuhi kebutuhan bisnis kuliner, mulai dari restoran, kafe, hingga warung
                     makan. Dengan fokus pada kecepatan, keandalan, dan kemudahan penggunaan, RestoPos membantu
                     meningkatkan efisiensi operasional dan pengalaman pelanggan.</p>
             </div>
             <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
                 <div>
                     <div
                         class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
                         <svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" fill="currentColor"
                             viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd"
                                 d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                 clip-rule="evenodd"></path>
                         </svg>
                     </div>
                     <h3 class="mb-2 text-xl font-bold dark:text-white">Sederhana dan Mudah Digunakan</h3>
                     <p class="text-gray-500 dark:text-gray-400">Antarmuka yang intuitif membuat pengguna dapat dengan
                         cepat memahami dan menguasai sistem kasir kami.</p>
                 </div>
                 <div>
                     <div
                         class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
                         <svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" fill="currentColor"
                             viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                             <path
                                 d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z">
                             </path>
                         </svg>
                     </div>
                     <h3 class="mb-2 text-xl font-bold dark:text-white">Dukungan Pelanggan yang Handal</h3>
                     <p class="text-gray-500 dark:text-gray-400">Tim dukungan pelanggan kami siap membantu 24/7 untuk
                         menangani pertanyaan, masalah, atau permintaan bantuan apapun.</p>
                 </div>
                 <div>
                     <div
                         class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
                         <svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" fill="currentColor"
                             viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd"
                                 d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                 clip-rule="evenodd"></path>
                             <path
                                 d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z">
                             </path>
                         </svg>
                     </div>
                     <h3 class="mb-2 text-xl font-bold dark:text-white">Peningkatan Efisiensi Operasiona</h3>
                     <p class="text-gray-500 dark:text-gray-400">RestoPos membantu mengoptimalkan operasional restoran
                         Anda, mulai dari pengelolaan pesanan hingga manajemen inventori, sehingga Anda dapat fokus pada
                         pertumbuhan bisnis Anda.</p>
                 </div>
             </div>
         </div>
     </section>

     <section class="bg-white dark:bg-gray-900" id="contact">
         <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
             <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                 <h2 class="mb-4 text-4xl font-extrabold text-gray-900 dark:text-white">Solusi Kasir Restoran
                     Terpercaya dengan Keamanan Data Unggulan
                 </h2>
                 <p class="mb-4">Kami di RestoPos berkomitmen untuk memberikan solusi kasir restoran yang tidak hanya
                     efisien dan inovatif, tetapi juga menempatkan keamanan data Anda sebagai prioritas utama. Dengan
                     teknologi yang canggih dan sistem keamanan yang terpercaya, kami memberikan jaminan bahwa data Anda
                     akan terlindungi dengan baik.</p>
                 <p>Bergabunglah dengan kami di RestoPos dan percayakan bisnis Anda
                     kepada kami untuk pengalaman yang andal dan terpercaya dalam mengelola restoran Anda.</p>
             </div>
             <div class="grid grid-cols-2 gap-4 mt-8">
                 <img class="w-full rounded-lg"
                     src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-2.png"
                     alt="office content 1">
                 <img class="mt-4 w-full lg:mt-10 rounded-lg"
                     src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-1.png"
                     alt="office content 2">
             </div>
         </div>
     </section>

     <section class="bg-gray-50 dark:bg-gray-900">
         <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
             <div class="max-w-screen-lg text-gray-500 sm:text-lg dark:text-gray-400">
                 <h2 class="mb-4 text-4xl font-bold text-gray-900 dark:text-white"><span class="font-extrabold">siap
                         membantu 24/7 </span>untuk menangani pertanyaan, masalah, atau permintaan bantuan apapun</h2>
                 <p class="mb-4 font-light">Jika Anda tertarik untuk mengetahui lebih lanjut tentang RestoPos atau
                     ingin memulai implementasi di restoran Anda, jangan ragu untuk menghubungi kami di
                     dwicahyo.1512@gmal.com atau 083851574470.</p>
                 <p class="mb-4 font-medium">Tim kami siap membantu Anda dengan setiap pertanyaan atau kebutuhan yang
                     Anda miliki. Kami percaya bahwa RestoPos akan menjadi mitra yang andal dalam meningkatkan efisiensi
                     operasional dan memberikan pengalaman pelanggan yang lebih baik bagi bisnis Anda. Terima kasih atas
                     minat dan kepercayaan Anda pada RestoPos </p>
                 <a href="#"
                     class="inline-flex items-center font-medium text-blue-600 hover:text-blue-800 dark:text-blue-500 dark:hover:text-blue-700">
                     Learn more
                     <svg class="ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                         <path fill-rule="evenodd"
                             d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                             clip-rule="evenodd"></path>
                     </svg>
                 </a>
             </div>
         </div>
     </section>
     <footer class="p-4 bg-gray-50 sm:p-6 dark:bg-gray-800">
         <div class="mx-auto max-w-screen-xl">
             <div class="md:flex md:justify-between">
                 <div class="mb-6 md:mb-0">
                     <a href="https://flowbite.com" class="flex items-center">
                         <img src="favicon.ico" class="mr-3 h-8" alt="FlowBite Logo" />
                         <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">MDC</span>
                     </a>
                 </div>
                 <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                     <div>
                         <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Resources</h2>
                         <ul class="text-gray-600 dark:text-gray-400">
                             <li class="mb-4">
                                 <a href="https://laravel.com/" class="hover:underline">Laravel</a>
                             </li>
                             <li class="mb-4">
                                 <a href="https://splade.dev/" class="hover:underline">Splade</a>
                             </li>
                             <li class="mb-4">
                                 <a href="https://vuejs.org/" class="hover:underline">Vue Js</a>
                             </li>
                             <li class="mb-4">
                                 <a href="https://tailwindcss.com/" class="hover:underline">Tailwind Css</a>
                             </li>
                             <li class="mb-4">
                                 <a href="https://daisyui.com/" class="hover:underline">Daisy UI</a>
                             </li>
                         </ul>
                     </div>
                     <div>
                         <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow us</h2>
                         <ul class="text-gray-600 dark:text-gray-400">
                             <li class="mb-4">
                                 <a href="https://github.com/dwicahyo1512" class="hover:underline ">Github</a>
                             </li>
                             <li>
                                 <a href="#" class="hover:underline">Discord</a>
                             </li>
                         </ul>
                     </div>
                     <div>
                         <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                         <ul class="text-gray-600 dark:text-gray-400">
                             <li class="mb-4">
                                 <a href="#" class="hover:underline">Privacy Policy</a>
                             </li>
                             <li>
                                 <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
             <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
             <div class="sm:flex sm:items-center sm:justify-between">
                 <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="#"
                         class="hover:underline">Your website</a>. All Rights Reserved.
                 </span>
                 <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                     <a href="https://web.facebook.com/cahyofc.dwi"
                         class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                         <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                             <path fill-rule="evenodd"
                                 d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                 clip-rule="evenodd" />
                         </svg>
                     </a>
                     <a href="https://www.instagram.com/m_dwi_cahyo15/"
                         class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                         <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                             <path fill-rule="evenodd"
                                 d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                 clip-rule="evenodd" />
                         </svg>
                     </a>
                     <a href="https://twitter.com/MDwiCahyo15"
                         class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                         <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                             <path
                                 d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                         </svg>
                     </a>
                     <a href="https://github.com/dwicahyo1512"
                         class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                         <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                             <path fill-rule="evenodd"
                                 d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                 clip-rule="evenodd" />
                         </svg>
                     </a>
                 </div>
             </div>
         </div>
     </footer>
 </div>
