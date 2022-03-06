<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Image as Intervention;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'meta_title',
        'meta_description',
        'title',
        'slug',
        'description',
        'parent_id',
        'icon',
    ];
    public function getRouteKeyName(){
        return 'slug';
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
    public function subcategories(){
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function has_subcategory(){
        if ($this->subcategories()->count() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function my_store($request){
        $category = $this->create($request->all()+[
            'slug' => Str::slug($request->title, '_')
        ]);
        $image = $request->file('file');
        $ruta = self::upload_files($image);
        $category->image()->create([
            'url' => $ruta
        ]);
    }
    public function my_update($request){
        $this->update($request->all()+[
            'slug' => Str::slug($request->title, '_')
        ]);
        if($request->hasFile('file')){
            $image = $request->file('file');
            $ruta = self::upload_files($image);
            $this->image()->update([
                'url' => $ruta
            ]);
        }
    }
    public static function upload_files($image){
        $nombre = time().$image->getClientOriginalName();
        $formatted_image = Intervention::make($image);
        $formatted_image->fit(700, 430);
        $formatted_image->save(public_path('/image/'. $nombre));
        $ruta = '/image/'.$nombre;
        return $ruta;
    }
}
