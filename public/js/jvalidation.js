    $('#catform').validate({

        rules:{
            name:{
                required : true,
            },
            status:"required",
        },
        messages:{
            name:{
                required : 'Please Enter Name'
            },
            status:{
                required : 'Please Select Status'
            },
        }
        
    })
    $('#addbanner').validate({

        rules:{
            title:{
                required : true,
            },
            image:"required",
        },
        messages:{
            title:{
                required : 'Please Enter Title'
            },
            image:{
                required : 'Please Select Image'
            },
        }
        
    })
    $('#confi_form').validate({

        rules:{
            conf_key:{
                required : true,
            },
            conf_value:"required",
            status:{
                required : true,
            },
        },
        messages:{
            conf_key:{
                required : 'Please Enter Configuration Key'
            },
            conf_value:{
                required : 'Please Enter Configuration Value'
            },
            status:{
                required : 'Please Select Status'
            },
        }
    })
    $('#product_form').validate({

        rules:{
            name:{
                required : true,
            },
            shortdsc:"required",
            longdsc:"required",
            status:{
                required : true,
            },
            price:{
                required : true,
            },
            sprice:{
                required : true,
            },
            datefrom:"required",
            dateto:"required",
            qty:"required"
            
        },
        messages:{
            name:{
                required : 'Please Enter Name'
            },
            shortdsc:{
                required : 'Please Enter Short Description'
            },
            longdsc:{
                required : 'Please Enter Long Description'
            },
            status:{
                required : 'Please Select Status'
            },
            price:{
                required : 'Please Enter Price',
            },
            sprice:{
                required : 'Please Enter Special Price',
            },
            datefrom:{
                required : 'Please Select Date',
            },
            dateto:{
                required : 'Please Select Date',
            },
            qty:{
                required : 'Please Enter Quntity',
            }
        }
    })