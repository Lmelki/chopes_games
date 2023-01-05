<div  class='container'>
<h2 class="text-primary"><?php echo $TitreDeLaPage ?></h2>
<?php
   if (service('validation')->hasError('txtIdentifiant')||service('validation')->hasError('txtMotDePasse')) {
      echo "Identifiants incorrects";
  }

  echo form_open('visiteur/connexion_administrateur');
  echo form_label('Identifiant','txtIdentifiant', ['class'=>'text-primary']);
  echo form_input('txtIdentifiant', set_value('txtIdentifiant'), "class='col-md-3 form-control'");    
  echo form_label('Mot de passe','txtMotDePasse', ['class'=>'text-primary']);
  echo form_password('txtMotDePasse', set_value('txtMotDePasse'), "class='form-control col-md-3'");
  echo form_submit('submit', 'Se connecter', "class='btn btn-primary'");
  echo "<br/><br/>";
  echo form_close();
?>
</div>