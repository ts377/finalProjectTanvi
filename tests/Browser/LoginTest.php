<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\LoginTaskPage;


class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {


            $browser->visit(new LoginTaskPage)
                ->type('email', 'tanvi51@laravel.com')
                ->type('password', 'secret')
                ->Click('@element1')
                ->pause(5000)
                ->assertPathIs('/home');

        });
    }
}
