<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\GraphQlResolverCache\Model\Resolver\Result\ValueProcessor\FlagSetter;

use Magento\GraphQlResolverCache\Model\Resolver\Result\ValueProcessorInterface;

/**
 * Enumerable value flag setter/unsetter.
 */
class Enumerable implements FlagSetterInterface
{
    /**
     * @inheritdoc
     */
    public function setFlagOnValue(&$value, string $flagValue): void
    {
        foreach ($value as $key => $data) {
            $value[$key][ValueProcessorInterface::VALUE_HYDRATION_REFERENCE_KEY] = [
                'cacheKey' => $flagValue,
                'index' => $key
            ];
        }
    }

    /**
     * @inheritdoc
     */
    public function unsetFlagFromValue(&$value): void
    {
        foreach ($value as $key => $data) {
            unset($value[$key][ValueProcessorInterface::VALUE_HYDRATION_REFERENCE_KEY]);
        }
    }
}
