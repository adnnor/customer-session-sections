<?php

namespace Ad\Sections\CustomerData;

class IsLoggedIn extends \Magento\Framework\DataObject implements \Magento\Customer\CustomerData\SectionSourceInterface
{
    /**
     * @var \Magento\Customer\Model\Session\Proxy
     */
    private $customerSession;

    /**
     * Cartweight constructor.
     * @param \Magento\Customer\Model\Session\Proxy $customerSession
     * @param array $data
     */
    public function __construct(
        \Magento\Customer\Model\Session\Proxy $customerSession,
        array $data = []
    ) {
        parent::__construct($data);
        $this->customerSession = $customerSession;
    }

    public function getSectionData()
    {
        if ($this->customerSession->isLoggedIn()) {
            return [
                'loggedin' => "Customer is logged in with id " . $this->customerSession->getCustomer()->getId()
            ];
        }
        return [
            'loggedin' => "customer isn't loggedin",
        ];
    }
}
