<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
  <!-- Main navigation container -->
<nav
  class="relative flex w-full flex-wrap items-center justify-between bg-[#FBFBFB] py-2 text-neutral-500 shadow-lg  focus:text-neutral-700 dark:bg-neutral-600 lg:py-4"
  data-te-navbar-ref>
  <div class="flex w-full flex-wrap items-center justify-between px-3">
    <div>
      <a
        class=" my-1 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 lg:mb-0 lg:mt-0"
        href="#">
        <img
          class=""
          src="{{ asset('/image/logo1.png') }}"
          style="height: 40px"
          alt="TE Logo"
          loading="lazy" />
      </a>
    </div>

    <!-- Hamburger button for mobile view -->


    <!-- Collapsible navbar container -->
    <div
      class="!visible mt-2 hidden flex-grow basis-[100%] items-center lg:mt-0 lg:!flex lg:basis-auto"
      id="navbarSupportedContent4"
      data-te-collapse-item>
      <!-- Left links -->
      <ul
        class="list-style-none mr-auto flex flex-col pl-0 lg:mt-1 lg:flex-row"
        data-te-navbar-nav-ref>
        <!-- Home link -->
        <li
          class="my-4 lg:my-0 lg:pl-2 lg:pr-1"
          data-te-nav-item-ref>
          <a
            class="text-neutral-700 text-lg font-bold disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
            aria-current="page"
            href="#"
            data-te-nav-link-ref
            >Soran Uneversity</a
          >
        </li>
      </ul>

      <div class="flex items-center px-2">

<a class="mr-4 hover:text-neutral-700" href="">Home</a>
<a class="mr-4 hover:text-neutral-700" href="">About</a>
@auth
<a class="mr-4 hover:text-neutral-700" href="{{ route('dashboard') }}">Dashboard</a>
  <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
@else
<a class="mr-4 hover:text-neutral-700" href="{{ route('register') }}">Register</a>
<a class="hover:text-neutral-700" href="{{ route('login') }}">{{ __('Login') }}</a>
@endauth
      </div>
    </div>
  </div>
</nav>
</body>

</html>
