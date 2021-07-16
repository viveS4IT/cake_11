<div class="main-section-widget">
    <h2 class="text-center"><?php echo __('City'); ?></h2>
    <form action="/cake_11/cities/save/<?php echo h($City['City']['id'])?>" id="CityEditForm" method="post" accept-charset="utf-8">
       <div style="display:none;">
           <input type="hidden" name="_method" value="POST">
       </div>
    <div class="view-section">
        <div class="col-sm-12 row">
            <div class="col-sm-12">
                <div class="form-group d-flex">
                    <label class="col-sm-3"><?php echo __('Name'); ?></label>
                    <input type="text" name="data[City][name]" id="name" value="<?php echo h($City['City']['name']); ?>">
                </div>
               
                <div class="form-group d-flex">
                    <label class="col-sm-3"><?php echo __('population'); ?></label>
                    <input name="data[City][population]" class="ml-2" type="number" id="postPopulation" value="<?php echo h($City['City']['population']); ?>">
                </div>
              
            </div>
           
        </div>
    </div>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
