
var titre="Test psychotechnique en ligne";
var consigne="Choisissez la r\u00e9ponse correcte!";
var auteur="Health foundation";
var mix=1;
var nb_q=8; // nombre de questions à poser. Si 0, le programme posera toutes les questions
var penalite=0;
var encore=0;
var recommencer=0;

var qst=new Array();// <== NE PAS MODIFIER !!    
		// La variable n représente le numéro de la question et est incrémenté (n++;) à chaque nouvelle question.
		//Cela permet de supprimer, d'ajouter ou de déplacer des questions sans devoir modifier les numéros des questions
var n=-1;			 // <== NE PAS MODIFIER !!

n++;qst[n]=new Array(12);
qst[n][0]="<p>Quel nombre voyez-vous ?</p><img src='Images/4.jpg' alt='question1' class='image1' /><br/>";
qst[n][1]="8";//proposition A
qst[n][2]="4";//proposition B
qst[n][3]="3";//proposition C
qst[n][4]="rien";//proposition D
qst[n][5]="B";//[lettre correspondant à la réponse correcte( A,B,C,D)]
qst[n][6]="Ce n'est pas la bonne r\u00e9ponse";//commentaire si option A est cochée
qst[n][7]="Bravo, vous avez trouv\u00e9";//commentaire si option B est cochée
qst[n][8]="Ce n'est pas la bonne r\u00e9ponse";//commentaire si option C est cochée
qst[n][9]="Ce n'est pas la bonne r\u00e9ponse";//commentaire si option D est cochée
qst[n][10]="00:10";//délai pour répondre à la question
qst[n][11]="";//document annexé


n++;qst[n]=new Array(12);
qst[n][0]="<p>Quel nombre voyez-vous ?</p><img src='Images/16.jpg' alt='question2' class='image2' /><br/>";
qst[n][1]="76";//proposition A
qst[n][2]="16";//proposition B
qst[n][3]="26";//proposition C
qst[n][4]="rien";//proposition D
qst[n][5]="B";//[lettre correspondant à la réponse correcte( A,B,C,D)]
qst[n][6]="Ce n'est pas la bonne r\u00e9ponse";//commentaire si option A est cochée
qst[n][7]="Bravo, vous avez trouv\u00e9";//commentaire si option B est cochée
qst[n][8]="Ce n'est pas la bonne r\u00e9ponse";//commentaire si option C est cochée
qst[n][9]="Ce n'est pas la bonne r\u00e9ponse";//commentaire si option D est cochée
qst[n][10]="00:10";//délai pour répondre à la question
qst[n][11]="";//document annexé

n++;qst[n]=new Array(12);
qst[n][0]="<p>Quel nombre voyez-vous ?</p><img src='Images/73.png' alt='question3' class='image3' /><br/>";
qst[n][1]="68";//proposition A
qst[n][2]="78";//proposition B
qst[n][3]="73";//proposition C
qst[n][4]="rien";//proposition D
qst[n][5]="C";//[lettre correspondant à la réponse correcte( A,B,C,D)]
qst[n][6]="Ce n'est pas la bonne r\u00e9ponse";//commentaire si option A est cochée
qst[n][7]="Ce n'est pas la bonne r\u00e9ponse";//commentaire si option B est cochée
qst[n][8]="Bravo, vous avez trouv\u00e9";//commentaire si option C est cochée
qst[n][9]="Ce n'est pas la bonne r\u00e9ponse";//commentaire si option D est cochée
qst[n][10]="00:10";//délai pour répondre à la question
qst[n][11]="";//document annexé

n++;qst[n]=new Array(12);
qst[n][0]="<p>Quel nombre voyez-vous ?</p><img src='Images/rien.jpg' alt='question4' class='image4' /><br/>";
qst[n][1]="2";//proposition A
qst[n][2]="5";//proposition B
qst[n][3]="8";//proposition C
qst[n][4]="rien";//proposition D
qst[n][5]="D";//[lettre correspondant à la réponse correcte( A,B,C,D)]
qst[n][6]="Ce n'est pas la bonne r\u00e9ponse";//commentaire si option A est cochée
qst[n][7]="Ce n'est pas la bonne r\u00e9ponse";//commentaire si option B est cochée
qst[n][8]="Ce n'est pas la bonne r\u00e9ponse";//commentaire si option C est cochée
qst[n][9]="Bravo, vous avez trouv\u00e9";//commentaire si option D est cochée
qst[n][10]="00:10";//délai pour répondre à la question
qst[n][11]="";//document annexé

n++;qst[n]=new Array(12);
qst[n][0]="<p>Dans cette partie du test, vous allez devoir deviner ce qui se cache derri\u00e8re le st\u00e9r\u00e9ogrammes: que voyez-vous ?</p><img src='Images/258.png' alt='question4' class='image5' /><br/>";
qst[n][1]="trois chiffres : 2, 8, 5";
qst[n][2]="trois chiffres 6, 7, 9";
qst[n][3]="un chat";
qst[n][4]="un chien";
qst[n][5]="A";
qst[n][6]="Bravo, vous avez trouv\u00e9";
qst[n][7]="Ce n'est pas la bonne r\u00e9ponse";
qst[n][8]="Ce n'est pas la bonne r\u00e9ponse";
qst[n][9]="Ce n'est pas la bonne r\u00e9ponse";
qst[n][10]="01:00";
qst[n][11]="";

n++;qst[n]=new Array(12);
qst[n][0]="<p>Dans cette partie du test, vous allez devoir deviner ce qui se cache derri\u00e8re le st\u00e9r\u00e9ogrammes: que voyez-vous ?</p><img src='Images/requin.png' alt='question4' class='image6' /><br/>";
qst[n][1]="trois chiffres : 9, 10, 5";
qst[n][2]="un requin";
qst[n][3]="un chat";
qst[n][4]="un chien";
qst[n][5]="B";
qst[n][6]="Ce n'est pas la bonne r\u00e9ponse";
qst[n][7]="Bravo, vous avez trouv\u00e9";
qst[n][8]="Ce n'est pas la bonne r\u00e9ponse";
qst[n][9]="Ce n'est pas la bonne r\u00e9ponse";
qst[n][10]="01:00";
qst[n][11]="";

n++;qst[n]=new Array(12);
qst[n][0]="<p>Trouvez le r\u00e9sultat de cette \u00e9quation : -4 + 1 - 1 - 2 - 86 + 9 + 5 + 53 </p>";
qst[n][1]="-23";//proposition A
qst[n][2]="-24";//proposition B
qst[n][3]="-25";//proposition C
qst[n][4]="23";//proposition D
qst[n][5]="C";//[lettre correspondant à la réponse correcte( A,B,C,D)]
qst[n][6]="Ce n'est pas la bonne r\u00e9ponse";//commentaire si option A est cochée
qst[n][7]="Ce n'est pas la bonne r\u00e9ponse";//commentaire si option B est cochée
qst[n][8]="Bravo, vous avez trouv\u00e9";//commentaire si option C est cochée
qst[n][9]="Ce n'est pas la bonne r\u00e9ponse";//commentaire si option D est cochée
qst[n][10]="00:20";//délai pour répondre à la question
qst[n][11]="";//document annexé

n++;qst[n]=new Array(12);
qst[n][0]="<p> S\u00e9lectionnez le plus petit intervalle contenant le r\u00e9sultat de l'op\u00e9ration ci-dessus: -29 + 93 - 47 - 20 - 90 - 18 </p>";
qst[n][1]="[-180,-120]";//proposition A
qst[n][2]="[-162;-79]";//proposition B
qst[n][3]="[-135,-58]";//proposition C
qst[n][4]="[-143,-59]";//proposition D
qst[n][5]="C";//[lettre correspondant à la réponse correcte( A,B,C,D)]
qst[n][6]="Ce n'est pas la bonne r\u00e9ponse";//commentaire si option A est cochée
qst[n][7]="Ce n'est pas la bonne r\u00e9ponse";//commentaire si option B est cochée
qst[n][8]="Bravo, vous avez trouv\u00e9";//commentaire si option C est cochée
qst[n][9]="Ce n'est pas la bonne r\u00e9ponse";//commentaire si option D est cochée
qst[n][10]="00:20";//délai pour répondre à la question
qst[n][11]="";//document annexé




