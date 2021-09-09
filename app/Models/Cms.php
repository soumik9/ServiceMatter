<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'cms_category_id',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function cmscategory()
    {
        return $this->belongsTo(CmsCategory::class,'cms_category_id');
    }
}
