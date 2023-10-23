<x-app-layout>
    <div class="m-10">
            <h1 class="mb-2 text-2xl font-bold tracking-tight text-white">Title: {{$job->title}}</h1>
            <h2 class="mb-2 text-xl font-bold tracking-tight text-white ">Company: {{$job->company}}</h2>
            <h3 class="mb-2 text-md font-bold tracking-tight text-white ">Location: {{$job->location}}</h3>
            <p class="font-normal text-gray-700 dark:text-gray-400">Description: {{$job->description}}</p>
    </div>
</x-app-layout>
