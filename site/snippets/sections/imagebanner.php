<section class="hero <?= $data->size()->value() ?>" 
<?php if ($data->picture()->isNotEmpty()): ?>
  style="background-image: url(<?= thumb($page->image($data->picture()), array('width'=> 2100))->url() ?>); <?php if($data->color()->isNotEmpty()){ echo 'color:' . $data->color(); } ?>"
<?php endif ?>
>

<?php if(!$data->text()->empty()): ?>
  <div class="text row phs">
    <?= $data->text()->kt() ?>
  </div>
 <?php endif ?>
</section>