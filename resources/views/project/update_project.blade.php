<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('ADD PROJECT') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 flex justify-center">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="width: 500px;">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <form action="{{ route('project.update',$project->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="skill_name" class="font-medium text-lg">Project Name</label>
                        <div class="my-3">
                            <input type="text" name="name" value="{{ old('name', $project->name) }}"
                                   placeholder="Enter Project Name"
                                   id="skill_name"
                                   class="border-gray-300 shadow-sm w-full rounded-lg text-black">
                            @error('name')
                                <span class="text-red-300 font-medium">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="description" class="font-medium text-lg">Description</label>
                        <div class="my-3">
                                   <textarea cols="30" rows="4" type="text" name="description" value="{{ old('description', $project->description) }}"
                                   placeholder="Enter Description Text"
                                   id="description"
                                   class="border-gray-300 shadow-sm w-full rounded-lg text-black">{{ $project->description }}</textarea>
                            @error('description')
                                <span class="text-red-300 font-medium">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="font-medium text-lg">Skill Name</label>
                        <select name="skills[]" id="skills"
                                class="w-full border-gray-300 rounded-md shadow-sm"
                                multiple required>
                            @foreach ($skills as $skill)
                                <option value="{{ $skill->id }}"
                                        {{ in_array($skill->id, old('skills', [])) ? 'selected' : '' }} class="text-black">
                                    {{ $skill->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('skills')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="start_date" class="font-medium text-lg">Start Date</label>
                        <div class="my-3">
                            <input type="date" name="start_date" value="{{ old('start_date',$project->start_date) }}"
                                   placeholder="Enter Start Date"
                                   id="description"
                                   class="border-gray-300 shadow-sm w-full rounded-lg text-black">
                            @error('start_date')
                                <span class="text-red-300 font-medium">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="end_date" class="font-medium text-lg">End Date</label>
                        <div class="my-3">
                            <input type="date" name="end_date" value="{{ old('end_date',$project->end_date) }}"
                                   placeholder="Enter End Date"
                                   id="description"
                                   class="border-gray-300 shadow-sm w-full rounded-lg text-black">
                            @error('end_date')
                                <span class="text-red-300 font-medium">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="github_url" class="font-medium text-lg">Github URL</label>
                        <div class="my-3">
                            <input type="text" name="github_url" value="{{ old('github_url', $project->github_link) }}"
                                   placeholder="Enter github URL"
                                   id="github_url"
                                   class="border-gray-300 shadow-sm w-full rounded-lg text-black">
                            @error('github_url')
                                <span class="text-red-300 font-medium">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="live_link_url" class="font-medium text-lg">Live Link URL</label>
                        <div class="my-3">
                            <input type="text" name="live_link_url" value="{{ old('github_url', $project->github_url) }}"
                                   placeholder="Enter Live Link URL"
                                   id="github_url"
                                   class="border-gray-300 shadow-sm w-full rounded-lg text-black">
                            @error('live_link_url')
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
