<x-app-layout>
    @role('student')
<style>
    .tox-promotion a{
        background: none;
        color: inherit;
    }
</style>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class=" w-1/2">
                            <h1 class="text-center font-semibold text-xl text-gray-800 leading-tight">
                                Research
                            </h1>
                            <form method="POST" action="{{ route('research.store') }}" enctype="multipart/form-data">
                                @csrf
                                <!--student  Name -->
                                <div>
                                    <x-input-label for="student_name" :value="__('Student-Name')" />
                                    <x-text-input id="student_name" class="block mt-1 w-full" type="text"
                                        name="student_name" :value="old('student_name')" required autofocus
                                        placeholder="Student One , Student Two .....etc" autocomplete="student_name" />
                                    <x-input-error :messages="$errors->get('student_name')" class="mt-2" />
                                </div>
                                <!--teacher Name -->
                                <div class="mt-4">
                                    <x-input-label for="teacher_name" :value="__('Teachers')" />
                                    <select id="teacher_name"
                                        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        name="teacher_name" :value="old('teacher_name')" required autocomplete="username">
                                        @foreach ($teachers as $id => $teacher)
                                            <option value="{{ $id }}">{{ $teacher }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('department')" class="mt-2" />
                                </div>

                                <!-- Title -->
                                <div class="mt-4">
                                    <x-input-label for="title" :value="__('Title')" />
                                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                        :value="old('title')" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>

                                <!-- Abstract -->
                                <div class="mt-4">
                                    <div class="relative w-full min-w-[200px]">
                                        <label for="message"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Abstract</label>
                                        <textarea id="message" rows="4" name="abstract"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Your Abstract..."></textarea>
                                    </div><x-input-error :messages="$errors->get('abstract')" class="mt-2" />
                                </div>

                                <!-- Keyword -->
                                <div class="mt-4">
                                    <x-input-label for="keyword" :value="__('Keyword')" />

                                    <x-text-input id="keyword" class="block mt-1 w-full" type="text"
                                        placeholder="Write Main Keywords like this : kurd ,kurdstan , .... " name="keyword"
                                        :value="old('keyword')" required autocomplete="new-keyword" />

                                    <x-input-error :messages="$errors->get('keyword')" class="mt-2" />
                                </div>

                                <!-- content -->
                                <div class="mt-4">
                                    <div class="relative w-full min-w-[200px]">
                                        <label for="message"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Content</label>
                                        <textarea name="content" id="content" style="text-align: justify;"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Your content..."></textarea>
                                    </div><x-input-error :messages="$errors->get('content')" class="mt-2" />
                                </div>
                                <!-- Refrence -->
                                <div class="mt-4">
                                    <div class="relative w-full min-w-[200px]">
                                        <label for="message"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Refrence</label>
                                        <textarea id="refrence" rows="8" name="refrence"
                                            class="block p-2.5 w-full  text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Your refrence..."></textarea>
                                    </div><x-input-error :messages="$errors->get('refrence')" class="mt-2" />
                                </div>



                                <div class="flex items-center justify-end mt-4">
                                    <x-primary-button class="ml-4">
                                        {{ __('Submit') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="text-center font-semibold text-xl text-gray-800 leading-tight">Your Research Result</h1>
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                        <table class="w-8/12 text-left text-sm font-light mx-auto">
                                            <thead class="border-b border-gray-900 font-medium bg-gray-900 text-white ">
                                                <tr>
                                                    <th scope="col" class="px-6 py-4">Title</th>
                                                    <th scope="col" class="px-6 py-4">Teacher</th>
                                                    <th scope="col" class="px-6 py-4">Status</th>
                                                    <th scope="col" class="px-6 py-4">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($Researchs as $Research)
                                                    <tr
                                                        class="border-b border-gray-900    duration-300 ease-in-out hover:bg-gray-700 hover:text-white transition-all">
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                            {{ $Research->title }}
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                            {{ $Research->teacher->name }}
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                            {{ $Research->status }}
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium flex ">
                                                            <form
                                                                action="{{ route('research.destroy', ['research' => $Research->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button><i
                                                                        class="fa-solid fa-trash px-3 text-red-400"></i></button>

                                                            </form>
                                                            <form
                                                                action="{{ route('research.edit', ['research' => $Research->id]) }}"
                                                                method="get">
                                                                @csrf
                                                                <button><i
                                                                        class="fa-regular fa-pen-to-square text-blue-600"></i></button>
                                                            </form>
                                                            <a href="/download-pdf/{{ $Research->id }}"><i
                                                                    class="fa-solid fa-download  text-blue-400 px-3"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{ $Researchs->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endrole

    {{-- teacher Dashboard --}}

    @role('teacher')
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="text-center font-semibold text-xl text-gray-800 leading-tight">Researchs </h1>
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                        <table class="w-8/12 text-left text-sm font-light mx-auto">
                                            <thead class="border-b border-gray-900 font-medium bg-gray-900 text-white ">
                                                <tr>
                                                    <th scope="col" class="px-6 py-4">Title</th>
                                                    <th scope="col" class="px-6 py-4">Student</th>
                                                    <th scope="col" class="px-6 py-4">Status</th>
                                                    <th scope="col" class="px-6 py-4">Score</th>
                                                    <th scope="col" class="px-6 py-4">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($submetedResearchs as $Research)
                                                    <tr
                                                        class="border-b border-gray-900    duration-300 ease-in-out hover:bg-gray-700 hover:text-white transition-all">
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                            {{ $Research->title }}
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                            {{ $Research->student_name }}
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                            <form
                                                                action="{{ route('ChangeStatus', ['id' => $Research->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('put')

                                                                <select id="status"
                                                                    class=" w-auto text-sm border rounded-md text-gray-700  "
                                                                    name="status" required autocomplete="username">
                                                                    <option value="{{ $Research->status }}">
                                                                        {{ $Research->status }}</option>
                                                                    <option value="in_progress">
                                                                        in_progress</option>
                                                                    <option value="Accept">Accept</option>
                                                                    <option value="Reject">Reject</option>
                                                                </select>
                                                                <button>
                                                                    <i class="fa-solid fa-arrow-right text-xl"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                            <form
                                                                action="{{ route('AddScore', ['id' => $Research->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('put')

                                                                <x-text-input class=" w-20 text-sm border rounded-md text-gray-700  "
                                                                 value="{{ $Research->score }}" type="number" max='100' min="0" name="score" />
                                                                <button>
                                                                    <i class="fa-solid fa-arrow-right text-xl"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                        <td class="whitespace-nowrap px-6 py-4 font-medium text-center flex ">
                                                            <a href="/download-pdf/{{ $Research->id }}"><i
                                                                    class="fa-solid fa-download  text-blue-400"></i></a>
                                                            <form
                                                                action="{{ route('research.destroy', ['research' => $Research->id]) }}"
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
                    </div>
                </div>
                {{ $submetedResearchs->links() }}
            </div>
        </div>
    @endrole

    @role('super-admin')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
        <div class=" grid grid-cols-12">
            <div class=" col-span-2">
                <x-sidebar></x-sidebar>
            </div>
            <div class=" col-span-10">
@php

     //Students belonging to the department head
   $studentsOfDepartment = App\Models\User::CheckDepartment()
            ->RoleUserTarget('student')
            ->count();
    $teacherOfDepartment = App\Models\User::CheckDepartment()
        ->whereHas('roles', function ($query) {
            $query->where('name', 'teacher')
            ->OrWhere('name', 'super-admin');
        })
        ->count();
    $researchOfDepartment = App\Models\Researchs::where('department_id', auth()->user()->department_id)->count();

@endphp
                <x-dashboard studentsOfDepartment="{{ $studentsOfDepartment }} "
                    researchOfDepartment="{{ $researchOfDepartment }}" teacherOfDepartment="{{ $teacherOfDepartment }}">
                </x-dashboard>

            </div>
        </div>
    @endrole

    <script src="{{ asset('js/sidebar.js') }}"></script>
</x-app-layout>
