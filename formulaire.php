<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulaire</title>
    <link rel="stylesheet" href="main.css">
      <script type="text/javascript" src="jquery-3.1.1.min.js"></script>
      <script type="text/javascript" src="javascript.js"></script>



    <?php
      session_start();


      if(isset($_SESSION['input'])){
        extract($_SESSION['input']);
      }
    
      ?>

  </head>
  <body>
    <div class="container">
      <div class="entete_form">
        <img src="logo_entreprise.jpg">
      </div>
      <div class="middle">
        <div class="container-form">
            <form class="" action="verif_formulaire.php" method="post">
            <div class="container-formgroup container-checkbox">
              <div class="intitule">Civilité * :</div>
              <div class="bloc-input-form">
                  <div>
                      <label class="checkbox" for="madame">
                          <input type="radio" id="madame" value="f" name="gender" <?php if(isset($gender) && $gender == "f"){ echo "checked";} ?>>
                          <span class="<?php if(isset($_SESSION['champs']['gender'])){echo "squared-erreur"; }else{echo "squared";} ?>"></span>
                          Madame
                      </label>

                      <label class="checkbox" for="monsieur">
                          <input type="radio" value="h" id="monsieur" name="gender" <?php if(isset($gender) && $gender == "h"){ echo "checked";} ?>>
                          <span class="<?php if(isset($_SESSION['champs']['gender'])){echo "squared-erreur"; }else{echo "squared";} ?>"></span>
                          Monsieur
                      </label>
                  </div>
                <?php if(isset($_SESSION['champs']['gender'])) { ?>
                <span class="erreur"><?php echo $_SESSION['champs']['gender']; ?></span>
                <?php } ?>
              </div>
            </div>
            <div class="container-formgroup">
              <div class="container-form-input-bloc">
                <div class="intitule">
                  <label for="nom"  class="intitule">Nom * :</label>
                </div>
                <div class="bloc-input-form">
                    <div>
                        <input id="nom" cl-validate-not-empty class="<?php if(isset($_SESSION['champs']['nom'])){echo "erreur"; }else{echo"input-form";}?>" type="text" name="nom" value="<?php if(isset($nom)){ echo $nom;} ?>">
                    </div>
                    <?php if(isset($_SESSION['champs']['nom'])) { ?>
                        <span class="erreur"><?php echo $_SESSION['champs']['nom']; ?></span>
                    <?php } ?>
                </div>
              </div>

            </div>

            <div class="container-formgroup">
              <div class="container-form-input-bloc">
                <div class="intitule">
                  <label for="prenom" class="intitule">Prenom * :</label>
                </div>
                <div class="bloc-input-form">
                    <div>
                        <input id="prenom" cl-validate-not-empty class="<?php if(isset($_SESSION['champs']['prenom'])){echo "erreur"; }else{echo "input-form";} ?>" type="text" name="prenom" value="<?php if(isset($prenom)){echo $prenom; }?>" >
                    </div>
                    <?php if(isset($_SESSION['champs']['prenom'])) { ?>
                        <span class="erreur"><?php echo $_SESSION['champs']['prenom']; ?></span>
                    <?php } ?>
                </div>
              </div>

            </div>

            <?php if(isset($_SESSION['societe']) && $_SESSION['societe'] == 1){ ?>
              <div class="container-formgroup">
                <div class="container-form-input-bloc">
                  <div class="intitule">
                    <label for="nom-societe" class="intitule">Nom de la société * :</label>
                  </div>
                  <div class="bloc-input-form">
                      <div>
                          <input id="nom-societe" class="<?php if(isset($_SESSION['champs']['nom_societe'])){echo "erreur"; }else{echo "input-form";} ?>" type="text" name="nom_societe" value="<?php if(isset($nom_societe)){ echo $nom_societe;} ?>">
                      </div>
                      <?php if(isset($_SESSION['champs']['nom_societe'])) { ?>
                          <span class="erreur"><?php echo $_SESSION['champs']['nom_societe']; ?></span>
                      <?php } ?>
                  </div>
                </div>

              </div>

              <div class="container-formgroup">
                <div class="container-form-input-bloc">
                  <div class="intitule">
                    <label for="poste" class="intitule">Poste occupé * :</label>
                  </div>
                  <div class="bloc-input-form">
                      <div>
                          <input id="poste" class="<?php if(isset($_SESSION['champs']['poste'])){echo "erreur"; }else{echo "input-form";} ?>" type="text" name="poste" value="<?php if(isset($poste)){ echo $poste;} ?>" >
                      </div>
                      <?php if(isset($_SESSION['champs']['poste'])) { ?>
                          <span class="erreur"><?php echo $_SESSION['champs']['poste']; ?></span>
                      <?php } ?>
                  </div>
                </div>

              </div>
            <?php }?>


                <div class="container-formgroup">
                    <div class="container-form-input-bloc">
                        <div class="intitule">
                            <label for="adresse1" class="intitule">Adresse 1 * :</label>
                        </div>
                        <div class="bloc-input-form">
                            <div>
                                <input id="adresse1" class="<?php if(isset($_SESSION['champs']['adresse1'])){echo "erreur"; }else{echo "input-form";} ?>" type="text" name="adresse1" value="<?php if (isset($adresse1)) { echo $adresse1; } ?>">
                            </div>
                            <?php if (isset($_SESSION['champs']['adresse1'])) { ?>
                                <span class="erreur"><?php echo $_SESSION['champs']['adresse1']; ?></span>
                            <?php } ?>
                        </div>
                    </div>

                </div>

            <div class="container-formgroup">
              <div class="container-form-input-bloc">
                <div class="intitule">
                  <label for="adresse2" class="intitule">Adresse 2  :</label>
                </div>
                <div class="bloc-input-form">
                  <input id="adresse2" class="input-form" type="text" name="adresse2" value="<?php if(isset($adresse2)){ echo $adresse2;} ?>">
                </div>
              </div>
            </div>

            <div class="container-formgroup">
              <div class="container-form-input-bloc">
                <div class="intitule">
                  <label for="code-postal" class="intitule">Code postal * :</label>
                </div>
                  <div class="bloc-input-form">
                    <div>
                      <input id="code-postal" class="<?php if(isset($_SESSION['champs']['code_postal'])){echo "erreur"; }else{echo "input-form cp";} ?>" type="text" name="code_postal" value="" maxlength="5">
                    </div>
                    <?php if(isset($_SESSION['champs']['code_postal'])) { ?>
                      <span class="erreur"><?php echo $_SESSION['champs']['code_postal']; ?></span>
                    <?php } ?>
                  </div>
              </div>
            </div>

            <div class="container-formgroup">
              <div class="container-form-input-bloc">
                <div class="intitule">
                  <label for="ville" class="intitule">Ville * :</label>
                </div>
                <div class="bloc-input-form">
                  <div class="">
                    <select id="ville" class="<?php if(isset($_SESSION['champs']['ville'])){echo "erreur"; }else{echo "input-form";} ?>" type="text" name="ville" value="" >

                    </select>
                  </div>
                  <?php if(isset($_SESSION['champs']['ville'])) { ?>
                      <span class="erreur"><?php echo $_SESSION['champs']['ville']; ?></span>
                  <?php } ?>
                </div>
              </div>

            </div>
            <?php if(isset($_SESSION['societe']) && $_SESSION['societe'] == 1){ ?>
              <div class="container-formgroup">
                <div class="container-form-input-bloc">
                  <div class="intitule">
                    <label for="telephone-societe" class="intitule">Téléphone société * :</label>
                  </div>
                  <div class="bloc-input-form">
                        <div>
                            <input id="telephone-societe" class="<?php if(isset($_SESSION['champs']['telephone1'])){echo "erreur"; }else{echo "input-form";} ?>" type="tel" name="telephone1" value="<?php if(isset($telephone1)){ echo $telephone1;} ?>">
                        </div>
                        <?php if(isset($_SESSION['champs']['telephone1'])) { ?>
                            <span class="erreur"><?php echo $_SESSION['champs']['telephone1']; ?></span>
                        <?php } ?>
                  </div>
                </div>
              </div>

              <div class="container-formgroup">
                <div class="container-form-input-bloc">
                  <div class="intitule">
                    <label for="telephone-direct" class="intitule">Téléphone direct * :</label>
                  </div>
                    <div class="bloc-input-form">
                        <div>
                            <input id="telephone-societe" class="<?php if(isset($_SESSION['champs']['telephone2'])){echo "erreur"; }else{echo "input-form";} ?>" type="tel" name="telephone2" value="<?php if(isset($telephone2)){ echo $telephone2;} ?>">
                        </div>
                        <?php if(isset($_SESSION['champs']['telephone2'])) { ?>
                            <span class="erreur"><?php echo $_SESSION['champs']['telephone2']; ?></span>
                        <?php } ?>
                    </div>
              </div>
      <?php } else{ ?>
              <div class="container-formgroup">
                <div class="container-form-input-bloc">
                  <div class="particulier-form">
                    <span>Remplissez au moins un numéro de téléphone *</span>
                  </div>
                </div>
                  <?php if(isset($_SESSION['champs']['telephone2'])|| isset($_SESSION['champs']['telephone1'])) { ?>
                      <span class="erreur"><?php echo "Veuillez indiquer au moins un numéro de téléphone"; ?></span>
                  <?php } ?>
              </div>


              <div class="container-formgroup">
                <div class="container-form-input-bloc">
                  <div class="intitule">
                    <label for="telephone-fixe" class="intitule">Téléphone fixe :</label>
                  </div>
                    <div class="bloc-input-form">
                        <div>
                            <input id="telephone-fixe" class="<?php if(isset($_SESSION['champs']['telephone1']) || isset($_SESSION['champs']['telephone2'])){echo "erreur"; }else{echo "input-form";} ?>" type="tel" name="telephone1" value="<?php if(isset($telephone1)){ echo $telephone1;} ?>">
                        </div>
                        <?php if(isset($_SESSION['champs']['telephone1']) || isset($_SESSION['champs']['telephone2'])) { ?>
                            <span class="erreur"><?php echo $_SESSION['champs']['telephone1']; ?></span>
                        <?php } ?>
                    </div>
              </div>

                  <div class="container-formgroup">
                      <div class="container-form-input-bloc">
                          <div class="intitule">
                              <label for="telephone-portable" class="intitule">Téléphone portable :</label>
                          </div>
                           <div class="bloc-input-form">
                              <div>
                                  <input id="telephone-portable" class="<?php if(isset($_SESSION['champs']['telephone2']) || isset($_SESSION['champs']['telephone1'])){echo "erreur"; }else{echo "input-form";} ?>" type="tel" name="telephone2" value="<?php if(isset($telephone2)){ echo $telephone2;} ?>">
                              </div>
                              <?php if(isset($_SESSION['champs']['telephone2']) || isset($_SESSION['champs']['telephone1'])) { ?>
                                  <span class="erreur"><?php echo $_SESSION['champs']['telephone2']; ?></span>
                              <?php } ?>
                           </div>
                      </div>
            <?php }?>


            <div class="container-formgroup">
              <div class="container-form-input-bloc">
                <div class="intitule">
                  <label for="email" class="intitule">Email * :</label>
                </div>
                <div class="bloc-input-form">
                  <div class="">
                    <input id="email" class="<?php if(isset($_SESSION['champs']['email'])){echo "erreur"; }else{echo "input-form";} ?>" type="mail" name="email" value="" >
                  </div>
                  <?php if(isset($_SESSION['champs']['email'])) { ?>
                      <span class="erreur"><?php echo $_SESSION['champs']['email']; ?></span>
                  <?php } ?>
                </div>
              </div>

            </div>

            <div class="paragraph-form">
              <p>* : champ à saisie obligatoire</p>
            </div>

            <div class="right">
              <input class="bouton" type="submit" name = "valider" value="Valider">
            </div>

          </form>
        </div>
      </div>
    </div>
  </body>
</html>
