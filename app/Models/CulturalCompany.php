<?php namespace App\Models;



class CulturalCompany extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cultural_companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_page',
        'introduce',
        'content',
        'meta_title',
        'meta_description1',
        'meta_description2',
        'icon1_image_id',
        'reason1',
        'detail1',
        'icon2_image_id',
        'reason2',
        'detail2',
        'icon3_image_id',
        'reason3',
        'detail3',
        'ttvn_image_id',
        'ttvn_title',
        'ttvn_content',
        'we_find_introduce',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [];

    protected $presenter = \App\Presenters\CulturalCompanyPresenter::class;

    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\CulturalCompanyObserver);
    }

    // Relations
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

    public function ttvnImage()
    {
        return $this->hasOne(\App\Models\Image::class, 'id', 'ttvn_image_id');
    }

    

    // Utility Functions

    /*
     * API Presentation
     */
    public function toAPIArray()
    {
        return [
            'id' => $this->id,
            'title_page' => $this->title_page,
            'introduce' => $this->introduce,
            'content' => $this->content,
            'meta_title' => $this->meta_title,
            'meta_description1' => $this->meta_description1,
            'meta_description2' => $this->meta_description2,
            'icon1_image_id' => $this->icon1_image_id,
            'reason1' => $this->reason1,
            'detail1' => $this->detail1,
            'icon2_image_id' => $this->icon2_image_id,
            'reason2' => $this->reason2,
            'detail2' => $this->detail2,
            'icon3_image_id' => $this->icon3_image_id,
            'reason3' => $this->reason3,
            'detail3' => $this->detail3,
            'ttvn_image_id' => $this->ttvn_image_id,
            'ttvn_title' => $this->ttvn_title,
            'ttvn_content' => $this->ttvn_content,
            'we_find_introduce' => $this->we_find_introduce,
        ];
    }

}
