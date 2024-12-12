<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('ADD SKILL') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 flex justify-center">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="width: 500px;">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <form action="{{ route('skill.store') }}" method="post">
                    @csrf
                    <div>
                        <label for="skill_name" class="font-medium text-lg">Skill Name</label>
                        <div class="my-3">
                            <input type="text" name="name" value="{{ old('name') }}"
                                   placeholder="Enter Skill Name"
                                   id="skill_name"
                                   class="border-gray-300 shadow-sm w-full rounded-lg text-black">
                            @error('name')
                                <span class="text-red-300 font-medium">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="proficiency_level" class="font-medium text-lg">Proficiency Level</label>
                        <div class="my-3">
                            <input type="text" name="proficiency_level" value="{{ old('level') }}"
                                   placeholder="Enter Proficiency Level (80%)"
                                   id="proficiency_level"
                                   class="border-gray-300 shadow-sm w-full rounded-lg text-black">
                            @error('proficiency_level')
                                <span class="text-red-300 font-medium">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button class="bg-emerald-400 rounded-lg text-black px-4 py-2 hover:bg-emerald-100" type="submit">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
