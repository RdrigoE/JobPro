<x-app-layout>
    <header class="bg-gray-800 lg:p-20 p-5 border-solid border-gray-900 border-2 ">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Your Path to Professional Excellence</h1>
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Here at
            JobPro is your trusted partner in the world of career development and job placement. We are dedicated to
            helping individuals reach their full potential by connecting them with the right opportunities and
            resources. Whether you're a job seeker looking to advance your career or an employer seeking top talent,
            JobPro is here to streamline the process and make your journey to professional excellence a smooth and
            rewarding one. Join us today and let's shape a brighter future together.</p>
    </header>
    <div class="flex flex-col justify-start">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 m-auto lg:p-20 p-5 bg-gray-800 ">
            @foreach ($jobListings as $job)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <x-card-time :updated_at="$job->updated_at" />
                <div class="p-5 relative">
                    <x-card-content :job="$job" />
                    <div class="flex justify-between">
                        <a href="/jobs/{{$job->id}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                        @if (in_array($job->id, $savedJobs))
                        <form method="post" action="{{route('saved-jobs.destroy', $job->id)}}">
                            @csrf
                            @method('DELETE')
                            <a class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-200 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <button type="submit">
                                    Unsave
                                </button>
                            </a>
                        </form>
                        @else
                        <form method="post" action="{{route('saved-jobs.store')}}">
                            @csrf
                            <input value="{{$job->id}}" name="job_listing_id" hidden />
                            <a class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <button type="submit">
                                    Save Job
                                </button>
                            </a>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="p-6">
            {{$jobListings->links()}}
        </div>
    </div>

</x-app-layout>
