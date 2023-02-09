<?php

namespace Piggy\Api\Tests\OAuth\Loyalty\RewardAttributes;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;


class RewardAttributesResourceTest extends OAuthTestCase
{
    /** @test
     * @throws PiggyRequestException
     */
    public function it_returns_a_list_of_reward_attributes_without_options()
    {
        $this->addExpectedResponse([
            [
                "name" => "eennaam",
                "label" => "testNaam",
                "description" => "someOmschrijving",
                "type" => "color",
                "is_soft_read_only" => false,
                "is_hard_read_only" => false,
                "is_piggy_defined" => false,
                "placeholder" => "somePlaceholder",

            ],
        ]);

        $rewardAttributes = $this->mockedClient->rewardAttributes->list();

        $this->assertEquals("eennaam", $rewardAttributes[0]->getName());
        $this->assertEquals("testNaam", $rewardAttributes[0]->getLabel());
        $this->assertEquals("color", $rewardAttributes[0]->getType());
        $this->assertEquals("someOmschrijving", $rewardAttributes[0]->getDescription());
        $this->assertEquals(false, $rewardAttributes[0]->getIsSoftReadOnly());
        $this->assertEquals(false, $rewardAttributes[0]->getIsHardReadOnly());
        $this->assertEquals(false, $rewardAttributes[0]->getIsPiggyDefined());
        $this->assertEquals("somePlaceholder", $rewardAttributes[0]->getPlaceholder());

    }

    /** @test
     * @throws PiggyRequestException
     */
    public function it_returns_a_list_of_reward_attributes_with_options()
    {
        $this->addExpectedResponse([
            [
                "name" => "another_first_name",
                "label" => "another_label",
                "description" => "another_description",
                "type" => "select",
                "field_type" => "select",
                "is_soft_read_only" => true,
                "is_hard_read_only" => true,
                "is_piggy_defined" => false,
                "options" =>
                    [
                        ["label" => "some_option_label", "value" => "Some Option"],
                        ["label" => "some_second_option_label", "value" => "Some Second Option"]
                    ],
                "placeholder" => "someOtherPlaceholder",
            ],
        ]);

        $rewardAttributes = $this->mockedClient->rewardAttributes->list();

        $this->assertEquals("another_first_name", $rewardAttributes[0]->getName());
        $this->assertEquals("another_label", $rewardAttributes[0]->getLabel());
        $this->assertEquals("another_description", $rewardAttributes[0]->getDescription());
        $this->assertEquals("select", $rewardAttributes[0]->getType());
        $this->assertEquals("select", $rewardAttributes[0]->getFieldType());
        $this->assertEquals(true, $rewardAttributes[0]->getIsSoftReadOnly());
        $this->assertEquals(true, $rewardAttributes[0]->getIsHardReadOnly());
        $this->assertEquals(false, $rewardAttributes[0]->getIsPiggyDefined());
        $this->assertEquals("some_option_label", $rewardAttributes[0]->getOptions()[0]["label"]);
        $this->assertEquals("Some Option", $rewardAttributes[0]->getOptions()[0]["value"]);
        $this->assertEquals("some_second_option_label", $rewardAttributes[0]->getOptions()[1]["label"]);
        $this->assertEquals("Some Second Option", $rewardAttributes[0]->getOptions()[1]["value"]);
        $this->assertEquals("someOtherPlaceholder", $rewardAttributes[0]->getPlaceholder());
    }

    /** @test
     * @throws PiggyRequestException
     */
    public function it_returns_a_list_of_reward_attributes_with_options_multi_select()
    {
        $this->addExpectedResponse([
            [
                "name" => "another_first_name",
                "label" => "another_label",
                "description" => "another_description",
                "type" => "multi_select",
                "field_type" => "multi_select",
                "is_soft_read_only" => true,
                "is_hard_read_only" => true,
                "is_piggy_defined" => false,
                "options" => [
                    ["label" => "Eén", "value" => 01],
                    ["label" => "Twee", "value" => 02],
                    ["label" => "Drie", "value" => 03],
                    ["label" => "Vier", "value" => 04],
                    ["label" => "Vijf", "value" => 05]
                ],
                "placeholder" => "someOtherPlaceholder",
            ]
        ]);

        $rewardAttributes = $this->mockedClient->rewardAttributes->list();

        $this->assertEquals("another_first_name", $rewardAttributes[0]->getName());
        $this->assertEquals("another_label", $rewardAttributes[0]->getLabel());
        $this->assertEquals("another_description", $rewardAttributes[0]->getDescription());
        $this->assertEquals("multi_select", $rewardAttributes[0]->getType());
        $this->assertEquals("multi_select", $rewardAttributes[0]->getFieldType());
        $this->assertEquals(true, $rewardAttributes[0]->getIsSoftReadOnly());
        $this->assertEquals(true, $rewardAttributes[0]->getIsHardReadOnly());
        $this->assertEquals(false, $rewardAttributes[0]->getIsPiggyDefined());
        $this->assertEquals(
            [
                ["label" => "Eén", "value" => 01],
                ["label" => "Twee", "value" => 02],
                ["label" => "Drie", "value" => 03],
                ["label" => "Vier", "value" => 04],
                ["label" => "Vijf", "value" => 05]
            ],
            $rewardAttributes[0]->getOptions());

        $this->assertEquals("someOtherPlaceholder", $rewardAttributes[0]->getPlaceholder());
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
                "description" => "a description",
                "type" => "text",

            ]
        );

        $rewardAttribute = $this->mockedClient->rewardAttributes->create("some_name", "some_label", "a description", "text");
        $this->assertEquals("some_name", $rewardAttribute->getName());
        $this->assertEquals("some_label", $rewardAttribute->getLabel());
        $this->assertEquals("a description", $rewardAttribute->getDescription());
        $this->assertEquals("text", $rewardAttribute->getType());

    }

    /** @test
     * @throws PiggyRequestException
     */
    public function it_creates_a_reward_attribute_with_description()
    {
        $this->addExpectedResponse(
            [
                "name" => "phone_number",
                "label" => "Phone Number",
                "description" => "Please fill in your personal phone number",
                "type" => "phone",
                "placeholder" => "+31 6 12345678"
            ]
        );

        $rewardAttribute = $this->mockedClient->rewardAttributes->create("some_phone_number", "some_label_for_phone_number", "Please fill in your personal phone number", "phone", null, null, '+31 6 12345678');

        $this->assertEquals("phone_number", $rewardAttribute->getName());
        $this->assertEquals("Phone Number", $rewardAttribute->getLabel());
        $this->assertEquals("Please fill in your personal phone number", $rewardAttribute->getDescription());
        $this->assertEquals("phone", $rewardAttribute->getType());
        $this->assertEquals("+31 6 12345678", $rewardAttribute->getPlaceholder());

    }

    /** @test
     * @throws PiggyRequestException
     */
    public function it_creates_a_reward_attribute_with_select_type_and_description()
    {
        $this->addExpectedResponse(
            [
                "name" => "province",
                "label" => "Province",
                "description" => "Please select the province you're living in",
                "type" => "select",
                "options" => [
                    ["label" => "Noord-Holland", "value" => 'noord_holland'],
                    ["label" => "Zuid-Holland", "value" => "zuid_holland"],
                    ["label" => "Zeeland", "value" => "zeeland"],
                    ["label" => "Utrecht", "value" => "utrecht"],
                    ["label" => "Noord-Brabant", "value" => "noord_brabant"],
                    ["label" => "Flevoland", "value" => "flevoland"],
                    ["label" => "Friesland", "value" => "friesland"],
                    ["label" => "Groningen", "value" => "groningen"],
                    ["label" => "Drenthe", "value" => "drenthe"],
                    ["label" => "Overijssel", "value" => "overijssel"],
                    ["label" => "Gelderland", "value" => "gelderland"],
                    ["label" => "Limburg", "value" => "limburg"],
                ],
            ]
        );

        $rewardAttribute = $this->mockedClient->rewardAttributes->create(
            "province",
            "Province",
            "Please select the province you're living in",
            "select",
            "select",
            [["label" => "Noord-Holland", "value" => 'noord_holland'],
                ["label" => "Zuid-Holland", "value" => "zuid_holland"],
                ["label" => "Zeeland", "value" => "zeeland"],
                ["label" => "Utrecht", "value" => "utrecht"],
                ["label" => "Noord-Brabant", "value" => "noord_brabant"],
                ["label" => "Flevoland", "value" => "flevoland"],
                ["label" => "Friesland", "value" => "friesland"],
                ["label" => "Groningen", "value" => "groningen"],
                ["label" => "Drenthe", "value" => "drenthe"],
                ["label" => "Overijssel", "value" => "overijssel"],
                ["label" => "Gelderland", "value" => "gelderland"],
                ["label" => "Limburg", "value" => "limburg"]]
        );

        $this->assertEquals("province", $rewardAttribute->getName());
        $this->assertEquals("Province", $rewardAttribute->getLabel());
        $this->assertEquals("select", $rewardAttribute->getType());

        $this->assertEquals("Please select the province you're living in", $rewardAttribute->getDescription());
        $this->assertEquals(
            [
                ["label" => "Noord-Holland", "value" => 'noord_holland'],
                ["label" => "Zuid-Holland", "value" => "zuid_holland"],
                ["label" => "Zeeland", "value" => "zeeland"],
                ["label" => "Utrecht", "value" => "utrecht"],
                ["label" => "Noord-Brabant", "value" => "noord_brabant"],
                ["label" => "Flevoland", "value" => "flevoland"],
                ["label" => "Friesland", "value" => "friesland"],
                ["label" => "Groningen", "value" => "groningen"],
                ["label" => "Drenthe", "value" => "drenthe"],
                ["label" => "Overijssel", "value" => "overijssel"],
                ["label" => "Gelderland", "value" => "gelderland"],
                ["label" => "Limburg", "value" => "limburg"],
            ],
            $rewardAttribute->getOptions());
    }
}