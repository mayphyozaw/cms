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

    public function project_files()
    {
        return $this->hasMany(ProjectFile::class);
    }

    public function project_files_count()
    {
        return $this->hasMany(ProjectFile::class)->count();
    }

    public function fileCountByCategory(int $categoryId): int
    {
        return $this->project_files
            ->where('project_category_id', $categoryId)
            ->count();
    }

    public function projectTypeBadge(): string
    {
        return match ($this->project_type) {
            'Developer' => 'bg-purple-gradient',
            'PAE'       => 'bg-secondary-gradient',
            default     => 'bg-secondary-gradient',
        };
    }

    public function projectStatusBadge(): string
    {
        return match ($this->status) {
            'Planned'  => 'danger',
            'Ongoing'  => 'info',
            'Complete' => 'success',
            default    => 'secondary',
        };
    }

    public function project_categories()
    {
        return $this->belongsTo(ProjectCategory::class);
    }

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
