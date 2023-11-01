<x-app-layout>
    <div class="m-10">
        <h1 class="mb-2 text-2xl font-bold tracking-tight text-white">Title: {{$job->title}}</h1>
        @if ($job->company_website)
        <a href="{{$job->company_website}}" target="_blank">
            @else
            <a>
                @endif
                <h2 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Company: {{$job->company}}</h5>
            </a>

            <h3 class="mb-2 text-md font-bold tracking-tight text-white ">Location: {{$job->location}}</h3>
            <p class="font-normal text-gray-700 dark:text-gray-400">Description: {{$job->description}}</p>
            @if ($job->apply_url)
            <a href="{{$job->apply_url}}" target="_blank">
                <button class="font-xl bg-blue-900 text-white w-fit border-white border-2 ">APPLY</p>
            </a>
            @endif
    </div>
</x-app-layout>
