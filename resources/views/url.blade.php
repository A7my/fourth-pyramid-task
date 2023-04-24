<?php $url1 = "https://www.google.com"; ?>
<?php $url2 = "www.google.com"; ?>
<?php $url3 = "index"; ?>


<a href="{{ url($url1) }}">URL1</a>
<br>
<a href="{{ url('https://' . $url2) }}">URL2</a>
<br>
<a href="{{ url($url3) }}">URL3</a>
