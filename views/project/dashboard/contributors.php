	<?php
		/*$isProjectAdmin= false;
    	if(isset($project["_id"]) && isset(Yii::app()->session["userId"])) {
    		$isProjectAdmin =  Authorisation::isProjectAdmin((String) $project["_id"],Yii::app()->session["userId"]);
		}*/
	?>
	<div class="panel panel-white">
		<div class="panel-heading border-light">
			<h4 class="panel-title"><i class="fa fa-users fa-2x text-green"></i> CONTRIBUTORS</h4>
			<div class="panel-tools">
				<?php if ($admin){ ?>
				<a href="#newContributors" class="new-contributor btn btn-xs btn-light-blue tooltips" data-placement="top" data-original-title="Connect People or Organizations that are part of your Organization"><i class="fa fa-plus"></i></a>
				<?php } ?>
				<div class="dropdown">
					<a class="btn btn-xs dropdown-toggle btn-transparent-grey" data-toggle="dropdown">
						<i class="fa fa-cog"></i>
					</a>
					<ul role="menu" class="dropdown-menu dropdown-light pull-right">
						<li>
							<a href="#" class="panel-collapse collapses"><i class="fa fa-angle-up"></i> 								<span>Collapse</span> </a>
						</li>
						<li>
							<a href="#" class="panel-refresh">
								<i class="fa fa-refresh"></i> <span>Refresh</span>
							</a>
						</li>
						<li>
							<a data-toggle="modal" href="#panel-config" class="panel-config">
								<i class="fa fa-wrench"></i> <span>Configurations</span>
							</a>
						</li>
						<li>
							<a href="#" class="panel-expand">
								<i class="fa fa-expand"></i> <span>Fullscreen</span>
							</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn btn-xs btn-link panel-close">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="panel-body no-padding">
			<div class="tabbable no-margin no-padding partition-dark">
				<ul id="myTab" class="nav nav-tabs">
					<li class="active">
						<a href="#users_tab_attending" data-toggle="tab">
							<span><i class="fa fa-child"></i>
							Contributors
							</span>
						</a>
					</li>
				</ul>
				<div class="tab-content partition-white">
					<div class="tab-pane padding-bottom-5 active" id="users_tab_attending">
						<div class="panel-scroll height-230 ps-container">
							<table class="table table-striped table-hover">
								<tbody id="tContributor">
									<?php foreach ($contributors as $member) { 
										if ($member["type"]=="citoyen"){
											$icon="<i class=\"fa fa-smile-o fa-2x\"></i></td>";
											$redirect="person";
										}
										else{
											$icon="<i class=\"fa fa-group fa-2x\"></i></td>";
											$redirect="organization";
										}
									?>
									<tr id="contributor<?php echo $member["_id"]; ?>">
										<td class="center">
										<?php if($member && isset($member["imagePath"])) { ?>
											<img width="50" height="50"  alt="image" class="img-circle" src="<?php echo $member["imagePath"]; ?>"></td>
										<?php } else{ 
												echo $icon;
											} ?>
										<td><span class="text-small block text-light"><?php if ($member && isset($member["position"])) echo $member["position"]; ?></span><span class="text-large"><?php echo $member["name"]; ?></span><a href="<?php echo Yii::app()->createUrl("/".$this->module->id."/".$redirect."/dashboard/id/".$member['_id'])?>" class="btn"><i class="fa fa-chevron-circle-right"></i></a></td>
										<?php if ( $admin ){ ?>
											<td>
												<a href="javascript:;" class="disconnectBtnContributor btn btn-xs btn-red tooltips " data-placement="left"  data-type="<?php if ($member["type"]=="citoyen") echo PHType::TYPE_CITOYEN; else echo  Organization::COLLECTION; ?>" data-id="<?php echo $member['_id'];?>" data-name="<?php echo $member["name"]; ?>" data-placement="top" data-original-title="Remove this organization" ><i class=" disconnectBtnIcon fa fa-unlink"></i></a>
											</td>
										<?php } ?>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: -14px; width: 504px; display: none;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 17px; right: 3px; height: 230px; display: inherit;"><div class="ps-scrollbar-y" style="top: 11px; height: 152px;"></div></div></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
   $this->renderPartial('addContributorSV', array( "project" => $project, "organizationTypes" => $organizationTypes ));
 ?>
 <script type="text/javascript">
	jQuery(document).ready(function() {
		bindBtnContributor();
	});

	function updateContributor(newContributor,type)
	{
		console.log(newContributor, "type", type);
		var links ="";
		var itemId = newContributor["id"];
		var imgHtml="";
		var roles ="";
		//var parentId = organization["_id"]["id"];

		if(type=="citoyens"){
			links=  baseUrl+'/'+moduleId+'/person/dashboard/id/'+itemId;
			type = "";
			imgHtml = '<i class="fa fa-smile-o fa-2x"></i>';
			//tabObject= $("#tPerson");
		}else{
			links=  baseUrl+'/'+moduleId+'/organization/dashboard/id/'+itemId;
			//tabObject = $("#tOrga");
			imgHtml = '<i class="fa fa-group fa-2x"></i>'
			type = newContributor.type;
		}
		if('undefined' != typeof newContributor["imagePath"] && newContributor["imagePath"]!=""){
			imgHtml = '<img width="50" height="50" alt="image" class="img-circle" src="'+newContributor["imagePath"]+'">'
		}
		var contributorLine = '<tr id="contributor'+itemId+'">'+
								'<td class="center">'+
									imgHtml+
								'</td>'+
								'<td>'+
									'<span class="text-large">'+
										newContributor.name+
									'</span>'+
									'<a href="'+links+'" class="btn"><i class="fa fa-chevron-circle-right"></i></a>'+
								'</td>'+
								'<td>'+
									'<a href="javascript:;" class="disconnectBtnContributor btn btn-xs btn-red tooltips " data-placement="left"  data-type="';
									if (newContributor.type="citoyen"){
										contributorLine += "citoyens";
									} else{
										contributorLine += "organizations";
									} 
									contributorLine+= '" data-id="'+itemId+'" data-name="'+newContributor.name+'" data-placement="top" data-original-title="Remove this organization" ><i class=" disconnectBtnIcon fa fa-unlink"></i>'+
									'</a>'+
								'</td>'+
							'</tr>';
        console.log(contributorLine);
        $("#tContributor").append(contributorLine);
        bindBtnContributor();
    	}

	
	
	function bindBtnContributor(){

		$(".disconnectBtnContributor").off().on("click",function () {
	        //$(".disconnectBtnIcon").removeClass("fa-unlink").addClass("fa-spinner fa-spin");
	        var idContributor = $(this).data("id");
	        var typeContributor = $(this).data("type");
	        console.log(typeContributor);
	        bootbox.confirm("Are you sure you want to remove <span class='text-red'>"+$(this).data("name")+"</span> from your contributors ?", 
				function(result) {
					if (result) {
						$.ajax({
					        type: "POST",
					        url: baseUrl+"/"+moduleId+"/link/removecontributor/contributorId/"+idContributor+"/contributorType/"+typeContributor+"/projectId/<?php echo (string)$project["_id"]; ?>",
					       	dataType: "json",
				        	success: function(data){
					        	if ( data && data.result ) {               
						       	 	toastr.info("LINK DIVORCED SUCCESFULLY!!");
						        	$("#contributor"+idContributor).remove();
						        } else {
						           toastr.info("something went wrong!! please try again.");
						           $(".disconnectBtnIcon").removeClass("fa-spinner fa-spin").addClass("fa-unlink");
						        }
						    }
						});
					}
				}
			)
		});
	}

</script>
