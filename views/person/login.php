<?php 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile(Yii::app()->theme->baseUrl. '/assets/plugins/jquery-validation/dist/jquery.validate.min.js' , CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->theme->baseUrl. '/assets/plugins/okvideo/okvideo.min.js' , CClientScript::POS_END);
//Data helper
$cs->registerScriptFile($this->module->assetsUrl. '/js/dataHelpers.js' , CClientScript::POS_END);

	
?>

<div class="pull-right" style="padding:20px;">
	<a href="#" onclick="showHideMenu ()">
		<i class="menuBtn fa fa-bars fa-3x text-white "></i>
	</a>
</div>


<div class="row">
	<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4 center">
	<a class="byPHRight" href="#"><img style="height: 39px;position: absolute;right: -142px;top: 203px;z-index: 2000;" class="pull-right" src="<?php echo $this->module->assetsUrl?>/images/byPH.png"/></a>
		<!-- start: LOGIN BOX -->
		<?php 
		$this->renderPartial('../default/menuTitle');
		$this->renderPartial('../default/panels/what');
		$this->renderPartial('../default/panels/how');
		$this->renderPartial('../default/panels/why');
		$this->renderPartial('../default/panels/where');
		$this->renderPartial('../default/panels/when');
		$this->renderPartial('../default/panels/who');
		$this->renderPartial('../default/panels/events');
		$this->renderPartial('../default/panels/cities');
		$this->renderPartial('../default/panels/orga');
		$this->renderPartial('../default/panels/people');
		$this->renderPartial('../default/panels/involved');
		$this->renderPartial('../default/panels/projects');
		$this->renderPartial('../default/panels/ph');
		$this->renderPartial('../default/panels/communecter');
		?>
		

		<div class="box-login box box-white-round">

			<form class="form-login" action="" method="POST">
				<img style="width:100%" class="pull-right" src="<?php echo $this->module->assetsUrl?>/images/logoL.jpg"/>
				<br/>
				<?php //echo Yii::app()->session["requestedUrl"]." - ".Yii::app()->request->url; ?>
				<fieldset style="padding-left:70px;padding-right:70px;">
					<div class="form-group">
						<span class="input-icon">		
							<input type="text" class="form-control radius-10" name="email" id="email" placeholder="Email" >
							<i class="fa fa-user"></i> </span>
					</div>
					<div class="form-group form-actions">
						<span class="input-icon">
							<input type="password" class="form-control password"  name="password" id="password" placeholder="Password">
							<i class="fa fa-lock"></i>
							<a class="forgot" href="#">
								I forgot my password
							</a> </span>
					</div>
					<div class="form-actions">
						<div class="errorHandler alert alert-danger no-display">
							<i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
						</div>
						<div class="errorHandler alert alert-danger no-display loginResult">
							<i class="fa fa-remove-sign"></i> Please verify your entries.
						</div>
						<div class="errorHandler alert alert-danger no-display notValidatedEmailResult">
							<i class="fa fa-remove-sign"></i> Your account is not validated : please check your mailbox to validate your email address.
							      If you didn't receive it or lost it, click
							      <a class="validate" href="#">here</a> to receive it again.
						</div>
						<div class="errorHandler alert alert-success no-display emailValidated">
							<i class="fa fa-check"></i> Your account is now validated ! Please try to login.
						</div>
						<label for="remember" class="checkbox-inline">
							<input type="checkbox" class="grey remember" id="remember" name="remember">
							Keep me signed in
						</label>
						<button type="submit"  data-size="s" data-style="expand-right" style="background-color:#E33551" class="loginBtn ladda-button pull-right">
							<span class="ladda-label">Login</span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
						</button>
					</div>
					<div class="new-account">
						Don't have an account yet?
						<a href="#" class="register">
							Create an account
						</a>
					</div>
				</fieldset>
			</form>
		</div>
		<!-- end: LOGIN BOX -->
		<!-- start: FORGOT BOX -->
		<div class="box-email box box-white-round">
			<form class="form-email">
				<img style="width:100%" class="pull-right" src="<?php echo $this->module->assetsUrl?>/images/logoL.jpg"/>
				<br/>
				<fieldset style="padding-left:70px;padding-right:70px;">
					<div class="form-group">
						<span class="input-icon">
							<input type="email" class="form-control" id="email2" placeholder="Email">
							<i class="fa fa-envelope"></i> </span>
					</div>
					<div class="form-actions">
						<div class="errorHandler alert alert-danger no-display">
							<i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
						</div>
						<a class="btn btn-light-grey go-back">
							<i class="fa fa-chevron-circle-left"></i> Log-In
						</a>
						<button type="submit"  data-size="s" data-style="expand-right" style="background-color:#E33551" class="forgotBtn ladda-button pull-right">
							<span class="ladda-label">Submit</span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
						</button>
					</div>
				</fieldset>
			</form>
		</div>
		<!-- end: FORGOT BOX -->
		<!-- start: REGISTER BOX -->
		<div class="box-register box box-white-round">
			
			<form class="form-register">
				<img style="width:100%" class="pull-right" src="<?php echo $this->module->assetsUrl?>/images/logoL.jpg"/>
				<br/>
				
				<fieldset style="padding-left:70px;padding-right:70px;">
					<div class="form-group">
						<span class="input-icon">
							<input type="text" class="form-control" id="name" name="name" placeholder="Prénom Nom : John Doe">
							<i class="fa fa-user"></i> </span>
					</div>
					<div class="form-group">
						<span class="input-icon">
							<input type="email" class="form-control" id="email3" name="email3" placeholder="Email">
							<i class="fa fa-envelope"></i> </span>
					</div>
					<div class="form-group">
						<span class="input-icon">
							<input type="password" class="form-control" id="password3" name="password3" placeholder="Password">
							<i class="fa fa-lock"></i> </span>
					</div>
					<div class="form-group">
						<span class="input-icon">
							<input type="password" class="form-control" id="passwordAgain" name="passwordAgain" placeholder="Password again">
							<i class="fa fa-lock"></i> </span>
					</div>
					<div class="form-group">
						<span class="input-icon">
							<input type="text" class="form-control" id="cp" name="cp" placeholder="Postal Code">
							<i class="fa fa-home"></i></span>
					</div>
					<div class="form-group" id="cityDiv" style="display: none;">
						<span class="input-icon">
							<select class="selectpicker form-control" id="city" name="city" title='Select your City...'>
							</select>
						</span>
								
					</div>
					<div class="form-group">
						<div>
							<label for="agree" class="checkbox-inline">
								<input type="checkbox" class="grey agree" id="agree" name="agree">
								I agree to the Terms of <a href="#" class="bootbox-spp">Service and Privacy Policy</a>
							</label>
						</div>
					</div>

					<div class="form-actions">
						<div class="errorHandler alert alert-danger no-display registerResult">
							<i class="fa fa-remove-sign"></i> Please verify your entries.
						</div>
						Already have an account?
						<a href="#" class="go-back">
							Log-in
						</a>
						<button type="submit"  data-size="s" data-style="expand-right" style="background-color:#E33551" class="createBtn ladda-button pull-right">
							<span class="ladda-label">Submit</span><span class="ladda-spinner"></span><span class="ladda-spinner"></span>
						</button>
					</div>
				</fieldset>
			</form>
			<!-- end: COPYRIGHT -->
		</div>
		<!-- end: REGISTER BOX -->
	</div>
	<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2  center">
		<h1 class="panelTitle text-extra-large text-bold" style="display:none"></h1>
		<div class="box-ajax box box-white-round">
			<form class="form-login ajaxForm" style="display:none" action="" method="POST"></form>
		</div>
	</div>
</div>


<div class="eventMarker" style="z-index:1;display:none;position:absolute; top:500px; left:100px;cursor:pointer;" >
	<img src="<?php echo $this->module->assetsUrl?>/images/sig/markers/event.png" style="width:72px;" />
	<span class="homestead eventMarkerlabel" style="display:none;color:white;font-size:25px">EVENTS</span>
</div>
<div class="cityMarker" style="z-index:1;display:none;position:absolute; top:350px; right:100px;cursor:pointer;" >
	<span class="homestead cityMarkerlabel" style="display:none;color:white;font-size:25px">CITIES</span>
	<img src="<?php echo $this->module->assetsUrl?>/images/sig/markers/mairie.png" style="width:72px;" />
</div>
<div class="projectMarker" style="z-index:1;display:none;position:absolute; top:620px; left:240px;cursor:pointer;" >
	<img src="<?php echo $this->module->assetsUrl?>/images/sig/markers/project.png" style="width:72px;" />
	<span class="homestead projectMarkerlabel" style="display:none;color:white;font-size:25px">PROJECTS</span>
</div>
<div class="assoMarker" style="z-index:1;display:none;position:absolute; top:750px; right:750px; cursor:pointer;" >
	<span class="homestead assoMarkerlabel" style="display:none;color:white;font-size:25px">ORGANIZATIONS</span>
	<img src="<?php echo $this->module->assetsUrl?>/images/sig/markers/asso.png" style="width:72px;" />
</div>
<div class="userMarker" style="z-index:1;display:none;position:absolute; top:600px; right:200px;cursor:pointer;" >
	<span class="homestead userMarkerlabel" style="display:none;color:white;font-size:25px">PEOPLE</span>
	<img src="<?php echo $this->module->assetsUrl?>/images/sig/markers/user.png" style="width:72px;" />
</div>
<div class="connectMarker text-white" style="z-index:1;display:none;position:absolute; top:25px; left:25px;cursor:pointer;" >
	<i class="fa fa-sign-in fa-2x"></i> 
	<span class="homestead connectlabel" style="display:none;color:white;font-size:25px"> CONNECT</span>
</div>

<img class="partnerLogosLeft" src="<?php echo $this->module->assetsUrl?>/images/partners/Logo_Bis-01.png" style="width:90px;position:absolute; top:500px; left:400px;display:none;" />
<img class="partnerLogosLeft" src="<?php echo $this->module->assetsUrl?>/images/partners/logo-cn.png" style="display:none;position:absolute; top:150px; left:150px;" />
<img class="partnerLogosLeft" src="<?php echo $this->module->assetsUrl?>/images/partners/logo_lc.png" style="width:120px;display:none;position:absolute; top:350px; right:100px;cursor:pointer;" />

<img class="partnerLogosRight" src="<?php echo $this->module->assetsUrl?>/images/partners/demosalithia.png" style="display:none;position:absolute; top5:0px; left:50px; cursor:pointer;" />
<img class="partnerLogosRight" src="<?php echo $this->module->assetsUrl?>/images/partners/ggouv.png" style="display:none;position:absolute; top:600px; right:200px;cursor:pointer;" />
<img class="partnerLogosRight" src="<?php echo $this->module->assetsUrl?>/images/partners/SENSORICA.jpg" style="width:120px;display:none;position:absolute; top:150px; right:200px; cursor:pointer;" />

<img class="partnerLogosDown" src="<?php echo $this->module->assetsUrl?>/images/partners/DO.png" style="width:120px;display:none;position:absolute; top:330px; left:100px; cursor:pointer;" />
<img class="partnerLogosDown" src="<?php echo $this->module->assetsUrl?>/images/partners/fab-lab1.png" style="width:80px;display:none;position:absolute; top:610px; left:90px; cursor:pointer;" />
<img class="partnerLogosDown" src="<?php echo $this->module->assetsUrl?>/images/partners/smartCitizen.png" style="display:none;position:absolute; top:750px; right:400px; cursor:pointer;" />

<img class="partnerLogosUp" src="<?php echo $this->module->assetsUrl?>/images/logo_region_reunion.png" style="width:80px;display:none;position:absolute; bottom:20px; left:20px; cursor:pointer;" />
<img class="partnerLogosUp" src="<?php echo $this->module->assetsUrl?>/images/technopole.jpg" style="display:none;position:absolute; bottom:20px; right:20px; cursor:pointer;" />
<img class="partnerLogosUp" src="<?php echo $this->module->assetsUrl?>/images/partners/imaginSocial.jpg" style="display:none; position:absolute; top:600px; right:550px; cursor:pointer;" />

<?php /* ?>

http://habibhadi.com/lab/svgPathAnimation/demo/
http://jonobr1.github.io/two.js/#basic-usage
http://rvlasveld.github.io/blog/2013/07/02/creating-interactive-graphs-with-svg-part-1/

<style type="text/css">
svg.graph {
	position: absolute;
	top:0px;
	left: 0px;
	height: 1000px;
	width: 1000px;
}

svg.graph .line {
  stroke: white;
  stroke-width: 1;
}
</style>

<svg class="graph">
  <circle cx="0" cy="0" stroke="white" fill="white" r="5"></circle>
  <path class="line" d=" M 0 0 L 600 100"></path>
  <path class="line" d=" M 0 0 L 150 150"></path>
  <path class="line" d=" M 0 0 L 330 100"></path>
</svg>
*/?>
<script type="text/javascript">

	jQuery(document).ready(function() {

		Main.init();
		Login.init();	
		titleAnim ();	
		if (email != "") {
			$(".form-login #email").val( email );
		}
		
		if (userValidated) {
			$(".errorHandler").hide();
			$(".emailValidated").show();
			$(".form-login #password").focus();
		}
		$(".eventMarker").show().addClass("animated slideInDown").off().on("click",function() { 
			showPanel('box-event');
		}).on('mouseover',function() { 
			$(".eventMarkerlabel").show();
		}).on('mouseout',function() { 
			$(".eventMarkerlabel").hide();
		});
		$(".cityMarker").show().addClass("animated slideInUp").off().on("click",function() { 
			showPanel('box-city');
		}).on('mouseover',function() { 
			$(".cityMarkerlabel").show();
		}).on('mouseout',function() { 
			$(".cityMarkerlabel").hide();
		});
		$(".projectMarker").show().addClass("animated zoomInRight").off().on("click",function() { 
			showPanel('box-projects');
		}).on('mouseover',function() { 
			$(".projectMarkerlabel").show();
		}).on('mouseout',function() { 
			$(".projectMarkerlabel").hide();
		});
		$(".assoMarker").show().addClass("animated zoomInLeft").off().on("click",function() { 
			showPanel('box-orga');
		}).on('mouseover',function() { 
			$(".assoMarkerlabel").show();
		}).on('mouseout',function() { 
			$(".assoMarkerlabel").hide();
		});
		$(".userMarker").show().addClass("animated zoomInLeft").off().on("click",function() { 
			showPanel('box-people');
		}).on('mouseover',function() { 
			$(".userMarkerlabel").show();
		}).on('mouseout',function() { 
			$(".userMarkerlabel").hide();
		});
		$(".connectMarker").show().addClass("animated zoomInLeft").off().on("click",function() { 
			showPanel('box-login');
		}).on('mouseover',function() { 
			$(".connectlabel").show();
		}).on('mouseout',function() { 
			$(".connectlabel").hide();
		});
		$(".byPHRight").show().addClass("animated zoomInLeft").off().on("click",function() { 
			showPanel('box-ph');
		});
	
	});

var email = '<?php echo @$_GET["email"]; ?>';
var userValidated = '<?php echo @$_GET["userValidated"]; ?>';

var timeout;
var emailType;
var Login = function() {
	"use strict";
	var runBoxToShow = function() {
		var el = $('.box-login');
		if (getParameterByName('box').length) {
			switch(getParameterByName('box')) {
				case "register" :
					el = $('.box-register');
					break;
				case "email" :
					el = $('.box-email');
					break;
				case "validate" :
					el = $('.box-email');
					break;
				default :
					el = $('.box-login');
					break;
			}
		}
		el.show().addClass("animated flipInX").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
			$(this).removeClass("animated flipInX");
		});
	};
	var runLoginButtons = function() {
		$('.forgot').on('click', function() {
			$('.box-login').removeClass("animated flipInX").addClass("animated bounceOutRight").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$(this).hide().removeClass("animated bounceOutRight");

			});
			$('.box-email').show().addClass("animated bounceInLeft").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$(this).show().removeClass("animated bounceInLeft");
			});
			emailType = "password";
			$("#email2").val($("#email").val());
			activePanel = "box-email";
		});
		$('.validate').on('click', function() {
			$('.box-login').removeClass("animated flipInX").addClass("animated bounceOutRight").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$(this).hide().removeClass("animated bounceOutRight");

			});
			$('.box-email').show().addClass("animated bounceInLeft").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$(this).show().removeClass("animated bounceInLeft");
			});
			emailType = "validation";
			$("#email2").val($("#email").val());
			activePanel = "box-email";
		});
		$('.register').on('click', function() {
			$('.box-login').removeClass("animated flipInX").addClass("animated bounceOutRight").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$(this).hide().removeClass("animated bounceOutRight");

			});
			$('.box-register').show().addClass("animated bounceInLeft").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$(this).show().removeClass("animated bounceInLeft");

			});
			activePanel = "box-register";
		});
		$('.go-back').click(function() {
			var boxToShow;
			if ($('.box-register').is(":visible")) {
				boxToShow = $('.box-register');
				activePanel = "box-register";
			} else {
				boxToShow = $('.box-email');
				activePanel = "box-email";
			}
			boxToShow.addClass("animated bounceOutLeft").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				boxToShow.hide().removeClass("animated bounceOutLeft");

			});
			$('.box-login').show().addClass("animated bounceInRight").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$(this).show().removeClass("animated bounceInRight");

			});
		});
	};
	//function to return the querystring parameter with a given name.
	var getParameterByName = function(name) {
		name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
		var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"), results = regex.exec(location.search);
		return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	};
	var runSetDefaultValidation = function() {
		$.validator.setDefaults({
			errorElement : "span", // contain the error msg in a small tag
			errorClass : 'help-block',
			errorPlacement : function(error, element) {// render error placement for each input type
				if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {// for chosen elements, need to insert the error after the chosen container
					error.insertAfter($(element).closest('.form-group').children('div').children().last());
				} else if (element.attr("name") == "card_expiry_mm" || element.attr("name") == "card_expiry_yyyy") {
					error.appendTo($(element).closest('.form-group').children('div'));
				} else {
					error.insertAfter(element);
					// for other inputs, just perform default behavior
				}
			},
			ignore : ':hidden',
			success : function(label, element) {
				label.addClass('help-block valid');
				// mark the current input as valid and display OK icon
				$(element).closest('.form-group').removeClass('has-error');
			},
			highlight : function(element) {
				$(element).closest('.help-block').removeClass('valid');
				// display OK icon
				$(element).closest('.form-group').addClass('has-error');
				// add the Bootstrap error class to the control group
			},
			unhighlight : function(element) {// revert the change done by hightlight
				$(element).closest('.form-group').removeClass('has-error');
				// set error class to the control group
			}
		});
	};
	var runLoginValidator = function() {
		var form = $('.form-login');
		var loginBtn = null;
		Ladda.bind('.loginBtn', {
	        callback: function (instance) {
	            loginBtn = instance;
	        }
	    });
		form.submit(function(e){e.preventDefault() });
		var errorHandler = $('.errorHandler', form);
		
		form.validate({
			rules : {
				email : {
					minlength : 2,
					required : true
				},
				password : {
					minlength : 4,
					required : true
				}
			},
			submitHandler : function(form) {
				errorHandler.hide();
				loginBtn.start();
				var params = { 
				   "email" : $("#email").val(), 
                   "pwd" : $("#password").val()
                };
			      
		    	$.ajax({
		    	  type: "POST",
		    	  url: baseUrl+"/<?php echo $this->module->id?>/person/authenticate",
		    	  data: params,
		    	  success: function(data){
		    		  if(data.result)
		    		  {
		    		  	var url = "<?php echo (isset(Yii::app()->session["requestedUrl"])) ? Yii::app()->session["requestedUrl"] : null; ?>";
		    		  	if(url)
		    		  		window.location.href = url;
		        		else
		        			window.location.reload();
		    		  } else {
		    		  	var msg;
		    		  	if (data.msg == "notValidatedEmail") {
							$('.notValidatedEmailResult').show();
		    		  	} else {
		    		  		msg = data.msg;
		    		  		$('.loginResult').html(msg);
							$('.loginResult').show();
		    		  	}
						loginBtn.stop();
		    		  }
		    	  },
		    	  error: function(data) {
		    	  	toastr.error("Something went really bad : contact your administrator !");
		    	  	loginBtn.stop();
		    	  },
		    	  dataType: "json"
		    	});
			    return false; // required to block normal submit since you used ajax
			},
			invalidHandler : function(event, validator) {//display error alert on form submit
				errorHandler.show();
				loginBtn.stop();
			}
		});
	};
	var runForgotValidator = function() {
		var form2 = $('.form-email');
		var errorHandler2 = $('.errorHandler', form2);
		var forgotBtn = null;
		Ladda.bind('.forgotBtn', {
	        callback: function (instance) {
	            forgotBtn = instance;
	        }
	    });
		form2.validate({
			rules : {
				email2 : {
					required : true
				}
			},
			submitHandler : function(form) {
				errorHandler2.hide();
				forgotBtn.start();
				var params = { 
					"email" : $("#email2").val(),
					"type"	: emailType
				};
		        $.ajax({
		          type: "POST",
		          url: baseUrl+"/<?php echo $this->module->id?>/person/sendemail",
		          data: params,
		          success: function(data){
					if (data.result) {
						alert(data.msg);
			            window.location.reload();
					} else if (data.errId == "UNKNOWN_ACCOUNT_ID") {
						if (confirm(data.msg)) {
							$('.box-email').removeClass("animated flipInX").addClass("animated bounceOutRight").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
								$(this).hide().removeClass("animated bounceOutRight");
							});
							$('.box-register').show().addClass("animated bounceInLeft").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
								$(this).show().removeClass("animated bounceInLeft");

							});
						} else {
							window.location.reload();
						}
					}
		          },
		          error: function(data) {
		    	  	toastr.error("Something went really bad : contact your administrator !");
		    	  },
		          dataType: "json"
		        });
		        return false;
			},
			invalidHandler : function(event, validator) {//display error alert on form submit
				errorHandler2.show();
				forgotBtn.stop();
			}
		});
	};
	var runRegisterValidator = function() {
		var form3 = $('.form-register');
		var errorHandler3 = $('.errorHandler', form3);
		var createBtn = null;
		Ladda.bind('.createBtn', {
	        callback: function (instance) {
	            createBtn = instance;
	        }
	    });
		form3.validate({
			rules : {
				cp : {
					required : true,
					rangelength : [5, 5],
					validPostalCode : true
				},
				city : {
					required : true,
					minlength : 1
				},
				name : {
					required : true
				},
				email3 : {
					required : true,
					email : true
				},
				password3 : {
					minlength : 8,
					required : true
				},
				passwordAgain : {
					equalTo : "#password3"
				},
				agree : {
					minlength : 1,
					required : true
				}
			},
			messages: {
				agree: "You must validate the CGU to sign up.",
			},
			submitHandler : function(form) {
				errorHandler3.hide();
				createBtn.start();
				var params = { 
				   "name" : $("#name").val(),
				   "email" : $("#email3").val(),
                   "pwd" : $("#password3").val(),
                   "cp" : $("#cp").val(),
                   "app" : "<?php echo $this->module->id?>",
                   "city" : $("#city").val()
                };
			      
		    	$.ajax({
		    	  type: "POST",
		    	  url: baseUrl+"/<?php echo $this->module->id?>/person/register",
		    	  data: params,
		    	  success: function(data){
		    		  if(data.result)
		    		  {
		    		  	$.blockUI({
    		  				message : '<i class="fa fa-spinner fa-spin"></i> Processing... <br/> '+
    		  	            '<blockquote>'+
    		  	              '<p>You will receive an email to validate your account.</p>'+
    		  	              '<cite>Welcome to the Pixel Humain</cite>'+
    		  	            '</blockquote> '
    		  			});
		        		toastr.success(data.msg+" , we'll contact you as soon as we open up! Thanks for joining.");
		        		//window.location.reload();
		        		setTimeout(function() { $.unblockUI(); showPanel(); },5000);
		    		  }
		    		  else {
						$('.registerResult').html(data.msg);
						$('.registerResult').show();
						createBtn.stop();
		    		  }
		    	  },
		    	  error: function(data) {
		    	  	toastr.error("Something went really bad : contact your administrator !");
		    	  	createBtn.stop();
		    	  },
		    	  dataType: "json"
		    	});
			    return false;
			},
			invalidHandler : function(event, validator) {//display error alert on form submit
				errorHandler3.show();
				createBtn.stop();
			}
		});
	};
	return {
		//main function to initiate template pages
		init : function() {
			addCustomValidators();
			runBoxToShow();
			runLoginButtons();
			runSetDefaultValidation();
			runLoginValidator();
			runForgotValidator();
			runRegisterValidator();
			bindPostalCodeAction();
		}
	};
}();

function sendEmailValidation() {
	var params = { 
		"email" : $("#email").val(),
		"type"	: "validation"
	};

    $.ajax({
      type: "POST",
      url: baseUrl+"/<?php echo $this->module->id?>/person/sendemail",
      data: params,
      success: function(data){
		if (data.result) {
			alert(data.msg);
            window.location.reload();
		} else {
			toastr.error("Something went wrong : "+data.msg);
		}
      },
      error: function(data) {
	  	toastr.error("Something went really bad : contact your administrator !");
	  },
      dataType: "json"
    });
}

function runShowCity(searchValue) {
	var citiesByPostalCode = getCitiesByPostalCode(searchValue);
	var oneValue = "";
	console.table(citiesByPostalCode);
	$.each(citiesByPostalCode,function(i, value) {
    	$("#city").append('<option value=' + value.value + '>' + value.text + '</option>');
    	oneValue = value.value;
	});
	
	if (citiesByPostalCode.length == 1) {
		$("#city").val(oneValue);
	}

	if (citiesByPostalCode.length >0) {
        $("#cityDiv").slideDown("medium");
      } else {
        $("#cityDiv").slideUp("medium");
      }
}

function bindPostalCodeAction() {
	$('.form-register #cp').change(function(e){
		searchCity();
	});
	$('.form-register #cp').keyup(function(e){
		searchCity();
	});
}

function searchCity() {
	var searchValue = $('.form-register #cp').val();
	if(searchValue.length == 5) {
		$("#city").empty();
		clearTimeout(timeout);
		timeout = setTimeout($("#iconeChargement").css("visibility", "visible"), 100);
		clearTimeout(timeout);
		timeout = setTimeout('runShowCity("'+searchValue+'")', 100); 
	} else {
		$("#cityDiv").slideUp("medium");
		$("#city").val("");
		$("#city").empty();
	}
}

</script>