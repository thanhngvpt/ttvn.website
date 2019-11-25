<?php namespace App\Models;



class Cadidate extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cadidates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'file',
        'link_job',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [];

    protected $presenter = \App\Presenters\CadidatePresenter::class;

    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\CadidateObserver);
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
            'phone' => $this->phone,
            'email' => $this->email,
            'file' => $this->file,
            'link_job' => $this->link_job,
        ];
    }

}
