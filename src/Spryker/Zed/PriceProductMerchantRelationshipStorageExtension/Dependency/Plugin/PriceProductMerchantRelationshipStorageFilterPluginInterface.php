<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PriceProductMerchantRelationshipStorageExtension\Dependency\Plugin;

/**
 * Filters out merchant prices before saving to storage.
 */
interface PriceProductMerchantRelationshipStorageFilterPluginInterface
{
    /**
     * Specification:
     * - Filters `PriceProductMerchantRelationshipStorageTransfer` out from array if it is non-actual or|and does not fit certain conditions.
     * - Returns array of filtered `PriceProductMerchantRelationshipStorageTransfer`.
     * - The content of the transfers depends on `\Spryker\Zed\PriceProductMerchantRelationshipStorage\PriceProductMerchantRelationshipStorageConfig::isMerchantRelationPriceKeyEnabled()`:
     *   - Disabled: one transfer per store, product and company business unit. `idCompanyBusinessUnit` is the business unit that the prices are served to. `idMerchantRelationship` is `null`.
     *   - Enabled: one transfer per store, product and merchant relationship. `idMerchantRelationship` is set. `idCompanyBusinessUnit` is `null`, because the prices are served to every business unit of the merchant relationship.
     *
     * @api
     *
     * @param array<\Generated\Shared\Transfer\PriceProductMerchantRelationshipStorageTransfer> $priceProductMerchantRelationshipStorageTransfers
     *
     * @return array<\Generated\Shared\Transfer\PriceProductMerchantRelationshipStorageTransfer>
     */
    public function filter(array $priceProductMerchantRelationshipStorageTransfers): array;
}
