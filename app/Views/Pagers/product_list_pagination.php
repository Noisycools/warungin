<?php $pager->setSurroundCount(1) ?>

<div aria-label="Page navigation" class="flex justify-center mt-12">
    <div class="pagination" class="flex rounded-md mt-8">
        <?php if ($pager->hasPrevious()) : ?>
            <a href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>" class="py-2 px-4 leading-tight bg-white border border-gray-200 text-red-700 border-r-0 ml-0 rounded-l hover:bg-red-500 hover:text-white">
                <span aria-hidden="true"><?= lang('Pager.first') ?></span>
            </a>
            <a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>" class="py-2 px-4 leading-tight bg-white border border-gray-200 text-red-700 border-r-0 hover:bg-red-500 hover:text-white">
                <span aria-hidden="true"> <i class="fas fa-angle-double-left"></i> <?= lang('Pager.previous') ?></span>
            </a>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <a href="<?= $link['uri'] ?>" class="<?= $link['active'] ? 'bg-red-500 text-white' : 'text-red-700' ?> py-2 px-4 leading-tight bg-white border border-gray-200 border-r-0 hover:bg-red-500 hover:text-white">
                <?= $link['title'] ?>
            </a>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>" class="py-2 px-4 leading-tight bg-white border border-gray-200 text-red-700 border-r-0 hover:bg-red-500 hover:text-white">
                <span aria-hidden="true"><?= lang('Pager.next') ?> <i class="fas fa-angle-double-right"></i> </span>
            </a>
            <a href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>" class="py-2 px-4 leading-tight bg-white border border-gray-200 text-red-700 rounded-r hover:bg-red-500 hover:text-white">
                <span aria-hidden="true"><?= lang('Pager.last') ?></span>
            </a>
        <?php endif ?>
    </div>
</div>