<?php namespace App\Models;



class InforGroup extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'infor_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cover_image_id',
        'thumbnail_image_id',
        'description',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [];

    protected $presenter = \App\Presenters\InforGroupPresenter::class;

    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\InforGroupObserver);
    }

    // Relations
    public function coverImage()
    {
        return $this->hasOne(\App\Models\Image::class, 'id', 'cover_image_id');
    }

    public function thumbnailImage()
    {
        return $this->hasOne(\App\Models\Image::class, 'id', 'thumbnail_image_id');
    }

    

    // Utility Functions

    /*
     * API Presentation
     */
    public function toAPIArray()
    {
        return [
            'id' => $this->id,
            'cover_image_id' => $this->cover_image_id,
            'thumbnail_image_id' => $this->thumbnail_image_id,
            'description' => $this->description,
        ];
    }

}
