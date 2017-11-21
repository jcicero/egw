<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Publisher extends Model
{
    use SoftDeletes, Sortable;

    protected $dates = ['deleted_at'];

    protected $sortable = ['id','editora'];

    protected $fillable = ['editora'];
}
