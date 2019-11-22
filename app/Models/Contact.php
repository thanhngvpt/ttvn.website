<?php namespace App\Models;



class Contact extends Base
{

    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contacts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'content',
        'message_type',
        'is_read',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates  = [];

    protected $presenter = \App\Presenters\ContactPresenter::class;

    public static function boot()
    {
        parent::boot();
        parent::observe(new \App\Observers\ContactObserver);
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
            'email' => $this->email,
            'phone' => $this->phone,
            'content' => $this->content,
            'message_type' => $this->message_type,
            'is_read' => $this->is_read,
        ];
    }

}
