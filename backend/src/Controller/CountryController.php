<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CountryController extends AbstractController
{

    private HttpClientInterface $client;

    public function __construct(httpClientInterface $client)
    {
        $this->client = $client;
    }

    #[Route('/api/countries', name: 'app_country', methods:['GET'])]
    public function getCountries(): JsonResponse
    {
        $response = $this->client->request('GET', 'https://restcountries.com/v2/all');

        $countries = $response->toArray();

        return $this->json($countries);
    }
}
