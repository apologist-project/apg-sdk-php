<?php

declare(strict_types=1);

namespace Apologist\Store\Order\OrderCreateParams;

/**
 * Order Status.
 */
enum Status: string
{
    case PLACED = 'placed';

    case APPROVED = 'approved';

    case DELIVERED = 'delivered';
}
