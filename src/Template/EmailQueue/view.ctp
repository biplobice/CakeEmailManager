<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Email Queue'), ['action' => 'edit', $emailQueue->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Email Queue'), ['action' => 'delete', $emailQueue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emailQueue->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Email Queue'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Email Queue'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="emailQueue view large-9 medium-8 columns content">
    <h3><?= h($emailQueue->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($emailQueue->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('From Name') ?></th>
            <td><?= h($emailQueue->from_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('From Email') ?></th>
            <td><?= h($emailQueue->from_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subject') ?></th>
            <td><?= h($emailQueue->subject) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Config') ?></th>
            <td><?= h($emailQueue->config) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Template') ?></th>
            <td><?= h($emailQueue->template) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Layout') ?></th>
            <td><?= h($emailQueue->layout) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Theme') ?></th>
            <td><?= h($emailQueue->theme) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Format') ?></th>
            <td><?= h($emailQueue->format) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($emailQueue->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Send Tries') ?></th>
            <td><?= $this->Number->format($emailQueue->send_tries) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Send At') ?></th>
            <td><?= h($emailQueue->send_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($emailQueue->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($emailQueue->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sent') ?></th>
            <td><?= $emailQueue->sent ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Locked') ?></th>
            <td><?= $emailQueue->locked ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Template Vars') ?></h4>
        <?= $this->Text->autoParagraph(h($emailQueue->template_vars)); ?>
    </div>
    <div class="row">
        <h4><?= __('Headers') ?></h4>
        <?= $this->Text->autoParagraph(h($emailQueue->headers)); ?>
    </div>
    <div class="row">
        <h4><?= __('Attachments') ?></h4>
        <?= $this->Text->autoParagraph(h($emailQueue->attachments)); ?>
    </div>
</div>
