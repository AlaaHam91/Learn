<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Category;
use App\Tag;
use App\User;

class Post extends Model
{
    //
    use SoftDeletes;
    protected $fillable=['Title','description','content','image','category_id','user_id'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function hasTag($tag_id)
    {
        return in_array( $tag_id,$this->tags->pluck('id')->toarray());
    }
    // public function SelectedCategory($cat_id)
    // {
    //     return in_array( $cat_id,$this->category->pluck('id')->toarray());
    // }
}
