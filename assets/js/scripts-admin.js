(function($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });
})(jQuery);

$( document ).ready(function() {

    $("#table-product").bootstrapTable();
    $("#table-company").bootstrapTable();
    $("#table-transaction").bootstrapTable();
    $("#table-report-product").bootstrapTable();
    $("#table-report-company").bootstrapTable();
    $("#table-report-transaction").bootstrapTable();


    $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });

    $(".currency").keyup(function(e){
        // skip for arrow keys
        if(event.which >= 37 && event.which <= 40){
        event.preventDefault();
        }

        $(this).val(function(index, value) {
            return value
            .replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    });

    
    $("#btnSaveProduct").click(function(){

        var code    = $("#codeProductAdd").val();
        var name    = $("#nameProductAdd").val();
        var buying  = $("#buyingProductAdd").val();
        var selling = $("#sellingProductAdd").val();

        var csrfValue     = $("#csrfToken").val();
        var csrfName      = $("#csrfToken").attr('name');

        $.ajax({
            method: "POST",
            url: BASE_URL+"product/save",
            dataType: "json",
            data: {code:code, name:name, buying:buying, selling:selling, [csrfName]:csrfValue},
                success: function(data) {

                $("#csrfToken").val(data["csrf"]);

                if(data["duplicate"] == true){
                    Swal.fire({
                        icon  :  "warning",
                        text  : "Duplicate Data Code Product",
                        timer : 5000
                    });
                }else{

                    if(data["info"] == true){

                        Swal.fire({
                        icon  : "success",
                        text  : "Successfully Save",
                        timer : 5000
                        }).then(function() {
            
                            location.href = BASE_URL+"product";

                        });

                    }else{

                        Swal.fire({
                        icon  :  "error",
                        text  : "Failed to Save",
                        timer : 5000
                        });
                    }

                }

                },
                error: function(jqxhr) {
            
                    alert(jqxhr.responseText);
            
                }

            });

    });


    $("#btnUpdateProduct").click(function(){

        var code    = $("#codeProductEdit").val();
        var name    = $("#nameProductEdit").val();
        var buying  = $("#buyingProductEdit").val();
        var selling = $("#sellingProductEdit").val();
        var original = $("#originalCodeEdit").val();
        var id      = $("#idProductEdit").val();
        var csrfValue     = $("#csrfToken").val();
        var csrfName      = $("#csrfToken").attr('name');


        $.ajax({
            method: "POST",
            url: BASE_URL+"product/edit",
            dataType: "json",
            data: {code:code, name:name, buying:buying, selling:selling, [csrfName]:csrfValue, id:id,original:original},
                success: function(data) {

                $("#csrfToken").val(data["csrf"]);

                if(data["duplicate"] == true){
                    Swal.fire({
                        icon  :  "warning",
                        text  : "Duplicate Data Code Product",
                        timer : 5000
                    });
                }else{

                    if(data["info"] == true){

                        Swal.fire({
                        icon  : "success",
                        text  : "Successfully Update",
                        timer : 5000
                        }).then(function() {
            
                            location.href = BASE_URL+"product";

                        });

                    }else{

                        Swal.fire({
                        icon  :  "error",
                        text  : "Failed to Update",
                        timer : 5000
                        });
                    }

                }

                },
                error: function(jqxhr) {
            
                    alert(jqxhr.responseText);
            
                }

            });

    });


    $("#btnSaveCompany").click(function(){

        var code    = $("#codeCompanyAdd").val();
        var name    = $("#nameCompanyAdd").val();
        var telp    = $("#telpCompanyAdd").val();
        var mobile  = $("#mobileCompanyAdd").val();
        var address = $("#addressCompanyAdd").val();
        var email   = $("#emailCompanyAdd").val();
        var contact = $("#contactCompanyAdd").val();

        var csrfValue     = $("#csrfToken").val();
        var csrfName      = $("#csrfToken").attr('name');


        $.ajax({
            method: "POST",
            url: BASE_URL+"company/save",
            dataType: "json",
            data: {code:code, name:name, telp:telp, mobile:mobile, email:email, contact:contact, address:address, [csrfName]:csrfValue},
                success: function(data) {

                $("#csrfToken").val(data["csrf"]);

                if(data["duplicate"] == true){
                    Swal.fire({
                        icon  :  "warning",
                        text  : "Duplicate Data Code Product",
                        timer : 5000
                    });
                }else{

                    if(data["info"] == true){

                        Swal.fire({
                        icon  : "success",
                        text  : "Successfully Save",
                        timer : 5000
                        }).then(function() {
            
                            location.href = BASE_URL+"company";

                        });

                    }else{

                        Swal.fire({
                        icon  :  "error",
                        text  : "Failed to Save",
                        timer : 5000
                        });
                    }

                }

                },
                error: function(jqxhr) {
            
                    alert(jqxhr.responseText);
            
                }

            });

    });

    $("#btnUpdateCompany").click(function(){

        var code    = $("#codeCompanyEdit").val();
        var name    = $("#nameCompanyEdit").val();
        var telp    = $("#telpCompanyEdit").val();
        var mobile  = $("#mobileCompanyEdit").val();
        var email   = $("#emailCompanyEdit").val();
        var contact = $("#contactCompanyEdit").val();
        var address = $("#addressCompanyEdit").val();
        var id      = $("#idCompanyEdit").val();
        var original     = $("#originalCodeEdit").val();
        var csrfValue     = $("#csrfToken").val();
        var csrfName      = $("#csrfToken").attr('name');

        $.ajax({
            method: "POST",
            url: BASE_URL+"company/edit",
            dataType: "json",
            data: {code:code, name:name, telp:telp, mobile:mobile, [csrfName]:csrfValue, id:id, email:email, contact:contact, address:address, original:original},
                success: function(data) {

                $("#csrfToken").val(data["csrf"]);

                if(data["duplicate"] == true){
                    Swal.fire({
                        icon  :  "warning",
                        text  : "Duplicate Data Code Company",
                        timer : 5000
                    });
                }else{

                    if(data["info"] == true){

                        Swal.fire({
                        icon  : "success",
                        text  : "Successfully Update",
                        timer : 5000
                        }).then(function() {
            
                            location.href = BASE_URL+"company";

                        });

                    }else{

                        Swal.fire({
                        icon  :  "error",
                        text  : "Failed to Update",
                        timer : 5000
                        });
                    }

                }

                },
                error: function(jqxhr) {
            
                    alert(jqxhr.responseText);
            
                }

            });

    });

    $('.productTransactionAdd').on('change', function() {

        var id            = $("#productTransactionAdd").val();
        var type          = $("#typeTransactionAdd").val();
        var csrfValue     = $("#csrfToken").val();
        var csrfName      = $("#csrfToken").attr('name');
        var qty           = $("#qtyTransactionAdd").val();
  
        
        if(id != ""){
        
        $.ajax({
  
          type: "POST",
          data: {
              id   : id,
              type : type,
              [csrfName] : csrfValue
          },
          async: false,
          dataType: 'json',
          url: BASE_URL + 'product/price',
          success: function (result) {
  
            var json = JSON.parse(result);
  
            if(qty != ""){
                $("#grossTransactionAdd").val(json.price*qty);
                $("#rateTransactionAdd").val(json.price);
            }else{
                $("#rateTransactionAdd").val(json.price);
            }
            
            $("#remarksRateAdd").html(json.typePrice);
  
            $("#csrfToken").val(json.csrf);
  
  
          },
          error: function (xhr, status, error) {
              // check status && error
          },
          dataType: 'text'
  
        }); 

        }else{
         
        
            $("#grossTransactionAdd").val("");
            $("#rateTransactionAdd").val("");

        
            
        }

    });

    $('#qtyTransactionAdd').bind('input', function () {
        
        var qty = $("#qtyTransactionAdd").val();

        if(qty > 0){
            var rate = $("#rateTransactionAdd").val();
            $("#grossTransactionAdd").val(qty*rate);
        }else{
            $("#grossTransactionAdd").val("");
        }
        
    });

    $("#btnSaveTransaction").click(function(){

        var docno   = $("#docnoTransactionAdd").val();
        var date    = $("#dateTransactionAdd").val();
        var company = $("#companyTransactionAdd").val();
        var type    = $("#typeTransactionAdd").val();
        var product = $("#productTransactionAdd").val();
        var qty     = $("#qtyTransactionAdd").val();
        var rate    = $("#rateTransactionAdd").val();
        var gross   = $("#grossTransactionAdd").val();

        var csrfValue     = $("#csrfToken").val();
        var csrfName      = $("#csrfToken").attr('name');


        $.ajax({
            method: "POST",
            url: BASE_URL+"transaction/save",
            dataType: "json",
            data: {docno:docno, date:date, company:company, type:type, product:product, qty:qty, rate:rate, gross:gross, [csrfName]:csrfValue},
                success: function(data) {

                $("#csrfToken").val(data["csrf"]);


                    if(data["info"] == true){

                        Swal.fire({
                        icon  : "success",
                        text  : "Successfully Save",
                        timer : 5000
                        }).then(function() {
            
                            location.href = BASE_URL+"transaction";

                        });

                    }else{

                        Swal.fire({
                        icon  :  "error",
                        text  : "Failed to Save",
                        timer : 5000
                        });
                    }


                },
                error: function(jqxhr) {
            
                    alert(jqxhr.responseText);
            
                }

            });

    });

    $("#btnUpdateTransaction").click(function(){

        var docno         = $("#docnoTransactionEdit").val();
        var date          = $("#dateTransactionEdit").val();
        var company       = $("#companyTransactionEdit").val();
        var type          = $("#typeTransactionEdit").val();
        var product       = $("#productTransactionEdit").val();
        var qty           = $("#qtyTransactionEdit").val();
        var rate          = $("#rateTransactionEdit").val();
        var gross         = $("#grossTransactionEdit").val();
        var id            = $("#idTransactionEdit").val();
        var csrfValue     = $("#csrfToken").val();
        var csrfName      = $("#csrfToken").attr('name');

        $.ajax({
            method: "POST",
            url: BASE_URL+"transaction/edit",
            dataType: "json",
            data: {docno:docno, date:date, company:company, type:type, [csrfName]:csrfValue, id:id, product:product, qty:qty, rate:rate, gross:gross},
                success: function(data) {

                $("#csrfToken").val(data["csrf"]);


                    if(data["info"] == true){

                        Swal.fire({
                        icon  : "success",
                        text  : "Successfully Update",
                        timer : 5000
                        }).then(function() {
            
                            location.href = BASE_URL+"transaction";

                        });

                    }else{

                        Swal.fire({
                        icon  :  "error",
                        text  : "Failed to Update",
                        timer : 5000
                        });
                    }


                },
                error: function(jqxhr) {
            
                    alert(jqxhr.responseText);
            
                }

            });

    });

    $('.productTransactionEdit').on('change', function() {

        var id            = $("#productTransactionEdit").val();
        var type          = $("#typeTransactionEdit").val();
        var csrfValue     = $("#csrfToken").val();
        var csrfName      = $("#csrfToken").attr('name');
        var qty           = $("#qtyTransactionEdit").val();
        
        if(id != ""){

        $.ajax({
  
          type: "POST",
          data: {
              id   : id,
              type : type,
              [csrfName] : csrfValue
          },
          async: false,
          dataType: 'json',
          url: BASE_URL + 'product/price',
          success: function (result) {
  
            var json = JSON.parse(result);
  
            if(qty != ""){
                $("#grossTransactionEdit").val(json.price*qty);
                $("#rateTransactionEdit").val(json.price);
            }else{
                $("#rateTransactionEdit").val(json.price);
            }
            
            $("#remarksRateEdit").html(json.typePrice);
  
            $("#csrfToken").val(json.csrf);
  
  
          },
          error: function (xhr, status, error) {
              // check status && error
          },
          dataType: 'text'
  
        }); 

        }else{
 
            $("#grossTransactionEdit").val("");
            $("#rateTransactionEdit").val("");

            
        }

    });

    $('#qtyTransactionEdit').bind('input', function () {
        
        var qty = $("#qtyTransactionEdit").val();

        if(qty > 0){
            var rate = $("#rateTransactionEdit").val();
            $("#grossTransactionEdit").val(qty*rate);
        }else{
            $("#grossTransactionEdit").val("");
        }
        
    });

});


function formEditProduct(name, id, code, selling, buying){

    $('#editProductModal').modal('show');
    $("#nameProductEdit").val(name);
    $("#idProductEdit").val(id);
    $("#codeProductEdit").val(code);
    $("#sellingProductEdit").val(selling);
    $("#buyingProductEdit").val(buying);
    $("#originalCodeEdit").val(code);
  
}

function formDeleteProduct(id,code){

    var csrfValue     = $("#csrfToken").val();
    var csrfName      = $("#csrfToken").attr('name');

    Swal.fire({
        title: 'Are you sure?',
        text: "Delete Code Product "+code,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {

                $.ajax({
                method: "POST",
                url: BASE_URL+"product/delete",
                dataType: "json",
                data: {id:id, [csrfName]:csrfValue},
                    success: function(data) {

                    if(data['info'] == true){

                        Swal.fire({
                        icon  :  "success",
                        text  : "Successfully Delete",
                        timer : 5000
                        }).then(function() {
            
                            location.href = BASE_URL+"product";

                        });

                    }else{

                        Swal.fire({
                        icon  :  "error",
                        text  : "Failed to Delete",
                        timer : 5000
                        });

                    }

                    },
                    error: function(jqxhr) {
                
                        alert(jqxhr.responseText);
                
                    }

                });

        }
    });

}


function formEditCompany(name,id,code,address,telp,mobile,email,contact){

    $('#editCompanyModal').modal('show');
    $("#nameCompanyEdit").val(name);
    $("#idCompanyEdit").val(id);
    $("#codeCompanyEdit").val(code);
    $("#originalCodeEdit").val(code);
    $("#telpCompanyEdit").val(telp);
    $("#mobileCompanyEdit").val(mobile);
    $("#emailCompanyEdit").val(email);
    $("#addressCompanyEdit").val(address);
    $("#contactCompanyEdit").val(contact);
  
}


function formEditTransaction(id, docno, date, product, company, qty, rate, gross, type){

    $('#editTransactionModal').modal('show');
    $("#docnoTransactionEdit").val(docno);
    $("#dateTransactionEdit").val(date);
    $("#companyTransactionEdit").val(company);
    $("#productTransactionEdit").val(product);
    $("#qtyTransactionEdit").val(qty);
    $("#rateTransactionEdit").val(rate);
    $("#grossTransactionEdit").val(gross);
    $("#idTransactionEdit").val(id);
    $("#typeTransactionEdit").val(type);
  
}


function formDeleteCompany(id,code){

    var csrfValue     = $("#csrfToken").val();
    var csrfName      = $("#csrfToken").attr('name');

    Swal.fire({
        title: 'Are you sure?',
        text: "Delete Code Company "+code,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {

                $.ajax({
                method: "POST",
                url: BASE_URL+"company/delete",
                dataType: "json",
                data: {id:id, [csrfName]:csrfValue},
                    success: function(data) {

                    if(data['info'] == true){

                        Swal.fire({
                        icon  :  "success",
                        text  : "Successfully Delete",
                        timer : 5000
                        }).then(function() {
            
                            location.href = BASE_URL+"company";

                        });

                    }else{

                        Swal.fire({
                        icon  :  "error",
                        text  : "Failed to Delete",
                        timer : 5000
                        });

                    }

                    },
                    error: function(jqxhr) {
                
                        alert(jqxhr.responseText);
                
                    }

                });

        }
    });

}


function formDeleteTransaction(id,docno){

    var csrfValue     = $("#csrfToken").val();
    var csrfName      = $("#csrfToken").attr('name');

    Swal.fire({
        title: 'Are you sure?',
        text: "Delete DocNo "+docno,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {

                $.ajax({
                method: "POST",
                url: BASE_URL+"transaction/delete",
                dataType: "json",
                data: {id:id, [csrfName]:csrfValue},
                    success: function(data) {

                    if(data['info'] == true){

                        Swal.fire({
                        icon  :  "success",
                        text  : "Successfully Delete",
                        timer : 5000
                        }).then(function() {
            
                            location.href = BASE_URL+"transaction";

                        });

                    }else{

                        Swal.fire({
                        icon  :  "error",
                        text  : "Failed to Delete",
                        timer : 5000
                        });

                    }

                    },
                    error: function(jqxhr) {
                
                        alert(jqxhr.responseText);
                
                    }

                });

        }
    });

}


function openModelAdd(){

    $("#addNewTransactionModal").modal("show");
 
    var csrfValue     = $("#csrfToken").val();
    var csrfName      = $("#csrfToken").attr('name');
        

    $.ajax({
  
        type: "POST",
        data: {
            [csrfName] : csrfValue
        },
        async: false,
        dataType: 'json',
        url: BASE_URL + 'transaction/docno',
        success: function (result) {

            var json = JSON.parse(result);
            
            $("#docnoTransactionAdd").val(json.docno);
            $("#csrfToken").val(json.csrf);
        },
        error: function (xhr, status, error) {
            // check status && error
        },
        dataType: 'text'

      }); 
    
}