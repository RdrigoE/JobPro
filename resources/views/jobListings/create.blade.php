<x-app-layout>
    <div class="m-6">
        <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">Create Job Listing</h2>
        <form method="POST" action="{{ route('jobs.store') }}">
            @csrf

            <label id="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
            <input name="title" type="text" value="{{old('title')}}" required min="5" max="255" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
            @error('title')
            <div class="alert alert-danger text-red">{{ $message }}</div>
            @enderror
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" id="company">Company</label>
            <input name="company" type="text" value="{{old('company')}}" required min="5" max="255" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
            @error('company')
            <div class="alert alert-danger text-red">{{ $message }}</div>
            @enderror
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" id="company_website">Company Website</label>
            <input name="company_website" value="{{old('company_website')}}" type="url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
            @error('company_website')
            <div class="alert alert-danger text-red">{{ $message }}</div>
            @enderror

            <label id="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
            <input name="location" type="text" value="{{old('location')}}" required min="5" max="255" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
            @error('location')
            <div class="alert alert-danger text-red">{{ $message }}</div>
            @enderror
            <label id="apply_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apply URL</label>
            <input name="apply_url" type="url" value="{{old('apply_url')}}" min="5" max="255" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
            @error('apply_url')
            <div class="alert alert-danger text-red">{{ $message }}</div>
            @enderror
            <label id="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea minlength="20" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{old('description')}}</textarea>
            @error('description')
            <div class="alert alert-danger text-red">{{ $message }}</div>
            @enderror
            <br />
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create</button>
        </form>
        <a href="/jobs">
            <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Cancel</button>
        </a>
    </div>
</x-app-layout>
