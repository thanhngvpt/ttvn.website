<?php namespace App\Models;



class NewCategory extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'new_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'meta_title',
        'meta_description',
        'order',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [];

    protected $presenter = \App\Presenters\NewCategoryPresenter::class;

    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\NewCategoryObserver);
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
            'name' => $this->name,
            'slug' => $this->slug,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'order' => $this->order,
        ];
    }

}
