<?php

namespace FDevs\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class LocaleController extends Controller
{

    /**
     * Action for locale switch
     *
     * @param Request $request
     *
     * @throws \InvalidArgumentException
     * @return RedirectResponse
     */
    public function switchAction(Request $request)
    {
        $_locale = $request->attributes->get('_locale', $request->getLocale());
        $_locale = stristr($_locale, '_') ? substr($_locale, 0, 2) : $_locale;
        $statusCode = $request->attributes->get('statusCode', '301');
        $useReferrer = $request->attributes->get('useReferrer', null);
        $redirectToRoute = $request->attributes->get('route', null);

        // Redirect the User
        if ($useReferrer && $request->headers->has('referer')) {
            $response = new RedirectResponse($request->headers->get('referer'), $statusCode);
        } else {
            $response = new RedirectResponse(
                $this->generateUrl($redirectToRoute, array('_locale' => $_locale)),
                $statusCode
            );
        }

        return $response;
    }

}
