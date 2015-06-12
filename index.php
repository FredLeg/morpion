<!DOCTYPE html>
<!--
http://www.yazo.net/racine/v1/techniques/morpions.html
Version 2
-->
<html>
<head>
	<title>morpion</title>
	<meta charset="utf-8">
  <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery/2.1.4/jquery.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>
		<style>
		.row {
			margin: 0;
			}
		.case {
			border: 1px dotted lightgrey;
			width: 70px;
			height: 70px;
			text-align: center;
			font-size: 2em;
			line-height: 70px;
			float: left;
			}
		.over {
			background-color: #F5F2F0;
			}
		i {
			font-size: 2em;
			font-weight: bolder;
			}
		input[type=button] {
			margin-top: 20px;
			}
		.btn-panel {
			text-align: center;
			}
		.game-panel {
			text-align: center;
			margin: 40px auto;
			margin-top: 100px;
			width: 210px;
			}
		.msg-panel {
			text-align: center;
			margin: 40px auto;
			width: 300px;
			}
    .yellow {
      background-color: #fffde7;
      }

		</style>
    <script>
      var count = 1;
      $(function(){

      	var pions = ['O','X'];

      	$('.case').hover(
      		function(){this.classList.add('over');},
      		function(){this.classList.remove('over');}
      	);

      	$('.case').on('click', onCaseClick);
      	function onCaseClick(e){
      		var $case = $(e.currentTarget);
      		if ($case.text()=='') {
      			var pion = pions[(count++)%2];
	      		var cases = $('.case').toArray();
	      		var i = cases.indexOf(e.currentTarget);
	      		var p = i2xy(i);
	      		console.log( "i: "+ i +"x: "+ p.x +" y:"+ p.y );
      			$case.text( pion );
      			if ( andTheWinnerIs( pion, i ) ){
      				$('.msg-panel').text( pion +' a gagné');
      			}
      		}
          //$case.toggleClass('yellow');
      	}

      	function i2xy(i){
      		var p = new Object();
      		p.x = Math.floor( i / 3 );
      		p.y = i % 3;
      		return p;
      	}

      	function andTheWinnerIs( pion, index ){
      		var cases = $('.case').toArray();
      		var nbr_onX   = 0;
      		var nbr_onY   = 0;
      		var nbr_onXY  = 0;
      		var nbr_onXY3 = 0;
      		var P = i2xy( index );
      		for(var i=0; i<9; i++){
      			iCase = $(cases[i]);
      			if(iCase.text()==pion){
      				var iP = i2xy(i);
		      		console.log( "---", iP.x, iP.y );
      				if (P.x==iP.x)    nbr_onX++;
      				if (P.y==iP.y)    nbr_onY++;
      				if (iP.x==iP.y)   nbr_onXY++;
      				if (iP.x+iP.y==2) nbr_onXY3++;
      			}
      		}
          if (nbr_onX>2) axeName = '';
          if (nbr_onY>2) ;
          if (nbr_onXY>2) ;
          if (nbr_onXY3>2) ;
      		return (nbr_onX>2||nbr_onY>2||nbr_onXY>2||nbr_onXY3>2);
        }

        function winnerAxe( name, index ){
      	}

      });

    	function efface(){
    		$('.case').each(function(){$(this).text('')});
    		$('.msg-panel').text('');
    		count = 1;
    	}

    </script>
</head>
<body>

<!-- <i class="mdi-toggle-radio-button-off"></i>
<i class="mdi-content-clear"></i> -->

<div class="game-panel">
	<div class="row">
	  <div class="case"></div>
	  <div class="case"></div>
	  <div class="case"></div>
	</div>
	<div class="row">
	  <div class="case"></div>
	  <div class="case"></div>
	  <div class="case"></div>
	</div>
	<div class="row">
	  <div class="case"></div>
	  <div class="case"></div>
	  <div class="case"></div>
	</div>
</div>

<div class="btn-panel">
	<input type="button" value="Effacer" onclick="efface()">
</div>

<div class="msg-panel"></div>

<!-- <input type="button" value="Connecter" onclick="connect()"> -->

<script>
/*var connection;
function connect(){
  console.log('connect');
  connection = new WebSocket('ws://192.168.1.19/socket.php', ['soap', 'xmpp']);
  connection.onopen = function () {
    console.log('WebSocket onopen ');
    connection.send('hello');
  };
  connection.onerror = function (error) {
    console.log('WebSocket Error ' + error);
  };
  connection.onmessage = function (e) {
    console.log('Server: ' + e.data);
  };
}*/
</script>

</body>
</html>