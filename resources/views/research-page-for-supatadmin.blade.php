@php
    $teachers = App\Models\User::CheckDepartment()
                ->RoleUserTarget('teacher')
                ->get(['name', 'id'])
@endphp
<x-app-layout>
    @role('super-admin')
        <x-slot name="header">
            <div class=" flex justify-between">
                <div class="">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Dashboard') }}
                    </h2>

                </div>
                <div class=" space-x-4 flex">
                    <form action="{{ route('filterResearch') }}" method="get" class="flex space-x-3 items-center ">
                        <select name="teacherfilter"
                            class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Filter By Teacher</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->name}}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>

                        <select name="statusfilter"
                            class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Filter By Status</option>
                            <option value="in_progress">in_progress</option>
                            <option value="Accept">Accept</option>
                            <option value="Reject">Reject</option>
                        </select>

                        <div class="">
                           <button type="submit" class="py-3 px-4 pr-9 block w-full  text-sm"><i class="fa-solid fa-filter text-2xl"></i></button>
                        </div>
                    </form>
                    <form id="sortingForm" action="{{ route('sortResearch') }}" method="post"
                        class="flex space-x-3 items-center ">
                        @csrf
                        <select name="sorting" id="sortingSelect" onchange="this.form.submit()"
                            class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Sort By</option>
                            <option value="Latest">Latest</option>
                            <option value="Oldest">Oldest</option>
                            <option value="A-z">A-z</option>
                            <option value="Z-a">Z-a</option>
                        </select>

                    </form>
                    <form id="searchForm" action="{{ route('searchResearch') }}" method="post"
                        class="flex items-center space-x-3">
                        @csrf
                        <div>
                            <x-text-input id="searchSelect" class="block mt-1 w-full" type="text" name="search"
                                placeholder="Search ..." :value="old('search')" required autofocus autocomplete="search" />
                            <x-input-error :messages="$errors->get('student_name')" class="mt-2" />
                        </div>
                        <button>
                            <i class="fa-solid fa-magnifying-glass text-2xl"></i>
                        </button>
                    </form>
                </div>
            </div>
        </x-slot>
        <div class=" grid grid-cols-12" style="overflow-x: hidden;">
            <div class=" col-span-2">

                <x-sidebar></x-sidebar>
            </div>
            @if (isset($sort))
                <div class=" col-span-10 ml-5">
                    @if ($sort->isEmpty())
                        <x-no-record />
                    @else
                        <div class="flex flex-col overflow-x-auto">
                            <div class="sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full  py-2 sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                        <table class="w-auto ml-2 text-left text-sm font-light">
                                            <thead class="border-b border-gray-900 font-medium bg-gray-900 text-white ">
                                                <tr>
                                                    <th scope="col" class="px-6 py-4">Title</th>
                                                    <th scope="col" class="px-6 py-4">Student</th>
                                                    <th scope="col" class="px-6 py-4">Teacher</th>
                                                    <th scope="col" class="px-6 py-4">Score</th>
                                                    <th scope="col" class="px-6 py-4">Status</th>
                                                    <th scope="col" class="px-6 py-4">Download</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sort as $research)
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
                                                            {{ $research->score }}
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
                        @if (request()->has('sorting'))
                            {{ $sort->appends(['sorting' => request('sorting')])->links() }}
                        @endif
                        @if (request()->has('search'))
                            {{ $sort->appends(['search' => request('search')])->links() }}
                        @endif
                        @if (request()->has('statusfilter'))
                            {{ $sort->appends(['statusfilter' => request('statusfilter')])->links() }}
                        @endif
                        @if (request()->has('teacherfilter'))
                            {{ $sort->appends(['teacherfilter' => request('teacherfilter')])->links() }}
                        @endif
                </div>
            @endif
        @else
            <div class=" col-span-10 ml-2">
                <div class="flex flex-col overflow-x-auto">
                    <div class="sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full  py-2 sm:px-6 lg:px-8">
                            <a href= "{{ route('downloadAllResearchs') }}" class="bg-red-500 hover:bg-gray-700 text-white ml-2   font-bold py-2 px-4 rounded">Download all Researchs</a>
                            <div class="overflow-hidden ">
                                <table class="w-auto ml-2 mt-3 text-left text-sm font-light">
                                    <thead class="border-b border-gray-900 font-medium bg-gray-900 text-white ">
                                        <tr>
                                            <th scope="col" class="px-6 py-4">Title</th>
                                            <th scope="col" class="px-6 py-4">Student</th>
                                            <th scope="col" class="px-6 py-4">Teacher</th>
                                            <th scope="col" class="px-6 py-4">Score</th>
                                            <th scope="col" class="px-6 py-4">Status</th>
                                            <th scope="col" class="px-6 py-4">Actions</th>
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
                                                    {{ $research->score }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                    {{ $research->status }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4 font-medium text-center  flex">
                                                    <a href="/download-pdf/{{ $research->id }}"><i
                                                            class="fa-solid fa-download  text-blue-400"></i></a>
                                                    <form
                                                        action="{{ route('research.destroy', ['research' => $research->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button><i
                                                                class="fa-solid fa-trash px-3 text-red-400"></i></button>

                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{ $Researchs->links() }}
            </div>
            @endif
        </div>
    @endrole
    <script src="{{ asset('js/sidebar.js') }}"></script>
    {{-- use for display selected value in URL --}}
    <script>
        // Get references to the form and select element
        const sortingForm = document.getElementById('sortingForm');
        const sortingSelect = document.getElementById('sortingSelect');

        // Add an event listener to the select element
        sortingSelect.addEventListener('change', function() {
            // Get the selected value
            const selectedValue = sortingSelect.value;

            // Update the form action with the selected value
            sortingForm.action = "{{ route('sortResearch') }}" + "?sorting=" + encodeURIComponent(selectedValue);
        });
    </script>


    <script>
        const searchForm = document.getElementById('searchForm');
        const searchSelect = document.getElementById('searchSelect');

        // Add an event listener to the select element
        searchSelect.addEventListener('change', function() {
            // Get the selected value
            const selectedValue2 = searchSelect.value;

            // Update the form action with the selected value
            searchForm.action = "{{ route('searchResearch') }}" + "?search=" + encodeURIComponent(selectedValue2);
        });
    </script>
</x-app-layout>
