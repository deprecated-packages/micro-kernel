<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route(path="/", name="homepage")
     * @Template("AppBundle:Default:index.html.twig")
     */
    public function indexAction()
    {
        return [];
    }

    /**
     * @Route("/vychod-a-zapad-slunce/{when}", name="sunrise_and_sunset", defaults={"when"="0"}, requirements={"when"="\d+"})
     * @Template()
     */
    public function sunriseAndSunsetAction($when)
    {
        $date = new \DateTime();
        $date->add(new \DateInterval("P" . $when . "D"));

        date_default_timezone_set("Europe/Prague");
        $sunrise = date_sunrise($date->getTimestamp(), SUNFUNCS_RET_STRING, 50.0872, 14.4211);
        $sunset = date_sunset($date->getTimestamp(), SUNFUNCS_RET_STRING, 50.0872, 14.4211);

        return ['sunrise' => $sunrise, 'sunset' => $sunset, 'date' => $date];
    }

    /**
     * @Route("/kontakt", name="contact")
     * @Template()
     */
    public function contactAction()
    {
        return [];
    }
}