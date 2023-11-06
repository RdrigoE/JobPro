<?php

namespace App\Livewire;

use App\Models\JobListing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SaveButton extends Component
{
    public JobListing $job;
    public array $savedJobs;
    public bool $in_array;
    public string $message;
    private string $save = "Save"
    private string $unsave = "Unsave"

    public function mount(JobListing $job, $savedJobs)
    {
        $this->job = $job;
        $this->savedJobs = $savedJobs;

        if (in_array($job->id, $savedJobs)) {
            $this->in_array = true;
            $this->message = $unsave;
        } else {
            $this->in_array = false;
            $this->message = $save;
        }
    }

    public function flip_in_array()
    {
        $this->in_array = !$this->in_array;
        if ($this->in_array) {
            $this->message = $unsave;
        }else{
            $this->message = $save;
        }
    }

    public function toggle(){
        if ($this->in_array) {
            $this->remove();
        }else{
            $this->save();
        }
    }

    public function save()
    {
        $user = Auth::user();
        $user->savedJobs()->create(['job_listing_id' => $this->job->id]);
        $this->savedJobs[] = $this->job->id;
        $this->flip_in_array();
    }

    public function remove()
    {
        $user = Auth::user();
        DB::table('saved_jobs')->where('user_id', $user->id)->where('job_listing_id', $this->job->id)->delete();
        unset($this->savedJobs[$this->job->id]);
        $this->flip_in_array();
    }

    public function render()
    {
        return view('livewire.save-button');
    }
}
