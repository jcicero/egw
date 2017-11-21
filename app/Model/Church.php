<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Church extends Model
{
    use SoftDeletes, Sortable;

    protected $dates = ['deleted_at'];

    public $sortable = ['id','igreja'];

    protected $fillable = ['igreja'];

    public function member()
    {
        return $this->hasMany('App\Model\Member');
    }
}
