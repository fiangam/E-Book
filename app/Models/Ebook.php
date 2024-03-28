<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ebook extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id_kategori',
        'judul',
        'tanggal_terbit',
        'file_ebook',
        'foto',
    ];
    public function kategoris(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
}