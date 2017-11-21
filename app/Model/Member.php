<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Member extends Model
{
    use SoftDeletes, Sortable;

    protected $dates = ['deleted_at'];

    protected $sortable = ['id','nome','email','telefone','status_id','church_id'];

    protected $fillable = ['nome','email','telefone','obs','status_id','church_id'];

    public function status()
    {
        return $this->belongsTo('App\Model\Status');
    }

    public function church()
    {
        return $this->belongsTo('App\Model\Church');
    }
}
