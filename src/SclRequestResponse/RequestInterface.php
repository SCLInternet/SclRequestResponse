<?php
/**
 * SclRequestResponse library (https://github.com/SCLInternet/SclWhois)
 *
 * @link https://github.com/SCLInternet/SclRequestResponse for the canonical source repository
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace SclRequestResponse;

/**
 * Interface for a request object.
 *
 * @author Tom Oram
 */
interface RequestInterface
{
    /**
     * Returns formatted data to be sent
     *
     * @return string
     */
    public function getPacket();

    /**
     * Return the response.
     *
     * @return ResponseInterface
     */
    public function getResponse();
}
