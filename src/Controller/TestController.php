<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * we extend the `AbstractController` here to be able to use Twig with the `render` method
 */
class TestController extends AbstractController
{
    #[Route('/test_raw', name: 'app_test_raw')]
    public function indexHTML(): Response
    {
        return new Response(
            '<html><body><p>test route works</p></body></html>'
        );
    }

    #[Route('/test_twig', name: 'app_test_twig')]
    public function indexTwig(): Response
    {
        return $this->render('test.html.twig');
    }

    #[Route('/test_wildcard/{some_slug}', name: 'app_test_wildcard')]
    public function indexWildcard(string $some_slug): Response
    {
        return $this->render('test.html.twig', [
            "slug" => $some_slug
        ]);
    }

    #[Route('/test_redirect', name: 'app_test_redirect')]
    public function indexRedirect(LoggerInterface $logger): Response 
    {
        /**
         * DI at its finest here
         * php bin/console debug:autowiring => gets you the list of auto wirable services
         */
        $logger->info("FROM REDIRECT ROUTE"); 
        return $this->redirectToRoute('app_test_twig', [], 301);
    }

    #[Route('/test_request', name: 'app_test_request')]
    public function indexRequest(Request $request): Response
    {
        $reqStr = $request->__toString();
        return new Response('<pre>' . $reqStr . '</pre>');
    }

    #[Route('/test_sessset', name: 'app_test_sessset')]
    public function indexSessionSet(SessionInterface $session): Response
    {
        $session->set('some_key', 'some_val');
        return new Response('session data set');
    }

    #[Route('/test_sessget', name: 'app_test_sessget')]
    public function indexSessionGet(SessionInterface $session): Response
    {
        return new Response($session->get('some_key'));
    }
  
}