<?php

/*
 * This file is part of the fw4/organimmo-rental-api library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Organimmo\Rental\Request;

class ActionshapesRequest extends CollectionRequest
{
    use HasSimpleChildTrait;

    const ENDPOINT = 'actionshapes';

    /**
     * Get the communications for a specific actionshape (specified by its ID).
     *
     * @param int $actionshape_id
     */
    public function communications(int $actionshape_id): ActionshapeCommunicationsRequest
    {
        return new ActionshapeCommunicationsRequest($actionshape_id, $this->adapter);
    }
}
