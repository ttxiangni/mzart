<?php
//清空缓存
    public function cache_clear() {
        //$_SERVER['DOCUMENT_ROOT'];
        echo "<div style='color: #00A1CB;font-size: 20px;width: 100px;padding: 10px;margin-left:50px;'><a href='/index' style='color: coral'>返回首页</a></div>";
       $this->delDirAndFile('../runtime');

    }
    function delDirAndFile( $dirName )
    {
        if ( $handle = opendir( "$dirName" ) ) {
            while ( false !== ( $item = readdir( $handle ) ) ) {
                if ( $item != "." && $item != ".." ) {
                    if ( is_dir( "$dirName/$item" ) ) {
                        $this->delDirAndFile( "$dirName/$item" );
                    } else {
                        if( unlink( "$dirName/$item" ) )

                            echo "<div style='margin-left:50px;width: 100%;background: bisque;padding: 10px;color: black'><span style='color: lightseagreen'>成功删除文件：</span> $dirName/$item</span></div><br/>";
                    }
                }
            }
            closedir( $handle );
            if( rmdir( $dirName ) )echo "<div style='margin-left:50px;width: 100%;background: lightskyblue;padding: 10px;color: black'><span style='color: red'>成功删除目录：</span> $dirName
    </div><br/>";
        }
    }