<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Image as Intervention;
// use Conner\Tagging\Taggable;
use Spatie\Tags\HasTags;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
    // use Taggable;
    use HasTags;

    protected $fillable = [
        'meta_title',
        'meta_description',
        'title',
        'slug',
        'description',
        'link',
        'deadline',
        'visits',
        'user_id',
        'category_id',
    ];

    protected $dates = ['deadline'];

    public function getRouteKeyName(){
        return 'slug';
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
    public function my_store($request){

        $date = Carbon::createFromFormat('Y-m-d H:i', $request->deadline_submit . '' .$request->end_time_submit);

        $post =  $this->create([
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'deadline' => $date,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title, '_'),
        ]);

        $image = $request->file('file');
        $ruta = self::upload_files($image);
        $post->image()->create([
            'url' => $ruta
        ]);
        $tags = explode(',', $request->tags);
        $post->attachTags($tags);
        return $post;
    }
    public function my_update($request){
        // dd($request->deadline_submit);
        $this->update([
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'deadline' => $request->deadline_submit,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title, '_'),
        ]);
        if($request->hasFile('file')){
            $image = $request->file('file');
            $ruta = self::upload_files($image);
            $this->image()->update([
                'url' => $ruta
            ]);
        }
        $tags = explode(',', $request->tags);
        $this->syncTags($tags);
    }
    public static function upload_files($image){
        $nombre = time().$image->getClientOriginalName();
        $formatted_image = Intervention::make($image);
        $formatted_image->fit(700, 420);
        $formatted_image->save(public_path('/image/'. $nombre));
        $ruta = '/image/'.$nombre;
        return $ruta;
    }
}
