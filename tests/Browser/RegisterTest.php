<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\RegisterTaskPage;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {


            $browser->visit(new RegisterTaskPage)
                ->type('email', 'tanvi53@laravel.com')
                ->type('password', 'secret')
                ->type('password_confirmation', 'secret')
                ->Click('@element')
                ->pause(5000)
                ->assertPathIs('/home');

        });
    }
}
