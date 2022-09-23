
	<!-- js -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
	<script src="assets/js/core.js"></script>
	<script src="assets/js/script.min.js"></script>
	<script src="assets/js/home.js"></script>
</body>
</html>

<?php

function getFileTypeLogo(string $extension):string{
    
    switch($extension){
        case 'pdf':
            $type='pdf-o';
            break;
        case 'docx':
        case 'doc':
            $type='word-o';
            break;
        case 'xls':
        case 'xlsx':
            $type='excel-o';
            break;
        case 'mp3':
        case 'ogg':
        case 'wav':
            $type='sound-o';
            break;
        case 'mp4':
        case 'mov':
            $type='video-o';
            break;
        case 'zip':
        case '7z':
        case 'rar':
            $type='zip-o';
            break;
        case 'jpg':
        case 'jpeg':
        case 'png':
            $type='photo-o';
            break;
        case 'html':
        case 'php':
        case 'py':
        case 'java':
        case 'c':
        case 'cpp':
            $type='code-o';
            break;
        case 'txt':
            $type='txt-o';
            break;
        default:
            $type='';
    }

    return 'file-'.$type;
}

