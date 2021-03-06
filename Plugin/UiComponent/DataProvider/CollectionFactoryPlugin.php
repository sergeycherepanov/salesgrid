<?php

namespace Sergeycherepanov\Salesgrid\Plugin\UiComponent\DataProvider;

use Magento\Framework\Data\Collection;
use Magento\Framework\View\Element\UiComponent\DataProvider\CollectionFactory;

/**
 * Class CollectionFactoryPlugin
 * @package Sergeycherepanov\Salesgrid\Plugin\UiComponent\DataProvider
 */
class CollectionFactoryPlugin
{
    public const COLUMNS = [
        'coupon_code',
        'discount_amount',
    ];

    /**
     * @param CollectionFactory $subject
     * @param Collection $collection
     * @param $requestName
     * @return Collection
     */
    public function afterGetReport(CollectionFactory $subject, Collection $collection, $requestName)
    {
        if ($requestName == 'sales_order_grid_data_source') {
            if ($collection instanceof Collection) {
                $select = $collection->getSelect();
                $select->joinLeft(
                    [
                        "sergeycherepanov_salesgrid_order_grid" => $collection->getTable("sergeycherepanov_salesgrid_order_grid")
                    ],
                    'main_table.entity_id = sergeycherepanov_salesgrid_order_grid.entity_id',
                    static::COLUMNS
                );
            }
        }

        return $collection;
    }
}
