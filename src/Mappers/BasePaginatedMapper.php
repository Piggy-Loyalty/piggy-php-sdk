<?php

namespace Piggy\Api\Mappers;

abstract class BasePaginatedMapper
{
    /**
     * @var mixed[]
     */
    public $data;

    /**
     * @var mixed[]
     */
    public $meta;

    /**
     * @param  mixed[]  $data
     * @param  mixed[]  $meta
     */
    public function __construct(array $data, array $meta)
    {
        $this->data = $data;
        $this->meta = $meta;
    }

    /**
     * Get the mapped data
     *
     * @return mixed[]
     */
    abstract public function getData(): array;

    /**
     * @return mixed[]
     */
    public function getMeta(): array
    {
        return $this->meta;
    }

    /**
     * Get the current page
     */
    public function getCurrentPage(): int
    {
        return $this->getMeta()['current_page'];
    }


    /**
     * Get the starting item number
     */
    public function getFrom(): int
    {
        return $this->getMeta()['from'];
    }

    /**
     * Get the last page
     */
    public function getLastPage(): int
    {
        return $this->getMeta()['last_page'];
    }

    /**
     * Get the pagination links
     */
    public function getLinks(): array
    {
        return $this->getMeta()['links'];
    }

    /**
     * Get the current path
     */
    public function getPath(): string
    {
        return $this->getMeta()['path'];
    }

    /**
     * Get the items per page count
     */
    public function getPerPage(): int
    {
        return $this->getMeta()['per_page'];
    }

    /**
     * Get the ending item number
     */
    public function getTo(): int
    {
        return $this->getMeta()['to'];
    }

    /**
     * Get the total count
     */
    public function getTotal(): int
    {
        return $this->getMeta()['total'];
    }
}
