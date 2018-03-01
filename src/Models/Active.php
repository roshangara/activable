<?php

namespace Roshangara\Activable\Models;

use Illuminate\Database\Eloquent\Model;
use Roshangara\EloquentHelper\Helper;

class Active extends Model
{
    use Helper;

    protected $table = 'activables';

    protected $fillable = ['value', 'reason', 'agent_type', 'agent_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function activable()
    {
        return $this->morphTo('activable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function agent()
    {
        return $this->morphTo('agent');
    }
}