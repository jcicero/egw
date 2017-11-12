<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Church extends Model
{
    use SoftDeletes, Sortable;

    protected $dates = ['deleted_at'];

    public $sortable = ['igreja'];

    protected $fillable = ['igreja'];
}
