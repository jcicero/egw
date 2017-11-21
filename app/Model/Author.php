<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Author extends Model
{
    use SoftDeletes, Sortable;

    protected $dates = ['deleted_at'];

    protected $sortable = ['id','nm_autor','status_id'];

    protected $fillable = ['nm_autor','status_id'];

    public function status()
    {
       return $this->belongsTo('App\Model\Status');
    }
}
