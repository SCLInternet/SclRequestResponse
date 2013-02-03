<?php
/**
 * RequestResponse library (https://github.com/tomphp/WhiosLookup)
 *
 * @link https://github.com/tomphp/RequestResponse for the canonical source repository
 * @license http://opensource.org/licenses/gpl-3.0.html GNU General Public License, version 3 (GPL-3.0)
 */

namespace RequestResponse;

/**
 * The interface for a reponse class.
 *
 * @author Tom Oram <tom@scl.co.uk>
 */
interface ResponseInterface
{
    /**
     * If $data is provided then it is passed to an init() call.
     *
     * @param array|null $data
     */
    public function __construct($data = null);

    /**
     * Read the data from an array into this object.
     *
     * @param string $data
     *
     * @return ResponseInterface Should return itself.
     * 
     * @throws InvalidResponsePacketException
     */
    public function init($data);

    /**
     * Returns true if this was a successful response.
     *
     * @return boolean
     */
    public function success();

    /**
     * Returns the response code.
     *
     * @return integer
     */
    public function code();

    /**
     * Returns the response message.
     *
     * @return string
     */
    public function message();

    /**
     * Returns the parsed data of the response.
     *
     * @return mixed
     */
    public function data();
}
