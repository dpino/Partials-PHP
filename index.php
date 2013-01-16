<?

require_once('classes/partial.class.php');

// Example 1: render directly includes a file and renders it
// Partial::render('partials/hello.html.php', array('name' => 'bambino'));

// Example 2: inline includes a file, renders it and outputs its content to a variable
$content = Partial::inline('partials/hello.html.php', array('name' => 'bambino'));
echo $content;

?>
