<div class="panel panel-white">
	<div class="panel-heading border-light">
		<h4 class="panel-title"><i class="fa fa-calendar fa-2x text-red"></i> Mes événements</h4>
	</div>
	<div class="panel-tools">
		<?php if((isset($userId) && isset(Yii::app()->session["userId"]) && $userId == Yii::app()->session["userId"])  || (isset($organizationId) && isset(Yii::app()->session["userId"]) && Authorisation::isOrganizationAdmin(Yii::app()->session["userId"], $organizationId))) { ?>
		<a href="#newEvent" class="init-event btn btn-xs btn-light-blue tooltips" data-toggle="tooltip" data-placement="top" title="Add an Event" alt="Add an Event"><i class="fa fa-plus"></i> </a>
		<?php } ?>
	</div>
	<div class="panel-body no-padding">
		<div class="panel-scroll height-230 ps-container">
			<table class="table table-striped table-hover" id="events">
				<tbody>
					<?php
					if(isset($events) && count($events)>0 ){ 
					foreach ($events as $e) 
					{
					?>
					<tr id="<?php echo Event::COLLECTION.(string)$e["_id"];?>">
						<td class="center">
							<a href="<?php echo Yii::app()->createUrl('/'.$this->module->id.'/event/dashboard/id/'.$e["_id"]);?>" class="text-dark">
							<?php if ($e && isset($e["imagePath"])){ ?>
								<img width="50" height="50" alt="image" class="img-circle" src="<?php echo Yii::app()->createUrl('/'.$this->module->id.'/document/resized/50x50'.$e['imagePath']) ?>">
							<?php } else { ?>
								<i class="fa fa-calendar fa-2x"></i>
							<?php } ?>
						</td>
						<td>
							<a href="<?php echo Yii::app()->createUrl('/'.$this->module->id.'/event/dashboard/id/'.$e["_id"]);?>" class="text-dark">
								<?php if(isset($e["name"]))echo $e["name"]?>
							</a>
						</td>
						<td><?php if(isset($e["type"]))echo $e["type"]?></td>
						<td class="center">
							<div class="visible-md visible-lg hidden-sm hidden-xs">
								<?php if(isset(Yii::app()->session["userId"]) && Authorisation::isEventAdmin((string)$e["_id"], Yii::app()->session["userId"])) { ?>
								<a href="javascript:;" class="disconnectBtn btn btn-xs btn-red tooltips " data-type="<?php echo PHType::TYPE_EVENTS ?>" data-id="<?php echo (string)$e["_id"];?>" data-name="<?php echo (string)$e["name"];?>" data-placement="left" data-original-title="Unlink event" ><i class=" disconnectBtnIcon fa fa-unlink"></i></a>
								<?php }; ?>
							</div>
						</td>
					</tr>
					<?php
						};}
					?>
				</tbody>
			</table>
			<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 0px; display: none;"><div class="ps-scrollbar-x" style="left: -10px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 230px; display: inherit;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div>
		<?php if(isset($events) && count($events) == 0 ) { ?>
			<div id="infoEventPod" class="padding-10" >
				<blockquote> 
					Create and Attend 
					<br/>Local Events
					<br>build up local activity 
					<br>help local culture
					<br>create movement
				</blockquote>
			</div>
		<?php } ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	
	jQuery(document).ready(function() {	 

		var itemId = contextMap["_id"]["$id"];
		$('.init-event').off().on("click", function(){
			$.subview({
				content : "#ajaxSV",
				onShow : function() {
					var url = "";
					if("undefined" != typeof organization){
						url = baseUrl+"/"+moduleId+"/event/eventsv/id/"+itemId+"/type/<?php echo Organization::COLLECTION ?>";
					}else{
						url = baseUrl+"/"+moduleId+"/event/eventsv/id/"+itemId+"/type/<?php echo Person::COLLECTION ?>";
					}
					getAjax("#ajaxSV", url, function(){bindEventSubViewEvents(); $(".new-event").trigger("click");}, "html");
				},
				onSave : function() {
					$('.form-event').submit();
				},
				onHide : function() {
					$.hideSubview();
				}
			});
			
		})
	})

	function updateMyEvents(nEvent) {
		if('undefined' != typeof contextMap){
			contextMap["events"].push(nEvent);
		}
		var image = "<i class='fa fa-calendar fa-2x'></i>";
		if('undefined' != typeof(nEvent["imagePath"]))
			image = "<img src='"+nEvent["imagePath"]+"' width='50' height='50' alt='image' class='img-circle'/>";
		var htmlEvent = "<tr id='"+nEvent['_id']['$id']+"'>" +
							"<td class='center'>" +
								"<a href='"+baseUrl+"/"+moduleId+"/event/dashboard/id/"+nEvent['_id']['$id']+"' class='text-dark'>" +
								 	image +
								 "</a>" +
							"</td>" +
							"<td>" +
								"<a href='"+baseUrl+"/"+moduleId+"/event/dashboard/id/"+nEvent['_id']['$id']+"' class='text-dark'>" + 
									nEvent["name"] +
								"</a>" +
							"</td>" +
							"<td>" +
								nEvent["type"] +
							"</td>" +
							"<td class='center'>" +
								"<div class='visible-md visible-lg hidden-sm hidden-xs'>" +
									"<a href='#'' class='btn btn-xs btn-red tooltips delBtn' data-id='"+nEvent['_id']['$id']+"'' data-name='"+nEvent["name"]+"'' data-placement='left' data-original-title='Remove'><i class='fa fa-times fa fa-white'></i></a>"+
								"</div>" +
							"</td>" +
						"</tr>";
		$("#events").append(htmlEvent);
		$('.tooltips').tooltip();
		$('#infoEventPod').hide();
	}
</script>