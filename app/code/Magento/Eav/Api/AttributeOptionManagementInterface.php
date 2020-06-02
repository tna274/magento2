<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Eav\Api;

/**
 * Interface AttributeOptionManagementInterface
 * @api
 * @since 100.0.2
 */
interface AttributeOptionManagementInterface
{
    /**
     * Add option to attribute
     *
     * @param int $entityType
     * @param string $attributeCode
     * @param \Magento\Eav\Api\Data\AttributeOptionInterface $option
     * @throws \Magento\Framework\Exception\StateException
     * @throws \Magento\Framework\Exception\InputException
     * @return string
     */
    public function add($entityType, $attributeCode, $option);

    /**
     * Update attribute option
     *
     * @param string $entityType
     * @param string $attributeCode
     * @param int $optionId
     * @param \Magento\Eav\Api\Data\AttributeOptionInterface $option
     * @return bool
     * @throws \Magento\Framework\Exception\StateException
     * @throws \Magento\Framework\Exception\InputException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function update($entityType, $attributeCode, $optionId, $option);

    /**
     * Delete option from attribute
     *
     * @param int $entityType
     * @param string $attributeCode
     * @param string $optionId
     * @throws \Magento\Framework\Exception\StateException
     * @throws \Magento\Framework\Exception\InputException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @return bool
     */
    public function delete($entityType, $attributeCode, $optionId);

    /**
     * Retrieve list of attribute options
     *
     * @param int $entityType
     * @param string $attributeCode
     * @throws \Magento\Framework\Exception\StateException
     * @throws \Magento\Framework\Exception\InputException
     * @return \Magento\Eav\Api\Data\AttributeOptionInterface[]
     */
    public function getItems($entityType, $attributeCode);
}
