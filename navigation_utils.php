<?php
function llistarFitxers($substr = "") {
    echo "<ul>\n";
    $files = scandir(".",SCANDIR_SORT_ASCENDING);
    foreach ($files as $file) {
        if (str_starts_with($file, ".") || $file=="index.php" || str_contains($file, "utils.php"))
            continue;
        if (str_contains($file, $substr))
            echo "<li><a href='$file'>$file</a></li>\n";
    }
    echo "</ul>";
}
function llistarDirectoris($substr = "") {
    echo "<ul>\n";
    $dirs = scandir(".",SCANDIR_SORT_ASCENDING);
    foreach ($dirs as $dir) {
        if (str_starts_with($dir, ".") || $dir=="index.php" || str_contains($dir, "utils.php"))
            continue;
        if (str_contains($dir, $substr))
            echo "<li><a href='$dir/'>$dir</a></li>\n";
    }
    echo "</ul>";
}
?>