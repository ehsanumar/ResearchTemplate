<x-app-layout>
    @role('super-admin')
        <x-slot name="header">
            <div class=" flex justify-between">
                <div class="">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Dashboard') }}
                    </h2>

                </div>
                <div class=" space-x-4">
                    <i class="fa-solid fa-filter text-2xl"></i>
                    <i class="fa-solid fa-magnifying-glass text-2xl"></i>
                </div>
            </div>
        </x-slot>
        <div class=" grid grid-cols-12" style="overflow-x: hidden;">
            <div class=" col-span-2">

                <x-sidebar></x-sidebar>
            </div>
            <div class=" col-span-10 ml-5">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="w-auto ml-2 text-left text-sm font-light">
                                    <thead class="border-b border-gray-900 font-medium bg-gray-900 text-white ">
                                        <tr>
                                            <th scope="col" class="px-6 py-4">Title</th>
                                            <th scope="col" class="px-6 py-4">Student</th>
                                            <th scope="col" class="px-6 py-4">Teacher</th>
                                            <th scope="col" class="px-6 py-4">Status</th>
                                            <th scope="col" class="px-6 py-4">Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Researchs as $research)
                                            <tr
                                                class="border-b border-gray-900    duration-300 ease-in-out hover:bg-gray-700 hover:text-white transition-all">

                                                <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                    {{ $research->title }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                    {{ $research->student_name }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                    {{ $research->teacher->name }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                    {{ $research->status }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4 font-medium text-center ">
                                                     <a href="/download-pdf/{{ $research->id }}"><i
                                                                    class="fa-solid fa-download text-xl text-red-400"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endrole
    <script src="{{ asset('js/sidebar.js') }}"></script>
</x-app-layout>
