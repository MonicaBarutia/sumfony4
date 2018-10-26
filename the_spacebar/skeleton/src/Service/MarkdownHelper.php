<?php
/**
 * Created by PhpStorm.
 * User: Monica
 * Date: 10/26/2018
 * Time: 12:10 PM
 */

namespace App\Service;



use Michelf\MarkdownInterface;
use Symfony\Component\Cache\Adapter\AdapterInterface;

class MarkdownHelper
{
    private $cache;
    private $markdown;

    public function __construct(AdapterInterface $cache, MarkdownInterface$markdown)
    {
        $this->cache = $cache;
        $this ->markdown = $markdown;
    }

    public function parse(string $source ): string
    {
        $item = $this->cache->getItem('markdown_'.md5($source));
        if(!$item->isHit()) {
            $item->set($this->markdown->transform($source));
            $this->cache->save($item);
        }
        return $item->get();
    }
}