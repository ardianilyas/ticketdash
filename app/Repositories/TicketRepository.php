<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class TicketRepository implements TicketRepositoryInterface
{
    public function getAllTicketsForUser(User $user): Collection
    {
        return $user->tickets()->with('category')->latest()->get();
    }

    public function getAllCategories(): Collection
    {
        return Category::all();
    }

    public function storeNewTicket(array $data) {
        return Auth::user()->tickets()->create($data);
    }
}
