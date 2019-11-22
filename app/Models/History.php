<?php namespace App\Models;



class History extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'histories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date_start',
        'cover_image_id',
        'content',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [];

    protected $presenter = \App\Presenters\HistoryPresenter::class;

    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\HistoryObserver);
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
            'date_start' => $this->date_start,
            'cover_image_id' => $this->cover_image_id,
            'content' => $this->content,
        ];
    }

}
