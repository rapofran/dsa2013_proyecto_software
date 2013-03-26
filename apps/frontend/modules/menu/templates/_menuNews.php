<?php foreach ($menu_news as $menu_new): ?>
  <li>
    <h3><?php echo format_date($menu_new->getUpdatedAt(),'dd/MM/yyyy') ?></h3>
    <a href="<?php echo url_for('article/index?id='.$menu_new->getId()) ?>"><?php echo $menu_new->getTitle() ?></a>
  </li>
<?php endforeach; ?>
<li><a class="li_link" href="<?php echo url_for('new/index') ?>">Ver mas...</a></li>
