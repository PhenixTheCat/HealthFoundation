<?php


?>

<!DOCTYPE html>
<html>

<head>
  <title>APP</title>
  <link rel="stylesheet" media="screen" href="design.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<body>

  <div class="headerContact">
    <h1><?php echo _(" Ajouter une structure")?></h1>
  </div>

  <div class="centrer_bloc">
    <div class="inscriptionP1">

      <?php echo printError($error); ?>

      <fieldset>
        <form action="" method="post">

          <label for="name"><?php echo _("Nom de la structure");?></label>
          <input type="text" name="name">
          <br>
          <label for="address"><?php echo _("Adresse")?></label>
          <input type="text" name="address">
          <br>
          <label for="city"><?php echo _("Ville")?></label>
          <input type="text" name="city">
          <br>
          <label for="postcode"><?php echo _("Code postal")?></label>
          <input type="text" name="postcode">
          <br>
          <select name="pays">
              <option value="<?php echo $user['country']; ?>" selected="selected"><?php echo $user['country']; ?></option>
              <option value="France"><?php echo _("France ");?></option>
              <option value="Afghanistan"><?php echo _("Afghanistan ");?></option>
              <option value="Afrique_Centrale"><?php echo _("Afrique Centrale ");?></option>
              <option value="Afrique_du_sud"><?php echo _("Afrique du Sud ");?></option>
              <option value="Albanie"><?php echo _("Albanie ");?></option>
              <option value="Algerie"><?php echo _("Algérie ");?></option>
              <option value="Allemagne"><?php echo _("Allemagne ");?></option>
              <option value="Andorre"><?php echo _("Andorre ");?></option>
              <option value="Angola"><?php echo _("Angola ");?></option>
              <option value="Anguilla"><?php echo _("Anguilla ");?></option>
              <option value="Arabie_Saoudite"><?php echo _("Arabie Saoudite ");?></option>
              <option value="Argentine"><?php echo _("Argentine ");?></option>
              <option value="Armenie"><?php echo _("Arménie ");?></option>
              <option value="Australie"><?php echo _("Australie ");?></option>
              <option value="Autriche"><?php echo _("Autriche ");?></option>
              <option value="Azerbaidjan"><?php echo _("Azerbaïdjan ");?></option>

              <option value="Bahamas"><?php echo _("Bahamas ");?></option>
              <option value="Bangladesh"><?php echo _("Bangladesh ");?></option>
              <option value="Barbade"><?php echo _("Barbade ");?></option>
              <option value="Bahrein"><?php echo _("Bahreïn ");?></option>
              <option value="Belgique"><?php echo _("Belgique ");?></option>
              <option value="Belize"><?php echo _("Belize ");?></option>
              <option value="Benin"><?php echo _("Bénin ");?></option>
              <option value="Bermudes"><?php echo _("Bermudes ");?></option>
              <option value="Bielorussie"><?php echo _("Biélorussie ");?></option>
              <option value="Bolivie"><?php echo _("Bolivie ");?></option>
              <option value="Botswana"><?php echo _("Botswana ");?></option>
              <option value="Bhoutan"><?php echo _("Bhoutan ");?></option>
              <option value="Boznie_Herzegovine"><?php echo _("Boznie-Herzégovine ");?></option>
              <option value="Bresil"><?php echo _("Brésil ");?></option>
              <option value="Brunei"><?php echo _("Brunei ");?></option>
              <option value="Bulgarie"><?php echo _("Bulgarie ");?></option>
              <option value="Burkina_Faso"><?php echo _("Burkina Faso ");?></option>
              <option value="Burundi"><?php echo _("Burundi ");?></option>

              <option value="Caiman"><?php echo _("Îles Caïman ");?></option>
              <option value="Cambodge"><?php echo _("Cambodge ");?></option>
              <option value="Cameroun"><?php echo _("Cameroun ");?></option>
              <option value="Canada"><?php echo _("Canada ");?></option>
              <option value="Canaries"><?php echo _("Îles Canaries ");?></option>
              <option value="Cap_vert"><?php echo _("Cap-Vert ");?></option>
              <option value="Chili"><?php echo _("Chili ");?></option>
              <option value="Chine"><?php echo _("Chine ");?></option>
              <option value="Chypre"><?php echo _("Chypre ");?></option>
              <option value="Colombie"><?php echo _("Colombie ");?></option>
              <option value="Comores"><?php echo _("Colombie ");?></option>
              <option value="Congo"><?php echo _("Congo ");?></option>
              <option value="Congo_democratique"><?php echo _("République démocratique du Congo ");?></option>
              <option value="Cook"><?php echo _("Îles Cook ");?></option>
              <option value="Coree_du_Nord"><?php echo _("Corée du Nord ");?></option>
              <option value="Coree_du_Sud"><?php echo _("Corée du Sud ");?></option>
              <option value="Costa_Rica"><?php echo _("Costa Rica ");?></option>
              <option value="Cote_d_Ivoire"><?php echo _("Côte d'Ivoire ");?></option>
              <option value="Croatie"><?php echo _("Croatie ");?></option>
              <option value="Cuba"><?php echo _("Cuba ");?></option>

              <option value="Danemark"><?php echo _("Danemark ");?></option>
              <option value="Djibouti"><?php echo _("Djibouti ");?></option>
              <option value="Dominique"><?php echo _("Dominique ");?></option>

              <option value="Egypte"><?php echo _("Égypte ");?></option>
              <option value="Emirats_Arabes_Unis"><?php echo _("Émirats arabes unis ");?></option>
              <option value="Equateur"><?php echo _("Équateur ");?></option>
              <option value="Erythree"><?php echo _("Érythrée ");?></option>
              <option value="Espagne"><?php echo _("Espagne ");?></option>
              <option value="Estonie"><?php echo _("Estonie ");?></option>
              <option value="Etats_Unis"><?php echo _("États Unis ");?></option>
              <option value="Ethiopie"><?php echo _("Éthiopie ");?></option>

              <option value="Falkland"><?php echo _("Falkland ");?></option>
              <option value="Feroe"><?php echo _("Féroé ");?></option>
              <option value="Fidji"><?php echo _("Îles Fidji ");?></option>
              <option value="Finlande"><?php echo _("Finlande ");?></option>

              <option value="Gabon"><?php echo _("Gabon ");?></option>
              <option value="Gambie"><?php echo _("Gambie ");?></option>
              <option value="Georgie"><?php echo _("Géorgie ");?></option>
              <option value="Ghana"><?php echo _("Ghana ");?></option>
              <option value="Gibraltar"><?php echo _("Gibraltar ");?></option>
              <option value="Grece"><?php echo _("Grèce ");?></option>
              <option value="Grenade"><?php echo _("Grenade ");?></option>
              <option value="Groenland"><?php echo _("Groenland ");?></option>
              <option value="Guadeloupe"><?php echo _("Guadeloupe ");?></option>
              <option value="Guam"><?php echo _("Guam ");?></option>
              <option value="Guatemala"><?php echo _("Guatemala ");?></option>
              <option value="Guernesey"><?php echo _("Guernesey ");?></option>
              <option value="Guinee"><?php echo _("Guinée ");?></option>
              <option value="Guinee_Bissau"><?php echo _("Guinée Bissau ");?></option>
              <option value="Guinee_equatoriale"><?php echo _("Guinee ;équatoriale ");?></option>
              <option value="Guyana"><?php echo _("Guyana ");?></option>
              <option value="Guyane"><?php echo _("Guyane ");?></option>

              <option value="Haiti"><?php echo _("Haïti ");?></option>
              <option value="Hawai"><?php echo _("Hawaï ");?></option>
              <option value="Honduras"><?php echo _("Honduras ");?></option>
              <option value="Hong_Kong"><?php echo _("Hong Kong ");?></option>
              <option value="Hongrie"><?php echo _("Hongrie ");?></option>

              <option value="Inde"><?php echo _("Inde ");?></option>
              <option value="Indonesie"><?php echo _("Indonésie ");?></option>
              <option value="Iran"><?php echo _("Iran ");?></option>
              <option value="Irak"><?php echo _("Irak ");?></option>
              <option value="Irlande"><?php echo _("Irlande ");?></option>
              <option value="Islande"><?php echo _("Islande ");?></option>
              <option value="Israel"><?php echo _("Israël ");?></option>
              <option value="Italie"><?php echo _("Italie ");?></option>

              <option value="Jamaique"><?php echo _("Jamaïque ");?></option>
              <option value="Jan Mayen"><?php echo _("Jan Mayen ");?></option>
              <option value="Japon"><?php echo _("Japon ");?></option>
              <option value="Jersey"><?php echo _("Jersey ");?></option>
              <option value="Jordanie"><?php echo _("Jordanie ");?></option>

              <option value="Kazakhstan"><?php echo _("Kazakhstan ");?></option>
              <option value="Kenya"><?php echo _("Kenya ");?></option>
              <option value="Kirghizstan"><?php echo _("Kirghizistan ");?></option>
              <option value="Kiribati"><?php echo _("Kiribati ");?></option>
              <option value="Koweit"><?php echo _("Koweït ");?></option>

              <option value="Laos"><?php echo _("Laos ");?></option>
              <option value="Lesotho"><?php echo _("Lesotho ");?></option>
              <option value="Lettonie"><?php echo _("Lettonie ");?></option>
              <option value="Liban"><?php echo _("Liban ");?></option>
              <option value="Liberia"><?php echo _("Liberia ");?></option>
              <option value="Liechtenstein"><?php echo _("Liechtenstein ");?></option>
              <option value="Lituanie"><?php echo _("Lituanie ");?></option>
              <option value="Luxembourg"><?php echo _("Luxembourg ");?></option>
              <option value="Lybie"><?php echo _("Lybie ");?></option>

              <option value="Macao"><?php echo _("Macao ");?></option>
              <option value="Macedoine"><?php echo _("Macédoine ");?></option>
              <option value="Madagascar"><?php echo _("Madagascar ");?></option>
              <option value="Madere"><?php echo _("Madère ");?></option>
              <option value="Malaisie"><?php echo _("Malaisie ");?></option>
              <option value="Malawi"><?php echo _("Malawi ");?></option>
              <option value="Maldives"><?php echo _("Maldives ");?></option>
              <option value="Mali"><?php echo _("Mali ");?></option>
              <option value="Malte"><?php echo _("Malte ");?></option>
              <option value="Man"><?php echo _("Man ");?></option>
              <option value="Mariannes"><?php echo _("Îles Mariannes");?></option>
              <option value="Mariannes du Nord"><?php echo _("Mariannes du Nord ");?></option>
              <option value="Maroc"><?php echo _("Maroc ");?></option>
              <option value="Marshall"><?php echo _("Îles Marshall ");?></option>
              <option value="Martinique"><?php echo _("Martinique ");?></option>
              <option value="Maurice"><?php echo _("Îles Maurice ");?></option>
              <option value="Mauritanie"><?php echo _("Mauritanie ");?></option>
              <option value="Mayotte"><?php echo _("Mayotte ");?></option>
              <option value="Mexique"><?php echo _("Mexique ");?></option>
              <option value="Micronesie"><?php echo _("Micronésie ");?></option>
              <option value="Midway"><?php echo _("Îles Midway ");?></option>
              <option value="Moldavie"><?php echo _("Moldavie ");?></option>
              <option value="Monaco"><?php echo _("Monaco ");?></option>
              <option value="Mongolie"><?php echo _("Mongolie ");?></option>
              <option value="Montserrat"><?php echo _("Montserrat ");?></option>
              <option value="Mozambique"><?php echo _("Mozambique ");?></option>

              <option value="Namibie"><?php echo _("Namibie ");?></option>
              <option value="Nauru"><?php echo _("Nauru ");?></option>
              <option value="Nepal"><?php echo _("Népal ");?></option>
              <option value="Nicaragua"><?php echo _("Nicaragua ");?></option>
              <option value="Niger"><?php echo _("Niger ");?></option>
              <option value="Nigeria"><?php echo _("Nigeria ");?></option>
              <option value="Niue"><?php echo _("Niue ");?></option>
              <option value="Norfolk"><?php echo _("Norfolk ");?></option>
              <option value="Norvege"><?php echo _("Norvège ");?></option>
              <option value="Nouvelle_Caledonie"><?php echo _("Nouvelle-Calédonie ");?></option>
              <option value="Nouvelle_Zelande"><?php echo _("Nouvelle-Zélande ");?></option>

              <option value="Oman"><?php echo _("Oman ");?></option>
              <option value="Ouganda"><?php echo _("Ouganda ");?></option>
              <option value="Ouzbekistan"><?php echo _("Ouzbékistan ");?></option>

              <option value="Pakistan"><?php echo _("Pakistan ");?></option>
              <option value="Palaos"><?php echo _("Palaos ");?></option>
              <option value="Palestine"><?php echo _("Palestine ");?></option>
              <option value="Panama"><?php echo _("Panama ");?></option>
              <option value="Papouasie_Nouvelle_Guinee"><?php echo _("Papouasie Nouvelle Guinée ");?></option>
              <option value="Paraguay"><?php echo _("Paraguay ");?></option>
              <option value="Pays_Bas"><?php echo _("Pays Bas ");?></option>
              <option value="Perou"><?php echo _("Pérou ");?></option>
              <option value="Philippines"><?php echo _("Philippines ");?></option>
              <option value="Pologne"><?php echo _("Pologne ");?></option>
              <option value="Polynesie"><?php echo _("Polynésie ");?></option>
              <option value="Porto_Rico"><?php echo _("Porto Rico ");?></option>
              <option value="Portugal"><?php echo _("Portugal ");?></option>

              <option value="Qatar"><?php echo _("Qatar ");?></option>

              <option value="Republique_Dominicaine"><?php echo _("République dominicaine ");?></option>
              <option value="Republique_Tcheque"><?php echo _("République Tchèque ");?></option>
              <option value="Reunion"><?php echo _("Réunion ");?></option>
              <option value="Roumanie"><?php echo _("Roumanie ");?></option>
              <option value="Royaume_Uni"><?php echo _("Royaume Uni ");?></option>
              <option value="Russie"><?php echo _("Russie ");?></option>
              <option value="Rwanda"><?php echo _("Rwanda ");?></option>

              <option value="Sahara_Occidental"><?php echo _("Sahara Occidental ");?></option>
              <option value="Sainte_Lucie"><?php echo _("Sainte Lucie ");?></option>
              <option value="Saint_Marin"><?php echo _("Saint-Marin ");?></option>
              <option value="Salomon"><?php echo _("Îles Salomon ");?></option>
              <option value="Salvador"><?php echo _("Salvador ");?></option>
              <option value="Samoa"><?php echo _("Îles Samoa");?></option>
              <option value="Sao_Tome_et_Principe"><?php echo _("Sao Tomé et Principe ");?></option>
              <option value="Senegal"><?php echo _("Sénégal ");?></option>
              <option value="Seychelles"><?php echo _("Seychelles ");?></option>
              <option value="Sierra Leone"><?php echo _("Sierra Leone ");?></option>
              <option value="Singapour"><?php echo _("Singapour ");?></option>
              <option value="Slovaquie"><?php echo _("Slovaquie ");?></option>
              <option value="Slovenie"><?php echo _("Slov nie");?></option>
              <option value="Somalie"><?php echo _("Somalie ");?></option>
              <option value="Soudan"><?php echo _("Soudan ");?></option>
              <option value="Sri_Lanka"><?php echo _("Sri Lanka ");?></option>
              <option value="Suede"><?php echo _("Suède ");?></option>
              <option value="Suisse"><?php echo _("Suisse ");?></option>
              <option value="Suriname"><?php echo _("Suriname ");?></option>
              <option value="Eswatini"><?php echo _("Eswatini ");?></option>
              <option value="Syrie"><?php echo _("Syrie ");?></option>

              <option value="Tadjikistan"><?php echo _("Tadjikistan ");?></option>
              <option value="Taiwan"><?php echo _("Taïwan ");?></option>
              <option value="Tonga"><?php echo _("Tonga ");?></option>
              <option value="Tanzanie"><?php echo _("Tanzanie ");?></option>
              <option value="Tchad"><?php echo _("Tchad ");?></option>
              <option value="Thailande"><?php echo _("Thaïlande ");?></option>
              <option value="Tibet"><?php echo _("Tibet ");?></option>
              <option value="Timor"><?php echo _("Timor ");?></option>
              <option value="Togo"><?php echo _("Togo ");?></option>
              <option value="Trinite_et_Tobago"><?php echo _("Trinité et Tobago ");?></option>
              <option value="Tristan da cunha"><?php echo _("Tristan da cuncha ");?></option>
              <option value="Tunisie"><?php echo _("Tunisie ");?></option>
              <option value="Turkmenistan"><?php echo _("Turkménistan ");?></option>
              <option value="Turquie"><?php echo _("Turquie ");?></option>

              <option value="Ukraine"><?php echo _("Ukraine ");?></option>
              <option value="Uruguay"><?php echo _("Uruguay ");?></option>

              <option value="Vanuatu"><?php echo _("Vanuatu ");?></option>
              <option value="Vatican"><?php echo _("Vatican ");?></option>
              <option value="Venezuela"><?php echo _("Vénézuéla ");?></option>
              <option value="Vierges"><?php echo _("Îles Vierges ");?></option>
              <option value="Vietnam"><?php echo _("Vietnam ");?></option>

              <option value="Wake"><?php echo _("Wake ");?></option>
              <option value="Wallis et Futuna"><?php echo _("Wallis et Futuna ");?></option>

              <option value="Yemen"><?php echo _("Yemen ");?></option>
              <option value="Yougoslavie"><?php echo _("Yougoslavie ");?></option>

              <option value="Zambie"><?php echo _("Zambie ");?></option>
              <option value="Zimbabwe"><?php echo _("Zimbabwe ");?></option>


            </select>
          <br>
          <label for="phoneNumber">Numéro de téléphone</label>
          <input type="text" name="phoneNumber">
          <br>
          <input class="submitButtons" type="submit" Value="Suivant" name="addStructure">
        </form>
      </fieldset>

    </div>
  </div>
  <script src="script.js"></script>

</body>

</html>
