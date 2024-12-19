<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'programs'; // Explicitly define the table name

    protected $fillable = [
        'title',
        'description',
        'document_path',
        'duration',
        'organized_by',
        'type',
        'start_date',
        'end_date',
        'location',
        'user_id', // Foreign key
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope for searching courses/workshops
    public function scopeSearch($query, $term)
    {
        return $query->where('title', 'like', "%{$term}%")
            ->orWhere('description', 'like', "%{$term}%")
            ->orWhere('organized_by', 'like', "%{$term}%");
    }
}
