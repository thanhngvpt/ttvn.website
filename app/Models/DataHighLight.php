<?php namespace App\Models;



class DataHighLight extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'data_highlights';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cover_image_id',
                'title',
                'data',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [];

    protected $presenter = \App\Presenters\DataHighLightPresenter::class;

    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\DataHighLightObserver);
    }

    // Relations
    public function coverImage()
    {
        return $this->hasOne('App\Models\Image', 'id', 'cover_image_id');
    }

    // Utility Functions

    /*
     * API Presentation
     */
    public function toAPIArray()
    {
        return [
            'id' => $this->id,
            
        ];
    }

}
