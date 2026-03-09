<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class AssetRequestItemApproval extends Model
{
    protected $fillable = [
        'asset_request_id',
        'status',
        'remark',
        'approved_by',
        'approved_at',
    ];

    public function engineerAssetRequest()
    {
        return $this->belongsTo(EngineerAssetRequests::class, 'asset_request_id');
    }

    public function engineerAssetRequestItems()
    {
        return $this->hasMany(EngineerAssetRequestItems::class, 'asset_request_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected function acsrStatus(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                switch ($attributes['status']) {
                    case 'pending':
                        $text = 'Pending';
                        $color = 'ea580c';
                        break;

                    case 'approved':
                        $text = 'Approve';
                        $color = '16a34a';
                        break;

                    case 'rejected':
                        $text = 'Reject';
                        $color = 'dc2626';
                        break;

                    default:
                        $text = '';
                        $color = '4b45563';
                        break;
                }
                return [
                    'text' => $text,
                    'color' => $color
                ];
            },

        );
    }
}
