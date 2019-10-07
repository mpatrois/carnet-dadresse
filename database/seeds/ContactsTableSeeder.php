<?php

use Illuminate\Database\Seeder;
use App\Source;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Source::insert([
            [
                'name' => 'Friends',
            ],
            [
                'name' => 'Work',
            ],
            [
                'name' => 'Family',
            ],
            [
                'name' => 'Custom',
            ],
        ]);

        $sources = Source::all();

        factory(App\Contact::class, 50)->create()->each(function ($contact) use ($sources) {
            $nbSource = rand(1, 2);
            $randoms_sources = $sources->shuffle();
            for ($i=0; $i < $nbSource; $i++) {
                $source = $randoms_sources->pop();
                $contact->sources()->save($source);
            }
        });
    }
}
