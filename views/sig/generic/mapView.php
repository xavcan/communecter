
	<div class="mapCanvas" id="mapCanvas<?php echo $sigParams['sigKey']; ?>"> 
		<center><img class="world_pix" style="margin-top:50px;" src="<?php echo $this->module->assetsUrl; ?>/images/world_pixelized.png"></center>
    </div>
	
	<?php if($sigParams['usePanel']){ ?>
		<div class="panel_map">
			<p class="item_panel_map hidden-xs">
			</p>
		</div>
	<?php } ?>
	
	<?php if($sigParams['useRightList']){ ?>
		<div id="right_tool_map" class="hidden-xs">
			
			<!-- 	PSEUDO SEARCH -->	
			<div id="map_pseudo_filters">
				
				<div class="input-group">
						<span class="input-group-addon"> <i class="fa fa-search"></i> </span>
						<input class="form-control date-range active" type="text" id="input_name_filter" placeholder="recherche par nom">
				</div>
			</div>
			<!-- 	PSEUDO SEARCH -->	
			
			<!-- 	LIST ELEMENT -->	
			<div id="liste_map_element">
			</div>
			
			<label id="lbl-chk-scope">
				<input style="" value="" style="margin-left:0px;" type="checkbox" id="chk-scope"> Filtrer dans la zone visible
			</label>
		</div>
	<?php } ?>
	
	<?php if($sigParams['useZoomButton']){ ?>
		<div class="btn-group btn-group-lg btn-group-map">
			<button type="button" class="btn btn-map " id="btn-zoom-out"><i class="fa fa-search-minus"></i></button>
			<button type="button" class="btn btn-map" id="btn-zoom-in"><i class="fa fa-search-plus"></i></button>
		</div>
	<?php } ?>
	
	<div class="btn-group btn-group-lg btn-group-map" style="left:390px">
		<i class="fa fa-refresh fa-spin fa-2x" id="ico_reload"></i>
	</div>
  
    <?php if($sigParams['useHelpCoordinates']){ ?>
		<div id="help-coordinates">0,000</div>
	<?php } ?>
	