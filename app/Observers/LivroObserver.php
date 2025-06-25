<?php

namespace App\Observers;

use App\Models\Livro;
use Illuminate\Support\Facades\Cache;

class LivroObserver
{
    public function created(Livro $livro): void
    {
        Cache::forget('livros');
    }

    public function updated(Livro $livro): void
    {
        Cache::forget('livros');
    }

    public function deleted(Livro $livro): void
    {
        Cache::forget('livros');
    }
}
