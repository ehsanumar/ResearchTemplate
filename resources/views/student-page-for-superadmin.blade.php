<x-app-layout>
    @role('super-admin')
        <x-slot name="header">
            <div class=" flex justify-between">
                <div class="">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Dashboard') }}
                    </h2>

                </div>
                <div class=" space-x-10 flex  items-center">
                    <form id="sortingForm" action="{{ route('sortStudent') }}" method="post"
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

                    <form id="searchForm" action="{{ route('searchStudent') }}" method="post"
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
            <div class="col-span-2">
                <x-sidebar></x-sidebar>
            </div>
            {{-- sort user --}}
            @if (isset($sort))
            <div class=" col-span-10 ml-5 ">
                        @if ($sort->isEmpty())
                            <x-no-record />
                        @else
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                        <table class="w-auto text-left text-sm font-light ">
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
                                                @foreach ($sort as $student)
                                                    <tr
                                                        class="border-b border-gray-900    duration-300 ease-in-out hover:bg-gray-700 hover:text-white transition-all">

                                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                            {{ $student->name }}
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                            {{ $student->email }}
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                            {{ $student->phone }}
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                            <form
                                                                action="{{ route('student.update', ['student' => $student->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('put')

                                                                <select id="role"
                                                                    class=" w-full text-sm border rounded-md text-gray-700  "
                                                                    name="role" required autocomplete="username">
                                                                    <option selected
                                                                        value="{{ $student->roles->first()->id }}">
                                                                        {{ $student->roles->first()->name }}</option>
                                                                    <option value="teacher">
                                                                        teacher </option>
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
                                                                action="{{ route('student.destroy', ['student' => $student->id]) }}"
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
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                {{-- withOut Sort --}}
                <div class=" col-span-10 ml-5 ">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="w-auto text-left text-sm font-light ">
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
                                            @foreach ($AllUsersHaveRoleStudent as $student)
                                                <tr
                                                    class="border-b border-gray-900    duration-300 ease-in-out hover:bg-gray-700 hover:text-white transition-all">

                                                    <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                        {{ $student->name }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                        {{ $student->email }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                        {{ $student->phone }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                        <form
                                                            action="{{ route('student.update', ['student' => $student->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('put')

                                                            <select id="role"
                                                                class=" w-full text-sm border rounded-md text-gray-700  "
                                                                name="role" required autocomplete="username">
                                                                <option selected
                                                                    value="{{ $student->roles->first()->id }}">
                                                                    {{ $student->roles->first()->name }}</option>
                                                                <option value="teacher">
                                                                    teacher </option>
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
                                                            action="{{ route('student.destroy', ['student' => $student->id]) }}"
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
            sortingForm.action = "{{ route('sortStudent') }}" + "?sorting=" + encodeURIComponent(selectedValue);
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
            searchForm.action = "{{ route('searchStudent') }}" + "?search=" + encodeURIComponent(selectedValue2);
        });
    </script>



</x-app-layout>
