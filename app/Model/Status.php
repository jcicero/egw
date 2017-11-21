<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Status extends Model
{
    use SoftDeletes, Sortable;

    protected $dates = ['deleted_at'];

    protected $sortable = ['id','descricao'];

    protected $fillable = ['descricao'];

    public function author()
    {
        return $this->hasMany('App\Model\Author');
    }

    public function member()
    {
        return $this->hasMany('App\Model\Member');
    }
}
