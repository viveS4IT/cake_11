<?php $paginator = $this->Paginator; ?>
<div class="main-section-widget">
    <div class="artcle_posts">
        <div class="posts index">
            <div class="posts-header-box">
                <div class="posts-title main-box">
                    <h2><?php echo $this->Html->link(__('Add Post'), array('controller' => 'posts','action' => 'add')); ?></h2>
                </div>
             
                <div class="posts-search-form main-box">
                    <?= $this->form->create(array('type' => 'get')); ?>
                    <?php echo $this->Form->input('search', ['type' => 'Search']); ?>
                    <?= $this->form->submit(); ?>
                    <?= $this->form->end(); ?>
                </div>
                <div class="susscefull-msg main-box">
                    <h3 class="msg">
                        <?php  
                            echo $this->Session->flash(); 
                        ?>
                    </h3>
                </div>
            </div>
            <table class="table text-center">
                <tr>
                    <th><?php echo $paginator->sort('Id'); ?></th>
                    <th><?php echo $paginator->sort('Title'); ?></th>
                    <th><?php echo $paginator->sort('Description'); ?></th>
                    <th><?php echo $paginator->sort('Video'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                <?php 
                    
                    foreach ($posts as $post):
                   
                ?>    
                <tr>
                    <td><?php echo h($post['Post']['id']); ?></td>
                    <td><?php echo h($post['Post']['title']); ?></td>
                    <td><?php echo h($post['Post']['description']); ?></td>
                    <td><?php echo $this->Html->media( 
                                array(
                                    '/app/webroot/video/'.$post['Post']['video'],

                                    array(
                                        'src' => '/app/webroot/video/'.$post['Post']['video'],
                                        'type' => "video/mp4; codecs='theora, vorbis'",

                                    ),
                                ),
                                array('width="150" height="150" controls autoplay')  
                            );
                    ?></td>
                    <td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $post['Post']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $post['Post']['id']), null, __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <p>
                <?php
                    echo $this->Paginator->counter(array(
                    'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));
                ?>
            </p>
	<div class="paging">
            <div class="pagination pagination-large">   
                <ul class="pagination">
                    <?php
                        echo $paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                        echo $paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                        echo $paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                    ?>
                </ul>
    </div>
	</div>
        </div>
    </div>
</div>