<?php 
	$cs = Yii::app()->getClientScript();
	$cs->registerCssFile(Yii::app()->theme->baseUrl. '/assets/plugins/wysihtml5/bootstrap-wysihtml5-0.0.2/bootstrap-wysihtml5-0.0.2.css');
	$cs->registerCssFile(Yii::app()->theme->baseUrl. '/assets/plugins/wysihtml5/bootstrap-wysihtml5-0.0.2/wysiwyg-color.css');
	$cs->registerCssFile(Yii::app()->theme->baseUrl. '/assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css');
	$cs->registerCssFile(Yii::app()->theme->baseUrl. '/assets/plugins/x-editable/css/bootstrap-editable.css');

	//X-editable...
	$cs->registerScriptFile(Yii::app()->theme->baseUrl. '/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js' , CClientScript::POS_END, array(), 2);
	$cs->registerScriptFile(Yii::app()->theme->baseUrl. '/assets/plugins/x-editable/js/bootstrap-editable.js' , CClientScript::POS_END, array(), 2);

	$cs->registerScriptFile(Yii::app()->theme->baseUrl. '/assets/plugins/wysihtml5/bootstrap-wysihtml5-0.0.2/wysihtml5-0.3.0.min.js' , CClientScript::POS_END, array(), 2);
	$cs->registerScriptFile(Yii::app()->theme->baseUrl. '/assets/plugins/wysihtml5/bootstrap-wysihtml5-0.0.2/bootstrap-wysihtml5.js' , CClientScript::POS_END, array(), 2);
	$cs->registerScriptFile(Yii::app()->theme->baseUrl. '/assets/plugins/wysihtml5/wysihtml5.js' , CClientScript::POS_END, array(), 2);
	
	//Data helper
	$cs->registerScriptFile($this->module->assetsUrl. '/js/dataHelpers.js' , CClientScript::POS_END, array(), 2);
	//X-Editable postal Code
	$cs->registerScriptFile($this->module->assetsUrl. '/js/postalCode.js' , CClientScript::POS_END, array(), 2);
?>

<style type="text/css">
	.selectEv{
		min-width: 200px;
	}
</style>
<div class="panel panel-white" id="globProchEvent">
	<div class="panel-heading border-light">
		<h4 class="panel-title text-left ficheInfoTitle">
			<a href="#" id="type" data-type="select" data-title="Type" data-emptytext="Type" class="editable editable-click required">
			</a>
			<span> - </span>
			<a href="#" id="name" data-type="text" data-title="Event name" data-emptytext="Event name" class="editable-event editable editable-click" >
				<?php if(isset($event["name"])) echo $event["name"];?>
			</a>
		</h4>
		<div class="navigator padding-0 text-right">
			<div class="panel-tools">
			<?php 
				$edit = false;
				if(isset(Yii::app()->session["userId"]) && isset($type) && isset($itemId))
					$edit = Authorisation::canEditItem(Yii::app()->session["userId"], $type, $itemId);
				if($edit){
			?>
				<a href="#" id="editEventDetail" class="btn btn-xs btn-light-blue tooltips" data-toggle="tooltip" data-placement="top" title="Editer l'événement" alt=""><i class="fa fa-pencil"></i></a>
				<a href="#" id="removeEvent" class="btn btn-xs btn-light-red tooltips removeEventBtn" data-toggle="tooltip" data-placement="top" title="Delete this event" alt=""><i class="fa fa-times"></i></a>
        		<?php } ?>
			</div>
		</div>
	</div>
	<div class="panel-body no-padding">
		<div class="col-sm-12 no-padding">
			<div class="item" id="imgAdherent">
				<?php 
					$this->renderPartial('../pod/fileupload', array("itemId" => $itemId,
																		  "type" => $type,
																		  "contentId" =>Document::IMG_PROFIL,
																		  "show" => "true" ,
																		  "resize" => false,
																		  "editMode" => $edit )); ?>
			</div>
		</div>
		<div class="col-sm-12 sectionBlockAdherent" id="infoEvent">
			<div class="row" >
				<div class="col-sm-1"><i class="fa fa-clock-o"></i></div>
				<div class="col-sm-11">
					<div class="col-xs-12 no-padding">
						<span>Toute la journée : </span><a href="#" id="allDay" data-type="select" data-emptytext="Toute la journée ?" class="editable editable-click" ></a>
					</div>
					<div class="col-md-6 col-xs-12 no-padding">
						<span>Du </span><a href="#" id="startDate" data-emptytext="Enter Start Date" class="editable editable-click" ></a>
					</div>
					<div class="col-md-6 col-xs-12 no-padding">
						<span>Au </span><a href="#" id="endDate" data-emptytext="Enter End Date" class="editable editable-click"></a> 
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-1"><i class="fa fa-users"></i></div>
				<div class="col-sm-11">
					Organisateur : <a href="<?php echo Yii::app()->createUrl("/".$this->module->id.'/'.$organizer["type"].'/dashboard/id/'.$organizer["id"]);?>" ><?php echo $organizer["name"]; ?></a>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-1"><i class="fa fa-map-marker"></i></div>
				<div class="col-sm-11">
					<a href="#" id="streetAddress" data-type="text" data-title="Street Address" data-emptytext="Address" class="editable-event editable editable-click">
						<?php echo (isset( $event["address"]["streetAddress"])) ? $event["address"]["streetAddress"] : null; ?>
					</a>
					<br>
					<a href="#" id="address" data-type="postalCode" data-title="Postal Code" data-emptytext="Postal Code" class="editable editable-click" data-placement="bottom">
					</a>
					<br>
					<a href="#" id="addressCountry" data-type="select" data-title="Country" data-emptytext="Country" data-original-title="" class="editable editable-click">					
					</a>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
            <hr/>
            <h4 class="panel-title text-left">Description</h4>
        </div>
		<div class="col-sm-12 hidden-xs padding-10">
			<a href="#" id="description" data-title="Description" data-type="wysihtml5" data-emptytext="Description" class="editable editable-click">
			</a>
		</div>
	</div>
</div>

<script type="text/javascript">
	var itemId = "<?php echo $itemId ?>";
	var typeEvents = <?php echo json_encode($eventTypes) ?>;
	var event = <?php echo json_encode($event) ?>;
	var countries = <?php echo json_encode($countries) ?>;
	//By default : view mode
	var mode = "view";
	var allDay = '<?php echo (isset($event["allDay"])) ? $event["allDay"] : "false"; ?>'
	var startDate = '<?php echo $event["startDate"]; ?>';
	var endDate = '<?php echo $event["endDate"]; ?>';
	
	jQuery(document).ready(function() {
		$("#editEventDetail").on("click", function(){
			switchMode();
		})

		activateEditable();
		manageModeContext();

		$(".removeEventBtn").off().on("click", function(e){
			bootbox.confirm("Are you sure you want to delete this event ?", function(result) {
				if (!result) {
					return;
				}
				$.ajax({
					type: "POST",
					url: baseUrl+"/"+moduleId+"/event/delete/eventId/"+itemId,
					dataType: "json",
					success: function(data){
						if ( data && data.result ) {               
							toastr.info(data.msg);
							document.location.href= baseUrl+"/"+moduleId+"/person";
						}else{
							toastr.error("Something went wrong");
						}
					}
				})
			})
		})
	})

	function activateEditable() {
		$.fn.editable.defaults.mode = 'inline';

		$('.editable-event').editable({
			url: baseUrl+"/"+moduleId+"/event/updatefield",
			onblur: 'submit',
			mode: "popup",
			success : function(data) {
		        if(data.result) 
		        	toastr.success(data.msg);
		        else
		        	return (data.msg);
		    },
			showbuttons: false
		});

		//Type Event
		$('#type').editable({
			url: baseUrl+"/"+moduleId+"/event/updatefield", 
			value: '<?php echo (isset($event["type"])) ? $event["type"] : ""; ?>',
			source: function() {
				return typeEvents;
			},
			success : function(data) {
		        if(data.result) 
		        	toastr.success(data.msg);
		        else {
					return (data.msg);
			    }  
		    }
		});
		
		$('#allDay').editable({
			url: baseUrl+"/"+moduleId+"/event/updatefield", 
			mode: "popup",
			value: allDay,
			source:[{value: "true", text: "Oui"}, {value: "false", text: "Non"}],
			success : function(data, newValue) {
		        if(data.result) {
		        	manageAllDayEvent(newValue);
		        	toastr.success(data.msg);
		        }
		        else
		        	return data.msg;  
		    },
		});
		manageAllDayEvent(allDay);

		$('#address').editable({
			url: baseUrl+"/"+moduleId+"/event/updatefield",
			mode: 'popup',
			success: function(response, newValue) {
				if(debug)console.log("success update postal Code",newValue);
			},
			value : {
            	postalCode: '<?php echo (isset( $event["address"]["postalCode"])) ? $event["address"]["postalCode"] : null; ?>',
            	codeInsee: '<?php echo (isset( $event["address"]["codeInsee"])) ? $event["address"]["codeInsee"] : ""; ?>',
            	addressLocality : '<?php echo (isset( $event["address"]["addressLocality"])) ? $event["address"]["addressLocality"] : ""; ?>'
        	}
		});

		$('#addressCountry').editable({
			url: baseUrl+"/"+moduleId+"/event/updatefield", 
			value: '<?php echo (isset( $event["address"]["addressCountry"])) ? $event["address"]["addressCountry"] : ""; ?>',
			source: function() {
				return countries;
			},
			success : function(data) {
		        if(data.result) 
		        	toastr.success(data.msg);
		        else
		        	toastr.error(data.msg);  
		    },
		});

		$('#description').editable({
			url: baseUrl+"/"+moduleId+"/event/updatefield", 
			value: <?php echo (isset($event["description"])) ? json_encode($event["description"]) : "''"; ?>,
			placement: 'top',
			mode: 'popup',
			wysihtml5: {
				html: true,
				video: false,
				image: false
			},
			success : function(data) {
		        if(data.result) 
		        	toastr.success(data.msg);
		        else
		        	toastr.error(data.msg);  
		    },
		});
	}

	function switchMode() {
		if(mode == "view"){
			mode = "update";
			manageModeContext();
		}else{
			mode ="view";
			manageModeContext();
		}
	}

	function manageModeContext() {
		if (mode == "view") {
			$('.editable-event').editable('toggleDisabled');
			$('#type').editable('toggleDisabled');
			$('#allDay').editable('toggleDisabled');
			$('#startDate').editable('toggleDisabled');
			$('#endDate').editable('toggleDisabled');
			$('#addressCountry').editable('toggleDisabled');
			$('#address').editable('toggleDisabled');
			$('#description').editable('toggleDisabled');
		} else if (mode == "update") {
			// Add a pk to make the update process available on X-Editable
			$('.editable-event').editable('option', 'pk', itemId);
			$('#type').editable('option', 'pk', itemId);
			$('#allDay').editable('option', 'pk', itemId);
			$('#startDate').editable('option', 'pk', itemId);
			$('#endDate').editable('option', 'pk', itemId);
			$('#addressCountry').editable('option', 'pk', itemId);
			$('#address').editable('option', 'pk', itemId);
			$('#description').editable('option', 'pk', itemId);
			
			$('.editable-event').editable('toggleDisabled');
			$('#type').editable('toggleDisabled');
			$('#allDay').editable('toggleDisabled');
			$('#startDate').editable('toggleDisabled');
			$('#endDate').editable('toggleDisabled');
			$('#addressCountry').editable('toggleDisabled');
			$('#address').editable('toggleDisabled');
			$('#description').editable('toggleDisabled');
		}
	}

	function manageAllDayEvent(isAllDay) {
		console.warn("Manage all day event ", isAllDay);

		$('#startDate').editable('destroy');
		$('#endDate').editable('destroy');
		if (isAllDay == 'true') {
			$('#startDate').editable({
				url: baseUrl+"/"+moduleId+"/event/updatefield", 
				pk: itemId,
				type: "date",
				mode: "popup",
				placement: "bottom",
				format: 'yyyy-mm-dd',
				viewformat: 'dd/mm/yyyy',
				datepicker: {
					weekStart: 1,
				},
				success : function(data) {
					if(data.result) 
						toastr.success(data.msg);
					else 
						return data.msg;
			    }
			});

			$('#endDate').editable({
				url: baseUrl+"/"+moduleId+"/event/updatefield", 
				pk: itemId,
				type: "date",
				mode: "popup",
				placement: "bottom",
				format: 'yyyy-mm-dd',   
	        	viewformat: 'dd/mm/yyyy',
	        	datepicker: {
	                weekStart: 1,
	           },
	           success : function(data) {
			        if(data.result) 
			        	toastr.success(data.msg);
			        else 
						return data.msg;
			    }
	        });

			formatDate = "YYYY-MM-DD";
		} else {
			$('#startDate').editable({
				url: baseUrl+"/"+moduleId+"/event/updatefield", 
				pk: itemId,
				type: "datetime",
				mode: "popup",
				placement: "bottom",
				format: 'yyyy-mm-dd hh:ii',
				viewformat: 'dd/mm/yyyy hh:ii',
				datetimepicker: {
					weekStart: 1,
					minuteStep: 30
				   },
				success : function(data) {
					if(data.result) 
						toastr.success(data.msg);
					else 
						return data.msg;
			    }
			});

		$('#endDate').editable({
				url: baseUrl+"/"+moduleId+"/event/updatefield", 
				pk: itemId,
				mode: "popup",
				type: "datetime",
				placement: "bottom",
				format: 'yyyy-mm-dd hh:ii',
	        	viewformat: 'dd/mm/yyyy hh:ii',
	        	datetimepicker: {
	                weekStart: 1,
	                minuteStep: 30
	           },
	           success : function(data) {
			        if(data.result) 
			        	toastr.success(data.msg);
			        else 
						return data.msg;
			    }
	        });

			formatDate = "YYYY-MM-DD HH:mm";
		}

		$('#startDate').editable('setValue', moment(startDate, "YYYY-MM-DD HH:mm").format(formatDate), true);
		$('#endDate').editable('setValue', moment(endDate, "YYYY-MM-DD HH:mm").format(formatDate), true);
	}

</script>