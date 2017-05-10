<?php

namespace M1guelpf\LaraccessApi;

use GuzzleHttp\Client;

class Laraccess
{
    /** @var \GuzzleHttp\Client */
    protected $client;

    /** @var string */
    protected $baseUrl;

    /**
     * @param \GuzzleHttp\Client $client
     * @param string             $apiToken
     * @param string             $rootUrl
     */
    public function __construct($apiToken = null, $rootUrl = 'https://laraccess.miguelpiedrafita.com')
    {
        $this->client = new Client();

        $this->apiToken = $apiToken;

        $this->baseUrl = $rootUrl.'/api';
    }

    /**
     * @param string $apiToken
     *
     * @return string
     */
    public function connect($apiToken)
    {
        $this->apiToken = $apiToken;

        return $this->apiToken;
    }

    /**
     * @return \GuzzleHttp\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param \GuzzleHttp\Client $client
     *
     * @return void
     */
    public function setClient($client)
    {
        if ($client instanceof Client) {
            $this->client = $client;
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getRoot()
    {
        return $this->get('');
    }

    /**
     * @return array
     */
    public function getUser()
    {
        return $this->get('/user');
    }

    /**
     * @param array $user
     *
     * @return array
     */
    public function createUser(array $user)
    {
        return $this->post('/user', $user);
    }

    /**
     * @param array $user
     *
     * @return array
     */
    public function editUser(array $user)
    {
        return $this->put('/user', $user);
    }

    /**
     * @return void
     */
    public function deleteUser()
    {
        return $this->delete('/user');
    }

    /**
     * @return array
     */
    public function getUserCcampaigns()
    {
        return $this->get('/user/campaigns');
    }

    /**
     * @param integer $id
     *
     * @return array
     */
    public function getCampaign($id)
    {
        return $this->get('/campaign/'.$id);
    }

    /**
     * @param array $campaign
     *
     * @return array
     */
    public function createCampaign($campaign)
    {
        return $this->post('/campaign', $campaign);
    }

    /**
     * @param integer $id
     * @param array $campaign
     *
     * @return array
     */
    public function editCampaign($id, $campaign)
    {
        return $this->put('/campaign/'.$id, $campaign);
    }

    /**
     * @param integer $id
     *
     * @return null
     */
    public function deleteCampaign($id)
    {
        return $this->delete('/campaign/'.$id);
    }

    /**
     * @param integer $id
     *
     * @return array
     */
    public function getCampaignLeads($id)
    {
        return $this->get('/campaign/'.$id.'/leads');
    }

    /**
     * @param integer $id
     *
     * @return array
     */
    public function getLead($id)
    {
        return $this->get('/lead/'.$id);
    }

    /**
     * @param integer $id
     * @param array $lead
     *
     * @return array
     */
    public function createLead($id, $lead)
    {
        return $this->post('campaign/'.$id.'/leads', $lead);
    }

    /**
     * @param integer $id
     * @param array $lead
     *
     * @return array
     */
    public function editLead($id, $lead)
    {
        return $this->put('lead/'.$id, $lead);
    }

    /**
     * @param integer $id
     *
     * @return array
     */
    public function deleteLead($id, $lead)
    {
        return $this->delete('lead/'.$id);
    }

    /**
     * @param integer $id
     *
     * @return array
     */
    public function inviteLead($id)
    {
        return $this->post('lead/'.$id.'/invite');
    }

    /**
     * @param bool $set
     *
     * @return string
     */
    public function regenerateToken($set = true)
    {
        if ($set) {
            return $this->connect($this->post('/token/regenerate'));
        }

        return $this->post('/token/regenerate');
    }

    /**
     * @param string $resource
     * @param array  $query
     *
     * @return array
     */
    protected function get($resource, array $query = [])
    {
        $data['headers'] = ['Authorization' => 'Bearer '.$this->apiToken, 'User-Agent' => 'php-laraccess-api'];
        $data['query'] = $query;
        $results = $this->client
            ->get("{$this->baseUrl}{$resource}", $data)
            ->getBody()
            ->getContents();

        return json_decode($results, true);
    }

    /**
     * @param string $resource
     * @param array  $rawdata
     *
     * @return array
     */
    protected function post($resource, array $rawdata = [])
    {
        $data['headers'] = ['Authorization' => 'Bearer '.$this->apiToken, 'User-Agent' => 'php-laraccess-api'];
        $data['json'] = $rawdata;
        $results = $this->client
            ->post("{$this->baseUrl}{$resource}", $data)
            ->getBody()
            ->getContents();

        return json_decode($results, true);
    }

    /**
     * @param string $resource
     * @param array  $rawdata
     *
     * @return array
     */
    protected function put($resource, array $rawdata = [])
    {
        $data['headers'] = ['Authorization' => 'Bearer '.$this->apiToken, 'User-Agent' => 'php-laraccess-api'];
        $data['json'] = $rawdata;
        $results = $this->client
            ->request('PUT', "{$this->baseUrl}{$resource}", $data)
            ->getBody()
            ->getContents();

        return json_decode($results, true);
    }

    /**
     * @param string $resource
     * @param array  $rawdata
     *
     * @return array
     */
    public function delete($resource, array $rawdata = [])
    {
        $data['headers'] = ['Authorization' => 'Bearer '.$this->apiToken, 'User-Agent' => 'php-laraccess-api'];
        $data['json'] = $rawdata;
        $results = $this->client
            ->request('DELETE', "{$this->baseUrl}{$resource}", $data)
            ->getBody()
            ->getContents();

        return json_decode($results, true);
    }
}
