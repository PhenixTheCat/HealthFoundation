

if(mix==1){qst=mix(qst);}//mélanger les questions à chaque chargement si "mix" est sur 1
if(nb_q<1){nb_q=qst.length;}//le nombre de questions à poser n'a pas été précisé dans le fichier "questions.js". Toutes les questions seront posées.
var q=0;var br=0;var points=0;var chkd=0;var msg="";var tempo;var i=0;var z=0;var min, sec;
var q_en_cours=0;

function mix(tbl){
  var Num;var Temp = new Array();var Len = tbl.length;var j = Len;
  for (var i=0; i<Len; i++){Temp[i] = tbl[i];}
  for (i=0; i<Len; i++){
    Num = Math.floor(j * Math.random());
    tbl[i] = Temp[Num];
    for (var k=Num; k < (j-1); k++) {Temp[k] = Temp[k+1];}
    j--;
  }
  return tbl;
}

  
function start(){
	document.getElementById("titre").innerHTML=titre;
	if(auteur!=""){
		msg=document.createElement("span");
		msg.id="author";
		msg.innerHTML="<br />"+auteur;
		document.getElementById("titre").appendChild(msg);
	}
	document.getElementById("instructions").innerHTML=consigne;
	i=0;
	qu(0);
}

function fini(){
	document.getElementById("questions").innerHTML="<p class='bravo'>Exercice termin\u00e9 !<\/p>";
	if(recommencer==1){document.getElementById("questions").innerHTML+="<p class='bravo'><input type='button' class='bouton' value='Recommencer' onclick='window.location.reload();' /><\/p>";}
	msg=document.createElement("div");
	msg.id="feedback";
	document.getElementById("questions").appendChild(msg);
	calcul_score();
}

function qu(i){
	if(i==nb_q){fini();return false;} //il n'y a plus de question
	var cont="";
	cont+="<span class='num'>Qu. "+(i+1)+"<\/span>";
	//s'il y a un chrono
	if(qst[i][10]){cont+="<span id='chrono'></span>";}
	//s'il y a un texte à lire
	if(qst[i][11]){cont+="&nbsp;&nbsp;&nbsp;<input type='button' class='bouton' id='btntxt' value=' Lire ' onclick='lire("+i+");' />";}
	cont+="<p class='qust'>"+qst[i][0]+"<\/p>";
	cont+="<form id='frm' name='frm' action='#'>";
	if(qst[i][1]){cont+="<p class='propo'><input type='radio' name='rep' id='r0' value='A' /> "+qst[i][1]+"<span id='sp0'><\/span><\/p>";}
	if(qst[i][2]){cont+="<p class='propo'><input type='radio' name='rep' id='r1' value='B' /> "+qst[i][2]+"<span id='sp1'><\/span><\/p>";}
	if(qst[i][3]){cont+="<p class='propo'><input type='radio' name='rep' id='r2' value='C' /> "+qst[i][3]+"<span id='sp2'><\/span><\/p>";}
	if(qst[i][4]){cont+="<p class='propo'><input type='radio' name='rep' id='r3' value='D' /> "+qst[i][4]+"<span id='sp3'><\/span><\/p>";}
	

	cont+="<\/form>";
	cont+="<p class='ok'><input type='button' class='bouton' id='btnOK' value=' OK ' onclick='corriger("+i+");' />";
	cont+="<\p>";
	document.getElementById("questions").innerHTML=cont;
	if(qst[i][10]){//si un compte à rebours est fixé
		var tp=qst[i][10].split(":");
		min=tp[0];
		sec=tp[1];sec=parseInt(sec)+1;
		rebours();
		q_en_cours=i;
	}
}

function rebours(){
	sec--;
	if(sec<10){sec="0"+sec;}//mettre un zéro avant l'unité
	document.getElementById("chrono").innerHTML = min+":"+sec;
	if(sec>0){tempo=setTimeout('rebours()',1000);}
	if(sec==0&&min>0){min--;min="0"+min;sec=60;tempo=setTimeout('rebours()',1000);}
	if(sec==0&&min==0){trop_tard();return false;}
}

function lire(i){
	var largeur=600;var hauteur=500;var gauche=(screen.width-largeur)/2;var haut=(screen.height-hauteur)/2;
	var fichier = qst[i][11];
	var tx=window.open(fichier,"","left="+gauche+",top="+haut+",width="+largeur+",height="+hauteur+",resizable=yes,scrollbars=yes");
}

function corriger(numq){
	chkd=0;var y=0;
	for(var x=0;x<4;x++){
		var rad=document.getElementById("r"+x);
		if(rad){//si le bouton radio existe
			if(rad.checked==true && rad.value==qst[numq][5]){ //la bonne réponse a été cochée
				br=1;chkd=1;y=(x+6);
				var image=document.getElementById("sp"+x);
				points++;
			}
			else if(rad.checked==true && rad.value!=qst[numq][5]){
				chkd=1;y=(x+6);
				var image=document.getElementById("sp"+x);
				if(penalite!=0){points-=penalite;} //en cas d'erreur, on décompte 0.5 pt du score
			}
		}
	}
	if(encore==0 && chkd==1){clearTimeout(tempo);}//arrêter le compte à rebours si on ne peut pas entrer une autre réponse
	if(chkd==0){ //l'utilisateur a cliqué sur OK sans avoir choisi une option
		if(document.getElementById("questions").lastChild.id!="norep"){//afficher le message uniquement s'il n'est pas déjà affiché
			msg=document.createElement("div");
			msg.id="norep";
			msg.innerHTML="<p class='noreponse'>Veuillez s\u00e9lectionner une r\u00e9ponse !<\/p>";
			document.getElementById("questions").appendChild(msg);
		}
		return false;
	}
	if(br==1){
		//en cas de bonne réponse
		if(qst[numq][10]){clearTimeout(tempo);}//s'il y a un chrono, il faut l'arrêter
		image.innerHTML="&nbsp;&nbsp;<img src='Images/yes.png' alt='YES' />";
		document.getElementById("btnOK").style.display="none";
		creer_feedback();
		if(document.getElementById("norep")){document.getElementById("norep").style.display="none";}
		msg=document.createElement("div");
		msg.innerHTML="<div class='bravo'>BRAVO ! R\u00e9ponse correcte !<\/div>";
		document.getElementById("feedback").appendChild(msg);
		if(qst[numq][y]){commentaire(numq,y);}//afficher le commentaire, s'il existe
		calcul_score();
		msg=document.createElement("div");
		msg.innerHTML="<p class='ok'><input type='button' class='bouton' value=' Continuer ' onclick='qu("+(numq+1)+");' /><\/p>";
		document.getElementById("feedback").appendChild(msg);
		br=0;
		return false;
	}
	else{ //en cas de mauvaise réponse
		image.innerHTML="&nbsp;&nbsp;<img src='Images/no.png' alt='NO' />";
		creer_feedback();
		msg=document.createElement("div");
		if(encore==1){msg.innerHTML="<div class='desole'>R\u00e9ponse incorrecte ! R\u00e9essayez !<\/div>";}
		else{
			document.getElementById("btnOK").style.display="none";
			if(document.getElementById("norep")){document.getElementById("norep").style.display="none";}
			msg.innerHTML="<div class='desole'>R\u00e9ponse incorrecte !<\/div>";
			document.getElementById("feedback").appendChild(msg);
			msg=document.createElement("div");
			msg.innerHTML="<p class='ok'><input type='button' class='bouton' value=' Continuer ' onclick='qu("+(numq+1)+");' /><\/p>";
			document.getElementById("feedback").appendChild(msg);
		}
		if(penalite!=0){//si un décompte de points a été prévu
			msg.innerHTML+="<div style='color:pink;font-size:8pt;text-align:center;'>ATTENTION: chaque erreur coûte "+penalite+" pt !<\/div";
		}
		document.getElementById("feedback").appendChild(msg);
		if(qst[numq][y]){commentaire(numq,y);}//afficher le commentaire, s'il existe
		calcul_score();
		br=0;
		return false;		
	}
}

function trop_tard(){
		creer_feedback();
		document.getElementById("btnOK").style.display="none";
		msg=document.createElement("div");
		msg.id="sorry";
		msg.innerHTML="<div class='desole'>Le temps imparti est \u00e9coul\u00e9 !<\/div>";
		if(i==nb_q){fini();return false;} //il n'y a plus de question
		document.getElementById("feedback").appendChild(msg);
		
		i = q_en_cours + 1;
		msg=document.createElement("div");
		msg.innerHTML="<p class='ok'><input type='button' class='bouton' value=' Continuer ' onclick='qu("+i+");' /><\/p>";
		document.getElementById("sorry").appendChild(msg);
		calcul_score();
}

function creer_feedback(){
	document.getElementById("questions").removeChild(document.getElementById("questions").lastChild);
	msg=document.createElement("div");
	msg.id="feedback";
	document.getElementById("questions").appendChild(msg);
}
function commentaire(a,b){
	msg=document.createElement("div");//ajout du commentaire
	msg.id="comment";
	msg.innerHTML="<img class='info' src='images/info.gif' alt='Commentaire' align='left' />"+qst[a][b];
	document.getElementById("feedback").appendChild(msg);
}


function calcul_score(){
	msg=document.createElement("div");
	var result=points/nb_q;
	result=Math.round(result*100);// arrondi à 2 chiffres après la virgule
	msg.innerHTML="<p class='score'>Votre score : "+points+" / "+nb_q+"&nbsp;&nbsp;&nbsp;<small>[ soit "+result+"% ]<\/small><\/p>";
	
	document.getElementById("feedback").appendChild(msg);
	
	


//TO DO envoyer le score dans la base de donnée 
/*if (window.XMLHttpRequest) {
xmlhttp=new XMLHttpRequest();
} else {
if (window.ActiveXObject)
try {
xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
} catch (e) {
return NULL;
}
}
}
xmlhttp.open("POST","psychotestEnLigne.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send();	
var score= result
var score=$("#score").val(); */
}


		
		
		/*
 
		$(function() {
		
 
			//VALUES 
		    var score= result
			var score=$("#score").val();
 
			//DATASTRING 
		    var dataString = 'score='+ score;
 
 
 
			if(score=='') {
			$('.success').fadeOut(200).hide();
		    $('.error').fadeOut(200).show();
			//UNCOMMNENT TO SEND TO CONSOLE 
			 //console.log ("SOMETHING HAPPENS"); 
			} else {
			$.ajax({
			type: "POST",
		    url: "psychotestEnLigne.php",
		    data: dataString,
		    	success: function(){
					$('.success').fadeIn(200).show();
		    		$('.error').fadeOut(200).hide();
					//UNCOMMNENT TO SEND TO CONSOLE 
					// console.log (dataString); console.log ("AJAX DONE"); 
		   		}
			});
				}//EOC
		   return false;
			
 
 
 
		});
*/
		
