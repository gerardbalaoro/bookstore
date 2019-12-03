<?php

namespace App;

use App\Calibre\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use App\Traits\OptimusRoute;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    use Eloquence;
    use OptimusRoute;
    
    protected $searchableColumns = [
        'title' => 10,
        'sort' => 10,
        'authors.name' => 8,
        'series.name' => 3,
        'publishers.name' => 2,
        'identifiers.val' => 3,
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'books_authors_link', 'book', 'author');
    }

    public function series()
    {
        return $this->belongsToMany(Series::class, 'books_series_link', 'book', 'series');
    }

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class, 'books_publishers_link', 'book', 'publisher');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'books_tags_link', 'book', 'tag');
    }

    public function ratings()
    {
        return $this->belongsToMany(Rating::class, 'books_ratings_link', 'book', 'rating');
    }

    public function identifiers()
    {
        return $this->hasMany(Identifier::class, 'book');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'book');
    }

    public function downloads()
    {
        return $this->hasMany(Download::class, 'book');
    }

    public function cover(int $w = null, int $h = null)
    {
        return route('book.cover', array_filter([$this, 'w' => $w, 'h' => $h]));
    }

    public function getPubdateAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['pubdate']);
    }

    public function getCoverAttribute()
    {
        return $this->has_cover ? route('book.cover', $this) : url('images/300x600.png');
    }

    public function getUrlAttribute()
    {
        return route('book.show', [$this, str_slug($this->title)]);
    }

    public function scopeWithRating($query)
    {
        return $query
                    ->leftJoin('books_ratings_link', 'books.id', '=', 'books_ratings_link.book')
                    ->leftJoin('ratings', 'ratings.id', '=', 'books_ratings_link.rating')
                    ->addSelect('books.*', 'ratings.rating as rating');
    }

    public function scopePopular($query)
    {
        return $query->withRating()->orderBy('rating', 'desc')->orderBy('pubdate', 'desc');
    }

    public function scopeOrderByDate($query, $column, $direction = 'asc')
    {
        return $query->orderBy(DB::raw("DATE({$column}"), $direction);
    }
}
