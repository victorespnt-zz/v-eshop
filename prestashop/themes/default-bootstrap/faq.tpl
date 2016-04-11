<h1>FAQ</h1><br/>
<p>
	 <ul>
	 {foreach from=$questions key=question item=answers}
	 <li style="color:#16A59B; font-size:2em;">{$question}</li><br/>
	 <li style="font-size: 1.5em; line-height:2em;">{$answers}</li><br/>
	 {/foreach}
	</ul>
</p>	