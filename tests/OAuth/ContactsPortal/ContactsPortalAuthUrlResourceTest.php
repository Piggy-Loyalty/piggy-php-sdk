<?php

namespace Piggy\Api\Tests\OAuth\ContactsPortal;

use Piggy\Api\Exceptions\PiggyRequestException;
use Piggy\Api\Tests\OAuthTestCase;

class ContactsPortalAuthUrlResourceTest extends OAuthTestCase
{
    /**
     * @test
     * @throws PiggyRequestException
     */
    public function it_returns_a_contacts_portal_auth_url()
    {
        $this->addExpectedResponse([
            "url" => "https://localhost:8081/home?token=eyJpdiI6ImplMlJXME9VT0JEZXdGL1VXWDJKK0E9PSIsInZhbHVlIjoiVXIyWHYwZElhOTcyMk9kcjFYSEJGUnFBZlovMHFJZHl2bCtWclNKQldSWmhkQlVFK1BTWXJQa0labzMvTFdqblluL29PUXVSU1Q2TzJIZ0FKaDFVWnBJeHNxV1ZMQk9WRXpTTy9PeVJRanlnWkhUTktPeVVnTlBnSmQ1cjY1aFVWZHcyNUJwczJ2YUJqNDkwZTNTVFpvbVZIRWYvSmdxQUk1VS9vZ09OQkVNPSIsIm1hYyI6IjA3NzQ0YzFlNTZkZGUxYjA3MzFmYTcyMzQxY2IzZTQ1NGYyN2Q0NjE3NDI2NTZjZTZiNGIwYTM3NmY3YjU5ZTgiLCJ0YWciOiIifQ=="
        ]);

        $contactsPortalAuthUrl = $this->mockedClient->contactsPortalAuthUrl->get("123");

        $this->assertEquals("https://localhost:8081/home?token=eyJpdiI6ImplMlJXME9VT0JEZXdGL1VXWDJKK0E9PSIsInZhbHVlIjoiVXIyWHYwZElhOTcyMk9kcjFYSEJGUnFBZlovMHFJZHl2bCtWclNKQldSWmhkQlVFK1BTWXJQa0labzMvTFdqblluL29PUXVSU1Q2TzJIZ0FKaDFVWnBJeHNxV1ZMQk9WRXpTTy9PeVJRanlnWkhUTktPeVVnTlBnSmQ1cjY1aFVWZHcyNUJwczJ2YUJqNDkwZTNTVFpvbVZIRWYvSmdxQUk1VS9vZ09OQkVNPSIsIm1hYyI6IjA3NzQ0YzFlNTZkZGUxYjA3MzFmYTcyMzQxY2IzZTQ1NGYyN2Q0NjE3NDI2NTZjZTZiNGIwYTM3NmY3YjU5ZTgiLCJ0YWciOiIifQ==",
            $contactsPortalAuthUrl->getUrl());
    }
}
