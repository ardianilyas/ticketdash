<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketAssignment extends Model
{
    /** @use HasFactory<\Database\Factories\TicketAssignmentFactory> */
    use HasFactory, HasUuids;
}
