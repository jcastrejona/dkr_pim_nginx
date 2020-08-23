<?php

namespace AppBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;

class MailController extends FrontendController
{
    public function defaultAction(Request $request)
    {
        $params = array('firstName' => 'Pim',
                'lastName' => 'Core',
                'Product' => 5);
        $mail = new \Pimcore\Mail();
        $mail->addTo('example@pimcore.org');
        $mail->setDocument('/Email/myemail');
        $mail->setParams($params);
        $mail->send();
    }

}
