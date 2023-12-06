<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    const STATUSES = [
        self::STATUS_ACTIVE, self::STATUS_DELETED,
    ];

    const TABLE = "tasks";

    public function setStatusAttribute(string $status): void
    {
        if(!in_array($status, self::STATUSES)) {
            throw new \Error("Invalid status. Allowed statuses ".implode(',', self::STATUSES));
        }

        $this->attributes['status'] = $status;
    }
}
