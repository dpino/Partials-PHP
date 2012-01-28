<?

require_once('classes/partial.class.php');

$content = Partial::srender('partials/hello.html.php', array('name' => 'bambino'));

echo $content;

?>
