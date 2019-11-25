<?php namespace App\Models;



class TableNew extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'cover_image_id',
        'new_category_id',
        'display',
        'order',
        'meta_title',
        'meta_description',
        'sapo',
        'content',
        'auth',
        'is_enabled',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [];

    protected $presenter = \App\Presenters\NewPresenter::class;

    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\NewObserver);
    }

    // Relations
    public function coverImage()
    {
        return $this->hasOne(\App\Models\Image::class, 'id', 'cover_image_id');
    }

    public function newCategory()
    {
        return $this->belongsTo(\App\Models\NewCategory::class, 'new_category_id', 'id');
    }

    

    // Utility Functions

    /*
     * API Presentation
     */
    public function toAPIArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'cover_image_id' => $this->cover_image_id,
            'new_category_id' => $this->new_category_id,
            'display' => $this->display,
            'order' => $this->order,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'sapo' => $this->sapo,
            'content' => $this->content,
            'auth' => $this->auth,
            'is_enabled' => $this->is_enabled,
        ];
    }

}
