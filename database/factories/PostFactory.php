<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;


    

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

          // Array of image URLs
          $imageUrls = [
            "https://a0.muscache.com/im/pictures/hosting/Hosting-1116679886828390566/original/02c57bd7-634e-443b-8c75-82d41d9d7598.jpeg",
            "https://a0.muscache.com/im/pictures/miso/Hosting-1052074225631761040/original/0d634a9a-a966-4da9-8d2d-e7e819260ccd.jpeg",
            "https://a0.muscache.com/im/pictures/256f6614-112c-4c83-9b85-c072d3fd7142.jpg",
            "https://a0.muscache.com/im/pictures/hosting/Hosting-1138358225819083410/original/3ecd4a1a-e24f-44c3-9de3-2d252987db67.jpeg",
            "https://a0.muscache.com/im/pictures/airflow/Hosting-50677590/original/8c28f15b-cac3-4c39-bafa-d2db0a06af01.jpg"
        ];
        
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'space' => $this->faker->numberBetween(500, 5000),
            'rooms' => $this->faker->numberBetween(1, 5),
            'image_path' => $this->faker->randomElement($imageUrls),
            'city' => $this->faker->randomElement(["Rabat","Marrakesh","Agadir","Tanga","Casablanca","Fes","Titouan"]),
            'user_id' => 1


            // Add other fields as needed
        ];
    }
}
