<?php //print_r($needs); ?>
<div class="panel panel-white">
	<div class="panel-heading border-light">
		<h4 class="panel-title"><i class="fa fa-cubes fa-2x text-blue"></i> NEEDS </h4>
		<ul class="panel-heading-tabs border-light">
    	<li>
    		<a class="new-need btn btn-info" href="#newNeed"><i class="fa fa-plus"></i> Need </a>
    	</li>
		
	</ul>
	</div>
	<div class="panel-body">
		<div>
			<table class="table table-striped table-bordered table-hover table-need directoryTable<?php if (empty($needs)) echo " hide"; ?>">
				<thead>
					<tr>
						<th>Type</th>
						<th>Name</th>
						<th>Quantity</th>
						<th>Benefits</th>
					</tr>
				</thead>
				<tbody class="directoryLines tableNeedLines">
					<?php
						if (isset($needs) && !empty($needs)){
							foreach ($needs as $data){ 
								if ($data["type"]=="materials")
									$icon="fa-bullhorn";
								else 
									$icon="fa-gears";
					?>
								<tr id="need<?php echo $data["_id"]; ?>">
									<td class="organizationLine">
										<i class="fa <?php echo $icon; ?> fa-2x text-blue"></i> <?php echo $data["type"]; ?>
									</td>
									<td ><a href="#showNeed"><?php echo $data["name"]; ?></a></td>
									<td>
										<?php echo $data["quantity"]; ?>
									</td>
									<td>
										<?php echo $data["benefits"];?>
									</td>
									<td>
										<a href="<?php echo Yii::app()->createUrl("/".$this->module->id."/needs/dashboard/idNeed/".$data["_id"]."/type/".$_GET["type"]."/id/".$_GET["id"]."") ?>" class="btn showNeed">
											<i class="fa fa-chevron-circle-right"></i>
										</a>	
									</td>
								</tr>
						<?php	}
						}
					?>
				</tbody>
			</table>
			<?php if (empty($needs)){ ?>
				<div id="infoPodOrga" class="padding-10 info-no-need">
					<blockquote> 
						Create needs
						<br>Materials  
						<br>Knowledge
						<br>Skills
						<br>to call ressources that you need
					</blockquote>
				</div>
			<?php } ?>
			</div>
		</div>		
</div>
<?php
   $this->renderPartial('addNeedSV', array( ));
 ?>

<script>
jQuery(document).ready(function() {
	$(".showNeed").click(function(){
		//getAjax(".showNeed",baseUrl+"/"+moduleId+"/needs/dashboard/type/<?php echo Project::COLLECTION ?>/id/<?php echo $_GET["id"]?>",null,"html");
	});
	resetDirectoryTable() ;
});
function updateNeed(data){
		if($(".table-need").hasClass("hide")==true){
			$(".table-need").removeClass("hide");
			$(".info-no-need").addClass("hide");
		}
		dataNeed=data["newNeed"];
		if (dataNeed.type=="materials")
			iconNeed="fa-bullhorn";
		else
			iconNeed="fa-gears";
		trNeed = '<tr id="need">'+
					'<td class="organizationLine">'+
						'<i class="fa '+iconNeed+' fa-2x text-blue"></i>'+dataNeed.type+
					'</td>'+
					'<td ><a href="#showNeed" class="showNeed">'+dataNeed.name+'</a></td>'+
					'<td>'+	
						dataNeed.quantity+
					'</td>'+
					'<td>'+
						dataNeed.benefits+
					'</td>'+
					'<td>'+
						'<a href="'+data.url+'" class="btn showNeed"><i class="fa fa-chevron-circle-right"></i></a>'+
					'</td>'+
				'</tr>';
		$(".tableNeedLines").append(trNeed);
}    
function resetDirectoryTable() 
{ 
	console.log("resetDirectoryTable");

	if( !$('.directoryTable').hasClass("dataTable") )
	{
		directoryTable = $('.directoryTable').dataTable({
			"aoColumnDefs" : [{
				"aTargets" : [0]
			}],
			"oLanguage" : {
				"sLengthMenu" : "Show _MENU_ Rows",
				"sSearch" : "",
				"oPaginate" : {
					"sPrevious" : "",
					"sNext" : ""
				}
			},
			"aaSorting" : [[1, 'asc']],
			"aLengthMenu" : [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"] ],
			"iDisplayLength" : 10,
			"destroy": true
		});
	} 
	else 
	{
		if( $(".directoryLines").children('tr').length > 0 )
		{
			directoryTable.dataTable().fnDestroy();
			directoryTable.dataTable().fnDraw();
		} else {
			console.log(" directoryTable fnClearTable");
			directoryTable.dataTable().fnClearTable();
		}
	}
}
        
</script>
