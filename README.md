# mysticlib
Mysticscripts.net Astrology Apps API Client Demo - For RapidAPI App https://rapidapi.com/mysticscripts/api/astrology5
<p>Live Demo using this Code base <a href='https://www.mysticscripts.net/rapidapidocs/'>Here</a>


<h1>How to Use this Code Sample</h1>
<p>Register account in Rapidapi and visit link <a href='https://rapidapi.com/mysticscripts/api/astrology5'>Here</a>
<br>Subscribe to the API to get the 'RapidAPI Application URL' and 'RapidAPI Key'
<br>Download the Demo Code Base(PHP scripts) from <a href='https://github.com/luck143/mysticlib'>Here</a>
<br>Open File mysticlib.php and Edit "$GLOBALS['apihost']" and "$GLOBALS['apikey']" Values with your own RapidAPI Account Details.


<h2>API ENDPOINTS Demos</h2>
<h3>Endpoint - /listapps/astrology/</h3>
<p>Get List of all Application in 'Astrology' Category (including subcategories)</p>

<p>Check code in File - demo_listapps.php</p>
<p>Result -<a href='demo_listapps.php'>Click Here</a></p>
<hr>

<h3>Endpoint - /overview/</h3>
<p>Get List of all Categories , Sub Categories and Applications in a TREE Fromat</p>
<p>Check Code in File - demo_fetch.php</p>
<p>Result -<a href='demo_overview.php'>Click Here</a></p><br>
<hr>

<h3>Endpoint - /fetch/</h3>
<p>Get List of all Applications . including Pagination and Searchable by Application Name</p>
<p>Check Code in File - demo_fetch_requirements.php</p>
<p>For Input Parameters -<a href='demo_fetch_requirements.php'>Click Here</a></p><br>
<p>Check Code in File - demo_fetch.php</p>
<p>Result Example -<a href='demo_fetch.php'>Click Here</a></p><br>
<hr>

<h3>Endpoint - /details/{application_id}</h3>
<p>Get Detail of Application</p>
<p>Check Code in File - demo_application_details.php</p>
<p>Result -<a href='demo_application_details.php'>Click Here</a></p><br>
<hr>

<h2>Working with Rendered HTML Codes</h2>
<h3>Endpoint - /render_form_inputs/</h3>
<p>Get All Input Parameters for rendering HTML Form of Application</p>
<p>Check Code in File - demo_render_form_requirements.php</p>
<p>Result -<a href='demo_render_form_requirements.php'>Click Here</a></p><br>
<hr>

<h3>Endpoint - /details/{application_id}</h3>
<p>Get Rendered HTML code of Application From and check the rendered result</p>
<p>For getting the Application Form HTML code and Displaying - Check Code in File - demo_render_form.php</p>
<p>For getting the Application Result HTML code and Displaying - Check Code in File - demo_render_result.php</p>
<p>Result -<a href='demo_render_form.php'>Click Here</a></p><br>
<hr>

<h3>Endpoint - /render_form_inputs/</h3>
<p>Get All Input Parameters for rendering HTML Form of Application</p>
<p>Check Code in File - demo_render_form_requirements.php</p>
<p>Result -<a href='demo_render_form_requirements.php'>Click Here</a></p><br>
<hr>


<h2>Working with Raw Json Data</h2>

<h3>Endpoint - /inputs/{application_id}</h3>
<p>Get Input Parameter for Any Single Application.
<br> File also include library to generate the From HTML Code using the Input Parameters obtatin from the API
</p>
<p>Check Code in File - demo_application_inputs.php</p>
<p>Result -<a href='demo_application_inputs.php'>Click Here</a></p>

<p>Result Generation File - demo_application_result.php</p>

<hr>

