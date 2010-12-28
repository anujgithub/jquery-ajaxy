<?php
	# Prepare
	error_reporting(E_ALL | E_STRICT);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	
	# Check Page
	$page = isset($_GET['page']) ? $_GET['page'] : null;
	switch ( $page ) {
		case 'apricots':
		case 'bananas':
		case 'coconuts':
		case 'durians':
		case 'eggplants':
			break;
		
		default:
			header('HTTP/1.1 404 Not Found');
			echo '404 Not Found';
			die;
			break;
	}
						
?><!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        jQuery Ajaxy
    </title>
	
	<!-- Include jQuery (Ajaxy Requirement) -->
	<script type="text/javascript" src="../../scripts/jquery-1.4.2.min.js"></script>
	<!-- Include jQuery Ajaxy (Production) -->
	<!-- <script type="text/javascript" src="../../scripts/jquery.ajaxy.min.js"></script> -->
	<!-- Include jQuery Ajaxy (Development) -->
	<script type="text/javascript" src="../../scripts/jquery.ajaxy.js"></script>
	
	<!-- Include The Demo's Requirements -->
	<link type="text/css" rel="stylesheet" media="screen" href="../styles/style.css" />
</head>
<body>
	<!-- Include jQuery Syntax Highlighter -->
	<script type="text/javascript" src="http://github.com/balupton/jquery-syntaxhighlighter/raw/master/scripts/jquery.syntaxhighlighter.min.js"></script>
	<!-- Initialise jQuery Syntax Highlighter -->
	<script type="text/javascript">/*<![CDATA[*/
		$.SyntaxHighlighter.init();
	/*]]>*/</script>
	
	<!-- GetSatisfaction -->
	<script type="text/javascript" src="http://s3.amazonaws.com/getsatisfaction.com/javascripts/feedback-v2.js"></script> 
	<script type="text/javascript">/*<![CDATA[*/
	var GSFN_feedback_widget = new GSFN.feedback_widget({ display: 'overlay', company: 'balupton', placement: 'right', color: '#222', style: 'question' });
	/*]]>*/</script> 
	
	<div class="section links" id="links">
		<h1>jQuery Ajaxy - Simple Ajax Handler/Remote for Hash, State, Bookmarking, and Forward Back Buttons</h1>
		<h2><a href="http://github.com/balupton/jquery-ajaxy/zipball/master" title="Download the Latest" id="download">Download</a></h2>
		<h2><a href="http://www.balupton.com/projects/jquery-ajaxy" title="Home Page">Home Page</a></h2>
		<h2><a href="http://github.com/balupton/jquery-ajaxy" title="Project Page">Project Page</a></h2>
		<h2><a href="http://getsatisfaction.com/balupton/products/balupton_jquery_ajaxy" title="Support Page" class="gsfnwidget">Get Support</a></h2>
		<h2><a href="http://github.com/balupton/jquery-ajaxy/tree/master" title="Source Code">Source Code</a></h2>
		<h2><a href="http://github.com/balupton/jquery-ajaxy/commits/master.atom" title="Subscribe to Updates">Subscribe to Updates</a></h2>
	</div>
	
	<div class="section about" id="about">
		<h2>About</h2>
		
		<p>
			<strong>jQuery Ajaxy</strong> allows you to easily upgrade your web site into a full featured Ajax web application. Anyone who has tried to do this themselves would no doubt have spent countless hours debugging tedious javascript ajax requests, trying to figure out how to get ajax pages bookmarkable and working with back and forward buttons, or even struggled to add javascript effects to help manage your pages. jQuery Ajaxy was developed to solve all these problems, as well as some you may have never encountered such as; How do I keep my page indexable by Search Engines while making it an Ajax Application, How do I keep my site accessible to those who have javascript disabled? How I ensure I send the correct page back to the browser?
		</p>
		
		<p>All of those problems are extremely difficult to solve, which is why we've solved them for you. We've made it so:</p>
		
		<ul class="features">
			<li>It's unbelievably simple to upgrade your ordinary links and forms into Ajax requests by just adding a CSS classname.</li>
			<li>You already have automatic support for tracking state changes in your now web application so you don't have to worry about this at all - we do it for you. This allows it so the user can still use those back and forward buttons, or even send the page URL to a friend and see the same thing!</li>
			<li>You can even submit forms via Ajax with confidence, without having to do any extra server side code.</li>
			<li>You will also have the ability to control your web applications state manually through your code for advanced circumstances.</li>
			<li>You will still have support for classical anchors despite us using hashes for our web application states! This means you can still direct your users to particular content on a webpage using a link like: <code>my/web/page.html#the-content-to-scroll-to</code></li>
		</ul>
		
		<p>We've included a nice demo below so you can see all of this in action.</p>
	</div>
	
	<div class="section using" id="using">
		<h2>Using jQuery Ajaxy</h2>
		
		<h3>Seeing it work</h3>
		
		<p>The following demo is perhaps overly simplistic, but we know the simpler something is; the simpler it is to understand what is going on. So let's get started by clicking through the tabs/links to change the content and update our state.</p>
		
		<div id="demo">
			<ul id="menu">
				<li><a href="?page=apricots" class="ajaxy ajaxy-page">Learn about Apricots</a></li>
				<li><a href="?page=bananas" class="ajaxy ajaxy-page">Lean about Bananas</a></li>
				<li><a href="?page=coconuts" class="ajaxy ajaxy-page">Learn about Coconuts</a></li>
				<li><a href="?page=durians#yummy" class="ajaxy ajaxy-page">Learn about Durians</a></li>
				<li><a href="?page=eggplants" class="ajaxy ajaxy-page">Have your say about Eggplants</a></li>
				<li><a href="?page=404" class="ajaxy ajaxy-page">A page which does not exist</a></li>
			</ul>
			<div id="result">
				<?php
					$page = isset($_GET['page']) ? $_GET['page'] : null;
					$pages_dir = dirname(__FILE__).'/pages';
					switch ( $page ) {
						case 'apricots':
						case 'bananas':
						case 'coconuts':
						case 'durians':
						case 'eggplants':
							?><div id="content" style="max-height:100px;overflow:auto;"><?php
								require "$pages_dir/$page.php";
							?></div><div id="current"><?php
								echo "$page";
							?></div><?php
							break;
						
						default:
							?><div id="content" style="max-height:100px;overflow:auto;">
								Your Default/Start Page.
							</div><div id="current">
								Your Default/Start Page.
							</div><?php
							break;
					}
				?>
				</div>
			</div>
		</div>
		
		<p>
			As you clicked through these, you would have noticed the content kept changing. If you have a eye for detail, you may have noticed that the page's URL hash also kept changing - this is how we track the state of our application. And if you are really really keen, you may have even noticed the page's title was also changing appropriately for each click.
		</p>
		
		<p>
			Now let's mix it up a bit. Click the forward and back buttons in your browser. Watch as it correctly recreates the states of your browsing history. Isn't that cool! Now refresh the page, and notice how the correct state was again recreated. Or even copy the URL, open a new tab, and stick the URL in there and go. Again the state was created. This is soo important, as it allows you to keep track of the state of you application, and the best thing is that it all happens automatically for you - Ajaxy handles it all leaving you to focus on what is important.
		</p>
		
		<h3>The code responsible</h3>
		
		<p>
			All of these changes happen because we have upgraded those normal <code>a</code> elements into full featured rich Ajax links. We did this by simple adding the following CSS classes to the links: <code>ajaxy</code> and <code>ajaxy-page</code>. The first CSS class tells Ajaxy that this link is one to be upgraded, and the second is defined by our demo page to say we should use the page controller. Let's see the complete HTML before we move on:
		</p>
		
		<p>The HTML:</p>
		<pre class="code language-html">
			&lt;ul id="menu"&gt;
				&lt;li&gt;&lt;a href="./pages/apricots.html" class="ajaxy ajaxy-page"&gt;Learn about Apricots&lt;/a&gt;&lt;/li&gt;
				&lt;li&gt;&lt;a href="./pages/bananas.html" class="ajaxy ajaxy-page"&gt;Lean about Bananas&lt;/a&gt;&lt;/li&gt;
				&lt;li&gt;&lt;a href="./pages/coconuts.html" class="ajaxy ajaxy-page"&gt;Learn about Coconuts&lt;/a&gt;&lt;/li&gt;
				&lt;li&gt;&lt;a href="./pages/durians.html#yummy" class="ajaxy ajaxy-page"&gt;Learn about Durians&lt;/a&gt;&lt;/li&gt;
			&lt;/ul&gt;
			&lt;div id="result"&gt;
				&lt;div id="content" style="max-height:100px;overflow:auto;"&gt;&lt;/div&gt;
				&lt;div id="current"&gt;
					&lt;?php
						$page = isset($_GET[&#x27;page&#x27;]) ? $_GET[&#x27;page&#x27;] : null;
						$dir = dirname(__FILE__);
						switch ( $page ) {
							case &#x27;apricots&#x27;:
							case &#x27;bananas&#x27;:
							case &#x27;coconuts&#x27;:
							case &#x27;durians&#x27;:
							case &#x27;eggplants&#x27;:
								require &quot;$dir/$page.php&quot;;
								break;
						
							default:
								echo &#x27;Welcome / Your Default Page.&#x27;;
								break;
						}
					?&gt;
				&lt;/div&gt;
			&lt;/div&gt;
		</pre>
		
		<p>
			Pretty simple isn't it. So let's explain what each element is.
			The <code>div#demo</code> is the container for our demo, such that we can separate it from this text explaining what it is.
			The <code>ul#menu</code> contains all our links which effectively act as tabs.
			Each <code>li.ajaxy.ajaxy-page</code> are all our tab links, they are all linked to the actual Ajax content we would like to load in - such that a search engine can still index our website, and we can be as graceful as possible in upgrading our site.
			The <code>div#result</code> is the container for the two result elements we will be using.
			The <code>div#content</code> is where our tab content will be loaded into.
			The <code>div#current</code> is where we display what the current state is of our web application.
		</p>
		
		<p>
			So it pretty much looks just like how you would code it up without Ajax doesn't it? With the exception of the CSS classnames we added.
			So what will this code do? Well when our page loads, Ajaxy will look for all elements with the <code>ajaxy</code> class name, and upgrade them into a Ajax link.
			Once that link is then clicked, Ajaxy will perform a Ajax request and let us know it's sent off a request such that we can do any fadeOuts or loading animations we would like.
			Once Ajaxy has received the response from our server, it'll then try and figure out what we received - did we received a 404 not found? invalid data? text or JSON? - Ajaxy will handle it all for us.
			It'll then inform us of a valid response or a error occurred and pass us all the data we need to display our fetched content in our page.
			- It may sound a bit complicated, but all of that complicated stuff is happening in the background and being handled by Ajaxy and not us! Youhou! So that means we can focus on what matters - telling Ajaxy which links we want to use with Ajax, and animating and populating our content when requests or responses are performed.
		</p>
		
		<p>So now we got that out the way, let's get into the javascript. We've documented the code inline as detailed as we can, rather than splitting the code up into segments. As at least for me, reading comments inline is a lot better than detached segments of code as you can't see the big picture. So here you are the big picture with lots of comments.
		
		<p>The JavaScript:</p>
		<pre class="code language-javascript">
		/**
		 * Create a local noconflict scope.
		 * This is important as perhaps we are running in an noConflict environment so $ is not defined, but jQuery is.
		 * What this will do is alias $ to jQuery, such that we can still write our code exactly the same as if we weren't in a noConflict environment.
		 * Another important thing is that this allows us to create a local scope.
		 * Local scopes are important they avoid variable overwrites and keeps our code nice and tidy.
		 */
		(function($){
			/**
			 * Fetch the element we will be using.
			 * We assign them to variables as that way they are cached in our local scope.
			 * This is good as say if we do $('#menu') three times, that is 3 times that jQuery has to find the #menu element. Causing unecessary load.
			 */
			var $body = $(document.body),
				$menu = $('#menu'),
				$content = $('#content'),
				$current = $('#current');
			
			/**
			 * Configure Ajaxy
			 * We now proceed to configure Ajaxy.
			 * We have to do this as otherwise, Ajaxy wouldn't know what to do with our Ajax data!
			 * It would just perform a request, receive a response, and then go... well what do I do now?
			 * So here we tell Ajaxy how to handle the different types of states we will have in our application.
			 */
			$.Ajaxy.configure({
				/**
				 * Ajaxy supports a whole bunch of different configuration options.
				 * By default some things are enabled such as "debug" etc - these should be turned turned off in production environments.
				 * We don't cover any of the options in this demo as they are outside the demo's scope.
				 * You can however learn about the options by reading the README.txt attached within the Ajaxy project.
				 */
				
				/**
				 * Define our Ajaxy Controllers.
				 * If you have ever done some work with the Model View Controller architecture for applications, then this should be quite familiar to you.
				 * If not I'll explain it anyway :-)
				 * Controllers are what handles our application states, so if a state has changed we will rely on the appropriate controller to tell us what to do.
				 * We'll explain this more as we go along. But this is the core of building an Ajaxy application.
				 */
				'Controllers': {
					/**
					 * The Essential Generic Controller
				 	 * In jQuery Ajaxy, we will always have a "_generic" controller, hence why it is deemed essential.
				 	 * This controller is called for every single request and response Ajaxy recieves.
				 	 * You can use it to (and probably should) use it to display loading animations so our user knows something is happening when a Ajax request is performing, as well as using it to update the document.title with the current states title, and displaying error information.
				 	 */
					'_generic': {
						/**
						 * The Request Action
						 * As this is part of our Generic Controller, this will be called for every Ajax request that is performed.
						 * It allows us to do such things as display the loading animation, and debug requests.
						 */
						request: function(){
							// Prepare
							var Ajaxy = $.Ajaxy;
							// Log what is happening
							if ( Ajaxy.options.debug ) window.console.debug('$.Ajaxy.Controllers._generic.request', &#91;this,arguments&#93;);
							// Loading
							$body.addClass('loading');
							// Return true
							return true;
						},
						
						/**
						 * The Response Action
						 * This one will fire when a Ajax request receives a successful response, and as it is part of the Generic Controller it'll fire for every response.
						 * It allows us to do such things as hide the loading animation, update the document.title with the current state's title, and debug responses.
						 */
						response: function(){
							// Prepare
							var Ajaxy = $.Ajaxy, responseData = this.State.Response.data, state = this.state||'unknown';
							// Log what is happening
							if ( Ajaxy.options.debug ) window.console.debug('$.Ajaxy.Controllers._generic.response', &#91;this,arguments&#93;);
							// Title
							var title = responseData.title||false; // if we have a title in the response JSON
							if ( !title &amp;&amp; this.state||false ) title = 'jQuery Ajaxy - '+this.state; // if not use the state as the title
							if ( title ) document.title = title; // if we have a new title use it
							// Loaded
							$body.removeClass('loading');
							// Display State
							$('#current').text('Our current state is: &#91;'+state+'&#93;');
							// Return true
							return true;
						},
						
						/**
						 * The Error Action
						 * This one will fire when a Ajax request fails (be it we got a 404, invalid data, or whatever).
						 * It's important as it allows us to display a error message to the user.
						 * If an error occurs, only the Error action will be called and not the Response action, as such we should still do generic things like remove the loading animation.
						 */
						error: function(){
							// Prepare
							var Ajaxy = $.Ajaxy, errorData = this.State.Error.data, responseData = this.State.Response.data, state = this.state||'unknown';
							// Error Message
							var error_message = errorData.error;
							// Log what is happening
							if ( errorData.handled||false ) {
								window.console.error('$.Ajaxy.Controllers._generic.error', &#91;this, arguments&#93;, error_message); // will throw exception
							}
							else {
								window.console.warn('$.Ajaxy.Controllers._generic.error', &#91;this, arguments&#93;, error_message); // will output log
							}
							// Loaded
							$body.removeClass('loading');
							// Display State
							$('#current').text('Our current state is: &#91;'+state+'&#93;');
							// Return true
							return true;
						}
					},
					
					/**
					 * Our Page Controller
					 * This is what makes the example in this demo come alive.
					 * It handles our page requests to do with the three fruits (apricots,bananas and coconuts).
					 * We can call this whatever we like.
					 */
					'page': {
						/**
						 * Our Page Controller's Classname &#91;optional&#93;
						 * This associates our controller with the particular elements which match this classname.
						 * It allows for when one of our Ajax links to be clicked, Ajaxy will know to fire the Page Controller's Request action.
						 * This is important as without this there would be no possible way for us to know that the Ajax Request is for our Controller.
						 */
						classname: 'ajaxy-page',
						
						/**
						 * Our Page Controller's Matches &#91;optional&#93;
						 * This can be a string, an array of strings, or a regular expression which is used to match the applications state.
						 * For this demo, we have chosen to use a regular expression that will match against anything which starts with "/pages"
						 * This variable follows the same reasoning as providing a selector, as it covers some more uses cases which the selector does not and vice versa.
						 * To provide ane example of such a use case. Consider our page was bookmarked with the following state active: "/pages/apricots.html"
						 * This would cause Ajaxy to perform the Ajax request necessary to recreate that state when the page has loaded.
						 * However, as this request has not come from a link, we cannot use the Controller's selector to associate the request with a particular controller.
						 * Instead we use this to match against the proposed state, and if it does then we know that this is the controller that should be used.
						 */
						matches: /^\/pages\/?/,
						
						/**
						 * Our Page Controller's Request Action
						 * This just like our Request Action in the Generic Controller,
						 * however this will only be fired for those Ajaxy requests which are known to be for the Page controller.
						 * For instance, we could have another Controller called "Subpage", if a request is determined to be for that controller, their request action will fire and not this one.
						 * We use this to prepare our tab area for incoming content, so we deselect all items in the tab menu, and fade out the content.
						 */
						request: function(){
							// Prepare
							var Ajaxy = $.Ajaxy;
							// Log what is happening
							if ( Ajaxy.options.debug ) window.console.debug('$.Ajaxy.Controllers.page.request', &#91;this,arguments&#93;);
							// Adjust Menu
							$menu.find('.active').removeClass('active');
							// Hide Content
							$content.stop(true,true).fadeOut(400);
							// Return true
							return true;
						},
						
						/**
						 * Our Page Controller's Response Action
						 * This is just like our Page Controller's Request Action, however for responses instead.
						 * We will use this to mark the appropriate item in the tab menu as active, to load the content into the tab area, and fade it in.
						 * This is all we have to do :-)
						 */
						response: function(){
							// Prepare
							var Ajaxy = $.Ajaxy, responseData = this.State.Response.data, state = this.state, State = this.State;
							// Log what is happening
							if ( Ajaxy.options.debug ) window.console.debug('$.Ajaxy.Controllers.page.response', &#91;this,arguments&#93;);
							// Adjust Menu
							$menu.children(':has(a&#91;href*="'+State.raw.state+'"&#93;)').addClass('active').siblings('.active').removeClass('active');
							// Show Content
							var Action = this;
							$content.html(responseData.content).fadeIn(400,function(){
								Action.documentReady({
									'content': $content
								});
								/**
								 * The above line calls our Action's documentReady function.
								 * This is a special function which is always there as it is automaticly provided by Ajaxy.
								 * We assign this to the variable Action, as inside the callback function for our jQuery effect the variable this will be point to somewhere else then!
								 * 
								 * So what does this function do?
								 * 1. It tells Ajaxy that the document is now ready for post processing.
								 * 2. Ajaxy will then determine if the state included a anchor that we want to scroll to and initiate, and do that.
								 * 3. Ajaxy will ajaxify the new content (provided the option &#91;auto_ajaxify_documentReady&#93; is true).
								 * 4. Ajaxy will sparkle the new contnet (provided the option &#91;auto_sparkle_documentReady&#93; is true, and jQuery Sparkle exists).
								 *    This is optional as there are no dependencies with jQuery Sparkle, but it is a nifty project which is worth a look:
								 *    http://www.balupton.com/projects/jquery-sparkle/
								 */
							});
							// Return true
							return true;
						},
						
						/**
						 * The Error Action
						 * This just like our Error Action in the Generic Controller,
						 * however this will only be fired for those Ajaxy errors which are known to be for the Page controller.
						 * For instance, we could have 404 error on one of our pages which directs here, allowing us to display the 404 page in the appropriate area and not leave the user in the dark.
						 */
						error: function(){
							// Prepare
							var Ajaxy = $.Ajaxy, errorData = this.State.Error.data, responseData = this.State.Response.data, state = this.state||'unknown';
							// Error Message
							var error_message = errorData.error;
							// Log what is happening
							window.console.warn('$.Ajaxy.Controllers.page.error', &#91;this, arguments&#93;, error_message);
							// Mark the Error as Handled so we don't raise an error in our generic controller
							errorData.handled = true;
							// Deselect Menu Items
							$menu.find('.active').removeClass('active');
							// Display our Error Page
							var Action = this;
							$content.html(responseData.content).fadeIn(400,function(){
								Action.documentReady({
									'content': $content
								});
							});
							// Return true
							return true;
						}
					}
				}
			});
			
			// All done
		})(jQuery);
		// Back to global scope
		</pre>
		
		<p>
			Now that is quite long, but only because we have so many comments. Let's kill the comments, and let's see how long the entire demo is with the HTML and Javascript.
		</p>
		
		
		<p>The HTML:</p>
		<pre class="code language-html">
			&lt;ul id="menu"&gt;
				&lt;li&gt;&lt;a href="./pages/apricots.html" class="ajaxy ajaxy-page"&gt;Learn about Apricots&lt;/a&gt;&lt;/li&gt;
				&lt;li&gt;&lt;a href="./pages/bananas.html" class="ajaxy ajaxy-page"&gt;Lean about Bananas&lt;/a&gt;&lt;/li&gt;
				&lt;li&gt;&lt;a href="./pages/coconuts.html" class="ajaxy ajaxy-page"&gt;Learn about Coconuts&lt;/a&gt;&lt;/li&gt;
				&lt;li&gt;&lt;a href="./pages/durians.html#yummy" class="ajaxy ajaxy-page"&gt;Learn about Durians&lt;/a&gt;&lt;/li&gt;
			&lt;/ul&gt;
			&lt;div id="result"&gt;
				&lt;div id="content" style="max-height:100px;overflow:auto;"&gt;&lt;/div&gt;
				&lt;div id="current"&gt;&lt;/div&gt;
			&lt;/div&gt;
		</pre>
		
		<p>The JavaScript:</p>
		<pre class="code language-javascript">
		(function($){
			var $body = $(document.body),
				$menu = $('#menu'),
				$content = $('#content'),
				$current = $('#current');
			$.Ajaxy.configure({
				'Controllers': {
					'_generic': {
						request: function(){
							// Prepare
							var Ajaxy = $.Ajaxy;
							// Log what is happening
							if ( Ajaxy.options.debug ) window.console.debug('$.Ajaxy.Controllers._generic.request', &#91;this,arguments&#93;);
							// Loading
							$body.addClass('loading');
							// Return true
							return true;
						},
						response: function(){
							// Prepare
							var Ajaxy = $.Ajaxy, responseData = this.State.Response.data, state = this.state||'unknown';
							// Log what is happening
							if ( Ajaxy.options.debug ) window.console.debug('$.Ajaxy.Controllers._generic.response', &#91;this,arguments&#93;);
							// Title
							var title = responseData.title||false; // if we have a title in the response JSON
							if ( !title &amp;&amp; this.state||false ) title = 'jQuery Ajaxy - '+this.state; // if not use the state as the title
							if ( title ) document.title = title; // if we have a new title use it
							// Loaded
							$body.removeClass('loading');
							// Display State
							$('#current').text('Our current state is: &#91;'+state+'&#93;');
							// Return true
							return true;
						},
						error: function(){
							// Prepare
							var Ajaxy = $.Ajaxy, errorData = this.State.Error.data, responseData = this.State.Response.data, state = this.state||'unknown';
							// Error Message
							var error_message = errorData.error;
							// Log what is happening
							if ( errorData.handled||false ) {
								window.console.error('$.Ajaxy.Controllers._generic.error', &#91;this, arguments&#93;, error_message); // will throw exception
							}
							else {
								window.console.warn('$.Ajaxy.Controllers._generic.error', &#91;this, arguments&#93;, error_message); // will output log
							}
							// Loaded
							$body.removeClass('loading');
							// Display State
							$('#current').text('Our current state is: &#91;'+state+'&#93;');
							// Return true
							return true;
						}
					},
					'page': {
						classname: 'ajaxy-page',
						matches: /^\/pages\/?/,
						request: function(){
							// Prepare
							var Ajaxy = $.Ajaxy;
							// Log what is happening
							if ( Ajaxy.options.debug ) window.console.debug('$.Ajaxy.Controllers.page.request', &#91;this,arguments&#93;);
							// Adjust Menu
							$menu.find('.active').removeClass('active');
							// Hide Content
							$content.stop(true,true).fadeOut(400);
							// Return true
							return true;
						},
						response: function(){
							// Prepare
							var Ajaxy = $.Ajaxy, responseData = this.State.Response.data, state = this.state, State = this.State;
							// Log what is happening
							if ( Ajaxy.options.debug ) window.console.debug('$.Ajaxy.Controllers.page.response', &#91;this,arguments&#93;);
							// Adjust Menu
							$menu.children(':has(a&#91;href*="'+State.raw.state+'"&#93;)').addClass('active').siblings('.active').removeClass('active');
							// Show Content
							var Action = this;
							$content.html(responseData.content).fadeIn(400,function(){
								Action.documentReady({
									'content': $content
								});
							});
							// Return true
							return true;
						},
						error: function(){
							// Prepare
							var Ajaxy = $.Ajaxy, errorData = this.State.Error.data, responseData = this.State.Response.data, state = this.state||'unknown';
							// Error Message
							var error_message = errorData.error;
							// Log what is happening
							window.console.warn('$.Ajaxy.Controllers.page.error', &#91;this, arguments&#93;, error_message);
							// Mark the Error as Handled so we don't raise an error in our generic controller
							errorData.handled = true;
							// Deselect Menu Items
							$menu.find('.active').removeClass('active');
							// Display our Error Page
							var Action = this;
							$content.html(responseData.content).fadeIn(400,function(){
								Action.documentReady({
									'content': $content
								});
							});
							// Return true
							return true;
						}
					}
				}
			});
			// All done
		})(jQuery);
		// Back to global scope
		</pre>
		
		
		<p>
			See that is tiny considering what we have just accomplished. And especially considering the power and magnitude of what we have just unleashed into your web application. Now compare that to how many hundreds upon hundreds lines of codes it would have taken to write everything we did today from scratch, and then imagine just how messy that alternative could be! I've been there, it can be hideous! So just sit back right now, and just think of what is now accomplishable right there at your finger tips. And think of all the great fantastic new projects you can make. Or even think just how nice your code will be. You'll be the envy of everyone! Woohoo.
		</p>
		
		<p>
			So I do hope that you can truly see the awesomeness of what you have just gone through. You are now prepared with everything you need to get cracking on your own Web 2.0 applications. You can see installation details below. And you can always send us questions and feedback about this project and how you can use it, by clicking the support link up the top or the feedback button on the right. Happy coding! :-)
		</p>
		
	</div>
	
	<div class="section install" id="install">
		<h2>Installation</h2>
		
		<h3>Step 1. <a href="http://github.com/balupton/jquery-ajaxy/zipball/master" title="Download the Latest">Download</a> jQuery Ajaxy, and extract it to your hard drive</h3>
		<div>
			As everyones extraction process is a little bit different be sure of the following:
			<ul class="install">
				<li>If the archive was extracted and you have a whole bunch of files and directories (folders), then you must create a new directory called <code>jquery-ajaxy</code> and move all the files and directories into that to continue.</li>
				<li>If the archive was extracted and you have only one directory called <code>jquery-ajaxy</code> which has a whole bunch of stuff in it, then that is fine and you can continue onto the next step.</li>
				<li>If the archive was extracted and you have only one directory and it is not called <code>jquery-ajaxy</code> then you must rename it to <code>jquery-ajaxy</code> to continue.</li>
			</ul>
		</div>
		
		<h3>Step 2. Move the <code>jquery-ajaxy</code> directory to somewhere on your webserver</h3>
		<p>Be sure to always keep the entire <code>jquery-ajaxy</code> directory intact; this means if you were to only move some of the files instead of moving the entire directory, then you would run into problems due to the cross directory references would no longer be working.</p>
		
		<h3>Step 3. Include jQuery (insert into your page's head tag)</h3>
		<p>If your page already has jQuery included then you can skip this step.</p>
		<pre class="code language-html">
			&lt;!-- Include jQuery (Ajaxy Requirement) --&gt;
			&lt;script type="text/javascript" src="http://www.yoursite.com/somewhere/on/your/webserver/jquery-ajaxy/scripts/jquery-1.4.2.min.js"&gt;&lt;/script&gt;
		</pre>
		
		<h3>Step 4. Include jQuery Ajaxy (insert into your page's head tag)</h3>
		<pre class="code language-html">
			&lt;!-- Include jQuery Ajaxy --&gt;
			&lt;script type="text/javascript" src="http://www.yoursite.com/somewhere/on/your/webserver/jquery-ajaxy/scripts/jquery.ajaxy.min.js"&gt;&lt;/script&gt;
		</pre>
	</div>
	
	<div class="section">
		<h2>Enjoy!!!</h2>
		<p>
			If anything isn't working the way you want it to, or if you would like to request a feature or provide praise or general feedback then be sure to click the feedback button to the right, or the "Get Support" link up the top of this page.
		</p>
		<p>
			This work is powered by coffee and distributed for free. Donations are how we afford our coffee. Coffee is how we stay awake after our day job hours to work on things like this free open-source project which you're looking at. So go ahead, and get that warm fuzzy feeling knowing you just helped some poor fellow working after hours for free to buy his coffee. You only need to spare a few dollars, or as much as you feel this piece of work is worth. Thanks so much. Alternatively; if you are not in a donating mood, then spreading the word about this project on twitter, your blog, or whatever is just as good. You can also give praise by clicking the feedback button or visiting our "Get Support" link. Thanks a bunch, we appreciate the help deeply.
		</p>
		<form id="paypal-form" action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_donations">
			<input type="hidden" name="business" value="APWCX9D4EJPXG">
			<input type="hidden" name="lc" value="AU">
			<input type="hidden" name="item_name" value="Donation to Benjamin Arthur Lupton">
			<input type="hidden" name="currency_code" value="AUD">
			<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_SM.gif:NonHostedGuest">
			<p>
				<img alt="" border="0" src="https://www.paypal.com/en_AU/i/scr/pixel.gif" width="1" height="1">
				<input id="paypal-submit" type="image" src="https://www.paypal.com/en_AU/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
			</p>
		</form>
		<p> 
			This work is licensed under a <a rel="license" href="http://www.gnu.org/licenses/agpl.html">GNU Affero General Public License</a>.
		</p>
		<br />
	</div>
	
	<script type="text/javascript">
		/**
		 * Create a local noconflict scope.
		 * This is important as perhaps we are running in an noConflict environment so $ is not defined, but jQuery is.
		 * What this will do is alias $ to jQuery, such that we can still write our code exactly the same as if we weren't in a noConflict environment.
		 * Another important thing is that this allows us to create a local scope.
		 * Local scopes are important they avoid variable overwrites and keeps our code nice and tidy.
		 */
		(function($){
			/**
			 * Fetch the element we will be using.
			 * We assign them to variables as that way they are cached in our local scope.
			 * This is good as say if we do $('#menu') three times, that is 3 times that jQuery has to find the #menu element. Causing unecessary load.
			 */
			var $body = $(document.body),
				$menu = $('#menu'),
				$content = $('#content'),
				$current = $('#current');
			
			/**
			 * Configure Ajaxy
			 * We now proceed to configure Ajaxy.
			 * We have to do this as otherwise, Ajaxy wouldn't know what to do with our Ajax data!
			 * It would just perform a request, receive a response, and then go... well what do I do now?
			 * So here we tell Ajaxy how to handle the different types of states we will have in our application.
			 */
			$.Ajaxy.configure({
				/**
				 * Ajaxy supports a whole bunch of different configuration options.
				 * By default some things are enabled such as "debug" etc - these should be turned turned off in production environments.
				 * We don't cover any of the options in this demo as they are outside the demo's scope.
				 * You can however learn about the options by reading the README.txt attached within the Ajaxy project.
				 */
				
				/**
				 * Define our Ajaxy Controllers.
				 * If you have ever done some work with the Model View Controller architecture for applications, then this should be quite familiar to you.
				 * If not I'll explain it anyway :-)
				 * Controllers are what handles our application states, so if a state has changed we will rely on the appropriate controller to tell us what to do.
				 * We'll explain this more as we go along. But this is the core of building an Ajaxy application.
				 */
				'Controllers': {
					/**
					 * The Essential Generic Controller
				 	 * In jQuery Ajaxy, we will always have a "_generic" controller, hence why it is deemed essential.
				 	 * This controller is called for every single request and response Ajaxy recieves.
				 	 * You can use it to (and probably should) use it to display loading animations so our user knows something is happening when a Ajax request is performing, as well as using it to update the document.title with the current states title, and displaying error information.
				 	 */
					'_generic': {
						/**
						 * The Request Action
						 * As this is part of our Generic Controller, this will be called for every Ajax request that is performed.
						 * It allows us to do such things as display the loading animation, and debug requests.
						 */
						request: function(){
							// Prepare
							var Ajaxy = $.Ajaxy;
							// Log what is happening
							if ( Ajaxy.options.debug ) window.console.debug('$.Ajaxy.Controllers._generic.request', [this,arguments]);
							// Loading
							$body.addClass('loading');
							// Return true
							return true;
						},
						
						/**
						 * The Response Action
						 * This one will fire when a Ajax request receives a successful response, and as it is part of the Generic Controller it'll fire for every response.
						 * It allows us to do such things as hide the loading animation, update the document.title with the current state's title, and debug responses.
						 */
						response: function(){
							// Prepare
							var Ajaxy = $.Ajaxy, responseData = this.State.Response.data, state = this.state||'unknown';
							// Log what is happening
							if ( Ajaxy.options.debug ) window.console.debug('$.Ajaxy.Controllers._generic.response', [this,arguments]);
							// Title
							var title = responseData.title||false; // if we have a title in the response JSON
							if ( !title && this.state||false ) title = 'jQuery Ajaxy - '+this.state; // if not use the state as the title
							if ( title ) document.title = title; // if we have a new title use it
							// Loaded
							$body.removeClass('loading');
							// Display State
							$('#current').text('Our current state is: ['+state+']');
							// Return true
							return true;
						},
						
						/**
						 * The Error Action
						 * This one will fire when a Ajax request fails (be it we got a 404, invalid data, or whatever).
						 * It's important as it allows us to display a error message to the user.
						 * If an error occurs, only the Error action will be called and not the Response action, as such we should still do generic things like remove the loading animation.
						 */
						error: function(){
							// Prepare
							var Ajaxy = $.Ajaxy, errorData = this.State.Error.data, responseData = this.State.Response.data, state = this.state||'unknown';
							// Error Message
							var error_message = errorData.error;
							// Log what is happening
							if ( errorData.handled||false ) {
								window.console.error('$.Ajaxy.Controllers._generic.error', [this, arguments], error_message); // will throw exception
							}
							else {
								window.console.warn('$.Ajaxy.Controllers._generic.error', [this, arguments], error_message); // will output log
							}
							// Loaded
							$body.removeClass('loading');
							// Display State
							$('#current').text('Our current state is: ['+state+']');
							// Return true
							return true;
						}
					},
					
					/**
					 * Our Page Controller
					 * This is what makes the example in this demo come alive.
					 * It handles our page requests to do with the three fruits (apricots,bananas and coconuts).
					 * We can call this whatever we like.
					 */
					'page': {
						/**
						 * Our Page Controller's Classname [optional]
						 * This associates our controller with the particular elements which match this classname.
						 * It allows for when one of our Ajax links to be clicked, Ajaxy will know to fire the Page Controller's Request action.
						 * This is important as without this there would be no possible way for us to know that the Ajax Request is for our Controller.
						 */
						classname: 'ajaxy-page',
						
						/**
						 * Our Page Controller's Matches [optional]
						 * This can be a string, an array of strings, or a regular expression which is used to match the applications state.
						 * For this demo, we have chosen to use a regular expression that will match against anything which starts with "/pages"
						 * This variable follows the same reasoning as providing a selector, as it covers some more uses cases which the selector does not and vice versa.
						 * To provide ane example of such a use case. Consider our page was bookmarked with the following state active: "/pages/apricots.html"
						 * This would cause Ajaxy to perform the Ajax request necessary to recreate that state when the page has loaded.
						 * However, as this request has not come from a link, we cannot use the Controller's selector to associate the request with a particular controller.
						 * Instead we use this to match against the proposed state, and if it does then we know that this is the controller that should be used.
						 */
						matches: /^\/pages\/?|page=[a-z]+/,
						
						/**
						 * Our Page Controller's Request Action
						 * This just like our Request Action in the Generic Controller,
						 * however this will only be fired for those Ajaxy requests which are known to be for the Page controller.
						 * For instance, we could have another Controller called "Subpage", if a request is determined to be for that controller, their request action will fire and not this one.
						 * We use this to prepare our tab area for incoming content, so we deselect all items in the tab menu, and fade out the content.
						 */
						request: function(){
							// Prepare
							var Ajaxy = $.Ajaxy;
							// Log what is happening
							if ( Ajaxy.options.debug ) window.console.debug('$.Ajaxy.Controllers.page.request', [this,arguments]);
							// Adjust Menu
							$menu.find('.active').removeClass('active');
							// Hide Content
							$content.stop(true,true).fadeOut(400);
							// Return true
							return true;
						},
						
						/**
						 * Our Page Controller's Response Action
						 * This is just like our Page Controller's Request Action, however for responses instead.
						 * We will use this to mark the appropriate item in the tab menu as active, to load the content into the tab area, and fade it in.
						 * This is all we have to do :-)
						 */
						response: function(){
							// Prepare
							var Ajaxy = $.Ajaxy, responseData = this.State.Response.data, state = this.state, State = this.State;
							// Log what is happening
							if ( Ajaxy.options.debug ) window.console.debug('$.Ajaxy.Controllers.page.response', [this,arguments]);
							// Adjust Menu
							$menu.children(':has(a[href*="'+State.raw.state+'"])').addClass('active').siblings('.active').removeClass('active');
							// Grab Content
							var $responseContent = $(responseData.content).find('#content');
							// Show Content
							var Action = this;
							$content.html($responseContent).fadeIn(400,function(){
								Action.documentReady({
									'content': $content
								});
								/**
								 * The above line calls our Action's documentReady function.
								 * This is a special function which is always there as it is automaticly provided by Ajaxy.
								 * We assign this to the variable Action, as inside the callback function for our jQuery effect the variable this will be point to somewhere else then!
								 * 
								 * So what does this function do?
								 * 1. It tells Ajaxy that the document is now ready for post processing.
								 * 2. Ajaxy will then determine if the state included a anchor that we want to scroll to and initiate, and do that.
								 * 3. Ajaxy will ajaxify the new content (provided the option [auto_ajaxify_documentReady] is true).
								 * 4. Ajaxy will sparkle the new contnet (provided the option [auto_sparkle_documentReady] is true, and jQuery Sparkle exists).
								 *    This is optional as there are no dependencies with jQuery Sparkle, but it is a nifty project which is worth a look:
								 *    http://www.balupton.com/projects/jquery-sparkle/
								 */
							});
							// Return true
							return true;
						},
						
						/**
						 * The Error Action
						 * This just like our Error Action in the Generic Controller,
						 * however this will only be fired for those Ajaxy errors which are known to be for the Page controller.
						 * For instance, we could have 404 error on one of our pages which directs here, allowing us to display the 404 page in the appropriate area and not leave the user in the dark.
						 */
						error: function(){
							// Prepare
							var Ajaxy = $.Ajaxy, errorData = this.State.Error.data, responseData = this.State.Response.data, state = this.state||'unknown';
							// Error Message
							var error_message = errorData.error;
							// Log what is happening
							window.console.warn('$.Ajaxy.Controllers.page.error', [this, arguments], error_message);
							// Mark the Error as Handled so we don't raise an error in our generic controller
							errorData.handled = true;
							// Deselect Menu Items
							$menu.find('.active').removeClass('active');
							// Display our Error Page
							var Action = this;
							$content.html(responseData.content).fadeIn(400,function(){
								Action.documentReady({
									'content': $content
								});
							});
							// Return true
							return true;
						}
					}
				}
			});
			
			// All done
		})(jQuery);
		// Back to global scope
	</script>
	
	<!-- Google Analytics --> 
	<script type="text/javascript"> 
		//<![CDATA[
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		//]]>
	</script> 
	<script type="text/javascript" src="../scripts/modernizr-1.5.min.js"></script> 
	<script type="text/javascript"> 
		//<![CDATA[
		if ( String(document.location).indexOf('balupton.com') !== -1 ) {
			try {
				var pageTracker = _gat._getTracker("UA-4446117-1");
				pageTracker._initData();
				if ( Modernizr ) {
					pageTracker._setCustomVar(1, "html5.boxshadow", Modernizr.boxshadow ? "yes" : "no" , 2 );
					pageTracker._setCustomVar(2, "html5.multiplebgs", Modernizr.multiplebgs ? "yes" : "no", 2 );
					pageTracker._setCustomVar(3, "html5.fontface", Modernizr.fontface ? "yes" : "no", 2 );
					pageTracker._setCustomVar(4, "html5.csstransitions", Modernizr.csstransitions ? "yes" : "no", 2 );
					pageTracker._setCustomVar(5, "html5.borderradius", Modernizr.borderradius ? "yes" : "no", 2 );
				}
				pageTracker._trackPageview();
			} catch(err) {}
		}
		//]]>
	</script>

	<!-- Re-Invigorate --> 
	<script type="text/javascript" src="http://include.reinvigorate.net/re_.js"></script>
	<script type="text/javascript">
		/*<![CDATA[*/
		if ( String(document.location).indexOf('balupton.com') !== -1 ) {
			try {
				reinvigorate.code = "702o7-66905bt9t0";
				reinvigorate.url_filter = function(url) {
					if(url == reinvigorate.session.url && reinvigorate.url_override != null) {
						reinvigorate.session.url = url = reinvigorate.url_override;
					}
					return url.replace(/^https?:\/\/(www\.)?/,"http://");
				}
				reinvigorate.ajax_track = function(url) {
					reinvigorate.url_override = url;
					reinvigorate.track(reinvigorate.code);
				}
				reinvigorate.url_override = null;
				reinvigorate.track(reinvigorate.code);
			} catch(err) {}
		}
		/*]]>*/
	</script>
	
</body>
</html>