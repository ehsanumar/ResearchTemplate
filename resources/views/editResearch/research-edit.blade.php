<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class=" w-1/2">
                        <h1 class="text-center font-semibold text-xl text-gray-800 leading-tight">
                            Research
                        </h1>
                        <form method="POST" action="{{ route('research.update',['research' => $research->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <!--student  Name -->
                            <div>
                                <x-input-label for="student_name" :value="__('Student-Name')" />
                                <x-text-input id="student_name" class="block mt-1 w-full" type="text"
                                    name="student_name" :value=" $research->student_name " required autofocus
                                    placeholder="Student One , Student Two .....etc" autocomplete="student_name" />
                                <x-input-error :messages="$errors->get('student_name')" class="mt-2" />
                            </div>
                            <!--teacher Name -->
                            <div class="mt-4">
                                <x-input-label for="teacher_name" :value="__('Teachers')" />
                                <select id="teacher_name"
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    name="teacher_name"  required autocomplete="username">
                                    <option selected value="{{ $research->teacher_id }}">{{ $research->teacher->name }}</option>
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
                                    :value=" $research->title " required autocomplete="username" />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <!-- Abstract -->
                            <div class="mt-4">
                                <div class="relative w-full min-w-[200px]">
                                    <label for="message"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Abstract</label>
                                    <textarea id="message" rows="4" name="abstract"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Your Abstract..." > {{  $research->abstract }}</textarea>
                                </div><x-input-error :messages="$errors->get('abstract')" class="mt-2" />
                            </div>

                            <!-- Keyword -->
                            <div class="mt-4">
                                <x-input-label for="keyword" :value="__('Keyword')" />

                                <x-text-input id="keyword" class="block mt-1 w-full" type="text"
                                    placeholder="Write Main Keywords like this : kurd ,kurdstan , .... " name="keyword"
                                    :value=" $research->keyword " required autocomplete="new-keyword" />

                                <x-input-error :messages="$errors->get('keyword')" class="mt-2" />
                            </div>

                            <!-- content -->
                            <div class="mt-4">
                                <div class="relative w-full min-w-[200px]">
                                    <label for="message"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Content</label>
                                    <textarea name="content" id="content" style="text-align: justify;"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Your content...">{!! $research->content !!}</textarea>
                                </div><x-input-error :messages="$errors->get('content')" class="mt-2" />
                            </div>
                            <!-- Refrence -->
                            <div class="mt-4">
                                <div class="relative w-full min-w-[200px]">
                                    <label for="message"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Refrence</label>
                                    <textarea id="refrence" rows="4" name="refrence"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Your refrence...">{!! $research->refrence !!}</textarea>
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
</x-app-layout>
