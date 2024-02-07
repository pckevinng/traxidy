<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $fillable = [
        'creator_id',
        'project_id',
        'issue_id',
        'owner_contact_id',
        'owner_contact_name',
        'action_identifier',
        'description',
        'original_description',
        'due_date',
        'decision_made',
        'status',
        'progress',
        'gyr',
    ];
}
