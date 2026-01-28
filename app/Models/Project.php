<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'client_id',
        'project_type',
        'status',
        'start_date',
        'end_date',
        'remark',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function files()
    {
        return $this->hasMany(ProjectFile::class);
    }


    public function progresses()
    {
        return $this->hasMany(ProjectProgress::class);
    }

    public function getCategoryProgress($categoryId)
    {
        $progress = $this->progresses
            ->where('project_category_id', $categoryId)
            ->first();

        if (!$progress) {
            return 0;
        }

        return match ($progress->status) {
            'in_complete' => 0,
            'completed' => 100,
            default => 0,
        };
    }
}
