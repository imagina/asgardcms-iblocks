<?php

namespace Modules\Iblocks\Repositories\Cache;

use Modules\Iblocks\Repositories\BlockRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheBlockDecorator extends BaseCacheDecorator implements BlockRepository
{
    public function __construct(BlockRepository $block)
    {
        parent::__construct();
        $this->entityName = 'iblocks.blocks';
        $this->repository = $block;
    }
}
