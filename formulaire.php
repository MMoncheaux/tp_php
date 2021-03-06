<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formulaire</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/combo.css">
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>


    <?php
    session_start();
    if(!isset($_SESSION['GUID']) || empty($_SESSION['GUID'] )){
        header('Location: erreur_url.php');
    }


    if (isset($_SESSION['input'])) {
        extract($_SESSION['input']);
    }

    ?>

</head>
<body>
<div class="container">
    <div class="entete_form">
        <img class="entete-form-img" src="images/logo_entreprise.jpg">
    </div>
    <div class="middle">
        <div class="container-form">
            <form class="" action="verif_formulaire.php" method="post">
                <div class="container-formgroup container-checkbox">
                    <div class="intitule">Civilité * :</div>
                    <div class="bloc-input-form">
                        <div class="bloc-input-checkbox">
                            <label class="checkbox" for="madame">
                                <input type="radio" id="madame" value="f" name="gender" <?php if (isset($gender) && $gender == "f") { echo "checked"; } ?> >
                                <span class="squared <?php if (isset($_SESSION['champs']['gender'])) { echo "squared-erreur"; }?>"></span>
                                Madame
                            </label>

                            <label class="checkbox" for="monsieur">
                                <input type="radio" value="h" id="monsieur" name="gender" <?php if (isset($gender) && $gender == "h") { echo "checked"; } ?> >
                                <span class="squared <?php if (isset($_SESSION['champs']['gender'])) { echo "squared-erreur"; } ?>"></span>
                                Monsieur
                            </label>

                            <?php if (isset($_SESSION['champs']['gender'])) { ?>
                                <br><span class="erreur"><?php echo $_SESSION['champs']['gender']; ?></span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="container-formgroup">
                    <div class="container-form-input-bloc">
                        <div class="intitule">
                            <label for="nom" class="intitule">Nom * :</label>
                        </div>
                        <div class="bloc-input-form">
                            <div>
                                <input id="nom" data-cond="this.value != ''" data-error="Veuillez indiquer un nom valide" class="input-form <?php if (isset($_SESSION['champs']['nom'])) { echo "erreur"; }  ?>" type="text" name="nom" value="<?php if (isset($nom)) { echo $nom; } ?>" >

                                <?php if (isset($_SESSION['champs']['nom'])) { ?>
                                    <br><span class="erreur"><?php echo $_SESSION['champs']['nom']; ?></span>
                                <?php } ?>
                            </div>
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
                                <input id="prenom" data-cond="this.value != ''" data-error="Veuillez indiquer un prénom valide" class="input-form <?php if (isset($_SESSION['champs']['prenom'])) { echo "erreur"; } ?>" type="text" name="prenom" value="<?php if (isset($prenom)) { echo $prenom; } ?>">
                                <?php if (isset($_SESSION['champs']['prenom'])) { ?>
                                    <br><span class="erreur"><?php echo $_SESSION['champs']['prenom']; ?></span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>

                <?php if (isset($_SESSION['societe']) && $_SESSION['societe'] == 1) { ?>
                    <div class="container-formgroup">
                        <div class="container-form-input-bloc">
                            <div class="intitule">
                                <label for="nom-societe" class="intitule">Nom de la société * :</label>
                            </div>
                            <div class="bloc-input-form">
                                <div>
                                    <input id="nom-societe" data-cond="this.value != ''" data-error="Veuillez indiquer un nom de société valide" class="input-form <?php if (isset($_SESSION['champs']['nom_societe'])) { echo "erreur"; }  ?>" type="text" name="nom_societe" value="<?php if (isset($nom_societe)) { echo $nom_societe; } ?>">
                                    <?php if (isset($_SESSION['champs']['nom_societe'])) { ?>
                                        <br><span class="erreur"><?php echo $_SESSION['champs']['nom_societe']; ?></span>
                                    <?php } ?>
                                </div>
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
                                    <input id="poste" data-cond="this.value != ''" data-error="Veuillez indiquer un nom de poste valide" class="input-form <?php if (isset($_SESSION['champs']['poste'])) {  echo "erreur"; } ?>" type="text" name="poste" value="<?php if (isset($poste)) { echo $poste; } ?>">
                                    <?php if (isset($_SESSION['champs']['poste'])) { ?>
                                        <br><span class="erreur"><?php echo $_SESSION['champs']['poste']; ?></span>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>

                    </div>
                <?php } ?>


                <div class="container-formgroup">
                    <div class="container-form-input-bloc">
                        <div class="intitule">
                            <label for="adresse1" class="intitule">Adresse 1 * :</label>
                        </div>
                        <div class="bloc-input-form">
                            <div>
                                <input id="adresse1" data-cond="this.value != ''" data-error="Veuillez indiquer une adresse" class="input-form <?php if (isset($_SESSION['champs']['adresse1'])) { echo "erreur"; } ?>" type="text" name="adresse1" value="<?php if (isset($adresse1)) { echo $adresse1; } ?>">
                                <?php if (isset($_SESSION['champs']['adresse1'])) { ?>
                                    <br><span class="erreur"><?php echo $_SESSION['champs']['adresse1']; ?></span>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="container-formgroup">
                    <div class="container-form-input-bloc">
                        <div class="intitule">
                            <label for="adresse2" class="intitule">Adresse 2 :</label>
                        </div>
                        <div class="bloc-input-form">
                            <input id="adresse2" class="input-form" type="text" name="adresse2" value="<?php if (isset($adresse2)) { echo $adresse2; } ?>">
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
                                <input id="code-postal" data-cond="this.value != '' " data-error="Veuillez indiquer un code postal existant" class="input-form cp <?php if (isset($_SESSION['champs']['code_postal'])) { echo "erreur"; } ?>" type="text" name="code_postal" value="<?php if (isset($code_postal)) { echo $code_postal; } ?>" maxlength="5">
                                <?php if (isset($_SESSION['champs']['code_postal'])) { ?>
                                    <br><span class="erreur"><?php echo $_SESSION['champs']['code_postal']; ?></span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-formgroup">
                    <div class="container-form-input-bloc">
                        <div class="intitule">
                            <label for="ville" class="intitule">Ville * :</label>
                        </div>
                        <div class="bloc-input-form">
                            <div>
                            <div id="combo-module" class="combo <?php if (isset($_SESSION['champs']['ville'])) { echo "combo-erreur"; } ?>">
                                <input id="combo-input" type="hidden" name="ville" value="<?php if(isset($ville)){ echo $ville; } ?>">
                                <span id="combo-text" class="text"><?php if(isset($villenom)){ echo $villenom; } ?></span>
                                <span id="combo-arrow" class="fleche ">\/</span>
                                <div id="combo-options" class="combo-options close">
                                </div>
                            </div>
                        </div>

                        <?php if (isset($_SESSION['champs']['ville'])) { ?>
                            <span class="erreur"><?php echo $_SESSION['champs']['ville']; ?></span>
                        <?php } ?>
                        </div>
                    </div>

                </div>
                <?php if (isset($_SESSION['societe']) && $_SESSION['societe'] == 1){ ?>
                <div class="container-formgroup">
                    <div class="container-form-input-bloc">
                        <div class="intitule">
                            <label for="telephone-societe" class="intitule">Téléphone société * :</label>
                        </div>
                        <div class="bloc-input-form">
                            <div>
                                <input id="telephone-societe" data-cond="this.value != '' && RegExp(/\b\d{3}[-.]?\d{3}[-.]?\d{4}\b/g).test(this.value)" data-error="Veuillez indiquer un numéro de téléphone valide" class="input-form <?php if (isset($_SESSION['champs']['telephone1'])) { echo "erreur"; } ?>" type="tel" name="telephone1" value="<?php if (isset($telephone1)) { echo $telephone1; } ?>" >
                                <?php if (isset($_SESSION['champs']['telephone1'])) { ?>
                                    <br><span class="erreur"><?php echo $_SESSION['champs']['telephone1']; ?></span>
                                <?php } ?>
                            </div>
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
                                <input id="telephone-societe" data-cond="this.value != '' && RegExp(/\b\d{3}[-.]?\d{3}[-.]?\d{4}\b/g).test(this.value)" data-error="Veuillez indiquer un numéro de téléphone valide" class="input-form <?php if (isset($_SESSION['champs']['telephone2'])) { echo "erreur"; } ?>" type="tel" name="telephone2" value="<?php if (isset($telephone2)) { echo $telephone2; } ?>">
                                <?php if (isset($_SESSION['champs']['telephone2'])) { ?>
                                    <br><span class="erreur"><?php echo $_SESSION['champs']['telephone2']; ?></span>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                    <?php } else{ ?>
                    <div class="container-formgroup">
                        <div class="container-form-input-bloc">
                            <div class="particulier-form">
                                <span>Remplissez au moins un numéro de téléphone *</span>
                            </div>
                        </div>
                        <?php if (isset($_SESSION['champs']['telephone2']) || isset($_SESSION['champs']['telephone1'])) { ?>
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
                                    <input data-cond="this.value != '' && RegExp(/\b\d{3}[-.]?\d{3}[-.]?\d{4}\b/g).test(this.value)" data-error="Veuillez indiquer un numéro de téléphone valide" id="telephone-fixe" class=" input-form <?php if (isset($_SESSION['champs']['telephone1']) || isset($_SESSION['champs']['telephone2'])) { echo "erreur"; } ?>" type="tel" name="telephone1" value="<?php if (isset($telephone1)) { echo $telephone1; } ?>">

                                    <?php if (isset($_SESSION['champs']['telephone1'])) { ?>
                                        <br> <span class="erreur"><?php echo $_SESSION['champs']['telephone1']; ?></span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="container-formgroup">
                            <div class="container-form-input-bloc">
                                <div class="intitule">
                                    <label for="telephone-portable" class="intitule">Téléphone portable :</label>
                                </div>
                                <div class="bloc-input-form">
                                    <div>
                                        <input id="telephone-portable" data-cond="this.value != '' && && RegExp(/\b\d{3}[-.]?\d{3}[-.]?\d{4}\b/g).test(this.value)"  data-error="Veuillez indiquer un numéro de téléphone valide" class="input-form <?php if (isset($_SESSION['champs']['telephone2']) || isset($_SESSION['champs']['telephone1'])) { echo "erreur"; } ?>" type="tel" name="telephone2" value="<?php if (isset($telephone2)) { echo $telephone2; } ?>">

                                        <?php if (isset($_SESSION['champs']['telephone2'])) { ?>
                                            <br><span class="erreur"><?php echo $_SESSION['champs']['telephone2']; ?></span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>


                            <div class="container-formgroup">
                                <div class="container-form-input-bloc">
                                    <div class="intitule">
                                        <label for="email" class="intitule">Email * :</label>
                                    </div>
                                    <div class="bloc-input-form">
                                        <div class="">
                                            <input id="email" data-cond="this.value != '' && RegExp(`^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$`).test(this.value)" data-error="Veuillez indiquer un email valide" class="input-form <?php if (isset($_SESSION['champs']['email'])) { echo "erreur"; } ?>" type="mail" name="email" value="<?php if (isset($email)) { echo $email; } ?>">
                                            <?php if (isset($_SESSION['champs']['email'])) { ?>
                                                <br><span class="erreur"><?php echo $_SESSION['champs']['email']; ?></span>
                                            <?php } ?>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="paragraph-form">
                                <p>* : champ à saisie obligatoire</p>
                            </div>

                            <div class="right">
                                <input class="bouton" type="submit" name="valider" value="Valider">
                            </div>

            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/javascript.js"></script>
</body>
</html>
