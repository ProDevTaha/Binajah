var btnradio1 = document.getElementById('btnradio1');
var btnradio2 = document.getElementById('btnradio2');
var btnradio3 = document.getElementById('btnradio3');
var model = document.getElementById('model');
var noticeBarSection = document.getElementById('noticeBarSection');
var logoSection = document.getElementById('logoSection');
btnradio1.addEventListener('click',function name(params) {
    model.value = 1;
    noticeBarSection.style.display = 'block';
    logoSection.style.display = 'block';
})
btnradio2.addEventListener('click',function name(params) {
    model.value = 2;
    noticeBarSection.style.display = 'none';
    logoSection.style.display = 'none';
})
btnradio3.addEventListener('click',function name(params) {
    model.value = 3;
    noticeBarSection.style.display = 'none';
    logoSection.style.display = 'none';
})



function initializeFilePond(elementId) {
    const fileInput = document.getElementById(elementId);
    FilePond.create(fileInput);
} 
// Counter to track content
let contentCounter = 1;

// Function to add more content
function moreWarranty() {
    // Maximum allowed divs
    const maxDivs = 4;

    // Check if the maximum divs limit is reached
    if (contentCounter >= maxDivs) {
        alert('Maximum number of Warranty is 4.');
        return;
    }

    // Increment counter
    contentCounter += 1;

    // Create a new content div
    const newContent = document.createElement('div');
    newContent.id = 'content' + contentCounter;
    newContent.className = 'mb-2';

    // Create input elements for text and file
    const textInput = document.createElement('input');
    textInput.type = 'text';
    textInput.name = 'text_warranty'+ contentCounter;
    textInput.className = 'form-control';
    textInput.placeholder = 'text.....';

    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.name = 'warranty_image'+ contentCounter;
    fileInput.id = 'warranty-image' + contentCounter;
    fileInput.credits = 'false';
    fileInput.className = 'filepond mt-2';

    // Append input elements to the new content div
    newContent.appendChild(textInput);
    newContent.appendChild(fileInput);

    // Append the new content div to the 'warranty' div
    const warrantyDiv = document.getElementById('warranty');
    warrantyDiv.appendChild(newContent);

    initializeFilePond('warranty-image' + contentCounter);

    // Show the "less" button
    document.getElementById('lessButton').style.display = 'inline-block';
}

// Function to remove content
function lessWarranty() {
    // Check if there are any divs to remove
    if (contentCounter > 1) {
        // Get the last content div
        const lastContent = document.getElementById('content' + contentCounter);

        // Remove the last content div
        lastContent.parentNode.removeChild(lastContent);

        // Decrement counter
        contentCounter -= 1;
    }

    // Hide the "less" button if only one div is remaining
    if (contentCounter === 1) {
        document.getElementById('lessButton').style.display = 'none';
    }
}

function toggleSocialMedia() {
    var showSocialMedia = document.getElementById('socialmedia');
    var showfooter = document.getElementById('showfooter');
    var checkbox = document.getElementById('btncheck1');

    if (checkbox.checked) {
        // Checkbox is checked, show social media and set value to 1
        showSocialMedia.style.display = 'block';
        showfooter.value = 1;
    } else {
        // Checkbox is unchecked, hide social media and set value to 0
        showSocialMedia.style.display = 'none';
        showfooter.value = 0;
    }
}



document.addEventListener("DOMContentLoaded", function() { 
    // create filepond for description sections
    const imageSection1 = document.querySelector('#imageSection1');
    const imageSection2 = document.querySelector('#imageSection2');
    const imageSection3 = document.querySelector('#imageSection3');
    const imageSection4 = document.querySelector('#imageSection4');
    const warrantyImage1 = document.querySelector('#warranty-image1');
    const warrantyImage2 = document.querySelector('#warranty-image2');
    const warrantyImage3 = document.querySelector('#warranty-image3');
    const warrantyImage4 = document.querySelector('#warranty-image4');
    const logo_funnel = document.getElementById('logo_funnel');
    const favicon_funnel = document.getElementById('favicon_funnel');
    const image_banner = document.getElementById('image_banner'); 
    const image_client_review = document.getElementById('image_client_review');
    FilePond.create(logo_funnel);
    FilePond.create(favicon_funnel); 
    FilePond.create(image_banner);
    FilePond.create(imageSection1);
    FilePond.create(imageSection2);
    FilePond.create(imageSection3);
    FilePond.create(imageSection4);
    FilePond.create(warrantyImage1);
    FilePond.create(warrantyImage2);
    FilePond.create(warrantyImage3);
    FilePond.create(warrantyImage4);
    FilePond.create(image_client_review);
    FilePond.setOptions({
        server: {
            process: '/admin/Funnels/UploadImageDescription',
            revert: '/admin/Funnels/deleteImagesDescription',
            method : 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        },
    });

    // create filepond for client review
    const imageReviewSection1 = document.querySelector('#imageReviewSection1');
    const imageReviewSection2 = document.querySelector('#imageReviewSection2');
    const imageReviewSection3 = document.querySelector('#imageReviewSection3');
    const imageReviewSection4 = document.querySelector('#imageReviewSection4');
    FilePond.create(imageReviewSection1);
    FilePond.create(imageReviewSection2);
    FilePond.create(imageReviewSection3);
    FilePond.create(imageReviewSection4);
    FilePond.setOptions({
        server: {
            process: '/admin/Funnels/UploadImageReview',
            revert: '/admin/Funnels/deleteImageReview',
            method : 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        },
    }); 
});

function  validateFormData(formDataObject){
    if(formDataObject.productIdSelected == ''){
        swal({
            position: 'top-end',
            icon: 'error',
            title: 'Product is required , please create product if not exists',
            showConfirmButton: false,
            timer:6000
        });
        return false;
    }else if (formDataObject.funnel_name == '') {
        swal({
            position: 'top-end',
            icon: 'error',
            title: 'funnel url is required',
            showConfirmButton: false,
            timer:6000
        });
        return false;
    }else if (formDataObject.funnel_name.includes(' ')){
        swal({
            position: 'top-end',
            icon: 'error',
            title: 'oops! You should name the funnel without any spaces.',
            showConfirmButton: false,
            timer:6000
        });
        return false;
    }

    else if (formDataObject.model == '') {
        swal({
            position: 'top-end',
            icon: 'error',
            title: 'Choose Template is Required',
            timer: 3000
        });
        return false;
    }
    // validation description
    // else if (formDataObject.titleSection1 == '' || formDataObject.descriptionsection1 == '' || formDataObject.imagesection1 == '' ) {
    //     swal({
    //         position: 'top-end',
    //         icon: 'error',
    //         title: 'image and title and description is required for section 1 of description',
    //         timer:6000
    //     });
    //     return false;
    // }else if (formDataObject.titleSection2 == '' || formDataObject.descriptionsection2 == '' || formDataObject.imagesection2 == '' ) {
    //     swal({
    //         position: 'top-end',
    //         icon: 'error',
    //         title: 'image and title and description is required for section 2 of description',
    //         timer:6000
    //     });
    //     return false;
    // }else if (formDataObject.titleSection3 == '' || formDataObject.descriptionsection3 == '' || formDataObject.imagesection3 == '' ) {
    //     swal({
    //         position: 'top-end',
    //         icon: 'error',
    //         title: 'image and title and description is required for section 3 of description',
    //         timer:6000
    //     });
    //     return false;
    // }
    // // else if (formDataObject.text_warranty1    == '' || formDataObject.warranty_image1 == ''
    // //     || formDataObject.text_warranty2 == '' || formDataObject.warranty_image2 == ''
    // //     || formDataObject.text_warranty3 == '' || formDataObject.warranty_image3 == '' ){
    // //     swal({
    // //         position: 'top-end',
    // //         icon: 'error',
    // //         title: 'title or icon of warranty required   minimum 3 warranties',
    // //         timer:6000
    // //     });
    // //     return false;
    // // }
    else if (formDataObject.image_banner == ''){
        swal({
            position: 'top-end',
            icon: 'error',
            title: 'image banner is required',
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
    var jsonArray = JSON.parse(formDataObject.basic);
    var valuesArray = jsonArray.map(function(obj) {
        return obj.value;
    });
    var formattedString = valuesArray.join(',');
    formDataObject.basic = formattedString;
    var isValid = validateFormData(formDataObject);
    if (isValid == false) {
        return;
    }else if (isValid == true) {
        $('body').loadingModal({text: 'The landing page is processing, please wait a few seconds...'});
        var delay = function(ms){ return new Promise(function(r) { setTimeout(r, ms) }) };
        setTimeout(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
            $.ajax({
                type: 'POST',
                url: '/admin/Funnels/Create',
                data:formDataObject,
                success: function (response) {
                   if (response.name == 'yes') {
                        var time = 1000;
                        delay(time).then(function() { $('body').loadingModal('destroy') ;} );
                        swal({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Please choose a different name for the funnel as it already exists.',
                            timer: 9000
                        });
                        return;
                   } else {
                    var time = 1000;
                    delay(time).then(function() { $('body').loadingModal('destroy') ;} );
                    var createFunnels = document.querySelectorAll('.createFunnel');
                    var updateFunnels = document.querySelectorAll('.updateFunnel');
                    var newFunnel = document.getElementById('newFunnel');
                    newFunnel.style.display = 'block';
                    createFunnels.forEach(function (createFunnel) {
                        createFunnel.style.display = 'none';
                    });
                    
                    updateFunnels.forEach(function (updateFunnel) {
                        updateFunnel.style.display = 'block';
                    });
                    
                    var funnel_id   = document.getElementById('funnel_id');funnel_id.value = response.funnel_id;
                    var funnelDescription_id  = document.getElementById('funnelDescription_id');funnelDescription_id.value = response.funnelDescription_id;
                    var wranty_id = document.getElementById('wranty_id');wranty_id.value = response.wranty_id;
                    // navigate to new folder for show funnel
                    // var navigate = document.getElementById("navigate");
                    // navigate.setAttribute("href", response.link);
                    // navigate.click();
                    window.open(response.link, '_blank');

                    swal({
                        position: 'top-end',
                        icon: 'success',
                        html: `
                            <a href="${response.link}">
                                <button class="btn btn-success">Go</button>
                            </a>
                        `,
                        title: 'greet your funnel is build successfully',
                        timer: 9000
                    });
                   }
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching products:", error);
                }
            });    
        }, 10000); 
       
    }
    
}

function sendDataFormToServerForUpdate(event){
    event.preventDefault();
    var formData = $('#formdata').serialize();
    // Convert the serialized data to an object
    var formDataObject = {};
    formData.split('&').forEach(function (pair) {
        pair = pair.split('=');
        formDataObject[pair[0]] = decodeURIComponent(pair[1] || '');
    });
    var jsonArray = JSON.parse(formDataObject.basic);
    var valuesArray = jsonArray.map(function(obj) {
        return obj.value;
    });
    var formattedString = valuesArray.join(',');
    formDataObject.basic = formattedString;
    var isValid = validateFormData(formDataObject);
    if (isValid == false) {
        return;
    }else{
        $('body').loadingModal({text: 'The landing page is processing, please wait a few seconds...'});
        var delay = function(ms){ return new Promise(function(r) { setTimeout(r, ms) }) };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
            $.ajax({
                type: 'POST',
                url: '/admin/Funnels/Update',
                data:formDataObject,
                success: function (response) {
                    var time = 500;
                    delay(time).then(function() { $('body').loadingModal('destroy') ;} );
                    swal({
                        position: 'top-end',
                        icon: 'success',
                        html: `
                            <a href="${response.link}">
                                <button class="btn btn-success">Go</button>
                            </a>
                        `,
                        title: 'greet your funnel is updated successfully',
                        timer: 9000
                    });
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching products:", error);
                }
            });    
       
    }
    
}


const productTitles = document.getElementsByClassName('productTitle');

for (const productTitle of productTitles) {
    productTitle.addEventListener('input', function (event) {
        const productTitleValue = productTitle.value;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '/admin/Reviews/Create/getProduct/' + productTitleValue,
            success: function (response) {
                var availableTags = response.products.map(product => ({
                    label: product.title,
                    value: product.title,
                    id: product.id
                }));

                // Initialize autocomplete for the specific input element
                $("#tags").autocomplete({
                    source: availableTags,
                    select: function (event, ui) {
                        // Set only the title in the input field
                        $(this).val(ui.item.label);

                        let productIdSelected = document.getElementById('productIdSelected');
                        productIdSelected.value =  ui.item.id;
                    }
                });
            },
            error: function (xhr, status, error) {
                console.error("Error fetching products:", error);
            }
        });
    });
}


const facebookPixels = document.getElementsByClassName('facebooPixel');

for (const facebookPixel of facebookPixels) {
    facebookPixel.addEventListener('input', function (event) {
        const facebookPixelValue = facebookPixel.value;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '/admin/Funnels/Create/getFacebookPixels/' + facebookPixelValue,
            success: function (response) {
                console.log(response);

                // Extract titles and ids from the response
                var availableTags = response.facebookPixels.map(facebookPixel => ({
                    label: facebookPixel.name,
                    value: facebookPixel.name,
                    pixelID: facebookPixel.pixelID
                }));

                // Initialize autocomplete for the specific input element
                $("#tagsFacebook").autocomplete({
                    source: availableTags,
                    select: function (event, ui) {
                        // Set only the title in the input field
                        $(this).val(ui.item.label);

                        let facebookIdSelected = document.getElementById('facebookPixelId');
                        facebookIdSelected.value =  ui.item.pixelID;
                    }
                });
            },
            error: function (xhr, status, error) {
                console.error("Error fetching facebook Pixels :", error);
            }
        });
    });
}
const tiktokPixels = document.getElementsByClassName('tiktokPixel');

for (const tiktokPixel of tiktokPixels) {
    tiktokPixel.addEventListener('input', function (event) {
        const tiktokPixelValue = tiktokPixel.value;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '/admin/Funnels/Create/getTiktokPixels/' + tiktokPixelValue,
            success: function (response) {
                console.log(response);

                // Extract titles and ids from the response
                var availableTags = response.tiktokPixels.map(tiktokPixel => ({
                    label: tiktokPixel.name,
                    value: tiktokPixel.name,
                    pixelID: tiktokPixel.tiktokID
                }));

                // Initialize autocomplete for the specific input element
                $("#tagsTiktok").autocomplete({
                    source: availableTags,
                    select: function (event, ui) {
                        // Set only the title in the input field
                        $(this).val(ui.item.label);

                        let tiktokIdSelected = document.getElementById('tiktokPixelId');
                        tiktokIdSelected.value =  ui.item.pixelID;
                    }
                });
            },
            error: function (xhr, status, error) {
                console.error("Error fetching products:", error);
            }
        });
    });
}


function showFilePondWarranty(index){
    if (index == 1) {
        document.getElementById('imageWarranty1ReadyUse').style.display='none';
        document.getElementById('imageWarranty1Ready').value ='';
        document.getElementById('content1').style.display='block';
    }else if(index == 2){
        document.getElementById('imageWarranty2ReadyUse').style.display='none';
        document.getElementById('imageWarranty2Ready').value ='';
        document.getElementById('content2').style.display='block';
    }
}