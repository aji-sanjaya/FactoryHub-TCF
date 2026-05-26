<?php

namespace App\Models\Idempiere;

use Illuminate\Database\Eloquent\Model;

class DpkPettycashClosingLine extends Model
{
    protected $connection = 'idempiere';
    protected $table = 'tcf_pettycash_closingline';
    protected $primaryKey = 'tcf_pettycash_closingline_id';
    public $timestamps = false;

    protected $fillable = [
        'ad_client_id',
        'ad_org_id',
        'tcf_pettycash_closing_id',
        'tcf_pettycash_request_id',
        'tcf_pettycash_requestline_id',
        'name',
        'description',
        'amount',
        'created',
        'createdby',
        'updated',
        'updatedby',
        'isactive',
    ];

    protected $casts = [
        'created' => 'datetime',
        'updated' => 'datetime',
        'amount' => 'decimal:2',
    ];

    /**
     * Relationship to header
     */
    public function header()
    {
        return $this->belongsTo(DpkPettycashClosing::class, 'tcf_pettycash_closing_id', 'tcf_pettycash_closing_id');
    }

    /**
     * Relationship to Petty Cash Request Line
     */
    public function requestLine()
    {
        return $this->belongsTo(DpkPettycashRequestLine::class, 'tcf_pettycash_requestline_id', 'tcf_pettycash_requestline_id');
    }
}
