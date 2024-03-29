<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Order extends Model
{
    use HasFactory, SearchableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'currency_id',
        'exchange_id',
        'country_id',

        'input_number',
        'input_currency_unit',

        'output_number',
        'output_currency_unit',

        'accept',
        'order_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'order_number',
        'accept'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'accept' => 'boolean'
    ];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'orders.order_number' => 10,
            'calculators.name' => 10,
            'elements.name' => 10,
            'orders.input_number' => 9,
            'orders.output_number' => 8,
        ],
        'joins' => [
            'calculators' => ['calculators.id', 'orders.input_currency_type'],
            'elements' => ['elements.id', 'orders.output_currency_type'],
        ],
    ];

    //* Relations

    /**
     * Get the user that owns the order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the clearing that owns the order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function clearing()
    {
        return $this->hasOne(Clearing::class);
    }

    /**
     * Get the form that owns the order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function form()
    {
        return $this->hasOne(Form::class);
    }

    /**
     * Get the feedback that owns the order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HadOne
     */
    public function feedback()
    {
        return $this->hasOne(Feedback::class);
    }

    /**
     * Get the calculator that owns the order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function calculator()
    {
        return $this->belongsTo(Calculator::class);
    }

    /**
     * Get the element that owns the order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function element()
    {
        return $this->belongsTo(Element::class);
    }
}
