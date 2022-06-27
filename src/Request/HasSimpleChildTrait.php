<?php

/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

use Organimmo\Rental\Response\Response;

trait HasSimpleChildTrait
{
    public function get(?int $id = null)
    {
        if (isset($id)) {
            return $this->getSimpleChildResponse($id);
        } else {
            return parent::get();
        }
    }

    abstract public function getSimpleChildResponse(int $id): ?Response;
}
