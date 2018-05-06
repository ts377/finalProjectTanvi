<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use Laravel\Dusk\Chrome;

class AfterLoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function ($first , $url) {
            $first->loginAs(User::find(153))
                ->visit('/home')
                ->clickLink('My Account')
                ->clickLink('Create Profile')
                ->visit('/user/153/profile')
                ->assertSee('My Profile')
                ->type('fname', 'Aahana')
                ->type('lname', 'Panwar')
                ->type('body', 'Hello')
                ->press('Save')
                ->visit('/home')
                ->assertSee('Home')
                ->assertSee('Questions')
                ->assertSee('There are no questions to view, you can create a question.')
            ->clickLink('Create a Question')
                ->assertSee('Create Question')
            ->type('body', 'What is PHP')
                ->press('Save')
                ->visit('/home')
                ->assertSee('Questions')
                ->clickLink('View')
                ->assertPathBeginsWith('/questions/')
            ->assertSee('Question')

            ->clickLink('Answer Question')
            ->assertPathBeginsWith('/questions/')
             ->assertSee('Create Answer')
            ->type('body', 'This is PHP')
            ->press('Save')
            ->clickLink('View');

        });
    }
}
