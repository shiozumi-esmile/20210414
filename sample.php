<?php

$filename = tempnam('/tmp', 'zlibtest') . '.gz';
echo "<html>\n<head></head>\n<body>\n<pre>\n";
$s = "Only a test, test, test, test, test, test, test, test!\n";

// 最大限の圧縮を指定して書きこみ用にファイルをオープン
$zp = gzopen($filename, "w9");

// 文字列をファイルに書きこむ
gzwrite($zp, $s);

// ファイルを閉じる
gzclose($zp);

// 読みこみ用にファイルをオープン
$zp = gzopen($filename, "r");

// 3 文字読みこむ
echo gzread($zp, 3);

// ファイルの終端まで出力して閉じる
gzpassthru($zp);
gzclose($zp);

echo "\n";

// ファイルをオープンし、内容を出力する (2回目)
if (readgzfile($filename) != strlen($s)) {
        echo "Error with zlib functions!";
}
unlink($filename);
echo "</pre>\n</body>\n</html>\n";

?>
