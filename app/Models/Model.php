<?php

namespace App\Models;

class Model extends \Illuminate\Database\Eloquent\Model {

    protected $attributes = [];

    public function __construct(array $attributes) {
        $this->attributes = $attributes;
    }

    public function __get($key) {
        return $this->attributes[$key];
    }

    public function __set($key, $value) {
        $this->attributes[$key] = $value;
    }

    public function toArray(): array
    {
        $result = [];

        foreach($this->attributes as $key => $value) {
            if (! in_array($key, $this->hidden)) {
                $result[$key] = $value;
            }
        }

        return $result;
    }


}
