<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface TicketRepositoryInterface {
    public function getAllTicketsForUser(User $user, $search): Collection;
    public function getAllCategories(): Collection;
    public function storeNewTicket(array $data);
}
