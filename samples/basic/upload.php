<?php
$tempDir = __DIR__ . DIRECTORY_SEPARATOR . 'temp';
$class_path = str_replace("samples/basic","",__DIR__).'Flow/';

if (!file_exists($tempDir)) {
	mkdir($tempDir);
}

function prepareFileNameForUrl($fname){
    return str_replace('.', '$$$', $fname);
}

function prepareFileNameForSave($fname){
    return str_replace('$$$', '.', $fname);
}

require_once($class_path . 'Autoloader.php');
\Flow\Autoloader::register();

//require_once 'Flow/ConfigInterface.php';
//require_once 'Flow/Config.php';
//require_once 'Flow/File.php';
//require_once 'Flow/RequestInterface.php';
//require_once 'Flow/Request.php';
//require_once 'Flow/Basic.php';
//if ($_SERVER['REQUEST_METHOD'] === 'GET') {
////	$chunkDir = $tempDir . DIRECTORY_SEPARATOR . $_GET['flowIdentifier'];
////	$chunkFile = $chunkDir.'/chunk.part'.$_GET['flowChunkNumber'];
////	if (file_exists($chunkFile)) {
////		header("HTTP/1.0 200 Ok");
////	} else {
////		header("HTTP/1.0 404 Not Found");
////	}
//    
//    
//    $filename = isset($_FILES['file']) ? prepareFileNameForUrl($_FILES['file']['name']) : $_GET['flowFilename'];
//    
//    if (Flow\Basic::save($filename, $tempDir)) {
//        // file saved successfully and can be accessed at './final_file_destination'
//      } else {
//        // This is not a final chunk, continue to upload
//        echo json_encode([
//            'success' => true,
//            'files' => $_FILES,
//            'get' => $_GET,
//            'post' => $_POST,
//            //optional
//            'flowTotalSize' => isset($_FILES['file']) ? $_FILES['file']['size'] : $_GET['flowTotalSize'],
//            'flowIdentifier' => isset($_FILES['file']) ? $_FILES['file']['name'] . '-' . $_FILES['file']['size']
//                : $_GET['flowIdentifier'],
//            'flowFilename' => isset($_FILES['file']) ? prepareFileNameForUrl($_FILES['file']['name']) : $_GET['flowFilename'],
//            'flowRelativePath' => isset($_FILES['file']) ? $_FILES['file']['tmp_name'] : $_GET['flowRelativePath']
//        ]);
//    }
//}

$config = new \Flow\Config(array(
   'tempDir' => __DIR__ .'/temp'
));

$request = new \Flow\Request();

if (\Flow\Basic::save(__DIR__ . '/uploads/' . $request->getFileName(), $config, $request)) {
  echo "Hurray, file was saved in " . __DIR__ . '/uploads/' . $request->getFileName();
}
exit;
// Just imitate that the file was uploaded and stored.
//sleep(2);
