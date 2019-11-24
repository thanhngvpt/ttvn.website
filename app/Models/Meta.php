<?php namespace App\Models;



class Meta extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'metas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'link', 'meta_title', 'meta_description'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [];

    protected $presenter = \App\Presenters\MetaPresenter::class;

    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\MetaObserver);
    }

    // Relations
    

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
