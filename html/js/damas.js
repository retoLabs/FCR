// damas.js

var objBoard = null;

function creaObjBoard(){
	var B = 'B'; // ficha blanca
	var N = 'N'; // ficha negra
	var b = 'b'; // casilla blanca vacía
	var n = 'n'; // casilla negra


	var col1 = [B,n,B,n,b,n,N,n];
	var col2 = [n,B,n,b,n,N,n,N];
	var col3 = col1;
	var col4 = col2;
	var col5 = col1;
	var col6 = col2;
	var col7 = col1;
	var col8 = col2;

// Se crea un objeto, con un array de arrays, de forma que la casilla [i,j] conincide con
// la representación en el array i, posición j.
// además tiene la id de la ficha sobre la que se hace click,
// y el turno del jugador.

	objBoard = {fichas:[col1,col2,col3,col4,col5,col6,col7,col1],ficha : null,turno:'B'};
}

function cambiaTurno(){
	if (objBoard.turno == 'B') objBoard.turno = 'N';
	else objBoard.turno = 'B';
}

function moverFicha(id){
	console.log('Moviendo ficha ',objBoard.ficha,' hasta casilla',id);
	objBoard.ficha = null;
}

function clickCasilla(id){
	var i = id.split(':')[0];
	var j = id.split(':')[1];
	if (objBoard.ficha) moverFicha(id);
	console.log(objBoard.fichas[i][j]);
}

function clickFicha(id){
	var i = id.split(':')[0];
	var j = id.split(':')[1];
	if (!objBoard.ficha) objBoard.ficha = id;
	console.log(objBoard.fichas[i][j]);
}


function casillaInicial(i,j){
	if (i==0 && j==0) return true;
	else if (i==2 && j==0) return true;
	else if (i==4 && j==0) return true;
	else if (i==6 && j==0) return true;
	else if (i==1 && j==1) return true;
	else if (i==3 && j==1) return true;
	else if (i==5 && j==1) return true;
	else if (i==7 && j==1) return true;
	else if (i==0 && j==2) return true;
	else if (i==2 && j==2) return true;
	else if (i==4 && j==2) return true;
	else if (i==6 && j==2) return true;
	else if (i==1 && j==5) return true;
	else if (i==3 && j==5) return true;
	else if (i==5 && j==5) return true;
	else if (i==7 && j==5) return true;
	else if (i==0 && j==6) return true;
	else if (i==2 && j==6) return true;
	else if (i==4 && j==6) return true;
	else if (i==6 && j==6) return true;
	else if (i==1 && j==7) return true;
	else if (i==3 && j==7) return true;
	else if (i==5 && j==7) return true;
	else if (i==7 && j==7) return true;
	else return false;
}

function inicio(){
	var n = 0;
	var divBoard = document.getElementById('board');
	for (var i=0;i<8;i++){
		for (var j=0;j<8;j++){
			n++;
			var casilla = document.createElement('div');
			casilla.id = ''+i+':'+j;
			casilla.style.left = (i*60)+'px';
			casilla.style.top = (j*60)+'px';
			casilla.style.position = 'absolute';
			if (casillaInicial(i,j)) {
				var ficha = document.createElement('div');
				if (j<3) ficha.classList.add("fichaBlanca");
				else ficha.classList.add("fichaNegra");
				ficha.id = ''+i+':'+j;
				ficha.style.left = '10px';
				ficha.style.top = '10px';
				ficha.style.width = '40px';
				ficha.style.height = '40px';
				ficha.onclick = function(ev){clickFicha(ev.target.id)};
				casilla.appendChild(ficha);
			}
			else casilla.onclick = function(ev){clickCasilla(ev.target.id)}


			divBoard.appendChild(casilla);
		}
	}

	creaObjBoard();
}

window.onload = inicio;
//window.creaObjBoard = creaObjBoard;
//window.clickCasilla = clickCasilla;
//window.clickFicha = clickFicha;