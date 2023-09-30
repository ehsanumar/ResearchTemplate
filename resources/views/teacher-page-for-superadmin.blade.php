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
                    form
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
                                                            <option selected value="{{ $teacher->roles->first()->id }}">
                                                                {{ $teacher->roles->first()->name }}</option>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endrole
    <script src="{{ asset('js/sidebar.js') }}"></script>
</x-app-layout>
