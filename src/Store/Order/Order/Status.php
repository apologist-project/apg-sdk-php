<?php

declare(strict_types=1);

namespace Apologist\Store\Order\Order;

/**
 * Order Status.
 */
enum Status: string
{
    case PLACED = 'placed';

    case APPROVED = 'approved';

    case DELIVERED = 'delivered';
}
