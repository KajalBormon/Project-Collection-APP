<x-app-layout>
    @push('style')
        <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    @endpush
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('ALL PROJECT') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="sm:px-6 lg:px-8 ">
            <x-message></x-message>
            <table class="text-white w-full">
                <thead class="bg-cyan-950">
                    <tr class="border-b text-emerald-400">
                        <th class="px-3 py-3 text-center w-2">#</th>
                        <th class="px-3 py-3 text-center">Project Name</th>
                        <th class="px-3 py-3 text-center">Description</th>
                        <th class="px-3 py-3 text-center" >Skills</th>
                        <th class="px-3 py-3 text-center">Start Date</th>
                        <th class="px-3 py-3 text-center">End Date</th>
                        <th class="px-3 py-3 text-center">Github URL</th>
                        <th class="px-3 py-3 text-center">Live Link URL</th>
                        <th class="px-3 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-700">
                    @php $serial = 1 @endphp
                    @foreach ($projects as $project)
                    <tr class="border-b">
                        <td class="px-3 py-3 text-center w-2">{{ $serial++ }}</td>
                        <td class="px-3 py-1 text-center">{{ $project->name }}</td>
                        <td class="px-3 py-1 text-center">{{ $project->description }}</td>
                        <td class="px-3 py-1 text-center">
                            @foreach ($project->skills as $skill)
                                <span class="bg-emerald-500 text-black px-1 py-1 mr-1 mb-1 rounded-md text-[3]">{{ $skill->name }} </span>
                            @endforeach
                        </td>
                        <td class="px-3 py-1 text-center">{{ $project->start_date }}</td>
                        <td class="px-3 py-1 text-center">{{ $project->end_date }}</td>
                        <td class="px-3 py-1 text-center">
                            <a href="{{ $project->github_url }}" target="_blank" class="text-blue-400 hover:underline">

                                {{ Str::limit($project->github_url, 15) }}
                            </a>
                        </td>
                        <td class="px-3 py-1 text-center ">
                            <a href="{{ $project->live_link_url }}" target="_blank" class="text-blue-400 hover:underline">
                                {{ Str::limit($project->live_link_url, 15) }}
                            </a>
                        </td>
                        <td class="px-3 py-1 text-center flex d-inline justify-center">

                            <form action="{{ route('project.edit',$project->id) }}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm bg-emerald-700 px-3 py-2 rounded-sm shadow-sm mr-2 hover:bg-emerald-600">Edit</button>
                            </form>

                            <form action="{{ route('project.destroy',$project->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary btn-sm bg-red-700 px-3 py-2 rounded-sm shadow-sm mr-2 hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>
