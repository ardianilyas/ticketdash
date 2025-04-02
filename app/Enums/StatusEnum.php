<?php

namespace App\Enums;

enum StatusEnum: String {
    case open = 'open';
    case in_progress = 'in_progress';
    case resolved = 'resolved';
    case closed = 'closed';

    public function label(): string {
        return match($this) {
            self::open => 'Open',
            self::in_progress => 'In Progress',
            self::resolved => 'Resolved',
            self::closed => 'Closed',
        };
    }

    public static function values(): array {
        return array_column(self::cases(), 'value');
    }
}
