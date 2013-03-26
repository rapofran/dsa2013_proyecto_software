<?php use_helper('Text') ?>
<?php echo '<?xml version="1.0" encoding="utf-8"?>';?>
<feed xmlns="http://www.w3.org/2005/Atom">
  <title>RRS | Ensenada Rugby Club | Noticias y Eventos</title>
  <subtitle>Ultimas Noticias</subtitle>
  <?php foreach ($news_rss as $post): ?>
  <entry>
  <title><?php echo $post->getTitle(); ?></title>
  <link href="<?php echo url_for('/article/index?id='.$post->getId()) ?>" />

  <summary type="xhtml">
      <div xmlns="http://www.w3.org/1999/xhtml">
          <div>
            <h4>Descripcion Corta</h4>
            <?php echo simple_format_text($post->getShortDescription())?>
          </div>
          <div>
            <h4>Cuerpo</h4>
            <?php echo simple_format_text($post->getLongDescription())?>
        </div>
      </div>
  </summary>
  </entry>
  <?php endforeach; ?>
  <subtitle>Ultimos Eventos</subtitle>
  <?php foreach ($events_rss as $post): ?>
  <entry>
  <title><?php echo $post->getTitle(); ?></title>
  <link href="<?php echo url_for('/article/index?id='.$post->getId()) ?>" />

  <summary type="xhtml">
      <div xmlns="http://www.w3.org/1999/xhtml">
          <div>
            <h4>Descripcion Corta</h4>
            <?php echo simple_format_text($post->getShortDescription())?>
          </div>
          <div>
            <h4>Cuerpo</h4>
            <?php echo simple_format_text($post->getLongDescription())?>
        </div>
      </div>
  </summary>
  </entry>
  <?php endforeach; ?>
</feed>
