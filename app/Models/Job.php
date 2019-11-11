<?php namespace App\Models;



class Job extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jobs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'job_category_id',
        'slug',
        'meta_title',
        'meta_description',
        'company_id',
        'province',
        'district',
        'number',
        'salary',
        'end_time',
        'order',
        'description',
        'is_enabled',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = ['end_time'];

    protected $presenter = \App\Presenters\JobPresenter::class;

    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\JobObserver);
    }

    // Relations
    public function jobCategory()
    {
        return $this->belongsTo(\App\Models\JobCategory::class, 'job_category_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class, 'company_id', 'id');
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
            'job_category_id' => $this->job_category_id,
            'slug' => $this->slug,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'company_id' => $this->company_id,
            'province' => $this->province,
            'district' => $this->district,
            'number' => $this->number,
            'salary' => $this->salary,
            'end_time' => $this->end_time,
            'order' => $this->order,
            'description' => $this->description,
            'is_enabled' => $this->is_enabled,
        ];
    }

}
