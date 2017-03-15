    var EventUtil = {
        addHandler: function(element, type, handler) {
            if (element.addEventListener) {
                element.addEventListener(type, handler, false);
            } else if (element.attachEvent) {
                element.attachEvent("on" + type, handler);
            } else {
                element["on" + type] = handler;
            }
        }
    };
    var logo = document.getElementById("logo");
    var btn = document.getElementById("btn");
    var pic = document.getElementById("img");

    function getBase64Image(img) {
        var canvas = document.createElement("canvas");
        canvas.width = img.width;
        canvas.height = img.height;

        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0, img.width, img.height);
        var ext = img.src.substring(img.src.lastIndexOf(".") + 1).toLowerCase();
        var dataURL = canvas.toDataURL("image/" + ext);
        return dataURL;
    }
    var ua = navigator.userAgent.toLowerCase();
    EventUtil.addHandler(logo, 'change', function() {
        pic.style.display = "block";
        var file = document.getElementById("logo");
        var ext = file.value.substring(file.value.lastIndexOf(".") + 1).toLowerCase();

        // gif在IE浏览器暂时无法显示
        if (ext != 'png' && ext != 'jpg' && ext != 'jpeg') {
            alert("图片的格式必须为png或者jpg或者jpeg格式！");
            return;
        }
        if (/msie ([^;]+)/.test(ua)) {
            var lowIE10 = RegExp["$1"] * 1;
            if (lowIE10 == 6) {
                // IE6浏览器设置img的src为本地路径可以直接显示图片
                file.select();
                // 在file控件下获取焦点情况下 document.selection.createRange() 将会拒绝访问，所以我们要失去下焦点。
                file.blur();
                var reallocalpath = document.selection.createRange().text;
                pic.src = reallocalpath;
            } else if (lowIE10 < 10) {
                // IE7~9 IE10+按照html5的标准去处理
                file.select();
                // 在file控件下获取焦点情况下 document.selection.createRange() 将会拒绝访问，所以我们要失去下焦点。
                file.blur();

                var reallocalpath = document.selection.createRange().text;
                // 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
                pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
                // 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
                // pic.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
            } else if (lowIE10 >= 10) {
                html5Reader(file);
            }
        } else {
            html5Reader(file);
        }
    });

    function html5Reader(file) {
        var fileObj = file.files[0],
            img = document.getElementById("img");
        // URL.createObjectURL  safari不支持
        img.src = URL.createObjectURL(fileObj);
        img.onload = function() {
                var data = getBase64Image(img);
                console.log(data); // 打印出base64编码
            }
            /*
			  var file = file.files[0];
			  var reader = new FileReader();
			  reader.readAsDataURL(file);
			  reader.onload = function(e){
				 var pic = document.getElementById("img");
				 pic.src=this.result;
			  }*/
    }
    //用户名验证
    $("#name").blur(function() {     
        var name = $(this).val();
        var reName = /^[a-zA-Z\d]\w{4,11}[a-zA-Z\d]$/;       
        if (!reName.test(name)) {
            $('#regName').hide();
            $("#warn").css("opacity", "1");
            $("#warn").text('用户名有误！');  
            $('#regName').hide();         
            return false;
        } else {
            $.ajax({
                url: "http://lg.blog.com/index.php/Blog/checkName",
                type:"POST",
                dataType:'json',
                data:{
                    "name":name,
                },
                success:function(data){
                 if(data.status==0){
                    alert("用户名已存在");
                 }
                 else{
                   $("#warn").css("opacity", "0");
                   $('#regName').show();
                 }
                },
                error:function(){

                }
            });
        	// $("#warn").css("opacity", "0");
         //    $('#regName').show();
        }
    });
    //密码验证
    $("#password").blur(function() {
        var password = $(this).val();
        var regPassword = /^[A-Za-z0-9]{6,20}$/;
        if (!regPassword.test(password)) {
        	$('#regPassword').hide();
            $("#warn").css("opacity", "1");
            $("#warn").text('密码有误！');  
            $('#regPassword').hide();       
            return false;
        }
        else{           
        	$('#regPassword').show();
        }
    });
    //邮箱验证
    $("#email").blur(function() {
        var email = $(this).val();
        var regEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;
        if (!regEmail.test(email)) {
            $("#warn").css("opacity", "1");
            $("#warn").text('邮箱地址有误！');
            $('#regEmail').hide();
            return false;
        }
        else{
            $.ajax({
                url: "http://lg.blog.com/index.php/Blog/checkEmail",
                type:"POST",
                dataType:'json',
                data:{
                    "email":email,
                },
                success:function(data){
                 if(data.status==0){
                    $('#regEmail').hide();
                    alert("邮箱已存在");
                 }
                 else{
                   $("#warn").css("opacity", "0");
                   $('#regEmail').show();
                 }
                },
                error:function(){

                }
            });
        	
        }
    });
    //手机号验证
    $("#phone").blur(function() {
        var email = $(this).val();
        var regEmail = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
        if (!regEmail.test(email)) {
            $("#warn").css("opacity", "1");
            $("#warn").text('手机号有误！');
            $('#regPhone').hide();
            return false;
        }
        else{
        	$('#regPhone').show();
        }
    });
    $("#password,#password,#email,#phone").focus(function(){
    	$("#warn").css("opacity", "0");
    });

    $("#apply").click(function(){
       if ($("#regName").is(':visible') && $("#regPassword").is(':visible') && $("#regEmail").is(':visible') && $("#regPhone").is(':visible')) {
        var name = $("#name").val();
        var password = $("#password").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        $.ajax({
            url:"http://lg.blog.com/index.php/Blog/signUp",
            type:"POST",
            dataType:"json",
            data:{
                "name":name,
                "password":password,
                "email":email,
                "phone":phone
            },
            success:function(data){
                if (data.status==1) {
                    $("#success").fadeIn("fast");
                    $("#success").animate({top:"240px"},500);
                    setTimeout(function(){
                       $("#success").fadeOut(); 
                       $("#success").css("top","140px");
                    });
                }
                else{
                    alert("网络错误");
                }
            },
            error:function(){
                alert("网络错误");
            }
        });
       } 
       else{
        alert("请填写有效信息");
       }
            $.ajaxFileUpload({
            url: 'http://lg.blog.com/index.php/Blog/upLoad', //处理图片的脚本路径
            type: 'post', //提交的方式           
            secureuri: false, //是否启用安全提交
            fileElementId: 'logo', //file控件ID.
            dataType: 'json', //服务器返回的数据类型
            data:{"name":name},
            success: function(data, status) { //提交成功后自动执行的处理函数
                // if (1 != data.total) return; //因为此处指允许上传单张图片，所以数量如果不是1，那就是有错误了
                var url = data.url;
                $('.id_photos').empty();
                //此处效果是：当成功上传后会返回一个json数据，里面有url，取出url赋给img标签，然后追加到.id_photos类里显示出图片
                $('.id_photos').append('<img src="' + url + '" value="' + url + '" style="width:80%" >');
                //$('.upload-box').remove();
            },
            error: function(data, status, e) { //提交失败自动执行的处理函数
                alert(e);
            }
        }) 
    });
    
