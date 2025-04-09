<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\TicketRepository;

class TicketService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected TicketRepository $ticketRepository)
    {
        
    }

    public function getUserTickets(User $user, $search) {
        return $this->ticketRepository->getAllTicketsForUser($user, $search);
    }

    public function getAllCategories() {
        return $this->ticketRepository->getAllCategories();
    }

    public function storeNewTicket(array $data) {
        return $this->ticketRepository->storeNewTicket($data);
    }
}
