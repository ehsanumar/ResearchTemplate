<x-app-layout>
    @role('super-admin')
        <x-slot name="header">
            <div class=" flex justify-between">
                <div class="">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Dashboard') }}
                    </h2>

                </div>
                <div class="space-x-10 flex items-center">
                    <form id="sortingForm" action="{{ route('sortTeacher') }}" method="post"
                        class="flex space-x-3 items-center ">
                        @csrf
                        <select name="sorting" id="sortingSelect"
                            class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Sort By</option>
                            <option value="Latest">Latest</option>
                            <option value="Oldest">Oldest</option>
                            <option value="A-z">A-z</option>
                            <option value="Z-a">Z-a</option>
                        </select>
                        <button type="submit">
                            <i class="fa-solid fa-sort text-2xl"></i>
                        </button>
                    </form>
                    <form id="searchForm" action="{{ route('searchTeacher') }}" method="post"
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
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                        <table class="w-auto ml-2 text-left text-sm font-light">
                                            <thead class="border-b border-gray-900 font-medium bg-gray-900 text-white ">
                                                <tr>
                                                    <th scope="col" class="px-6 py-4">Name</th>
                                                    <th scope="col" class="px-6 py-4">Email</th>
                                                    <th scope="col" class="px-6 py-4">Phone</th>
                                                    <th scope="col" class="px-6 py-4">Role</th>
                                                    <th scope="col" class="px-6 py-4">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sort as $teacher)
                                                    <tr
                                                        class="border-b border-gray-900    duration-300 ease-in-out hover:bg-gray-700 hover:text-white transition-all">

                                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                            {{ $teacher->name }}
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                            {{ $teacher->email }}
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                            {{ $teacher->phone }}
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                            <form
                                                                action="{{ route('teacher.update', ['teacher' => $teacher->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('put')

                                                                <select id="role"
                                                                    class=" w-full text-sm border rounded-md text-gray-700  "
                                                                    name="role" required autocomplete="username">
                                                                    <option selected
                                                                        value="{{ $teacher->roles[0]->id }}">
                                                                        {{ $teacher->roles[0]->name }}</option>
                                                                    <option value="student">
                                                                        student </option>
                                                                    <option value="admin">
                                                                        super-admin </option>
                                                                </select>
                                                                <button>
                                                                    <i class="fa-solid fa-arrow-right text-xl"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                            <form
                                                                action="{{ route('teacher.destroy', ['teacher' => $teacher->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button>
                                                                    <i
                                                                        class="fa-solid fa-trash-can px-3 cursor-pointer text-red-400"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                      @if (request()->has('sorting'))
                                    {{ $sort->appends(['sorting' => request('sorting')])->links() }}
                                    @endif
                                    @if (request()->has('search'))
                                    {{ $sort->appends(['search' => request('search')])->links() }}
                                    @endif

                                </div>
                            </div>
                        </div>
                </div>
            @endif
        @else
            <div class=" col-span-10 ml-5">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="w-auto ml-2 text-left text-sm font-light">
                                    <thead class="border-b border-gray-900 font-medium bg-gray-900 text-white ">
                                        <tr>
                                            <th scope="col" class="px-6 py-4">Name</th>
                                            <th scope="col" class="px-6 py-4">Email</th>
                                            <th scope="col" class="px-6 py-4">Phone</th>
                                            <th scope="col" class="px-6 py-4">Role</th>
                                            <th scope="col" class="px-6 py-4">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($AllUsersHaveRoleTeacher as $teacher)
                                            <tr
                                                class="border-b border-gray-900    duration-300 ease-in-out hover:bg-gray-700 hover:text-white transition-all">

                                                <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                    {{ $teacher->name }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                    {{ $teacher->email }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                    {{ $teacher->phone }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                    <form
                                                        action="{{ route('teacher.update', ['teacher' => $teacher->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('put')

                                                        <select id="role"
                                                            class=" w-full text-sm border rounded-md text-gray-700  "
                                                            name="role" required autocomplete="username">
                                                            <option selected value="{{ $teacher->roles[0]->id }}">
                                                                {{ $teacher->roles[0]->name }}</option>
                                                            <option value="student">
                                                                student </option>
                                                            <option value="admin">
                                                                super-admin </option>
                                                        </select>
                                                        <button>
                                                            <i class="fa-solid fa-arrow-right text-xl"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                    <form
                                                        action="{{ route('teacher.destroy', ['teacher' => $teacher->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button>
                                                            <i
                                                                class="fa-solid fa-trash-can px-3 cursor-pointer text-red-400"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $AllUsersHaveRoleTeacher->links() }}
                        </div>
                    </div>
                </div>
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
            sortingForm.action = "{{ route('sortTeacher') }}" + "?sorting=" + encodeURIComponent(selectedValue);
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
            searchForm.action = "{{ route('searchTeacher') }}" + "?search=" + encodeURIComponent(selectedValue2);
        });
    </script>

</x-app-layout>
