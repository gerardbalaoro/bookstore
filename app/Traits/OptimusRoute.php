<?php

namespace App\Traits;

use Cog\Laravel\Optimus\Facades\Optimus;

trait OptimusRoute
{

    /**
     * Get the value of the model's route key.
     *
     * @return mixed
     */
    public function getRouteKey()
    {
        $id = parent::getRouteKey();

        return Optimus::encode($id);
    }

    public function getOidAttribute()
    {
        $id = parent::getRouteKey();

        return Optimus::encode($id);
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param mixed $value
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value)
    {
        $id = is_numeric($value) ? Optimus::decode($value) : null;

        return $this->where($this->getRouteKeyName(), '=', $id)->first();
    }

    /**
     * Decodes slug to id
     * @param  string $slug
     * @return int|null
     */
    public static function decodeSlug($slug)
    {
        return Optimus::decode($slug);
    }

    /**
     * Wrapper around Model::findOrFail
     *
     * @param  string $slug
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function findBySlugOrFail($slug)
    {
        $id = static::decodeSlug($slug);

        return static::findOrFail($id);
    }

    /**
     * Wrapper around Model::find
     *
     * @param  string $slug
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public static function findBySlug($slug)
    {
        $id = static::decodeSlug($slug);

        return static::find($id);
    }
}
