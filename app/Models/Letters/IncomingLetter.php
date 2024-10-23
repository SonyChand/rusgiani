<?php

namespace App\Models\Letters;

use Illuminate\Database\Eloquent\Model;

class IncomingLetter extends Model
{
    protected $fillable = [
        'source_letter',
        'addressed_to',
        'letter_number',
        'letter_date',
        'subject',
        'attachment',
        'forwarded_disposition',
        'file_path',
        'operator_name',
    ];

    public function dispositions()
    {
        return $this->hasMany(Disposition::class, 'letter_id');
    }
}
