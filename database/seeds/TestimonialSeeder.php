<?php

use App\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientCount = (int) $this->command->ask('How many client testimonials would you like to create?', 3);
        factory(Testimonial::class, $clientCount)->create();
    }
}
