<fieldset>
  <legend>Estas viendo el perfil de <?php echo $member->getName() ?></legend>
  <table id="perfil">
    <tbody>
      <tr>
        <th>Telefono:</th>
        <td><?php echo $member->getTelephone() ?></td>
      </tr>
      <tr>
        <th>Celular:</th>
        <td><?php echo $member->getCelphone() ?></td>
      </tr>
      <tr>
        <th>Email:</th>
        <td><?php echo $member->getEmail() ?></td>
      </tr>
      <tr>
        <th>Fecha de nacimiento:</th>
        <td><?php date_format($member->getBirthday(),'dd/MM/yyyy')?></td>
      </tr>
      <tr>
        <th>Es:</th>
        <td><?php echo $member->getMemberType()->getName() ?></td>
      </tr>
    </tbody>
  </table>
<div id="perfil-img">

<?php include_partial('member/article_link', array('member' => $member,'width' => '150px', 'height' => '130px')) ?>

</div>
</fieldset>

