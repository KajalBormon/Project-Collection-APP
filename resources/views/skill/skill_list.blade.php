<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('ALL SKILL') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <table class="text-white w-full">
                <thead class="bg-cyan-950">
                    <tr class="border-b text-emerald-400">
                        <th class="px-3 py-3 text-center">#</th>
                        <th class="px-3 py-3 text-center">Skill Name</th>
                        <th class="px-3 py-3 text-center">Proficiency Level</th>
                        <th class="px-3 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-700">
                    @php $serial = 1 @endphp
                    @foreach ($skills as $skill)
                    <tr class="border-b">
                        <td class="px-3 py-3 text-center">{{ $serial++ }}</td>
                        <td class="px-3 py-1 text-center">{{ $skill->name }}</td>
                        <td class="px-3 py-1 text-center">{{ $skill->proficiency_level }}%</td>
                        <td class="px-3 py-1 text-center flex d-inline justify-center">

                            <a href="{{ route('skill.edit',$skill->id) }}" class="btn btn-primary bg-emerald-700 px-3 py-2 rounded-sm shadow-sm mr-2 hover:bg-emerald-600">Edit</a>

                            <form action="{{ route('skill.destroy',$skill->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary bg-red-700 px-3 py-2 rounded-sm shadow-sm mr-2 hover:bg-red-600">Delete</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>
