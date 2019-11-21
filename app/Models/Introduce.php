<?php namespace App\Models;



class Introduce extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'introduces';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_introduce',
        'title_leader_ship',
        'content_image_id',
        'mission_image_id',
        'content',
        'mission',
        'content_intro',
        'overview_intro',
        'diagram_image_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [];

    protected $presenter = \App\Presenters\IntroducePresenter::class;

    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\IntroduceObserver);
    }

    // Relations
    public function contentImage()
    {
        return $this->hasOne(\App\Models\Image::class, 'id', 'content_image_id');
    }

    public function missionImage()
    {
        return $this->hasOne(\App\Models\Image::class, 'id', 'mission_image_id');
    }

    public function diagramImage()
    {
        return $this->hasOne(\App\Models\Image::class, 'id', 'diagram_image_id');
    }

    

    // Utility Functions

    /*
     * API Presentation
     */
    public function toAPIArray()
    {
        return [
            'id' => $this->id,
            'title_introduce' => $this->title_introduce,
            'title_leader_ship' => $this->title_leader_ship,
            'content_image_id' => $this->content_image_id,
            'mission_image_id' => $this->mission_image_id,
            'content' => $this->content,
            'mission' => $this->mission,
            'content_intro' => $this->content_intro,
            'overview_intro' => $this->overview_intro,
            'diagram_image_id' => $this->diagram_image_id,
        ];
    }

}
