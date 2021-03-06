

<?php 
	
		/* ***************** modifier l'url relative si besoin pour trouver communecter/view/sig/ *******************/
		$relativePath = "../sig/";
		/* ***********************************************************************************/
	  	
	   	//chargement de toutes les librairies css et js indispensable pour la carto 
    	$this->renderPartial($relativePath.'generic/mapLibs');
		
		
		/* **************** modifier les parametre en fonction des besoins *******************/
		if(!isset($sigParams))
		
			$sigParams = array(
			
					"sigKey" => "DashOrga",
					
					/* MAP */
					"mapHeight" => 450,
					"mapTop" => 50,
					"mapColor" => '',  //ex : '#456074', //'#5F8295', //'#955F5F', rgba(69, 116, 88, 0.49)
					"mapOpacity" => 1, //ex : 0.4
					
					/* *
					 * Provider de fond de carte  
					 * http://leaflet-extras.github.io/leaflet-providers/preview/index.html 
					 * */
					 
					/* MAP LAYERS (FOND DE CARTE) */
					"mapTileLayer" 	  => 'http://{s}.tile.thunderforest.com/landscape/{z}/{x}/{y}.png', //'http://{s}.tile.stamen.com/toner/{z}/{x}/{y}.png'
					"mapAttributions" => '<a href="http://www.opencyclemap.org">OpenCycleMap</a>',	 	//'Map tiles by <a href="http://stamen.com">Stamen Design</a>'
					
					 
					/* MAP BUTTONS */			
					"mapBtnBgColor" => '#E6D414', 
					"mapBtnColor" => '#213042', 
					"mapBtnBgColor_hover" => '#5896AB',
					 
					/* USE */
					"usePanel" => true,
					"titlePanel" => 'Thèmes',
					"useRightList" => true,
					"useZoomButton" => true,
					"useHelpCoordinates" => false,
					"useFullScreen" => false,
					
					"notClusteredTag" => array("citoyens"),
					
					"firstView"		  => array(  "coordinates" => array(-21.13318, 55.5314),
													"zoom"		  => 9),
					);
		/* ***********************************************************************************/
	   	
	   	
		$moduleName = "sigModule".$sigParams['sigKey'];
		
		/* ***************** modifier l'url si besoin pour trouver ce fichier *******************/
	   	//chargement de toutes les librairies css et js indispensable pour la carto 
    	$this->renderPartial($relativePath.'generic/mapCss', array("sigParams" => $sigParams));
		
?>

<?php /* ********************** CHANGER LE STYLE CSS SI BESOIN ********************/?>
<style>

	.<?php echo $moduleName; ?> .mapCanvas			{}
	.<?php echo $moduleName; ?> .panel_map			{
		background-color:rgba(255, 255, 255, 0.83) !important;
	}
	.<?php echo $moduleName; ?> .item_panel_map			{
		background-color:rgba(0, 0, 0, 0) !important;
		color:#7A7A7A !important;
	}
	.<?php echo $moduleName; ?> .item_panel_map:hover	{
		background-color:rgba(0, 0, 0, 0.04) !important;
	}
	
	.<?php echo $moduleName; ?> #right_tool_map		{}
	.<?php echo $moduleName; ?> #liste_map_element	{}
	
	.<?php echo $moduleName; ?> #lbl-chk-scope		{}

	.<?php echo $moduleName; ?> .btn-group-map		{}
	
	/* XS */
	@media screen and (max-width: 768px) {
		.<?php echo $moduleName; ?> .mapCanvas{}
		.<?php echo $moduleName; ?> .btn-group-map{}
	}
</style>
<?php /* ********************** HTML ********************/?>



	<div class="panel panel-white">
	  <div class="panel-heading border-light">
	    <h4 class="panel-title">Annuaire Cartographique</h4>
	    <div class="panel-tools"
	      <a class="btn btn-xs btn-link panel-close" href="#">
	        <i class="fa fa-times"></i>
	      </a>
	    </div>
	  </div>
	  <div class="panel-body no-padding">
	  	
	  		<?php /* ********************** CHANGER LE CHEMIN RELATIF SI BESOIN ********************/?>
	   		<?php $this->renderPartial($relativePath.'generic/mapView', array( "sigParams" => $sigParams)); ?>
	   		<?php /* *******************************************************************************/?>
	   		
	  </div>
	</div>

<script type="text/javascript">
	
	var Sig;
	
	/**************************** DONNER UN NOM DIFFERENT A LA MAP POUR CHAQUE CARTE ******************************/
	//le nom de cette variable doit changer dans chaque vue pour éviter les conflits (+ vérifier dans la suite du script vvvv)
	var mapDashboardOrga;
	/**************************************************************************************************************/
	
	//mémorise l'url des assets (si besoin)
	var assetPath 	= "<?php echo $this->module->assetsUrl; ?>";
	
	jQuery(document).ready(function()
	{ 	
		//création de l'objet SIG
		Sig = SigLoader.getSig();
		
		//affiche l'icone de chargement
		Sig.showIcoLoading(true);
		
			//chargement des paramètres d'initialisation à partir des params PHP definis plus haut
			var initParams =  <?php echo json_encode($sigParams); ?>;
			
			//chargement la carte
			mapDashboardOrga = Sig.loadMap("mapCanvas", initParams);
			
			/**************************** CHANGER LA SOURCE DES DONNEES EN FONCTION DU CONTEXTE ***************************/
			var mapData = contextMap;
			//var mapData = ;
			//alert("liste des différents éléments des données : " + JSON.stringify(contextMap));
			/**************************************************************************************************************/
	
			//alert(JSON.stringify(mapData));
			//console.dir(mapData);
			//affichage des éléments sur la carte
			Sig.showMapElements(mapDashboardOrga, mapData);//, elementsMap);

		//masque l'icone de chargement
		Sig.showIcoLoading(false);
				
	});
	
</script>