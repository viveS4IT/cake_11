<?= $this->element('header'); ?>

<div class="container main-section">
    <div class="wrapper">
        <?= $this->element('sidebar'); ?>
        <?php echo $this->fetch('content'); ?>
    </div>
</div>
<?= $this->element('footer'); ?>