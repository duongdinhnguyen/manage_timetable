
    const input = document.querySelector('.from-from__group-input');
    const preview = document.querySelector('.preview');
    const image = document.querySelector('.from-from__group-image img');
    console.log(preview.children[0].tagName)
    input.addEventListener('change', updateImageDisplay);
    
    function updateImageDisplay() {
        

        const curFiles = input.files;
            
        for(const file of curFiles) {
        
        console.log(file)
        if(validFileType(file)) {
            image.src=""
            preview.children[0].textContent = `File name ${file.name}, file size ${returnFileSize(file.size)}.`;
            
            image.src = URL.createObjectURL(file);
            
        
        } else {
            preview.children[0].textContent = `File name ${file.name}: Not a valid file type. Update your selection.`;
            
        }

        }
        // }
    }

// https://developer.mozilla.org/en-US/docs/Web/Media/Formats/Image_types
    const fileTypes = [
        'image/apng',
        'image/bmp',
        'image/gif',
        'image/jpeg',
        'image/pjpeg',
        'image/png',
        'image/svg+xml',
        'image/tiff',
        'image/webp',
        `image/x-icon`
    ];

    function validFileType(file) {
    return fileTypes.includes(file.type);
    }

    function returnFileSize(number) {
    if(number < 1024) {
        return number + 'bytes';
    } else if(number > 1024 && number < 1048576) {
        return (number/1024).toFixed(1) + 'KB';
    } else if(number > 1048576) {
        return (number/1048576).toFixed(1) + 'MB';
    }
    }
