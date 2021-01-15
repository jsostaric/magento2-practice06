<?php

namespace Inchoo\Sample06\Controller\Adminhtml\News;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\Context;

class Save extends Action
{
    protected $newsRepository;
    protected $newsFactory;

    public function __construct(
        Context $context,
        \Inchoo\Sample04\Api\NewsRepositoryInterface $newsRepository,
        \Inchoo\Sample04\Api\Data\NewsInterfaceFactory $newsFactory
    ) {
        $this->newsRepository = $newsRepository;
        $this->newsFactory = $newsFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('news_id');

        if($id === ''){
            $createNews = $this->newsFactory->create();
            $createNews->setTitle($this->getRequest()->getParam('title'));
            $createNews->setContent($this->getRequest()->getParam('content'));
            $this->newsRepository->save($createNews);
        } else {
            $news = $this->newsRepository->getById($id);
            $news->setTitle($this->getRequest()->getParam('title'));
            $news->setContent($this->getRequest()->getParam('content'));
            $news->save();
       }

        return $this->_redirect('sample06/news/');
    }
}
