<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Form;

use Symfony\Component\Form\Exception\TransformationFailedException;
use Symfony\Component\Form\Exception\UnexpectedTypeException;

class CallbackTransformer implements DataTransformerInterface
{
    private $transform;
    private $reverseTransform;

    /**
     * @param callable $transform        The forward transform callback
     * @param callable $reverseTransform The reverse transform callback
     */
    public function __construct(callable $transform, callable $reverseTransform)
    {
        $this->transform = $transform;
        $this->reverseTransform = $reverseTransform;
    }

    /**
     * Transforms a value from the original representation to a transformed representation.
     *
     * @param mixed $data The value in the original representation
     *
     * @return mixed The value in the transformed representation
     *
     * @throws UnexpectedTypeException       when the argument is not of the expected type
     * @throws TransformationFailedException when the transformation fails
     */
    public function transform($data)
    {
        return ($this->transform)($data);
    }

    /**
     * Transforms a value from the transformed representation to its original
     * representation.
     *
     * @param mixed $data The value in the transformed representation
     *
     * @return mixed The value in the original representation
     *
     * @throws UnexpectedTypeException       when the argument is not of the expected type
     * @throws TransformationFailedException when the transformation fails
     */
    public function reverseTransform($data)
    {
        return ($this->reverseTransform)($data);
    }
}
