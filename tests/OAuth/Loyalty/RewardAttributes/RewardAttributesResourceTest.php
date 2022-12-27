<?php

namespace Piggy\Api\Tests\OAuth\Loyalty\RewardAttributes;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;


class RewardAttributesResourceTest extends OAuthTestCase
{
    /** @test
     * @throws PiggyRequestException
     */
    public function it_returns_a_list_of_reward_attributes()
    {
        $this->addExpectedResponse([
            [
                "name" => "eennaam",
                "label" => "testNaam",
                "description" => "someOmschrijving",
                "type" => "asdf",
                "placeholder" => "somePlaceholder",
                "is_soft_read_only" => false,
                "is_hard_read_only" => false,
                "is_piggy_defined" => false,
                "options" => []
            ],
//            [
//                "name"=> "eennaam",
//                "label"=> "testNaam ",
//                "description"=> "someOmschrijving",
//                "type"=> "boolean",
//                "field_type"=> "default",
//                "placeholder"=> "somePlaceholder",
//                "is_soft_read_only"=> false,
//                "is_hard_read_only"=> false,
//                "is_piggy_defined"=> false,
//                "options"=> ["label" => "some_option_label", "value" => "1"]
//            ],
        ]);

        $rewardAttributes = $this->mockedClient->rewardAttributes->list();
        var_dump($rewardAttributes);
        die;
        $this->assertEquals("eennaam", $rewardAttributes[0]->getName());
        $this->assertEquals("testNaam", $rewardAttributes[0]->getLabel());
        $this->assertEquals("someOmschrijving", $rewardAttributes[0]->getDescription());
        $this->assertEquals("asdf", $rewardAttributes[0]->getType());
        $this->assertEquals('somePlaceholder', $rewardAttributes[0]->getPlaceholder());
        $this->assertEquals(false, $rewardAttributes[0]->getIsSoftReadOnly());
        $this->assertEquals(false, $rewardAttributes[0]->getIsHardReadOnly());
        $this->assertEquals(false, $rewardAttributes[0]->getIsPiggyDefined());
        $this->assertEquals(null, $rewardAttributes[1]->getOptions());

//        $this->assertEquals("another_first_name", $rewardAttributes[1]->getName());
//        $this->assertEquals("another_label", $rewardAttributes[1]->getLabel());
//        $this->assertEquals("another_description", $rewardAttributes[1]->getDescription());
//        $this->assertEquals("multi_select", $rewardAttributes[1]->getType());
//        $this->assertEquals(true, $rewardAttributes[1]->getIsSoftReadOnly());
//        $this->assertEquals(true, $rewardAttributes[1]->getIsHardReadOnly());
//        $this->assertEquals(false, $rewardAttributes[1]->getIsPiggyDefined());
//        $this->assertEquals('some_option_label', $rewardAttributes[1]->getOptions()->getLabel());
//        $this->assertEquals("1", $rewardAttributes[1]->getOptions()->getValue());

    }

    /** @test
     * @throws PiggyRequestException
     */
    public function it_creates_a_reward_attribute()
    {
        $this->addExpectedResponse(
            [
                "name" => "some_name",
                "label" => "some_label",
                "data_type" => "url",
                "description" => null,
                "options" => null
            ]
        );

        $rewardAttribute = $this->mockedClient->rewardAttributes->create('some_name', 'some_label', 'url');

        $this->assertEquals("some_name", $rewardAttribute->getName());
        $this->assertEquals("some_label", $rewardAttribute->getLabel());
        $this->assertEquals("url", $rewardAttribute->getType());
        $this->assertEquals(null, $rewardAttribute->getDescription());
        $this->assertEquals(null, $rewardAttribute->getOptions());

        $this->addExpectedResponse(
            [
                "name" => "some_phone_number",
                "label" => "some_label_for_phone_number",
                "data_type" => "phone",
                "description" => 'some_description',
                "options" => null
            ]
        );

        $rewardAttribute = $this->mockedClient->rewardAttributes->create('some_phone_number', 'some_label_for_phone_number', 'phone');

        $this->assertEquals("some_phone_number", $rewardAttribute->getName());
        $this->assertEquals("some_label_for_phone_number", $rewardAttribute->getLabel());
        $this->assertEquals("phone", $rewardAttribute->getType());
        $this->assertEquals("some_description", $rewardAttribute->getDescription());
        $this->assertEquals(null, $rewardAttribute->getOptions());


        $this->addExpectedResponse(
            [
                "name" => "henkie_name",
                "label" => "henkie_label",
                "data_type" => "license_plate",
                "description" => 'henkie_description',
                "options" => null
            ]
        );

        $rewardAttribute = $this->mockedClient->rewardAttributes->create('henkie_name', 'henkie_label', 'license_plate');

        $this->assertEquals("henkie_name", $rewardAttribute->getName());
        $this->assertEquals("henkie_label", $rewardAttribute->getLabel());
        $this->assertEquals("license_plate", $rewardAttribute->getType());
        $this->assertEquals("henkie_description", $rewardAttribute->getDescription());
        $this->assertEquals(null, $rewardAttribute->getOptions());


        $this->addExpectedResponse(
            [
                "name" => "pietje_name",
                "label" => "pietje_label",
                "data_type" => "multi_select",
                "description" => 'pietje_description',
                "options" => ["label" => "pietje_option_label", "value" => "1"]
            ]
        );

        $rewardAttribute = $this->mockedClient->rewardAttributes->create('pietje_name', 'pietje_label', 'license_plate');

        $this->assertEquals("pietje_name", $rewardAttribute->getName());
        $this->assertEquals("pietje_label", $rewardAttribute->getLabel());
        $this->assertEquals("multi_select", $rewardAttribute->getType());
        $this->assertEquals("pietje_description", $rewardAttribute->getDescription());

        $this->assertEquals('pietje_option_label', $rewardAttribute->getOptions()->getLabel());
        $this->assertEquals(1, $rewardAttribute->getOptions()->getValue());

    }

}