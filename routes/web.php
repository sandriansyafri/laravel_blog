<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\StaticPageController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('create', function () {
      Post::create([
            'title' => 'Hello World',
            'slug' => 'hello-world',
            'excerpt' => '<p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, consequuntur officia odio architecto natus, eum quod unde quas aliquid possimus dolor laudantium deserunt, dolores nemo harum! Molestiae nulla vero id architecto culpa sit laborum, eum esse obcaecati neque sequi quisquam.
      </p>
      
      <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe provident placeat, vel corporis maxime aspernatur quas hic officiis distinctio error.
      </p>',
            'body' => '<p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure, consequuntur officia odio architecto natus, eum quod unde quas aliquid possimus dolor laudantium deserunt, dolores nemo harum! Molestiae nulla vero id architecto culpa sit laborum, eum esse obcaecati neque sequi quisquam.
      </p>
      
      <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe provident placeat, vel corporis maxime aspernatur quas hic officiis distinctio error.
      </p>
      
      <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem enim vel accusamus alias consectetur voluptas quia similique unde nisi. Mollitia deserunt nulla magnam nostrum amet maiores sit! Corporis, dignissimos cupiditate dolorum quae quis vel ullam facilis tempore itaque possimus dolorem assumenda aperiam, reiciendis, consequuntur atque cumque nisi error. Temporibus, facere?
      </p>
      
      <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam laborum molestias voluptatibus quo. Placeat rem minima laudantium nulla repellat asperiores? Rem dolorem nulla molestias nemo officiis accusamus dolor quibusdam alias eum veritatis suscipit aliquam assumenda ipsum repudiandae, hic corrupti odit, aperiam beatae tenetur dolore tempore neque accusantium. Ullam obcaecati nesciunt illo, odio vel eos reprehenderit veniam hic quia. Dolore amet nisi consequuntur sint molestias mollitia expedita sit laborum quibusdam aspernatur quis, quam magni nam reprehenderit accusantium cum recusandae ipsam commodi.
      </p>',
      ]);
});
Route::get('/', [StaticPageController::class, 'home'])->name('home');
Route::get('/about', [StaticPageController::class, 'about'])->name('about');
Route::resources([
      'posts' => PostController::class,
]);
