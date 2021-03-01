<link rel="stylesheet"
 href="style.css.php?color=gold&bg=grey&size=40px";>

<h2>#1 &lt;Link&gt;</h2>
<!-- 3 example -->
<a href="response_examples.php?a=3&b=6">result</a>
    <form action="response_examples.php" method="get">
    <input type="hidden" name="a" value="7">
    <input type="hidden" name="b" value="19">
    <button type="submit">#3 Get calc</button>
</form>
<!-- 4 example -->
    <form action="response_examples.php" method="post">
    <input type="hidden" name="a" value="7">
    <input type="hidden" name="b" value="19">
    <button type="submit">#4 Post concatenate</button>
</form>
<!-- 5 example -->
<form action="response_examples.php?a=7&b=2" method="post">
    <button type="submit">#5 Post calc</button>
</form>
<!-- 6 example -->
<form action="response_examples.php?a=8&b=5" method="post">
    <input type="hidden" name="next" value="request_examples.php">
    <button type="submit">#6 Post calc with headers</button>
</form>