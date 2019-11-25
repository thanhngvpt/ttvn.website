<?php namespace App\Models;



class Field extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'fields';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'meta_title',
        'meta_description',
        'cover_image_id',
        'title',
        'content',
        'icon1_image_id',
        'charact_1',
        'des_1',
        'icon2_image_id',
        'charact_2',
        'des_2',
        'icon3_image_id',
        'charact_3',
        'des_3',
        'order',
        'is_enabled',
        'home_image_id',
        'cover2_image_id',
        'home_content'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [];

    protected $presenter = \App\Presenters\FieldPresenter::class;

    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\FieldObserver);
    }

    // Relations
    public function coverImage()
    {
        return $this->hasOne(\App\Models\Image::class, 'id', 'cover_image_id');
    }

    public function HomeImage()
    {
        return $this->hasOne(\App\Models\Image::class, 'id', 'home_image_id');
    }

    public function cover2Image()
    {
        return $this->hasOne(\App\Models\Image::class, 'id', 'cover2_image_id');
    }


    public function icon1Image()
    {
        return $this->hasOne(\App\Models\Image::class, 'id', 'icon1_image_id');
    }

    public function icon2Image()
    {
        return $this->hasOne(\App\Models\Image::class, 'id', 'icon2_image_id');
    }

    public function icon3Image()
    {
        return $this->hasOne(\App\Models\Image::class, 'id', 'icon3_image_id');
    }

    public function projects()
    {
        return $this->hasMany(\App\Models\Project::class, 'field_id', 'id');
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
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'cover_image_id' => $this->cover_image_id,
            'title' => $this->title,
            'content' => $this->content,
            'icon1_image_id' => $this->icon1_image_id,
            'charact_1' => $this->charact_1,
            'des_1' => $this->des_1,
            'icon2_image_id' => $this->icon2_image_id,
            'charact_2' => $this->charact_2,
            'des_2' => $this->des_2,
            'icon3_image_id' => $this->icon3_image_id,
            'charact_3' => $this->charact_3,
            'des_3' => $this->des_3,
            'order' => $this->order,
            'is_enabled' => $this->is_enabled,
        ];
    }

}
