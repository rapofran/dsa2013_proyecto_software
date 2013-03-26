<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo $item->getTitle() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_short_description">
  <?php echo $item->getShortDescription() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_type_title">
  <?php echo $item->getTypeTitle() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_rss">
  <?php echo get_partial('article/list_field_boolean', array('value' => $item->getRss())) ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($item->getCreatedAt()) ? format_date($item->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($item->getUpdatedAt()) ? format_date($item->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
