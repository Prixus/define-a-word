<?php

namespace App\Repositories\Api;

use App\Exceptions\ApiRequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Exception;

/**
 * Class ApiBaseRepository
 *
 * @package App\Repositories\Api
 * @author Simon Peter Calamno
 * @since 2022.06.04
 */
abstract class ApiBaseRepository
{
    /**
     * Base Domain Attribute
     * @var string
     */
    protected $sBaseDomain;

    /**
     * Endpoint Attribute
     * @var string
     */
    protected $sApiEndpoint;

    /**
     * Request Headers
     * @var array
     */
    protected $aRequestHeaders = [];

    /**
     * Request Protocol
     * @var string
     */
    protected $sProtocol = 'http://';

    /**
     * Sets the HTTP protocol
     * @param bool $bIsHttps
     * @return $this
     */
    public function setHttpsProtocol($bIsHttps = true)
    {
        $this->sProtocol = $bIsHttps === true ? 'https://' : 'http://';
        return $this;
    }

    /**
     * Fetches the HTTP protocol
     * @return string
     */
    public function getHttpProtocol()
    {
        return $this->sProtocol;

    }

    /**
     * Used to fetch the request headers of the repository
     * @return array
     */
    public function getRequestHeaders() : array
    {
        return  $this->aRequestHeaders;
    }

    /**
     * Sets the base domain attribute
     * @param string $sBaseDomain
     * @return $this
     */
    public function setBaseDomain(string $sBaseDomain)
    {
        $this->sBaseDomain = $sBaseDomain;
        return $this;
    }

    /**
     * Sets the api endpoint attribute
     * @param string $sApiEndpoint
     * @return $this
     */
    public function setApiEndpoint(string $sApiEndpoint)
    {
        $this->sApiEndpoint = $sApiEndpoint;
        return $this;
    }

    /**
     * Sets the request headers
     * @param array $aRequestHeaders
     * @return $this
     */
    public function setRequestHeaders(array $aRequestHeaders)
    {
        $this->aRequestHeaders = $aRequestHeaders;
        return $this;
    }

    /**
     * Generates the url based from the api base domain and the api endpoint
     * @return string
     */
    protected function generateUrl() : string
    {
        $sCurrentBaseDomain = substr($this->sBaseDomain, -1)  === '/'
            ? Str::of($this->sBaseDomain)->rtrim('/')
            : $this->sBaseDomain;
        $sCurrentApiEndpoint = $this->sApiEndpoint[0] !== '/'
            ? '/' . $this->sApiEndpoint
            : $this->sApiEndpoint;

        return $this->getHttpProtocol() . $sCurrentBaseDomain . $sCurrentApiEndpoint;
    }

    /**
     * Fetches data from the api based on the given value
     * @param string $sId
     * @param string $sIdentifier
     * @param array $aRequestParameters
     * @return mixed
     * @throws ApiRequestException
     */
    public function getDataByIdRequest(
        string $sId,
        string $sIdentifier = '$id',
        array $aRequestParameters = []
    ) {
        $sUrl = Str::replace($sIdentifier, $sId, $this->generateUrl());
        try {
            return Http::withHeaders($this->getRequestHeaders())->get($sUrl, $aRequestParameters)->json();
        } catch (Exception $oException) {
            throw new ApiRequestException($oException->getMessage(), $oException->getCode());
        }
    }
}
