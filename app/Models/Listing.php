<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Listing extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'user_id',
        'tags',
        'company',
        'location',
        'email',
        'logo',
        'website',
        'description'
    ];

    public function scopeFilter($query, array $filters){
        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%' . $filters['tag'] . '%');
        }
        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . $filters['search'] . '%')
            ->orWhere('description', 'like', '%' . $filters['search'] . '%')
            ->orWhere('tags', 'like', '%' . $filters['search'] . '%')
            ->orWhere('location', 'like', '%' . $filters['search'] . '%');
        }
    }

    //Relationship to User
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
