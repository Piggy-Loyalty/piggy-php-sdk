<?php

namespace Piggy\Api\Mappers\Loyalty\RewardAttributes;

use Piggy\Api\Mappers\Loyalty\RewardAttributes\OptionMapper;
use Piggy\Api\Models\Loyalty\RewardAttributes\RewardAttribute;
use stdClass;


class RewardAttributeMapper
{
    /**
     * @param stdClass $rewardAttribute
     * @return rewardAttribute
     */
    public function map(stdClass $rewardAttribute): rewardAttribute
    {
        $options = null;
        if (property_exists($rewardAttribute, 'options') && $rewardAttribute->options != null) {
            $optionsMapper = new OptionMapper();
            $options = $optionsMapper->map($rewardAttribute->options);
        }

        $isSoftReadOnly = property_exists($rewardAttribute, 'is_soft_read_only') && $rewardAttribute->is_soft_read_only;
        $isHardReadOnly = property_exists($rewardAttribute, 'is_hard_read_only') && $rewardAttribute->is_hard_read_only;
        $isPiggyDefined = property_exists($rewardAttribute, 'is_piggy_defined') && $rewardAttribute->is_piggy_defined;

        return new RewardAttribute(
            $rewardAttribute->name,
            $rewardAttribute->label,
            $rewardAttribute->type,
            $rewardAttribute->description,
            $isSoftReadOnly,
            $isHardReadOnly,
            $isPiggyDefined,
            $options,
            $rewardAttribute->placeholder

        );
    }

}