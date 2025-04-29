function initializeFilePond(elementId) {
    const fileInput = document.getElementById(elementId);
    FilePond.create(fileInput);
} 

let contentCounter = 1;

function moreWarranty() {
    const maxDivs = 10;

    if (contentCounter >= maxDivs) {
        alert('Maximum number of courses is 10.');
        return;
    }

    contentCounter += 1;

    const newContent = document.createElement('div');
    newContent.id = 'content' + contentCounter;
    newContent.className = 'mb-2';

    const textInput = document.createElement('input');
    textInput.type = 'text';
    textInput.name = 'title'+ contentCounter;
    textInput.className = 'form-control';
    textInput.placeholder = 'title.....';

    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.name = 'video'+ contentCounter;
    fileInput.id = 'video_course' + contentCounter;
    fileInput.credits = 'false';
    fileInput.className = 'filepond mt-2';

    newContent.appendChild(textInput);
    newContent.appendChild(fileInput);

    const warrantyDiv = document.getElementById('warranty');
    warrantyDiv.appendChild(newContent);

    initializeFilePond('video_course' + contentCounter);

    document.getElementById('lessButton').style.display = 'inline-block';
}

function lessWarranty() {
    if (contentCounter > 1) {
        const lastContent = document.getElementById('content' + contentCounter);

        lastContent.parentNode.removeChild(lastContent);
        contentCounter -= 1;
    }

    if (contentCounter === 1) {
        document.getElementById('lessButton').style.display = 'none';
    }
}

function toggleSocialMedia() {
    var showSocialMedia = document.getElementById('socialmedia');
    var showfooter = document.getElementById('showfooter');
    var checkbox = document.getElementById('btncheck1');

    if (checkbox.checked) {
        showSocialMedia.style.display = 'block';
        showfooter.value = 1;
    } else {
        showSocialMedia.style.display = 'none';
        showfooter.value = 0;
    }
}



document.addEventListener("DOMContentLoaded", function() { 
    const videoCourse1 = document.querySelector('#video_course1');
    const videoCourse2 = document.querySelector('#video_course2');
    const videoCourse3 = document.querySelector('#video_course3');
    const videoCourse4 = document.querySelector('#video_course4');
    const videoCourse5 = document.querySelector('#video_course5');
    const videoCourse6 = document.querySelector('#video_course6');
    const videoCourse7 = document.querySelector('#video_course7');
    const videoCourse8 = document.querySelector('#video_course8');
    const videoCourse9 = document.querySelector('#video_course9');
    const videoCourse10 = document.querySelector('#video_course10');
    const imageCourse = document.querySelector('#imageCourse');

    FilePond.create(videoCourse1);
    FilePond.create(videoCourse2);
    FilePond.create(videoCourse3);
    FilePond.create(videoCourse4);
    FilePond.create(videoCourse5);
    FilePond.create(videoCourse6);
    FilePond.create(videoCourse7);
    FilePond.create(videoCourse8);
    FilePond.create(videoCourse9);
    FilePond.create(videoCourse10);
    FilePond.create(imageCourse);
    FilePond.setOptions({
        server: {
            process: '/admin/Courses/UploadVideos',
            revert: '/admin/Courses/DeleteVideos',
            method : 'POST',
            maxFileSize: '500MB',
            chunkUploads: true,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        },
    });
});
