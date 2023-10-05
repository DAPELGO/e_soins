<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Structure extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(Structure::class, 'id', 'parent_id');
        // return $this->hasOne( 'App\Models\Structure', 'id', 'parent_id' );

    }

    public function children()
    {
        return $this->hasMany(Structure::class, 'parent_id', 'id');
        // return $this->hasMany( 'App\Models\Structure', 'parent_id', 'id' );
    }

    public function descendants()
    {
        return $this->children()->with('descendants');
    }

    public function getAllChildren()
    {
        $structures = new Collection();
        foreach ($this->children as $structure) {
            $structures->push($structure);
            $structures = $structures->merge($structure->getAllChildren());
        }

        return $structures;
    }
}
