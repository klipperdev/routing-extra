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

/**
 * @author François Pluchino <francois.pluchino@klipper.dev>
 */
interface PropertyPathMatcherInterface
{
    /**
     * Match the route parameters with property path variables with the value in object or array.
     *
     * @param array        $parameters    The route parameters
     * @param array|object $objectOrArray The object or array to traverse
     *
     * @return array The route parameters
     */
    public function matchRouteParameters(array $parameters, $objectOrArray): array;
}
