<?php

namespace App\Enums;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * Class CollectStatusEnum
 * @package App\Enums
 *
 * @method static $this PENDING()
 * @method static $this APPROVED()
 * @method static $this COLLECTED()
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class CollectStatusEnum extends AbstractEnumeration
{
    /** @var int PENDING Status pending. */
    const PENDING = 'PENDING';

    /** @var int APPROVED Status approved. */
    const APPROVED = 'APPROVED';

    /** @var int COLLECTED Status collected. */
    const COLLECTED = 'COLLECTED';
}
