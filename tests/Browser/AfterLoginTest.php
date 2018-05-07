<?php

namespace Tests\Browser;

use App\Answer;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use App\User;
use App\Question;
use DB;
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

        $user = User::find(56);

        $this->browse(function ($first) use ($user) {
            $first->loginAs($user)
                ->visit('/home')
                ->clickLink('My Account')
                ->clickLink('Create Profile')
                ->visit('/user/' . $user->id . '/profile')
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
                ->type('body', 'What is PHP3')
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
