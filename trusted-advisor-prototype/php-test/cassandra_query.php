<?php

require('phpcassa/lib/autoload.php');

use phpcassa\ColumnFamily;
use phpcassa\ColumnSlice;
use phpcassa\Connection\ConnectionPool;

$pool = new ConnectionPool('DEMO', array('172.31.11.94', '172.31.12.112', '172.31.15.246'));

$users = new ColumnFamily($pool, 'users');
$sd = $users->get('sd');

?>

<pre>

<?php print_r($sd); ?>

</pre>
