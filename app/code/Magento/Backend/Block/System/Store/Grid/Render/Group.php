<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Backend\Block\System\Store\Grid\Render;

use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;
use Magento\Framework\DataObject;

/**
 * Store render group
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Group extends AbstractRenderer
{
    /**
     * {@inheritdoc}
     */
    public function render(DataObject $row): ?string
    {
        if (!$row->getData($this->getColumn()->getIndex())) {
            return null;
        }
        return '<a title="' . __(
            'Edit Store'
        ) . '"
            href="' .
        $this->getUrl('adminhtml/*/editGroup', ['group_id' => $row->getGroupId()]) .
        '">' .
        $this->escapeHtml($row->getData($this->getColumn()->getIndex())) .
        '</a><br />'
        . '(' . __('Code') . ': ' . $this->escapeHtml($row->getGroupCode()) . ')';
    }
}
