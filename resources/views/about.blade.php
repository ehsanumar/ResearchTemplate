<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automatic system for create report research</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />



</head>
<body class="bg-gray-100">
<div class=" flex justify-between items-center   shadow-xl bg-white  ">
    <div class="basis-2/12  flex flex-row justify-between m-3"><!--logo-->
        <a class=" my-1 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 lg:mb-0 lg:mt-0"
           href="#">
            <img src="{{ asset('/image/logo1.png') }}" style="height: 50px" >
        </a>
    </div>
    <div class="basis-7/12 flex justify-center items-center">


        <div class="md:flex flex-1 flex-wrap ">
            <!-- Hamburger menu icon for mobile -->
            <div class="flex justify-end items-center p-2  md:hidden">
                <button id="hamburger-icon" class="focus:outline-none focus:hidden">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>

            <ul id="desktop-navbar" class="hidden md:flex font-normal font-serif ">
                <li class="space-x-4 -translate-x-16 m-2 p-2 bg-slate-50   border rounded-s-full   ">
                    <a href="/" class="  border   p-2  rounded-s-2xl  bg-yellow-600 text-white">Home</a>
                    <a href="/about" class=" py-2 p-2 hover:bg-yellow-600 hover:text-white">About</a>
                    @auth
                        <a class="py-2 p-2 hover:bg-yellow-600 hover:text-white" href="{{ route('dashboard') }}">Dashboard</a>
                    @else
                        <a class="py-2 p-2 hover:bg-yellow-600 hover:text-white" href="{{ route('register') }}">Register</a>
                        <a class="py-2 p-2 hover:bg-yellow-600 hover:text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endauth

                </li>
            </ul>

            <!-- Logout icon -->
            <div class="hidden md:flex flex-1 justify-end items-center ">
                <form method="POST"  action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class=" p-2 bg-red-400 text-white rounded" >Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--text buildin team-->
<section class="text-center my-6">
    <div class=" justify-between items-center pb-4 space-y-6 -translate-y-6">
        <h2 class="text-2xl font-bold">Building Team</h2>
        <p class="text-gray-600">Automatic system for create report research stuedent is developed by a group of professional computer science developers, under supervision of a full experience supervisor</p>
    </div>




    <!-- Container for demo purpose -->
    <div class="container my-32 -translate-y-32 mx-auto md:px-6">
        <!-- Section: Design Block -->



        <div class="grid gap-x-6 md:grid-cols-3 lg:gap-x-12">
            <div class="mb-24 md:mb-0">




                <!--border section-->
                <div
                    class="block rounded-lg bg-white shadow-2xl  hover:shadow-inner">

                    <div class="flex justify-center">
                        <div class="flex justify-center w-48 -mt-20">
                            <img src="{{asset('/image/hoshang.jpg')}}"
                                 class="mx-auto rounded-full shadow-lg" alt="Avatar" />
                        </div>
                    </div>
                    <div class="p-6">
                        <h5 class="mb-4 text-lg font-bold">Hoshang Qasim</h5>
                        <p class="mb-6">Supervisor</p>
                        <ul class="mx-auto flex list-inside justify-center">
                            <a href="#!" class="px-2">
                                <!-- github -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                     class="h-4 w-4 text-primary dark:text-primary-400">
                                    <path fill="currentColor"
                                          d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                </svg>
                            </a>
                            <a href="#!" class="px-2">
                                <!-- Linkedin -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                     class="h-3.5 w-3.5 text-primary dark:text-primary-400">
                                    <path fill="currentColor"
                                          d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z" />
                                </svg>
                            </a>
                            <a href="#!" class="px-2">
                                <!-- FACEBOOK -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary dark:text-primary-400"
                                     fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                                </svg>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>







            <div class="mb-24 md:mb-0">
                <div
                    class="block  rounded-lg bg-white shadow-2xl hover:shadow-inner ">

                    <div class="flex justify-center">
                        <div class="flex justify-center w-48 -mt-20">
                            <img src="{{asset('/image/zanear.jpg')}}"
                                 class="mx-auto rounded-full shadow-lg" alt="Avatar" />
                        </div>
                    </div>
                    <div class="p-6">
                        <h5 class="mb-4 text-lg font-bold">Zanear Zuber</h5>
                        <p class="mb-6">Front End Developer</p>
                        <ul class="mx-auto flex list-inside justify-center">
                            <a href="#!" class="px-2">
                                <!-- github -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                     class="h-4 w-4 text-primary dark:text-primary-400">
                                    <path fill="currentColor"
                                          d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                </svg>
                            </a>
                            <a href="#!" class="px-2">
                                <!-- Linkedin -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                     class="h-3.5 w-3.5 text-primary dark:text-primary-400">
                                    <path fill="currentColor"
                                          d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z" />
                                </svg>
                            </a>
                            <a href="#!" class="px-2">
                                <!-- FACEBOOK -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary dark:text-primary-400"
                                     fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                                </svg>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>






            <div
                class="block  rounded-lg bg-white shadow-2xl hover:shadow-inner ">

                <div class="flex justify-center">
                    <div class="flex justify-center w-48 -mt-20">
                        <img src="{{asset('/image/ehsan.jpg')}}"
                             class="mx-auto rounded-full shadow-lg" alt="Avatar" />
                    </div>
                </div>
                <div class="p-6">
                    <h5 class="mb-4 text-lg font-bold"> Ehsan umar</h5>
                    <p class="mb-6">Back End Developer</p>
                    <ul class="mx-auto flex list-inside justify-center">
                        <a href="#!" class="px-2">
                            <!-- github -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                 class="h-4 w-4 text-primary dark:text-primary-400">
                                <path fill="currentColor"
                                      d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                            </svg>
                        </a>
                        <a href="#!" class="px-2">
                            <!-- Linkedin -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                 class="h-3.5 w-3.5 text-primary dark:text-primary-400">
                                <path fill="currentColor"
                                      d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z" />
                            </svg>
                        </a>
                        <a href="#!" class="px-2">
                            <!-- FACEBOOK -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary dark:text-primary-400"
                                 fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                            </svg>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section: Design Block -->
</div>
<!-- Container for demo purpose -->



</body>
</html>
