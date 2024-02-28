<?php 
    $currentPage = ($offset / 50); 
    echo "<div class='pagesContainer'>";
    echo "<span>$pagesCount $title</span>";
    echo "<div>";
    for($i=0;$i<$pages;$i++) {
        $class = ($currentPage == $i) ? 'activePageSquare' : 'pageSquare';
        echo "<a href='$href?offset=" . ($i * 50) .  
        "&limit=50' class=$class>" . $i + 1 . "</a>";
    }
    echo "</div>";
    echo "</div>";
?>