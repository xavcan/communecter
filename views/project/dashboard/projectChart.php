<?php 
$cssAnsScriptFilesModule = array(
	'/assets/plugins/Chart.js/Chart.min.js',
);
HtmlHelper::registerCssAndScriptsFiles($cssAnsScriptFilesModule);
?>

<style>
#myChart {
	padding: 10px 10px 10px 10px;
}

</style>

<div class="panel panel-white">
	<div class="panel-heading border-light">
		<h4 class="panel-title"><span><i class="fa fa-puzzle-piece fa-2x text-blue"></i> CHART</span></h4>
		<div class="panel-tools">
			<div class="dropdown">
				<?php if ($admin){ ?>
				<a href="#editProjectChart" id="" class="edit-chart btn btn-xs btn-light-blue tooltips" data-toggle="tooltip" data-placement="top" title="" alt="" data-original-title="Editer les propriétés"><i class="fa fa-pencil"></i>
				</a>
				<?php } ?>
				<a class="btn btn-xs dropdown-toggle btn-transparent-grey" data-toggle="dropdown">
					<i class="fa fa-cog"></i>
				</a>
			</div>
			<a href="#" class="btn btn-xs btn-link panel-close">
				<i class="fa fa-times"></i>
			</a>
		</div>
	</div>
	<?php if(isset($properties) && !empty($properties)){ ?>
	<div class="panel-body no-padding">
		<canvas id="myChart" width="" height=""></canvas>
	</div>
	<?php } else { ?>
		<div id="infoPodChart" class="padding-10">
					<blockquote> 
					Create Chart
						<br>Opening 
						<br>Values
						<br>Governance
						<br>To explain the aim and draw project conduct
			</blockquote>
		</div>
		<div class="panel-body no-padding contentChart hide">
			<canvas id="myChart" width="" height=""></canvas>
		</div>
	<?php } ?>
</div>
<?php
   $this->renderPartial('addChartSV', array( "properties" => $properties, "itemId" => $itemId));
?>
<script type="text/javascript">
var properties=<?php echo json_encode($properties); ?> ;
var countProperties=numAttrs(properties);
jQuery(document).ready(function() {
	if (countProperties > 0){
		chartInit(properties);
	}
});

function updateChart(data, nbProperties){
	newCount=0;
	if (nbProperties==0){
		$("#infoPodChart").hide();
		$(".contentChart").removeClass("hide");
		chartInit(data);
	}
	else{
		for (var i=0; i < countProperties; i++ ){
			myNewChart.removeData();
		}
		chartInit(data);
		/*for (var lab in data){
			//alert(lab+":"+data[lab]);
			//myNewChart.addData([data[lab]], lab);
			newCount++;
		}
		countProperties=newCount;*/
	}
}

function chartInit(dataProperties){
	var labelProperties=[];
	var valueProperties=[];
	for (var label in dataProperties){
		labelProperties.push(label);
		valueProperties.push(dataProperties[label]);
	}
	Chart.defaults.global = {
		// Boolean - Whether to animate the chart
		animation: true,
	    // Number - Number of animation steps
	    animationSteps: 60,
	    // String - Animation easing effect
	    animationEasing: "easeOutQuart",
	    // Boolean - If we should show the scale at all
	    showScale: true,
	    // Boolean - If we want to override with a hard coded scale
	    scaleOverride: false,
	    // ** Required if scaleOverride is true **
	    // Number - The number of steps in a hard coded scale
	    scaleSteps: null,
	    // Number - The value jump in the hard coded scale
	    scaleStepWidth: null,
	    // Number - The scale starting value
	    scaleStartValue: null,
	    // String - Colour of the scale line
	    scaleLineColor: "rgba(0,0,0,.1)",
	    // Number - Pixel width of the scale line
	    scaleLineWidth: 1,
	    // Boolean - Whether to show labels on the scale
	    scaleShowLabels: true,
	    // Interpolated JS string - can access value
	    scaleLabel: "<%=value%>",
	    // Boolean - Whether the scale should stick to integers, not floats even if drawing space is there
	    scaleIntegersOnly: true,
	    // Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
	    scaleBeginAtZero: false,
	    // String - Scale label font declaration for the scale label
	    scaleFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
	    // Number - Scale label font size in pixels
	    scaleFontSize: 18,
	    // String - Scale label font weight style
	    scaleFontStyle: "normal",
	    // String - Scale label font colour
	    scaleFontColor: "#666",
	    // Boolean - whether or not the chart should be responsive and resize when the browser does.
	    responsive: true,
	    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
	    maintainAspectRatio: true,
	    // Boolean - Determines whether to draw tooltips on the canvas or not
	    showTooltips: true,
	    // Function - Determines whether to execute the customTooltips function instead of drawing the built in tooltips (See [Advanced - External Tooltips](#advanced-usage-custom-tooltips))
	    customTooltips: false,
	    // Array - Array of string names to attach tooltip events
	    tooltipEvents: ["mousemove", "touchstart", "touchmove"],
	    // String - Tooltip background colour
	    tooltipFillColor: "rgba(0,0,0,0.8)",
	    // String - Tooltip label font declaration for the scale label
	    tooltipFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
	    // Number - Tooltip label font size in pixels
	    tooltipFontSize: 14,
	    // String - Tooltip font weight style
	    tooltipFontStyle: "normal",
	    // String - Tooltip label font colour
	    tooltipFontColor: "#fff",
	    // String - Tooltip title font declaration for the scale label
	    tooltipTitleFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
	    // Number - Tooltip title font size in pixels
	    tooltipTitleFontSize: 14,
	    // String - Tooltip title font weight style
	    tooltipTitleFontStyle: "bold",
	    // String - Tooltip title font colour
	    tooltipTitleFontColor: "#fff",
	    // Number - pixel width of padding around tooltip text
	    tooltipYPadding: 6,
	    // Number - pixel width of padding around tooltip text
	    tooltipXPadding: 6,
	    // Number - Size of the caret on the tooltip
	    tooltipCaretSize: 8,
	    // Number - Pixel radius of the tooltip border
	    tooltipCornerRadius: 6,
	    // Number - Pixel offset from point x to tooltip edge
	    tooltipXOffset: 10,
	    // String - Template string for single tooltips
	    tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
	    // String - Template string for multiple tooltips
	    multiTooltipTemplate: "<%= value %>",
	    // Function - Will fire on animation progression.
	    onAnimationProgress: function(){},
	    // Function - Will fire on animation completion.
	    onAnimationComplete: function(){}
}
var data = {
    labels : labelProperties,
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointDot : false,
            pointHighlightStroke: "rgba(220,220,220,1)",
			data : valueProperties
        },
    ]
};

var options;
var ctx = $("#myChart").get(0).getContext("2d");
// This will get the first returned node in the jQuery collection.
myNewChart = new Chart(ctx).Radar(data, options);
}

function numAttrs(obj) {
  var count = 0;
  for(var key in obj) {
    if (obj.hasOwnProperty(key)) {
      ++count;
    }
  }
  return count;
}
</script>