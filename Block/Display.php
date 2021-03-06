<?php

namespace Clearbanc\FundingPage\Block;

use \Clearbanc\FundingPage\Helper\Calculator;

class Display extends \Magento\Framework\View\Element\Template
{
    protected $calculator;

    /**
     * Constructor for display
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Clearbanc\FundingPage\Helper\Calculator         $calculator
     * @param \Magento\Framework\HTTP\ZendClientFactory        $httpClientFactory
     * @param \Magento\Backend\Model\Auth\Session              $authSession
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Clearbanc\FundingPage\Helper\Calculator $calculator,
        \Magento\Framework\HTTP\ZendClientFactory $httpClientFactory,
        \Magento\Backend\Model\Auth\Session $authSession,
        array $data = []
    ) {
        $this->calculator = $calculator;
        $this->authSession = $authSession;
        $this->_httpClientFactory = $httpClientFactory;
        parent::__construct($context, $data);
    }

    /**
     * Public getter for last30DaySum
     *
     * @return getLast30DaySum
     */
    public function getLast30DaySum()
    {
        return $this->calculator->getlast30DaySum();
    }

    /**
     *  Public getter for orders
     *
     * @return getLast30DaysOrders
     */
    public function getLast30DaysOrders()
    {
        return $this->calculator->getLast30DaysOrders();
    }

    /**
     *  Public getter for getLastYearSum
     *
     * @return getlastYearSum()
     */
    public function getLastYearSum()
    {
        return $this->calculator->getlastYearSum();
    }

    /**
     *  Public getter for orders
     *
     * @return getLastYearOrders()
     */
    public function getLastYearOrders()
    {
        return $this->calculator->getLastYearOrders();
    }

    /**
     *  Public getter for getMinRevenue
     *
     * @return Calculator::MIN_REVENUE()
     */
    public function getMinRevenue()
    {
        return Calculator::MIN_REVENUE;
    }

    /**
     *  Public getter for isQualified
     *
     * @return true if the admin meets the minimum revenue criteria else false
     */
    public function isQualified()
    {
        return $this->calculator->getLast30DaySum() > Calculator::MIN_REVENUE;
    }
}
