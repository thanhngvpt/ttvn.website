<?php namespace App\Models;



class CriteriaCandidate extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'criteria_candidates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'icon_image_id',
        'name',
        'content',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [];

    protected $presenter = \App\Presenters\CriteriaCandidatePresenter::class;

    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\CriteriaCandidateObserver);
    }

    // Relations
    public function iconImage()
    {
        return $this->hasOne(\App\Models\Image::class, 'id', 'icon_image_id');
    }

    

    // Utility Functions

    /*
     * API Presentation
     */
    public function toAPIArray()
    {
        return [
            'id' => $this->id,
            'icon_image_id' => $this->icon_image_id,
            'name' => $this->name,
            'content' => $this->content,
        ];
    }

}
