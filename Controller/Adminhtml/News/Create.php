<?php


namespace Inchoo\Sample06\Controller\Adminhtml\News;


use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;

class Create extends Action
{

    public function execute()
    {

        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $resultPage->setActiveMenu('Inchoo_Sample06::news');
        $resultPage->getConfig()->getTitle()->prepend(__('Create News'));

        return $resultPage;
    }
}
