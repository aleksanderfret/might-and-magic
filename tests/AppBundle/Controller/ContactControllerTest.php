<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Description of ContactControllerTest
 *
 * @author Olek
 */
class ContactControllerTest extends WebTestCase
{
    public function testMailIsSentAndContentIsOk()
    {
        $client = static::createClient();

        // Enable the profiler for the next request (it does nothing if the profiler is not available)
        $client->enableProfiler();

        $crawler = $client->request('POST', '/kontakt/send');

        $mailCollector = $client->getProfile()->getCollector('swiftmailer');

        // Check that an email was sent
        $this->assertEquals(1, $mailCollector->getMessageCount());

        $collectedMessages = $mailCollector->getMessages();
        $message = $collectedMessages[0];

        // Asserting email data
//        $this->assertInstanceOf('Swift_Message', $message);
//        $this->assertEquals('temat', $message->getSubject());
//        $this->assertEquals('alemik@op.pl', key($message->getFrom()));
//        $this->assertEquals('kontakt@gramagiaimiecz.fret.com.pl', key($message->getTo()));        
    }
}
