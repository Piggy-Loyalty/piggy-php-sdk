<?php

namespace Piggy\Api\Models\Contacts;

/**
 * Class ContactAttribute
 * @package Piggy\Api\Models
 */
class ContactAttribute
{
    /** @var string */
    protected $value;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var string
     */
    protected $description;

    protected $type;
    protected $field_type;
    protected $is_soft_read_only;
    protected $is_hard_read_only;
    protected $is_piggy_defined;
    protected $options;

    public function __construct($id, $email)
    {
        $this->id = $id;
        $this->email = $email;
    }

}
