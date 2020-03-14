<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Customer\CustomerData;

/**
 * Class that receives xml merged source and process it.
 */
class SectionConfigConverter implements \Magento\Framework\Config\ConverterInterface
{
    /**
     * Invalidate all sections marker
     */
    const INVALIDATE_ALL_SECTIONS_MARKER = '*';

    /**
     * @inheritdoc
     */
    public function convert($source)
    {
        $sections = [];
        foreach ($source->getElementsByTagName('action') as $action) {
            $actionName = strtolower($action->getAttribute('name'));
            foreach ($action->getElementsByTagName('section') as $section) {
                $sectionName = strtolower($section->getAttribute('name'));

                if ($sectionName === self::INVALIDATE_ALL_SECTIONS_MARKER) {
                    $sections[$actionName] = [];
                    $sections[$actionName][] = self::INVALIDATE_ALL_SECTIONS_MARKER;
                    break;
                } else {
                    $sections[$actionName][] = $sectionName;
                }
            }
            if (!isset($sections[$actionName])) {
                $sections[$actionName][] = self::INVALIDATE_ALL_SECTIONS_MARKER;
            }
        }
        return [
            'sections' => $sections,
        ];
    }
}
