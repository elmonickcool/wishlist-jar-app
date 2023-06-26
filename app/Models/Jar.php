<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jar extends Model
{
    use HasFactory;
    protected $fillable = ['jar_name', 'cost', 'savings','description'];
    protected $attributes = [
        'savings' => 0.00,
    ];
    // Override the default setter for the "cost" field
    public function setCostAttribute($value)
    {
        $this->attributes['cost'] = $value;
        $this->updateRemaining();
    }

    // Override the default setter for the "savings" field
    public function setSavingsAttribute($value)
    {
        $this->attributes['savings'] = $value;
        $this->updateRemaining();
    }

    // Define an accessor for the "remaining" field
    public function getRemainingAttribute()
    {
        return $this->calculateRemaining();
    }

    // Update the "remaining" field based on the "cost" and "savings" fields
    private function updateRemaining()
    {
        $this->attributes['remaining'] = $this->calculateRemaining();
    }

    // Calculate the value of the "remaining" field
    private function calculateRemaining()
    {
        return $this->cost - $this->savings;
    }
}
