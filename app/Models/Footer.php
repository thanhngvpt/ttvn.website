<?php namespace App\Models;



class Footer extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'footers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hn_name',
        'hn_address',
        'hn_phone',
        'hn_fax',
        'other_name',
        'other_address',
        'other_phone',
        'other_fax',
        'fb_link',
        'skype_link',
        'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [];

    protected $presenter = \App\Presenters\FooterPresenter::class;

    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\FooterObserver);
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
            'hn_name' => $this->hn_name,
            'hn_address' => $this->hn_address,
            'hn_phone' => $this->hn_phone,
            'hn_fax' => $this->hn_fax,
            'other_name' => $this->other_name,
            'other_address' => $this->other_address,
            'other_phone' => $this->other_phone,
            'other_fax' => $this->other_fax,
            'fb_link' => $this->fb_link,
            'skype_link' => $this->skype_link,
            'email' => $this->email,
        ];
    }

}
