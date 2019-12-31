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
    <h1> Ajouter une structure</h1>
  </div>

  <div class="centrer_bloc">
    <div class="inscriptionP1">

      <?php echo printError($error); ?>

      <fieldset>
        <form action="" method="post">

          <label for="name">Nom de la structure</label>
          <input type="text" name="name">
          <br>
          <label for="address">Adresse</label>
          <input type="text" name="address">
          <br>
          <label for="city">Ville</label>
          <input type="text" name="city">
          <br>
          <label for="postcode">Code postal</label>
          <input type="text" name="postcode">
          <br>
          <select name="country">
            <option value="France" selected="selected">France </option>

            <option value="Afghanistan">Afghanistan </option>
            <option value="Afrique_Centrale">Afrique&#32;Centrale </option>
            <option value="Afrique_du_sud">Afrique&#32;du&#32;Sud </option>
            <option value="Albanie">Albanie </option>
            <option value="Algerie">Alg&#233;rie </option>
            <option value="Allemagne">Allemagne </option>
            <option value="Andorre">Andorre </option>
            <option value="Angola">Angola </option>
            <option value="Anguilla">Anguilla </option>
            <option value="Arabie_Saoudite">Arabie Saoudite </option>
            <option value="Argentine">Argentine </option>
            <option value="Armenie">Arm&#233;nie </option>
            <option value="Australie">Australie </option>
            <option value="Autriche">Autriche </option>
            <option value="Azerbaidjan">Azerba&#239;djan </option>

            <option value="Bahamas">Bahamas </option>
            <option value="Bangladesh">Bangladesh </option>
            <option value="Barbade">Barbade </option>
            <option value="Bahrein">Bahre&#239;n </option>
            <option value="Belgique">Belgique </option>
            <option value="Belize">Belize </option>
            <option value="Benin">B&#233;nin </option>
            <option value="Bermudes">Bermudes </option>
            <option value="Bielorussie">Bi&#233;lorussie </option>
            <option value="Bolivie">Bolivie </option>
            <option value="Botswana">Botswana </option>
            <option value="Bhoutan">Bhoutan </option>
            <option value="Boznie_Herzegovine">Boznie&#45;Herz&#233;govine </option>
            <option value="Bresil">Br&#233;sil </option>
            <option value="Brunei">Brunei </option>
            <option value="Bulgarie">Bulgarie </option>
            <option value="Burkina_Faso">Burkina Faso </option>
            <option value="Burundi">Burundi </option>

            <option value="Caiman">&#206;les Ca&#239;man </option>
            <option value="Cambodge">Cambodge </option>
            <option value="Cameroun">Cameroun </option>
            <option value="Canada">Canada </option>
            <option value="Canaries">&#206;les Canaries </option>
            <option value="Cap_vert">Cap&#150;Vert </option>
            <option value="Chili">Chili </option>
            <option value="Chine">Chine </option>
            <option value="Chypre">Chypre </option>
            <option value="Colombie">Colombie </option>
            <option value="Comores">Colombie </option>
            <option value="Congo">Congo </option>
            <option value="Congo_democratique">R&#233;publique&#32;d&#233;mocratique du Congo </option>
            <option value="Cook">&#206;les Cook </option>
            <option value="Coree_du_Nord">Cor&#233;e du Nord </option>
            <option value="Coree_du_Sud">Cor&#233;e du Sud </option>
            <option value="Costa_Rica">Costa Rica </option>
            <option value="Cote_d_Ivoire">Côte d&#39;Ivoire </option>
            <option value="Croatie">Croatie </option>
            <option value="Cuba">Cuba </option>

            <option value="Danemark">Danemark </option>
            <option value="Djibouti">Djibouti </option>
            <option value="Dominique">Dominique </option>

            <option value="Egypte">&#201;gypte </option>
            <option value="Emirats_Arabes_Unis">&#201;mirats arabes unis </option>
            <option value="Equateur">&#201;quateur </option>
            <option value="Erythree">&#201;rythr&#233;e </option>
            <option value="Espagne">Espagne </option>
            <option value="Estonie">Estonie </option>
            <option value="Etats_Unis">&#201;tats&#150;Unis </option>
            <option value="Ethiopie">&#201;thiopie </option>

            <option value="Falkland">Falkland </option>
            <option value="Feroe">F&#233;ro&#233; </option>
            <option value="Fidji">&#206;les Fidji </option>
            <option value="Finlande">Finlande </option>
            <option value="France">France </option>

            <option value="Gabon">Gabon </option>
            <option value="Gambie">Gambie </option>
            <option value="Georgie">G&#233;orgie </option>
            <option value="Ghana">Ghana </option>
            <option value="Gibraltar">Gibraltar </option>
            <option value="Grece">Gr&#232;ce </option>
            <option value="Grenade">Grenade </option>
            <option value="Groenland">Groenland </option>
            <option value="Guadeloupe">Guadeloupe </option>
            <option value="Guam">Guam </option>
            <option value="Guatemala">Guatemala</option>
            <option value="Guernesey">Guernesey </option>
            <option value="Guinee">Guin&#233;e </option>
            <option value="Guinee_Bissau">Guin&#233;e&#150;Bissau </option>
            <option value="Guinee_equatoriale">Guinee ;&#233;quatoriale </option>
            <option value="Guyana">Guyana </option>
            <option value="Guyane">Guyane </option>

            <option value="Haiti">Ha&#239;ti </option>
            <option value="Hawai">Hawa&#239; </option>
            <option value="Honduras">Honduras </option>
            <option value="Hong_Kong">Hong Kong </option>
            <option value="Hongrie">Hongrie </option>

            <option value="Inde">Inde </option>
            <option value="Indonesie">Indon&#233;sie </option>
            <option value="Iran">Iran </option>
            <option value="Irak">Irak </option>
            <option value="Irlande">Irlande </option>
            <option value="Islande">Islande </option>
            <option value="Israel">Isra&#235;l </option>
            <option value="Italie">Italie </option>

            <option value="Jamaique">Jama&#239;que </option>
            <option value="Jan Mayen">Jan Mayen </option>
            <option value="Japon">Japon </option>
            <option value="Jersey">Jersey </option>
            <option value="Jordanie">Jordanie </option>

            <option value="Kazakhstan">Kazakhstan </option>
            <option value="Kenya">Kenya </option>
            <option value="Kirghizstan">Kirghizistan </option>
            <option value="Kiribati">Kiribati </option>
            <option value="Koweit">Kowe&#239;t </option>

            <option value="Laos">Laos </option>
            <option value="Lesotho">Lesotho </option>
            <option value="Lettonie">Lettonie </option>
            <option value="Liban">Liban </option>
            <option value="Liberia">Liberia </option>
            <option value="Liechtenstein">Liechtenstein </option>
            <option value="Lituanie">Lituanie </option>
            <option value="Luxembourg">Luxembourg </option>
            <option value="Lybie">Lybie </option>

            <option value="Macao">Macao </option>
            <option value="Macedoine">Mac&#233;doine </option>
            <option value="Madagascar">Madagascar </option>
            <option value="Madere">Mad&#232;re </option>
            <option value="Malaisie">Malaisie </option>
            <option value="Malawi">Malawi </option>
            <option value="Maldives">Maldives </option>
            <option value="Mali">Mali </option>
            <option value="Malte">Malte </option>
            <option value="Man">Man </option>
            <option value="Mariannes">&#206;les Mariannes</option>
            <option value="Mariannes du Nord">Mariannes du Nord </option>
            <option value="Maroc">Maroc </option>
            <option value="Marshall">&#206;les Marshall </option>
            <option value="Martinique">Martinique </option>
            <option value="Maurice">&#206;les Maurice </option>
            <option value="Mauritanie">Mauritanie </option>
            <option value="Mayotte">Mayotte </option>
            <option value="Mexique">Mexique </option>
            <option value="Micronesie">Micron&#233;sie </option>
            <option value="Midway">&#206;les Midway </option>
            <option value="Moldavie">Moldavie </option>
            <option value="Monaco">Monaco </option>
            <option value="Mongolie">Mongolie </option>
            <option value="Montserrat">Montserrat </option>
            <option value="Mozambique">Mozambique </option>

            <option value="Namibie">Namibie </option>
            <option value="Nauru">Nauru </option>
            <option value="Nepal">N&#233;pal </option>
            <option value="Nicaragua">Nicaragua </option>
            <option value="Niger">Niger </option>
            <option value="Nigeria">Nigeria </option>
            <option value="Niue">Niue </option>
            <option value="Norfolk">Norfolk </option>
            <option value="Norvege">Norv&#232;ge </option>
            <option value="Nouvelle_Caledonie">Nouvelle&#45;Cal&#233;donie </option>
            <option value="Nouvelle_Zelande">Nouvelle&#45;Z&#233;lande </option>

            <option value="Oman">Oman </option>
            <option value="Ouganda">Ouganda </option>
            <option value="Ouzbekistan">Ouzb&#233;kistan </option>

            <option value="Pakistan">Pakistan </option>
            <option value="Palaos">Palaos </option>
            <option value="Palestine">Palestine </option>
            <option value="Panama">Panama </option>
            <option value="Papouasie_Nouvelle_Guinee">Papouasie&#150;Nouvelle&#150;Guin&#233;e </option>
            <option value="Paraguay">Paraguay </option>
            <option value="Pays_Bas">Pays&#150;Bas </option>
            <option value="Perou">P&#233;rou </option>
            <option value="Philippines">Philippines </option>
            <option value="Pologne">Pologne </option>
            <option value="Polynesie">Polyn&#233;sie </option>
            <option value="Porto_Rico">Porto&#32;Rico </option>
            <option value="Portugal">Portugal </option>

            <option value="Qatar">Qatar </option>

            <option value="Republique_Dominicaine">R&#233;publique dominicaine </option>
            <option value="Republique_Tcheque">R&#233;publique&#32;Tch&#232;que </option>
            <option value="Reunion">R&#233;union </option>
            <option value="Roumanie">Roumanie </option>
            <option value="Royaume_Uni">Royaume&#150;Uni </option>
            <option value="Russie">Russie </option>
            <option value="Rwanda">Rwanda </option>

            <option value="Sahara_Occidental">Sahara Occidental </option>
            <option value="Sainte_Lucie">Sainte&#150;Lucie </option>
            <option value="Saint_Marin">Saint&#45;Marin </option>
            <option value="Salomon">&#206;les Salomon </option>
            <option value="Salvador">Salvador </option>
            <option value="Samoa">&#206;les&#32;Samoa</option>
            <option value="Sao_Tome_et_Principe">Sao&#32;Tom&#233;&#150;et&#150;Principe </option>
            <option value="Senegal">S&#233;n&#233;gal </option>
            <option value="Seychelles">Seychelles </option>
            <option value="Sierra Leone">Sierra Leone </option>
            <option value="Singapour">Singapour </option>
            <option value="Slovaquie">Slovaquie </option>
            <option value="Slovenie">Slov&#32;nie</option>
            <option value="Somalie">Somalie </option>
            <option value="Soudan">Soudan </option>
            <option value="Sri_Lanka">Sri&#150;Lanka </option>
            <option value="Suede">Su&#232;de </option>
            <option value="Suisse">Suisse </option>
            <option value="Suriname">Suriname </option>
            <option value="Eswatini">Eswatini </option>
            <option value="Syrie">Syrie </option>

            <option value="Tadjikistan">Tadjikistan </option>
            <option value="Taiwan">Ta&#239;wan </option>
            <option value="Tonga">Tonga </option>
            <option value="Tanzanie">Tanzanie </option>
            <option value="Tchad">Tchad </option>
            <option value="Thailande">Tha&#239;lande </option>
            <option value="Tibet">Tibet </option>
            <option value="Timor">Timor </option>
            <option value="Togo">Togo </option>
            <option value="Trinite_et_Tobago">Trinit&#233;&#150;et&#150;Tobago </option>
            <option value="Tristan da cunha">Tristan da cuncha </option>
            <option value="Tunisie">Tunisie </option>
            <option value="Turkmenistan">Turm&#233;nistan </option>
            <option value="Turquie">Turquie </option>

            <option value="Ukraine">Ukraine </option>
            <option value="Uruguay">Uruguay </option>

            <option value="Vanuatu">Vanuatu </option>
            <option value="Vatican">Vatican </option>
            <option value="Venezuela">V&#233;n&#233;zu&#233;la </option>
            <option value="Vierges">&#206;les Vierges </option>
            <option value="Vietnam">Vietnam </option>

            <option value="Wake">Wake </option>
            <option value="Wallis et Futuna">Wallis&#150;et&#150;Futuna </option>

            <option value="Yemen">Yemen </option>
            <option value="Yougoslavie">Yougoslavie </option>

            <option value="Zambie">Zambie </option>
            <option value="Zimbabwe">Zimbabwe </option>

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
