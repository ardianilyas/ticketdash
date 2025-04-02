<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Enums\PriorityEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateTicketRequest;
use App\Services\TicketService;

class ReportController extends Controller
{
    public function __construct(protected TicketService $ticketService)
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $tickets = $this->ticketService->getUserTickets($user);
        return inertia('Reports/Index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->ticketService->getAllCategories();;
        $priorities = PriorityEnum::values();
        return inertia('Reports/Create', compact('categories', 'priorities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTicketRequest $request)
    {
        $data = $request->validated();

        $this->ticketService->storeNewTicket($data);

        return redirect()->route('dashboard.reports.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        $ticket->load(['category', 'user']);
        return inertia('Reports/Show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
