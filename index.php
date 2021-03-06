<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Data-Design</title>
	</head>
	<body>
		<h1>Data Design Project </h1>
		<p><strong>utilizing mySQL to create a model of the database system
			for the comments on an average Imgur.com webpage</strong></p>
		<h1>UI / UX</h1>
		<section>
			<h2>Persona:</h2>

			<h3>Name: Ricky James </h3>
			<ul>
				<li>Gender: male</li>
				<li>Age: 22</li>
				<li>Profession: University Student (major: Psychology; Minor: Studio Art)</li>
			</ul>
			<h3>Technology: </h3>
			<ul>
				<li>Android Galaxy S8 Android 8.0 Oreo</li>
				<li>Laptop: HP enV 17 Windows 10 latest version</li>
				<li>very confident with technology</li>
			</ul>
			<h3>Attitude: How they approach <em>Imgur.com</em></h3>
			<ul>
				<li>proud member of an online community builder, real conversations</li>
				<li>Optimistic, giving, make a difference & create change if possible</li>
				<li>Casual, yet suprisingly empathetic across anonymity</li>
			</ul>
			<!--Goals? -->
			<h3>Frustrations</h3>
			<h4> with competition:</h4>
			<ul>
				<li>difficult or unengaging interface</li>
				<li>images seperate from forum-esque interface</li>
			</ul>
		</section>
		<section>
			<h2>User Story</h2>
			<p> As a dedicated member of the Imgur community, I want to comment an reference to an inside joke
				on the comment section of an image</p>
			<h2>Use Case</h2>
			<p> <strong> Ricky views an image and wants to comment, and potentially reply to any replies to the original
				comment </strong></p>
			<h3>Pre Conditions</h3>
			<ul>
				<li>already has an account, logged in</li>
				<li>familiar with the interface</li>
				<li>very engaged with in-site culture</li>
				<!--has a thought about the image displayed-->
			</ul>
			<h3>Post Conditions</h3>
			<ul>
				<li>able to view own comment on the image</li>
				<li>able to view replies to comment</li>
				<li>able to reply to comments</li>
			</ul>
		</section>
		<section>
			<h2>Interaction Flow</h2>
			<ul>
				<li>Ricky views a image on Imgur.com, decides he wants to comment</li>
				<li>Imgur prompts him with a text entry field</li>
				<li>Ricky writes his comment; hits submit</li>
				<li>Imgur writes text to database, returns success token</li>
				<!--<li>Ricky sees his comment, and a reply to it, hits reply to that reply</li>-->
				<!--<li>Imgur prompts him with text area<li>-->
				<!--<li>Ricky writes his new comment; hits submit</li>-->
				<!--<li>Imgur writes new "grandchild" reply to database, retains association with original comment</li>-->
			</ul>
		</section>
		<section id="conceptual-model">
			<h1>Conceptual Model</h1>
			<div>
				<h2>Entities</h2>
				<h3>profile</h3>
				<dl>
					<dt>profileId</dt>
					<dd>primary key</dd>
					<dt>profileHash</dt>
					<dt>profileTimeStamp</dt>
					<dt>profilePhone</dt>
					<dt>profileEmail</dt>
					<dt>profileUsername</dt>

				</dl>
				<h3>comment</h3>
				<dl>
					<dt>commentId</dt>
					<dd>primary key</dd>
					<dt>commentProfileId</dt>
					<dd>foriegn key</dd>
					<dt>commentCommentId</dt>
					<dd>foreign key calling replys</dd>
					<dt>commentContent</dt>
					<dt>commmentTimestamp</dt>
					<dd>register time</dd>
					<dt>commentViaTag</dt>
					<dd>especially for persona, designate whether its via iphone or android,</dd>
				</dl>
			</div>
		</section>
	</body>
</html>

