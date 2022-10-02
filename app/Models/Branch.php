<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'name' => 'json',
        'additional_ips' => 'array',
        'working_days' => 'json',
    ];

    public function network()
    {
        return $this->belongsTo(Network::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function branchLevel()
    {
        return $this->belongsTo(BranchLevel::class);
    }

    public function lineType()
    {
        return $this->belongsTo(LineType::class);
    }

    public function router()
    {
        return $this->belongsTo(Router::class);
    }
}
