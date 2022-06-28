<body>

<div class="formu" style="margin-bottom: 20px;">
			<div class="row">
				<div class="col-xs-6">

						<h1>Formulaire</h1>
						<section>
							<form name="formulaire" action="traitement.php" method="post">
		<input type="button" onclick="ajout();" value="Ajouter une ligne">
		<input type="button" onclick="supprime();" value="Supprimer une ligne">
		<h3>Title Licence :<input type="text" name="licence" placeholder="licence" id="licence"></h3>
		<table id="tableau" name="tableau" border="0">


		</table>
		<input type="checkbox" name="oc" id="oc" /> <label for="oc">Ordre Chronologique Non disponible</label><br />

		<input type="submit" value="Envoyer" />

</form>
</div></div>
</div>

		<script src="script.js" ></script>
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>   

</body>
