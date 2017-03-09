<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Email Queue'), ['controller' => 'EmailQueue', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="emailQueue index large-9 medium-8 columns content">
    <h3><?= __('Email Queue') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
<!--                <th scope="col">--><?//= $this->Paginator->sort('from_name') ?><!--</th>-->
<!--                <th scope="col">--><?//= $this->Paginator->sort('from_email') ?><!--</th>-->
                <th scope="col"><?= $this->Paginator->sort('subject') ?></th>
<!--                <th scope="col">--><?//= $this->Paginator->sort('config') ?><!--</th>-->
<!--                <th scope="col">--><?//= $this->Paginator->sort('template') ?><!--</th>-->
<!--                <th scope="col">--><?//= $this->Paginator->sort('layout') ?><!--</th>-->
<!--                <th scope="col">--><?//= $this->Paginator->sort('theme') ?><!--</th>-->
<!--                <th scope="col">--><?//= $this->Paginator->sort('format') ?><!--</th>-->
                <th scope="col"><?= $this->Paginator->sort('sent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('locked') ?></th>
                <th scope="col"><?= $this->Paginator->sort('send_tries') ?></th>
                <th scope="col"><?= $this->Paginator->sort('send_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
<!--                <th scope="col">--><?//= $this->Paginator->sort('modified') ?><!--</th>-->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($emailQueue as $emailQueue): ?>
            <tr>
                <td><?= $this->Number->format($emailQueue->id) ?></td>
                <td><?= h($emailQueue->email) ?></td>
<!--                <td>--><?//= h($emailQueue->from_name) ?><!--</td>-->
<!--                <td>--><?//= h($emailQueue->from_email) ?><!--</td>-->
                <td><?= h($emailQueue->subject) ?></td>
<!--                <td>--><?//= h($emailQueue->config) ?><!--</td>-->
<!--                <td>--><?//= h($emailQueue->template) ?><!--</td>-->
<!--                <td>--><?//= h($emailQueue->layout) ?><!--</td>-->
<!--                <td>--><?//= h($emailQueue->theme) ?><!--</td>-->
<!--                <td>--><?//= h($emailQueue->format) ?><!--</td>-->
                <td><?= h($emailQueue->sent) ?></td>
                <td><?= h($emailQueue->locked) ?></td>
                <td><?= $this->Number->format($emailQueue->send_tries) ?></td>
                <td><?= h($emailQueue->send_at) ?></td>
                <td><?= h($emailQueue->created) ?></td>
<!--                <td>--><?//= h($emailQueue->modified) ?><!--</td>-->
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $emailQueue->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $emailQueue->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $emailQueue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emailQueue->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
