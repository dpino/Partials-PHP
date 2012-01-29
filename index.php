<?

require_once('classes/partial.class.php');

$content = Partial::inline('partials/hello.html.php', array('name' => 'bambino'));

echo $content;

?>
