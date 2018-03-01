<?php

namespace Roshangara\Activable;

use Illuminate\Database\Eloquent\Model;
use Roshangara\Activable\Models\Active;

trait Activable
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function actives()
    {
        return $this->morphMany(Active::class, 'activable');
    }

    /**
     * @param bool $isActive
     * @param string|null $reason
     * @param Model|null $agent
     * @return Model
     */
    public function setIsActive(bool $isActive, string $reason = null, Model $agent = null)
    {
        $this->attributes['is_active'] = $isActive;

        return $this->actives()->create([
            'value'      => $isActive,
            'reason'     => $reason,
            'agent_type' => $agent->getMorphClass() ?? null,
            'agent_id'   => $agent->id ?? null,
        ]);
    }

    /**
     * @param $value
     */
    public function setIsActiveAttribute($value)
    {
        $this->setIsActive($value);
    }

    /**
     * @return bool|mixed
     */
    public function isActive()
    {
        $model = $this->getIsActive();

        return $model ? $model->value : false;
    }

    /**
     * @return Model|null|object|static
     */
    public function getIsActive()
    {
        return $this->actives()->latest()->first();
    }
}
