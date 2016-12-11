<?php
/* @var $this Technooze_Tproductschedule_Model_Mysql4_Setup */

$installer = $this->startSetup();

$eavConfig = Mage::getSingleton('eav/config');
$entityTypeId = $installer->getEntityTypeId('catalog_product');
$attributeSetId = $installer->getDefaultAttributeSetId($entityTypeId);
$this->addAttributeGroup($entityTypeId, $attributeSetId, 'Product Schedule', 7);


// Activation date column adding to product entity table
$this->getConnection()->addColumn(
    $this->getTable('catalog/product'),
    Technooze_Tproductschedule_Model_Attribute_Backend_Datetime::ATTRIBUTE_ACTIVATION_DATE,
    'DATETIME DEFAULT NULL'
);

// Expiry date column adding to product entity table
$this->getConnection()->addColumn(
    $this->getTable('catalog/product'),
    Technooze_Tproductschedule_Model_Attribute_Backend_Datetime::ATTRIBUTE_EXPIRY_DATE,
    'DATETIME DEFAULT NULL'
);

//Activation date attribute information adding to the product entity
$this->addAttribute(
    'catalog_product',
    Technooze_Tproductschedule_Model_Attribute_Backend_Datetime::ATTRIBUTE_ACTIVATION_DATE,
    array(
        'type'             => 'datetime',
        'label'            => 'Active From',
        'frontend'         => '',
        'table'            => '',
        'input'            => 'date',
        'class'            => '',
        'source'           => '',
        'global'           => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
        'visible'          => true,
        'required'         => false,
        'user_defined'     => false,
        'default'          => '',
        'searchable'       => false,
        'filterable'       => false,
        'comparable'       => false,
        'visible_on_front' => false,
        'unique'           => false,
        'backend'          => 'technooze_tproductschedule/attribute_backend_datetime',
        'position'         => 10,
        'group'            => 'Product Schedule'
    )
);
//
$attribute = $eavConfig->getAttribute('catalog_product', Technooze_Tproductschedule_Model_Attribute_Backend_Datetime::ATTRIBUTE_ACTIVATION_DATE);
$attribute->setData('frontend_input_renderer', 'technooze_tproductschedule/adminhtml_renderer_datetime');
$attribute->save();

// Expiry date attribute information adding to the product entity
$this->addAttribute(
    'catalog_product',
    Technooze_Tproductschedule_Model_Attribute_Backend_Datetime::ATTRIBUTE_EXPIRY_DATE,
    array(
        'type'             => 'datetime',
        'label'            => 'Active To',
        'frontend'         => '',
        'table'            => '',
        'input'            => 'date',
        'class'            => '',
        'source'           => '',
        'global'           => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
        'visible'          => true,
        'required'         => false,
        'user_defined'     => false,
        'default'          => '',
        'searchable'       => false,
        'filterable'       => false,
        'comparable'       => false,
        'visible_on_front' => false,
        'unique'           => false,
        'backend'          => 'technooze_tproductschedule/attribute_backend_datetime',
        'position'         => 20,
        'group'            => 'Product Schedule'
    )
);

$attribute = $eavConfig->getAttribute('catalog_product', Technooze_Tproductschedule_Model_Attribute_Backend_Datetime::ATTRIBUTE_EXPIRY_DATE);
$attribute->setData('frontend_input_renderer', 'technooze_tproductschedule/adminhtml_renderer_datetime');
$attribute->save();

//$this->installEntities(); //This cause reassign attributes groups

$this->endSetup();


