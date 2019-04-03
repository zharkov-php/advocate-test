<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Document extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany(Filedocs::class, 'document_id', 'id');
    }



}
