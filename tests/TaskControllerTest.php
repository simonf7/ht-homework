<?php

namespace App\Tests;

use Liip\FunctionalTestBundle\Test\WebTestCase;

class TaskControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $this->loadFixtures([]);

        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Tasks', $crawler->filter('h1')->text());
    }

    public function testForm()
    {
        $this->loadFixtures([]);

        $client = static::createClient();
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/');

        $form = $crawler->selectButton('Add Task')->form();
        $form->setValues([
            'task[name]'            => 'My New Task',
            'task[dueDate][month]'  => '8',
            'task[dueDate][day]'    => '10',
            'task[dueDate][year]'   => '2020',
        ]);

        $crawler = $client->submit($form);

        $this->assertContains('My New Task', $crawler->filter('table tbody tr:first-child td:nth-child(2)')->text());
        $this->assertContains('10/08/2020', $crawler->filter('table tbody tr:first-child td:nth-child(3)')->text());
    }
}
