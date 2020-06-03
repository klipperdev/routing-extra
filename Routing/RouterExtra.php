<?php

/*
 * This file is part of the Klipper package.
 *
 * (c) François Pluchino <francois.pluchino@klipper.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Klipper\Component\RoutingExtra\Routing;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;

/**
 * @author François Pluchino <francois.pluchino@klipper.dev>
 */
class RouterExtra implements RouterExtraInterface
{
    private RouterInterface $router;

    private PropertyPathMatcherInterface $matcher;

    public function __construct(
        RouterInterface $router,
        PropertyPathMatcherInterface $propertyPathMatcher
    ) {
        $this->router = $router;
        $this->matcher = $propertyPathMatcher;
    }

    /**
     * @param mixed $data
     */
    public function generate(string $name, array $parameters, $data, int $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH): string
    {
        if (null !== $data) {
            $parameters = $this->matcher->matchRouteParameters($parameters, $data);
        }

        return $this->router->generate($name, $parameters, $referenceType);
    }
}
