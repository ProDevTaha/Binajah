document.addEventListener("DOMContentLoaded", function() {
    const store_logo = document.getElementById('store_logo');
    const favicon = document.getElementById('store_favicon'); 
    const banner_img1 = document.getElementById('banner_img1');
    const imageOffer = document.getElementById('imageOffer');
    const banner_img2 = document.getElementById('banner_img2');
    FilePond.create(store_logo);
    FilePond.create(favicon);
    FilePond.create(banner_img1);
    FilePond.create(banner_img2); 
    FilePond.create(imageOffer); 
    FilePond.setOptions({
        server: {
            process: '/admin/Store/UploadImages',
            revert: '/admin/Store/deleteImages',
            method : 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        },
    });

});



function sendDataFormToServer(event){
    event.preventDefault();
    var formData = $('#formdata').serialize();
    // Convert the serialized data to an object
    var formDataObject = {};
    formData.split('&').forEach(function (pair) {
        pair = pair.split('=');
        formDataObject[pair[0]] = decodeURIComponent(pair[1] || '');
    });
    // console.log(formDataObject);
    // return false;
    $('body').loadingModal({text: 'Thank you for your patience as we process the data. Please wait a moment...'});
    var delay = function(ms){ return new Promise(function(r) { setTimeout(r, ms) }) };
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: '/admin/Store/PersisteData',
        data:formDataObject,
        success: function (response) {
            var time = 500;
            delay(time).then(function() { $('body').loadingModal('destroy') ;} );
            swal({
                position: 'top-end',
                icon: 'success',
                title: 'The data has been saved successfully.',
                timer: 9000
            });
        },
        error: function (xhr, status, error) {
            console.error("Error fetching products:", error);
        }
    });    
}

function sendDataFormToServerForSaveOffer(event){
    event.preventDefault();
    var formData = $('#formdata').serialize();
    // Convert the serialized data to an object
    var formDataObject = {};
    formData.split('&').forEach(function (pair) {
        pair = pair.split('=');
        formDataObject[pair[0]] = decodeURIComponent(pair[1] || '');
    });

    $('body').loadingModal({text: 'Thank you for your patience as we process the data. Please wait a moment...'});
    var delay = function(ms){ return new Promise(function(r) { setTimeout(r, ms) }) };
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: '/admin/Offers/Create',
        data:formDataObject,
        success: function (response) {
           if (response.limit && response.limit !== '') {
                var time = 100;
                delay(time).then(function() { $('body').loadingModal('destroy') ;} );
                swal({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Limit reached. No more offers can be added.',
                    timer: 9000
                });
           }else{
            var time = 100;
            delay(time).then(function() { $('body').loadingModal('destroy') ;} );
            let  updateoffer = document.getElementById('updateoffer');
            let  createoffer = document.getElementById('createoffer');
            let  newoffer = document.getElementById('newoffer');
            let  offer_id = document.getElementById('offer_id');
            updateoffer.style.display = 'block';
            createoffer.style.display = 'none';
            newoffer.style.display = 'block';
            offer_id.value = response.offer_id ;
            swal({
                position: 'top-end',
                icon: 'success',
                title: 'The Offer has been saved successfully.',
                timer: 9000
            });
           }
        },
        error: function (xhr, status, error) {
            console.error("Error fetching products:", error);
        }
    });    
}


function sendDataFormToServerForSaveAdvertising(event){
    event.preventDefault();
    var formData = $('#formdata').serialize();
    // Convert the serialized data to an object
    var formDataObject = {};
    formData.split('&').forEach(function (pair) {
        pair = pair.split('=');
        formDataObject[pair[0]] = decodeURIComponent(pair[1] || '');
    });

    $('body').loadingModal({text: 'Thank you for your patience as we process the data. Please wait a moment...'});
    var delay = function(ms){ return new Promise(function(r) { setTimeout(r, ms) }) };
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: '/admin/Offers/CreateAdvertising',
        data:formDataObject,
        success: function (response) {
            var time = 100;
            delay(time).then(function() { $('body').loadingModal('destroy') ;} );
            swal({
                position: 'top-end',
                icon: 'success',
                title: 'The Advertising has been saved successfully.',
                timer: 9000
            });
        },
        error: function (xhr, status, error) {
            console.error("Error fetching products:", error);
        }
    });    
}


function sendDataFormToServerForUpdateOffer(event){
    event.preventDefault();
    var formData = $('#formdata').serialize();
    // Convert the serialized data to an object
    var formDataObject = {};
    formData.split('&').forEach(function (pair) {
        pair = pair.split('=');
        formDataObject[pair[0]] = decodeURIComponent(pair[1] || '');
    });

    $('body').loadingModal({text: 'Thank you for your patience as we process the data. Please wait a moment...'});
    var delay = function(ms){ return new Promise(function(r) { setTimeout(r, ms) }) };
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: '/admin/Offers/Update', 
        data:formDataObject,
        success: function (response) {
            var time = 100;
            delay(time).then(function() { $('body').loadingModal('destroy') ;} );
            swal({
                position: 'top-end',
                icon: 'success',
                title: 'The Offer has been saved successfully.',
                timer: 9000
            });
        },
        error: function (xhr, status, error) {
            console.error("Error fetching products:", error);
        }
    });    
}

function deleteAdvertising(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: '/admin/Offers/DeleteAdvertising', 
        success: function (response) {
            swal({
                position: 'top-end',
                icon: 'success',
                title: 'The Offer has been deleted successfully.',
                timer: 9000
            });
            window.location.reload();
            
        },
        
        error: function (xhr, status, error) {
            console.error("Error fetching products:", error);
        }
    });    
}
function deleteOffer(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST', 
        url: '/admin/Offers/Delete' , 
        success: function (response) {
            swal({
                position: 'top-end',
                icon: 'success',
                title: 'The Offer has been deleted successfully.',
                timer: 9000
            });
            window.location.reload();
            
        },
        
        error: function (xhr, status, error) {
            console.error("Error fetching products:", error);
        }
    });    
}