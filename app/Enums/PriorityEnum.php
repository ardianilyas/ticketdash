<?php

namespace App\Enums;

enum PriorityEnum: String {
    case LOW = 'low';
    case MEDIUM ='medium';
    case HIGH = 'high';
    case URGENT = 'urgent';

    public function label(): string {
        return match($this) {
            self::LOW => 'Low',
            self::MEDIUM => 'Medium',
            self::HIGH => 'High',
            self::URGENT => 'Urgent',
        };
    }

    public static function values(): array {
        return array_column(self::cases(), 'value');
    }
}
