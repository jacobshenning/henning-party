<?php

namespace App\Models;

class Model {

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
        return $this->attributes;
    }

}
