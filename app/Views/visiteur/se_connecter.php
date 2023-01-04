
     
            <div class=" container row justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="col-md-12 container">
                        <?php  echo form_open('Visiteur/se_connecter') ?>
                        <br>
                            <h3 class="text-center text-primary"><?php echo $TitreDeLaPage ?></h3>
                            <?php if($TitreDeLaPage=='Corriger votre formulaire') { 
                                if (service('validation')->hasError('txtEmail')||service('validation')->hasError('txtMdp')) {
                                    echo "Identifiants incorrects";
                                }
                                } ?>
                            <p>
                                <?php 
                               // echo form_label('Email', 'txtEmail', ['class'=>'text-primary']);
                                echo form_input('txtEmail', set_value('txtEmail'), ['placeholder' => 'Votre E-mail','class' => 'form-control'],'email');
                                ?>
                            </p>
                            <p>
                                <?php 
                                // echo form_label('Mot de passe', 'txtMdp', ['class'=>'text-primary']);
                                echo form_password('txtMdp', set_value('txtMdp'), ['placeholder' => 'Votre mot de passe','class' => 'form-control','id'=>'mdp']);
                                $js = 'onClick="Affichermasquermdp()"';
                                echo form_label('Voir&nbsp', 'voir', ['class'=>'text-primary small']);
                                echo form_checkbox('Voir', 'voir', false, $js);
                                ?>
                            </p>
                            <p class="right">
                            <?php 
                            echo form_submit('mysubmit', 'Valider',['class' => 'btn btn-primary btn-md']);
                            ?>
                            </p>
                            <?php 
                            echo form_close();
                            ?>
                    </div>
                </div>
            </div>

    <script language=javascript>
     function Affichermasquermdp() {
  var x = document.getElementById("mdp");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} 
      </script> 