<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class JobListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = Auth::user();

        if (!$user) {
            return view("jobListings.index", ["jobListings" => JobListing::paginate(8), 'savedJobs' => []]);
        }
        $jobListings = JobListing::with('user')->latest()->paginate(8);
        $savedJobs = $user->SavedJobs()->get();
        $job_ids = [];
        foreach ($savedJobs as $job) {
            array_push($job_ids, $job->job_listing_id);
        };
        return view("jobListings.index", ["jobListings" => $jobListings, 'savedJobs' => $job_ids]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("jobListings.create", JobListing::get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'title' => "required|max:100|min:5|string", 'company' => "required|max:100|min:5|string",
                'location' => "required|max:100|min:2|string",
                'company' => "required|max:100|min:2|string",
                'company_website' => "url|nullable",
                'apply_url' => "url|nullable",
                'description' => "required|min:20",
            ]
        );
        $request->user()->jobListings()->create($validated);

        return redirect(route("jobs.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $jobListingId)
    {
        $jobListing = JobListing::findOrFail($jobListingId);
        return view("jobListings.show", ["job" => $jobListing]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $jobListingId)
    {
        $jobListing = JobListing::findOrFail($jobListingId);
        return view('jobListings.edit', ['job' => $jobListing]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $jobListingId)
    {

        $job = JobListing::findOrFail($jobListingId);

        $this->authorize('update', $job);

        $validated = $request->validate(
            [
                'title' => "required|max:100|min:5|string", 'company' => "required|max:100|min:5|string",
                'location' => "required|max:100|min:2|string",
                'company' => "required|max:100|min:2|string",
                'company_website' => 'url|nullable',
                'description' => "required|min:20",
                'apply_url' => "url|nullable",
            ]
        );

        $job->update($validated);

        return redirect(route("jobs.show", $jobListingId));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $jobListingId): RedirectResponse
    {
        $jobListing = JobListing::findOrFail($jobListingId);

        $this->authorize('delete', $jobListing);

        $jobListing->delete();

        return redirect(route('my-jobs'));
    }
}
