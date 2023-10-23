<div>
    <a href="{{route('jobs.show', $job->id)}}">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$job->title}}</h5>
    </a>
    @if ($job->company_website)
    <a href="{{$job->company_website}}" target="_blank">
        @else
        <a>
            @endif
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{$job->company}}</h5>
        </a>
        <p class="mb-3 font-normal text-lg text-gray-700 dark:text-gray-400">{{$job->location}}</p>
</div>
