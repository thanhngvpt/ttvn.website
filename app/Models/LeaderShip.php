<?php namespace App\Models;



class LeaderShip extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'leader_ships';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cover_image_id',
        'name',
        'position',
        'file',
        'order',
        'is_enabled',
        'file_text'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [];

    protected $presenter = \App\Presenters\LeaderShipPresenter::class;

    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\LeaderShipObserver);
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
            'position' => $this->position,
            'file' => $this->file,
            'order' => $this->order,
            'is_enabled' => $this->is_enabled,
        ];
    }

}
