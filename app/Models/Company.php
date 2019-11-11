<?php namespace App\Models;



class Company extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cover_image_id',
        'link',
        'is_enabled',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [];

    protected $presenter = \App\Presenters\CompanyPresenter::class;

    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\CompanyObserver);
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
            'name' => $this->name,
            'cover_image_id' => $this->cover_image_id,
            'link' => $this->link,
            'is_enabled' => $this->is_enabled,
        ];
    }

}
