<?php
/**
 * RequestResponse library (https://github.com/tomphp/WhiosLookup)
 *
 * @link https://github.com/tomphp/RequestResponse for the canonical source repository
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace RequestResponse;

/**
 * Interface for a request object.
 *
 * @author Tom Oram
 */
interface RequestInterface
{
    /**
     * Returns the XML of the request.
     *
     * @return string
     */
    public function __toString();

    /**
     * Return the response.
     *
     * @return ResponseInterface
     */
    public function getResponse();
}
