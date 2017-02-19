<?php

namespace App;

class Item extends Model {
    protected $collection = 'item';
    protected $fillable = ['subject', 'description', 'due_date', 'is_done'];
    protected $appends = ['is_overdue'];
    protected $dates = ['due_date'];
    protected $attributes = [
        'is_done'       => false
    ];

    public function getIsOverdueAttribute($isOverdue)
    {
        if (!$this->due_date)
            return true;

        return $this->due_date->lte(new \Carbon\Carbon);
    }
}