<?php

namespace Piggy\Api\Tests\Factories;

use Faker\Factory as FakerFactory;
use Faker\Generator;
use Piggy\Api\Models\BaseModel;
use stdClass;

abstract class BaseFactory
{
    protected Generator $faker;

    public function __construct()
    {
        if (! isset($this->faker)) {
            $this->faker = FakerFactory::create();
        }
    }

    public function toModel(): BaseModel
    {
        return $this->model;
    }

    public function toObject(): stdClass
    {
        return $this->model->toObject();
    }

    /**
     * @return array<mixed, mixed>
     */
    public function toArray(): array
    {
        return $this->model->toArray();
    }
}
