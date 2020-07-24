<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>One Look</title>
		<meta name="description" content="Fullscreen Form Interface: A distraction-free form concept with fancy animations" />
		<meta name="keywords" content="fullscreen form, css animations, distraction-free, web design" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		
		<link rel="stylesheet" type="text/css" href="{{asset('css/emf/normalize.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('css/emf/demo.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('css/emf/component.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('css/emf/cs-select.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('css/emf/cs-skin-boxes.css')}}" />
		<script src="{{asset('js/emf/modernizr.custom.js')}}"></script>
	</head>
	<body>
		<div class="container">

			<div class="fs-form-wrap" id="fs-form-wrap">
				<div class="fs-title">
					<h1>One Look</h1>
					
				</div>
				<form id="myform" class="fs-form fs-form-full" autocomplete="off" method="POST" enctype="multipart/form-data">
					<ol class="fs-fields">
						<li>
							<label class="fs-field-label fs-anim-upper" for="q1">Company name:</label>
							<input class="fs-anim-lower" id="q1" name="company" type="text" placeholder="Company name" required/>
						</li>
						
						<li>
							<label class="fs-field-label fs-anim-upper" for="q1">Contact person:</label>
							<input class="fs-anim-lower" id="q1" name="person" type="text" placeholder="Contact person" required/>
						</li>
						
						<li>
							<label class="fs-field-label fs-anim-upper" for="q2" data-info="We won't send you spam, we promise...">Email address:</label>
							<input class="fs-anim-lower" id="q2" name="email" type="email" placeholder="dean@road.us" required/>
						</li>
						
						<li>
							<label class="fs-field-label fs-anim-upper" for="q4">Mailing address:</label>
							<textarea class="fs-anim-lower" id="q4" name="mailing" placeholder="Mailing address"></textarea>
						</li>
						
						<li>
							<label class="fs-field-label fs-anim-upper" for="q4">Tell us about your business:</label>
							<textarea class="fs-anim-lower" id="q4" name="business" placeholder="Tell us about your business:"></textarea>
						</li>
						
						<li>
							<label class="fs-field-label fs-anim-upper" for="q4">Do you have a domain name? (If not, does one need to be purchased for you?):</label>
							<textarea class="fs-anim-lower" id="q4" name="access" placeholder="Do you own/have access to your domain name:"></textarea>
						</li>
						
						<li>
							<label class="fs-field-label fs-anim-upper" for="q4">Do you have access to your hosting? (cPanel/FTP & pHpMyAdmin/ GoDaddy) What are the credentials?</label>
							<textarea class="fs-anim-lower" id="q4" name="hosting" placeholder="Do you have access to your hosting? (cPanel/FTP & pHpMyAdmin/ GoDaddy) What are the credentials?"></textarea>
						</li>
						
						<li>
							<label class="fs-field-label fs-anim-upper" for="q4">Where are you hosting your emails?</label>
							<textarea class="fs-anim-lower" id="q4" name="youremails" placeholder="Where are you hosting your emails?"></textarea>
						</li>
						
						<li>
							<label class="fs-field-label fs-anim-upper" for="q4">Image & video content (Please upload all the content to a google drive/dropbox folder and share it with eldermonks@gmail.com or enter a gmail address below, we will share the folder with you to upload the files):</label>
							<textarea class="fs-anim-lower" id="q4" name="content" placeholder="Image & video content"></textarea>
						</li>
						
						<li>
							<label class="fs-field-label fs-anim-upper" for="q4">Elevator Pitch/ Sales Pitch:</label>
							<textarea class="fs-anim-lower" id="q4" name="copy" placeholder="Elevator Pitch/ Sales Pitch"></textarea>
						</li>
						
						<li>
							<label class="fs-field-label fs-anim-upper" for="q4">Define primary goal (Sell Online, Traffic, Contact Form, Lead Generation, Marketing, Informational):</label>
							<textarea class="fs-anim-lower" id="q4" name="primary" placeholder="Define primary goal (Sell Online, Traffic, Contact Form, Lead Generation, Marketing, Informational)"></textarea>
						</li>

<li>
							<label class="fs-field-label fs-anim-upper" for="q4">Target geographic (location):</label>
							<textarea class="fs-anim-lower" id="q4" name="geographic" placeholder="Define primary goal"></textarea>
						</li>

<li>
							<label class="fs-field-label fs-anim-upper" for="q4">Target audience (demographics):</label>
							<textarea class="fs-anim-lower" id="q4" name="audience" placeholder="Define primary goal"></textarea>
						</li>
						
						
						
<li data-input-trigger>
	<label class="fs-field-label fs-anim-upper" for="q3" data-info="This will help us know what kind of service you need">Pick the word that best describes the message you want to convey:</label>
	<div class="fs-radio-group fs-radio-custom clearfix fs-anim-lower">
		<span><input id="q3b" name="q3" type="radio" value="Playful"/><label for="q3b" class="radio-conversion">Playful</label></span>
		<span><input id="q3c" name="q3" type="radio" value="Serious"/><label for="q3c" class="radio-social">Serious</label></span>
		<span><input id="q3d"  name="q3" type="radio" value="Mixed"/><label for="q3d" class="radio-mobile">Mixed</label></span>
	</div>
</li>

<li data-input-trigger>
	<label class="fs-field-label fs-anim-upper" for="q4" data-info="This will help us know what kind of service you need">Pick the word that best describes the feeling you want to convey:</label>
	<div class="fs-radio-group fs-radio-custom clearfix fs-anim-lower">
		<span><input id="q3bb"  name="q4" type="radio" value="Youthful"/><label for="q3bb" class="radio-conversion">Youthful</label></span>
		<span><input id="q3cc"  name="q4" type="radio" value="Experienced"/><label for="q3cc" class="radio-social">Experienced</label></span>
		<span><input id="q3dd"  name="q4" type="radio" value="Mixed"/><label for="q3dd" class="radio-mobile">Mixed</label></span>
	</div>
</li>
<li data-input-trigger>
	<label class="fs-field-label fs-anim-upper"  data-info="This will help us know what kind of service you need">Pick the word that best describes the look you want to convey:</label>
	<div class="fs-radio-group fs-radio-custom clearfix fs-anim-lower">
		<span><input id="q3bbb"  name="q5" type="radio" value="Clean"/><label for="q3bbb" class="radio-conversion">Clean</label></span>
		<span><input id="q3ccc"  name="q5" type="radio" value="Artistic"/><label for="q3ccc" class="radio-social">Artistic</label></span>
		<span><input id="q3ddd"  name="q5" type="radio" value="Mixed"/><label for="q3ddd" class="radio-mobile">Mixed</label></span>
	</div>
</li>
						
						
						<li>
							<label class="fs-field-label fs-anim-upper" for="q4">Company Colors:</label>
							<textarea class="fs-anim-lower" id="q4" name="colours" placeholder="Company Colors:"></textarea>
						</li>
						
						<li>
							<label class="fs-field-label fs-anim-upper" for="q4">Navigation(Home / About Us / Contact Us .... ):</label>
							<textarea class="fs-anim-lower" id="q4" name="navigation" placeholder="Navigation"></textarea>
						</li>
						
						<li>
							<label class="fs-field-label fs-anim-upper" for="q4">Competitors:</label>
							<textarea class="fs-anim-lower" id="q4" name="competitors" placeholder="Competitors:"></textarea>
						</li>
						
						<li>
							<label class="fs-field-label fs-anim-upper" for="q4">Reference websites:</label>
							<textarea class="fs-anim-lower" id="q4" name="reference" placeholder="Reference websites"></textarea>
						</li>
						
						<li>
							<label class="fs-field-label fs-anim-upper" for="q1">Company Logo</label>
							<input class="fs-anim-lower" id="q1" name="file[]" type="file" placeholder="placeholder="Pdf,Jpg,Png,Text"" required/>
						</li>
						
						<li>
							<label class="fs-field-label fs-anim-upper" for="q4">Additional notes:</label>
							<textarea class="fs-anim-lower" id="q4" name="additional" placeholder="Additional notes:"></textarea>
						</li>
						
						
						
						
					</ol><!-- /fs-fields -->
					<button class="fs-submit" name="submit" type="submit">Send answers</button>
				</form><!-- /fs-form -->
			</div><!-- /fs-form-wrap -->

			<!-- Related demos -->
			<div class="related">
				<p>If you enjoyed this demo you might also like:</p>
				<a href="http://tympanus.net/Development/MinimalForm/">
					<img src="img/relatedposts/minimalform1-300x162.png" />
					<h3>Minimal Form Interface</h3>
				</a>
				<a href="http://tympanus.net/Development/ButtonComponentMorph/">
					<img src="img/relatedposts/MorphingButtons-300x162.png" />
					<h3>Morphing Buttons Concept</h3>
				</a>
			</div>

		</div><!-- /container -->
		<script src="{{asset('js/emf/classie.js')}}"></script>
		<script src="{{asset('js/emf/selectFx.js')}}"></script>
		<script src="{{asset('js/emf/fullscreenForm.js')}}"></script>
		<script>
			(function() {
				var formWrap = document.getElementById( 'fs-form-wrap' );

				[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
					new SelectFx( el, {
						stickyPlaceholder: false,
						onChange: function(val){
							document.querySelector('span.cs-placeholder').style.backgroundColor = val;
						}
					});
				} );

				new FForm( formWrap, {
					onReview : function() {
						classie.add( document.body, 'overview' ); // for demo purposes only
					}
				} );
			})();
		</script>
	</body>
</html>