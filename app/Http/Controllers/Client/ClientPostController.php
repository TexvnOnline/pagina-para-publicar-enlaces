<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;
use Spatie\Tags\Tag;

class ClientPostController extends Controller
{
    public function index(){
        $posts = Post::latest()->with('category')->paginate(24);
        $breadcrumbs = [
            [
                'url'=>route('client.index'),
                'text'=>'Home',
            ],
            [
                'url'=>'',
                'text'=>'All Links',
            ]
        ];
        return view('client.post.index', compact('posts', 'breadcrumbs'));
    }
    public function by_category(Category $category){
        $posts = $category->posts()->with('category')->paginate(24);

        $breadcrumbs = [
            [
                'url'=>route('client.index'),
                'text'=>'Home',
            ],
            [
                'url'=>route('all.links'),
                'text'=>'All Links',
            ],
            [
                'url'=>'',
                'text'=> $category->title,
            ],
        ];

        return view('client.post.index', compact('posts', 'breadcrumbs'));
    }
    public function by_tag($slug){
        $tag = Tag::findFromSlug($slug);
        $posts = Post::withAnyTags([$tag])->paginate(24);
        $breadcrumbs = [
            [
                'url'=>route('client.index'),
                'text'=>'Home',
            ],
            [
                'url'=>route('all.links'),
                'text'=>'All Links',
            ],
            [
                'url'=>'',
                'text'=> $tag->name,
            ],
        ];

        return view('client.post.index', compact('posts', 'breadcrumbs'));
    }
    public function posts_json(){
        $posts_json = Post::where('deadline','>',Carbon::now())->pluck('title');
        return $posts_json;
    }
    public function search_posts(Request $request){
        $posts = Post::latest()->where('title', 'LIKE', "%$request->dzName%")->paginate(24);

        $breadcrumbs = [
            [
                'url'=>route('client.index'),
                'text'=>'Home',
            ],
            [
                'url'=>route('all.links'),
                'text'=>'All Links',
            ],
            [
                'url'=>'',
                'text'=> $request->dzName,
            ],
        ];
        return view('client.post.index', compact('posts', 'breadcrumbs'));
    }

    public function post_show(Post $post){

        $post->visits++;
        $post->save();

        $array1 = $post->tags->pluck('name');
        foreach ($array1 as $key => $ar) {
            $results[] = $ar;
        }
        $tags = implode(",", $results);

        $meta = [
            'meta_description' => $post->meta_description,

            'meta_og_title' => '✅▷【Descarga '.$post->meta_title.' gratis】- Actualizado a Hoy '.Carbon::now()->format('Y-m-d').'.',

            'meta_og_description' => $post->meta_description,

            'title' => '✅▷【Descarga '.$post->meta_title.' gratis】- Actualizado a Hoy '.Carbon::now()->format('Y-m-d').'.',

            'meta_keyword' => 'Cupones para Udemy, Cursos Online Gratis,codigos de promocion 100% OFF, cupones gratis, cursos gratis,cursos udemy gratis, descargar cursos de udemy gratis, cursos udemy mega, download courses udemy for Mega, '.$tags.'.',
        ];

        $breadcrumbs = [
            [
                'url'=>route('client.index'),
                'text'=>'Home',
            ],
            [
                'url'=>route('all.links'),
                'text'=>'All Links',
            ],
            [
                'url'=>'',
                'text'=> $post->title,
            ],
        ];

        return view('client.post.show', compact('post', 'breadcrumbs', 'meta'));
    }
    public function client_index(){
        $posts = Post::latest()->with('category')->take(8)->get();
        $meta = [
            'meta_description' => '✅ Descargar Cursos Gratis, descarga los últimos cursos actualizados a la fecha '.Carbon::now()->format('Y-m-d').' de las principales plataformas de estudio como Udemy. Descarga los mejores cursos de Udemy actualizados a la fecha '.Carbon::now()->format('Y-m-d').' total mente gratis, 100% gratis, Platzi, descarga los mejores cursos de  Platzi totalmente gratis, Coursera,  descarga los mejores cursos de  Coursera totalmente gratis. Todos los cursos que quieres en un solo lugar. Los cursos gratututos actualizados a la fecha '.Carbon::now()->format('Y-m-d').'.',

            'meta_og_title' => '✅▷【Descargar todos los cursos de las plataformas más populares de aprendizaje actualizos】- Actualizado a Hoy '.Carbon::now()->format('Y-m-d').'',

            'meta_og_description' => '✅ Descargar Cursos Gratis, descarga los últimos cursos actualizados a la fecha '.Carbon::now()->format('Y-m-d').' de las principales plataformas de estudio como Udemy. Descarga los mejores cursos de Udemy actualizados a la fecha '.Carbon::now()->format('Y-m-d').' total mente gratis, 100% gratis, Platzi, descarga los mejores cursos de  Platzi totalmente gratis, Coursera,  descarga los mejores cursos de  Coursera totalmente gratis. Todos los cursos que quieres en un solo lugar. Los cursos gratututos actualizados a la fecha '.Carbon::now()->format('Y-m-d').'.',

            'title' => '✅▷【Descargar todos los cursos de las plataformas más populares de aprendizaje actualizos】- Actualizado a Hoy '.Carbon::now()->format('Y-m-d').'',

            'meta_keyword' => "Cupones para Udemy, Cursos Online Gratis,codigos de promocion 100% OFF, cupones gratis, cursos gratis,cursos udemy gratis, descargar cursos de udemy gratis, cursos udemy mega, download courses udemy for Mega",
        ];
        return view('client.index', compact('posts', 'meta'));
    }

    public function all_categories(){
        $categories = Category::where('parent_id', null)->get();
        $breadcrumbs = [
            [
                'url'=>route('client.index'),
                'text'=>'Home',
            ],
            [
                'url'=>route('all.links'),
                'text'=>'All Links',
            ],
            [
                'url'=>'',
                'text'=> 'All Categories',
            ],
        ];
        return view('client.category.index', compact('categories', 'breadcrumbs'));
    }
}
