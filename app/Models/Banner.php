<?php namespace App\Models;



class Banner extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'banners';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cover_image_id',
        'title',
        'description',
        'admin_user_id',
        'order',
        'is_enabled',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [];

    protected $presenter = \App\Presenters\BannerPresenter::class;

    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\BannerObserver);
    }

    // Relations
    public function coverImage()
    {
        return $this->hasOne(\App\Models\Image::class, 'id', 'cover_image_id');
    }

    public function adminUser()
    {
        return $this->belongsTo(\App\Models\AdminUser::class, 'admin_user_id', 'id');
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
            'title' => $this->title,
            'description' => $this->description,
            'admin_user_id' => $this->admin_user_id,
            'order' => $this->order,
            'is_enabled' => $this->is_enabled,
        ];
    }

}
