function  validateFormData(formDataObject){
    if(formDataObject.funnel == ''){
        swal({
            position: 'top-end',
            icon: 'error',
            title: 'Funnel is required ',
            showConfirmButton: false,
            timer:6000
        });
        return false;
    }else if (formDataObject.page == '') {
        swal({
            position: 'top-end',
            icon: 'error',
            title: 'white page is required',
            showConfirmButton: false,
            timer:6000
        });
        return false;
    }else if (formDataObject.basic == ''){
        swal({
            position: 'top-end',
            icon: 'error',
            title: 'countries is required',
            showConfirmButton: false,
            timer:6000
        });
        return false;
    } 

    return true;
} 
function  validateFormDataStore(formDataObject){
    if (formDataObject.page == '') {
        swal({
            position: 'top-end',
            icon: 'error',
            title: 'white page is required',
            showConfirmButton: false,
            timer:6000
        });
        return false;
    }else if (formDataObject.basic == ''){
        swal({
            position: 'top-end',
            icon: 'error',
            title: 'countries is required',
            showConfirmButton: false,
            timer:6000
        });
        return false;
    } 

    return true;
} 

function sendDataFormToServer(event){
    event.preventDefault();
    var formData = $('#formdata').serialize();
    // Convert the serialized data to an object
    var formDataObject = {};
    formData.split('&').forEach(function (pair) {
        pair = pair.split('=');
        formDataObject[pair[0]] = decodeURIComponent(pair[1] || '');
    });
    var isValid = validateFormData(formDataObject);
    
    var jsonArray = JSON.parse(formDataObject.basic);
    var valuesArray = jsonArray.map(function(obj) {
        return obj.value;
    });
    var formattedString = valuesArray.join(',');
    formDataObject.basic = formattedString;
    if (isValid == false) {
        return false;
    }else if (isValid == true) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            type: 'POST',
            type: 'POST',
            url: '/admin/Cloaking/Create',
            data:formDataObject,
            success: function (response) {
                if (response.funnelReadyUse == 'ready use') {
                    swal({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Oops, this funnel is already configured to use cloaking.',
                        timer: 9000
                    })
                }else if(response.success == 'success create') {
                    swal({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Great, cloaking is built successfully',
                        timer: 9000
                    }).then((result) => {
                        // Reset the form once the sweet alert is confirmed or dismissed
                        document.getElementById('formdata').reset();
                    });
                }
            },            
            error: function (xhr, status, error) {
                console.error("Error fetching products:", error);
            }
        });    
       
    }
    
}



function sendDataFormToServerStore(event){
    event.preventDefault();
    var formData = $('#formdata').serialize();
    // Convert the serialized data to an object
    var formDataObject = {};
    formData.split('&').forEach(function (pair) {
        pair = pair.split('=');
        formDataObject[pair[0]] = decodeURIComponent(pair[1] || '');
    });
    var isValid = validateFormDataStore(formDataObject);
    
    var jsonArray = JSON.parse(formDataObject.basic);
    var valuesArray = jsonArray.map(function(obj) {
        return obj.value;
    });
    var formattedString = valuesArray.join(',');
    formDataObject.basic = formattedString;
    if (isValid == false) {
        return false;
    }else if (isValid == true) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            type: 'POST',
            url: '/admin/Cloaking/CreateStore',
            data:formDataObject,
            success: function (response) {
                if (response.storeReadyUse == 'ready use') {
                    swal({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Oops, Store is already configured to use cloaking.',
                        timer: 9000
                    })
                }else{
                    swal({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Great, cloaking is built successfully',
                        timer: 9000
                    }).then((result) => {
                        // Reset the form once the sweet alert is confirmed or dismissed
                        document.getElementById('formdata').reset();
                    });
                }
            },            
            error: function (xhr, status, error) {
                console.error("Error fetching products:", error);
            }
        });    
       
    }
    
}


const funnelNames = document.getElementsByClassName('funnelName');
for (const funnelName of funnelNames) {
    funnelName.addEventListener('input', function (event) {
        const funnelNameValue = funnelName.value;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '/admin/Cloaking/fetchFunnelsNames/' + funnelNameValue,
            success: function (response) {
                // Extract titles and ids from the response
                var availableTags = response.funnels.map(funnel => ({
                    label: funnel.funnel_name,
                    value: funnel.funnel_name,
                    id: funnel.id
                }));

                // Initialize autocomplete for the specific input element
                $("#tags").autocomplete({
                    source: availableTags,
                    select: function (event, ui) {
                        // Set only the title in the input field
                        $(this).val(ui.item.label);

                        let funnelID = document.getElementById('funnelID');
                        funnelID.value =  ui.item.id;
                    }
                });
            },
            error: function (xhr, status, error) {
                console.error("Error fetching products:", error);
            }
        });
    });
}