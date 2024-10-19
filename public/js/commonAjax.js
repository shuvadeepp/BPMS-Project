function commonPage(csrfToken) {
    // alert(SITE_PATH + '/Ajax/index');
    $.ajax({
        type:"POST",
        url: SITE_PATH + "/Ajax/index", 
        dataType: "JSON",
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function (res) { 
            // console.log(res);
            if (res.status == 200) {
                let result = res.Data;
                // console.log(result[0].ID);
                let htm = `<div class="cont-details">`; 
                    if(result != null){
                    htm +=  `<div class="cont-top">
                                <div class="cont-left text-center">
                                    <span class="fa fa-phone text-primary"></span>
                                </div>
                                <div class="cont-right">
                                    <h6>Call Us</h6>
                                    <p class="para"><a href="tel:+91 ${result[0].MobileNumber} "> ${result[0].MobileNumber} </a></p>
                                </div>
                            </div>`;
                    htm +=  `<div class="cont-top margin-up">
                                <div class="cont-left text-center">
                                    <span class="fa fa-envelope-o text-primary"></span>
                                </div>
                                <div class="cont-right">
                                    <h6>Email Us</h6>
                                    <p class="para"><a href="mailto: ${result[0].Email} " class="mail"> ${result[0].Email} </a></p>
                                </div>
                            </div>`;
                    htm +=  `<div class="cont-top margin-up">
                                <div class="cont-left text-center">
                                    <span class="fa fa-map-marker text-primary"></span>
                                </div>
                                <div class="cont-right">
                                    <h6>Address</h6>
                                    <p class="para"> ${result[0].PageDescription} </p>
                                </div>
                            </div>`;
                    htm +=  `<div class="cont-top margin-up">
                                <div class="cont-left text-center">
                                    <span class="fa fa-map-marker text-primary"></span>
                                </div>
                                <div class="cont-right">
                                    <h6>Time</h6>
                                    <p class="para"> ${result[0].Timing } </p>
                                </div>
                            </div> `;
                    }
                htm += `</div>`;
                $('#commonData').html(htm);
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText); 
        }
    }); 
}