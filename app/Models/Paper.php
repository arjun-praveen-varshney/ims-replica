<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;

    protected $table = 'papers'; // Explicitly define the table name

    protected $fillable = [
        'title',
        'publication_year',
        'publisher',
        'paper_link',
        'issue_no',
        'name_of_conference',
        'indexing',
        'other_details',
        'user_id', // Foreign key
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope for searching paper publications
    public function scopeSearch($query, $term)
    {
        return $query->where('title', 'like', "%{$term}%")
            ->orWhere('name_of_conference', 'like', "%{$term}%")
            ->orWhere('publisher', 'like', "%{$term}%");
    }
}
