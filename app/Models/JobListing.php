<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobListing extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "location",
        "company",
        "company_website",
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function savedJobs(): HasMany
    {
        return $this->hasMany(SavedJob::class);
    }
}
