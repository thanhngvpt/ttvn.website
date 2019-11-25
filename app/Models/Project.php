<?php namespace App\Models;



class Project extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cover_image_id',
        'name',
        'address',
        'link',
        'order',
        'field_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [];

    protected $presenter = \App\Presenters\ProjectPresenter::class;

    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\ProjectObserver);
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
            'address' => $this->address,
            'link' => $this->link,
            'order' => $this->order,
        ];
    }

}
