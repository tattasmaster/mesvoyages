<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Test\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of VoyagesControllerTest
 *
 * @author theok
 */
class VoyagesControllerTest extends WebTestCase {
        public function testAccesPage(){
        $client = static::createClient();
        $client->request('GET', '/voyages');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }
    
        public function testContenuPage(){
        $client = static::createClient();
        $crawler = $client->request('GET', '/voyages');
        $this->assertSelectorTextContains('h1', 'Mes voyages');
    }
    
    public function testLinkVille(){
        $client = static::createClient();
        $client->request('GET', '/voyages');
        // clic sur le lien (le nom d'une ville)
        $client->clickLink('Los Angeles');
        // récupération du résultat du clic
        $response = $client->getResponse();
//        dd($client->getRequest());
        // contrôle si le client existe
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        // récupération de la route et contrôle qu'elle est correcte
        $uri = $client->getRequest()->server->get('REQUEST_URI');
        $this->assertEquals('/voyages/voyage/101', $uri);
    }
}
