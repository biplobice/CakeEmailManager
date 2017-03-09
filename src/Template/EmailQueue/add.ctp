<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Email Queue'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="emailQueue form large-9 medium-8 columns content">
    <?= $this->Form->create($emailQueue) ?>
    <fieldset>
        <legend><?= __('Add Email Queue') ?></legend>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('from_name');
            echo $this->Form->input('from_email');
            echo $this->Form->input('subject');
            echo $this->Form->input('config');
            echo $this->Form->input('template');
            echo $this->Form->input('layout');
            echo $this->Form->input('theme');
            echo $this->Form->input('format');
            echo $this->Form->input('template_vars');
            echo $this->Form->input('headers');
            echo $this->Form->input('sent');
            echo $this->Form->input('locked');
            echo $this->Form->input('send_tries');
            echo $this->Form->input('send_at', ['empty' => true]);
            echo $this->Form->input('attachments');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
