<?php if (count($members) > 0) : ?>
<br />
<br />
<h3>Se encontraron los siguientes miembros</h3>
<br />
<table>
  <thead>
    <tr>
      <th>Nombre</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($members as $member): ?>
    <tr>
      <td><a href="<?php echo url_for('member/show?id='.$member->getId()) ?>"><?php echo $member->getName() ?></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif ?>
