<?php namespace App\Models;



class Partner extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'partners';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cover_image_id',
        'name',
        'link',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [];

    protected $presenter = \App\Presenters\PartnerPresenter::class;

    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\PartnerObserver);
    }

    // Relations
    public function coverImage()
    {
        return $this->hasOne(\App\Models\Image::class, 'id', 'cover_image_id');
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
            'name' => $this->name,
            'link' => $this->link,
        ];
    }

}
