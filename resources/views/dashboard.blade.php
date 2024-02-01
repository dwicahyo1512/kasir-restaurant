<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="p-4 h-full sm:ml-64">
        <ChartVue />
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
            <x-splade-data store="navigation" default="{ opened: false }" />

            <!-- other elements... -->

            <button @click.prevent="navigation.opened = true" v-show="!navigation.opened">
                Open Navigation
            </button>
            <button @click.prevent="navigation.opened = false" v-show="navigation.opened">
                close Navigation
            </button>

            <nav v-show="navigation.opened">
                halooo farlii
            </nav>
            <div class="flex-auto p-4">
                <div class="flex flex-wrap -mx-3">
                    <div class="max-w-full px-3 lg:w-1/2 lg:flex-none">
                        <div class="flex flex-col h-full">
                            <p class="pt-2 mb-1 font-semibold">Built by developers</p>
                            <h5 class="font-bold">Argon Dashboard</h5>
                            <p class="mb-12">From colors, cards, typography to complex elements, you will find the full
                                documentation.</p>
                            <a class="mt-auto mb-0 font-semibold leading-normal text-sm group text-slate-500"
                                href="javascript:;">
                                Read More
                                <i
                                    class="fas fa-arrow-right ease-bounce text-sm group-hover:translate-x-1.25 ml-1 leading-normal transition-all duration-200"></i>
                            </a>
                        </div>
                    </div>
                    <div class="max-w-full px-3 mt-12 ml-auto text-center lg:mt-0 lg:w-5/12 lg:flex-none">
                        <div class="h-full bg-gradient-to-tl from-blue-500 to-violet-500 rounded-xl">
                            <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-tailwind/img/shapes/waves-white.svg"
                                class="absolute top-0 hidden w-1/2 h-full lg:block" alt="waves" />
                            <div class="relative flex items-center justify-center h-full">
                                <img class="relative z-20 w-full pt-6"
                                    src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-tailwind/img/illustrations/rocket-white.png"
                                    alt="rocket" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="bg-gradient-to-b from-blue-50 to-transparent">
                <section
                    class=" dark:from-blue-900 dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
                    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py- z-10 relative">
                        <a href="#"
                            class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-blue-700 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-800">
                            <span class="text-xs bg-blue-600 rounded-full text-white px-4 py-1.5 mr-3">New</span> <span
                                class="text-sm font-medium">Admin Panel v1.4 was launched! See what's new</span>
                            <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                        </a>
                        <h1
                            class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                            Build With Laravel Splade + Flowbite</h1>
                        <p
                            class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200">
                            I Love Laravel Ecosystem</p>
                        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                            <Link href=""
                                class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                            Get Started
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                            </Link>
                            <a href="#"
                                class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                Dokumentasi
                            </a>
                        </div>
                    </div>
                    <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16 lg:px-6">
                        <dl class="grid max-w-screen-md gap-8 mx-auto text-gray-900 sm:grid-cols-3 dark:text-white">
                            <div class="flex flex-col items-center justify-center">
                                <dt class="mb-2 text-3xl md:text-4xl font-extrabold">73M+</dt>
                                <dd class="font-light text-gray-500 dark:text-gray-400">developers</dd>
                            </div>
                            <div class="flex flex-col items-center justify-center">
                                <dt class="mb-2 text-3xl md:text-4xl font-extrabold">1B+</dt>
                                <dd class="font-light text-gray-500 dark:text-gray-400">contributors</dd>
                            </div>
                            <div class="flex flex-col items-center justify-center">
                                <dt class="mb-2 text-3xl md:text-4xl font-extrabold">4M+</dt>
                                <dd class="font-light text-gray-500 dark:text-gray-400">organizations</dd>
                            </div>
                        </dl>
                    </div>
                </section>
            </div>



        </div>
    </div>

</x-app-layout>
