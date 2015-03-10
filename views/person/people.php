<div id="panel_people" class="tab-pane fade">
	
	
		<div class="row">
			<div class="col-md-12 padding-20 ">
				<a href="javascript:;" onclick="openSubView('Invite Someone', '/communecter/person/invite',null)" class="btn btn-xs btn-light-blue tooltips pull-right" data-placement="top" data-original-title="Edit"><i class="fa fa-plus"></i> Invite Someone</a>
				
			</div>	
		</div>
	
	People I follow or I know 
	<table class="table table-striped table-bordered table-hover" id="people">
		<thead>
			<tr>
				<th>Name</th>
				<th class="hidden-xs">Type</th>
				<th class="hidden-xs center">Tags</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			if(!empty($people))
			{
				foreach ($people as $e) 
				{
				?>
				<tr id="<?php echo PHType::TYPE_CITOYEN.(string)$e["_id"];?>">
					<td><?php if(isset($e["name"]))echo $e["name"]?></td>
					<td><?php if(isset($e["type"]))echo $e["type"]?></td>
					<td><?php if(isset($e["tags"]))echo implode(",", $e["tags"])?></td>
					<td class="center">
						<div class="visible-md visible-lg hidden-sm hidden-xs">
							<a href="<?php echo Yii::app()->createUrl('/'.$this->module->id.'/person/edit/id/'.$e["_id"]);?>" class="btn btn-light-blue tooltips " data-placement="top" data-original-title="Edit"><i class="fa fa-pencil-square-o"></i></a>
							<a href="<?php echo Yii::app()->createUrl('/'.$this->module->id.'/person/public/id/'.$e["_id"]);?>" class="btn btn-light-blue tooltips " data-placement="top" data-original-title="View"><i class="fa fa-search"></i></a>
							<a href="javascript:;" class="disconnectBtn btn btn-red tooltips " data-type="<?php echo PHType::TYPE_CITOYEN ?>" data-id="<?php echo (string)$e["_id"];?>" data-name="<?php echo (string)$e["name"];?>" data-placement="top" data-original-title="Remove Knows relation" ><i class=" disconnectBtnIcon fa fa-unlink"></i></a>
						</div>
					</td>
				</tr>
				<?php
			}}
			?>
		</tbody>
	</table>
</div>

<!-- end: PAGE CONTENT-->
<script>

jQuery(document).ready(function() {
	$(".disconnectBtn").off().on("click",function () {
        id = $(this).data("id");
        type = $(this).data("type");
        bootbox.confirm("Are you sure you want to delete <span class='text-red'>"+$(this).data("name")+"</span> connection ?", function(result) {
			if(result)
			{
				//console.log( '#people'+id, $('#people'+id ) );
				
		        $(this).children("i").removeClass("fa-unlink").addClass("fa-spinner fa-spin");
				$.ajax({
			        type: "POST",
			        url: baseUrl+"/"+moduleId+"/person/disconnect/id/"+id+"/type/"+type,
			        dataType : "json"
			    })
			    .done(function (data) 
			    {
			        if ( data && data.result ) 
			        {               
			        	toastr.info("I don't know this guy any longer!!");
			        	$('#'+type+id ).css("background-color","#FF3700").fadeOut(400, function(){
				            $('#'+type+id ).remove();
				        });
			        } 
			        else 
			        {
			           toastr.info("something went wrong!! please try again.");
			           $(this).children("i").removeClass("fa-spinner fa-spin").addClass("fa-unlink");
			        }
			    });
			}
		});
	});

});

</script>