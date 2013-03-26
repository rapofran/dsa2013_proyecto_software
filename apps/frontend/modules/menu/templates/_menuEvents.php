<?php foreach ($menu_events as $menu_event): ?>
  <li>
    <h3><?php echo format_date($menu_event->getUpdatedAt(),'dd/MM/yyyy')  ?></h3>
    <a href="<?php echo url_for('article/index?id='.$menu_event->getId()) ?>"><?php echo $menu_event->getTitle() ?></a>
  </li>
<?php endforeach; ?>                  
<li><a href="<?php echo url_for('event/index') ?>">Ver mas...</a></li>
