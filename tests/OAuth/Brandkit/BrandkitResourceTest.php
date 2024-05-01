<?php

namespace Piggy\Api\Tests\OAuth\Brandkit;

use Piggy\Api\Tests\OAuthTestCase;

class BrandkitResourceTest extends OAuthTestCase
{
    /**
     * @test
     */
    public function it_gets_a_brandkit()
    {
        $this->addExpectedResponse([
            'small_logo_url' => 'https://images.unsplash.com/photo-1592048968635-a191a3c6d370?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxMTE4OTR8MHwxfHNlYXJjaHwyfHxwfGVufDB8MHx8fDE2NTQ2OTUxNTU&ixlib=rb-1.2.1&q=80&w=1080',
            'large_logo_url' => 'https://images.unsplash.com/photo-1583771182269-cb30fdb4519e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxMTE4OTR8MHwxfHNlYXJjaHwzMHx8c3V2fGVufDB8MHx8fDE2NTUzNjkxOTM&ixlib=rb-1.2.1&q=80&w=1080',
            'primary_color' => '#dee7ff',
            'secondary_color' => '#d9d9d9',
            'tertiary_color' => '#000000',
            'quaternary_color' => '#44c6c4',
            'font_family' => null,
        ]);

        $brandkit = $this->mockedClient->brandkit->get();

        $this->assertEquals('https://images.unsplash.com/photo-1592048968635-a191a3c6d370?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxMTE4OTR8MHwxfHNlYXJjaHwyfHxwfGVufDB8MHx8fDE2NTQ2OTUxNTU&ixlib=rb-1.2.1&q=80&w=1080', $brandkit->getSmallLogoUrl());
        $this->assertEquals('https://images.unsplash.com/photo-1583771182269-cb30fdb4519e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxMTE4OTR8MHwxfHNlYXJjaHwzMHx8c3V2fGVufDB8MHx8fDE2NTUzNjkxOTM&ixlib=rb-1.2.1&q=80&w=1080', $brandkit->getLargeLogoUrl());
        $this->assertEquals('#dee7ff', $brandkit->getPrimaryColor());
        $this->assertEquals('#d9d9d9', $brandkit->getSecondaryColor());
        $this->assertEquals('#000000', $brandkit->getTertiaryColor());
        $this->assertEquals('#44c6c4', $brandkit->getQuaternaryColor());
        $this->assertNull($brandkit->getFontFamily());
    }
}
