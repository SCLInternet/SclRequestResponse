<?php
/**
 * SclRequestResponse library (https://github.com/SCLInternet/SclWhois)
 *
 * @link https://github.com/SCLInternet/SclRequestResponse for the canonical source repository
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace SclRequestResponse;

/**
 * The interface for a reponse class.
 *
 * @author Tom Oram <tom@scl.co.uk>
 */
interface ResponseInterface
{
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
