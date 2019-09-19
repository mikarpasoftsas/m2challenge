<?php
namespace Gdcp\Minicart\Plugin\Checkout\CustomerData;

class Cart {
    public function afterGetSectionData(\Magento\Checkout\CustomerData\Cart $subject, array $result)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $customerSession = $objectManager->get('Magento\Customer\Model\Session'); 
        if($customerSession->isLoggedIn()) {
            //$result['extra_data'] = $customerSession->getCustomer()->getName() . " / " . $customerSession->getCustomer()->getEmail();            
            $result['extra_data_name']  = $customerSession->getCustomer()->getName();
            $result['extra_data_email'] = $customerSession->getCustomer()->getEmail();
        }  
        else{
            $result['extra_data_name']  = '';
            $result['extra_data_email'] = '';
        }
            
        
        return $result;
    }
}