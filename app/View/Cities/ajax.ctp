<div class="main-section-widget">
    <h2 class="text-center"><?php echo __('City'); ?></h2>
    <div class="view-section">
        <div class="col-sm-12 row">
            <div class="col-sm-12">
                <div class="form-group d-flex">
                    <label class="col-sm-3"><?php echo __('Id'); ?></label>
                    <h5 class="col-sm-3"><?php echo h($post['City']['id']); ?></h5>
                </div>
                <div class="form-group d-flex">
                    <label class="col-sm-3"><?php echo __('Title'); ?></label>
                    <h5 class="col-sm-3"><?php echo h($post['City']['name']); ?></h5>
                </div>
                <div class="form-group d-flex">
                    <label class="col-sm-3"><?php echo __('state_id'); ?></label>
                    <h5 class="col-sm-3"><?php echo h($post['City']['state_id']); ?></h5>
                </div>
                <div class="form-group d-flex">
                    <label class="col-sm-3"><?php echo __('population'); ?></label>
                    <h5 class="col-sm-3"><?php echo h($post['City']['population']); ?></h5>
                </div>
              
            </div>
           
        </div>
    </div>
</div>
