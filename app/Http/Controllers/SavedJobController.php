<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobListing;
use App\Models\SavedJob;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SavedJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $jobs = $user->savedJobs()->with('jobListing')->latest()->paginate(8);
        return view('savedJobs.index', ['jobListings' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $user = Auth::user();
        $validated = $request->validate(['job_listing_id' => 'int|required']);
        $request->user()->savedJobs()->create($validated);

        return redirect(route("jobs.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(SavedJob $savedJob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SavedJob $savedJob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SavedJob $savedJob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $jobId)
    {
        $user = Auth::user();
        DB::table('saved_jobs')->where('user_id', $user->id)->where('job_listing_id', $jobId)->delete();
        return redirect(route("jobs.index"));
    }
}
