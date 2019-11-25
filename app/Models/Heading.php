<?php namespace App\Models;



class Heading extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'headings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_heading',
        'heading_description',
        'title_group',
        'title_data_highlight',
        'title_news',
        'title_company',
        'title_support',
        'support_description',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [];

    protected $presenter = \App\Presenters\HeadingPresenter::class;

    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\HeadingObserver);
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
            'title_heading' => $this->title_heading,
            'heading_description' => $this->heading_description,
            'title_group' => $this->title_group,
            'title_data_highlight' => $this->title_data_highlight,
            'title_news' => $this->title_news,
            'title_company' => $this->title_company,
            'title_support' => $this->title_support,
            'support_description' => $this->support_description,
        ];
    }

}
