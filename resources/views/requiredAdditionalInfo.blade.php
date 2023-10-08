<x-guest-layout>
    <form method="POST" action="{{ route('fillAdditionalInfo') }}">
        @csrf
        @method('PUT')
        <!-- Phone-->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Select faculty -->
        <div class="mt-4">
            <x-input-label for="faculty_id" :value="__('Faculty')" />
            <select id="faculty_id"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                name="faculty_id" :value="old('department_id')" required autocomplete="username">
                @foreach ($faculties as $id => $faculty)
                    <option value="{{ $id }}">{{ $faculty }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('faculty_id')" class="mt-2" />
        </div>

        <!-- Select department -->
        <div class="mt-4">
            <x-input-label for="department_id" :value="__('Department')" />
            <select id="department_id"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                name="department_id" :value="old('department_id')" required autocomplete="username">
                @foreach ($departments as $id => $department)
                    <option value="{{ $id }}">{{ $department }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('department')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Continue') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
