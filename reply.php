<?php
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
$body=$_REQUEST['Body'];

echo "<Response>

	<Say>Hello, Can I speak to Monkeyface?</Say>
<Pause length='1'/>
<Say>Oh no your grandmother just died!</Say>
<Pause length='2'/>
<Say>I'm afraid it's true.</Say>
<Pause length='1'/>
<Say>It was a horrific monkey accident.  She was crushed under a barrel of monkeys.  If it's any consolation, her death was almost instantaneous and it was a lot of fun</Say>
<Pause length='1'/>
<Say>Stefani Joanne Angelina Germanotta (born March 28, 1986), better known by her stage name Lady Gaga, is an American recording artist. She began performing in the rock music scene of New York City's Lower East Side in 2003 and enrolled at New York University's Tisch School of the Arts. She soon signed with Streamline Records, an imprint of Interscope Records. During her early time at Interscope, she worked as a songwriter for fellow label artists and captured the attention of Akon, who recognized her vocal abilities, and signed her to his own label, Kon Live Distribution.</Say>
</Response>";
?>

